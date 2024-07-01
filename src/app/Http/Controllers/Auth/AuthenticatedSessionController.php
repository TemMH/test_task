<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use App\Services\SmsService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }


    public function showSmsForm(){
    
         return Inertia::render('Auth/SmsVerify');
    }




    public function store(LoginRequest $request)
    {
        $request->authenticate();
    
        return redirect()->route('auth.sms.verify')->withInput();
    }



    public function verifySms(Request $request): RedirectResponse
    {
        $request->validate([
            'sms_code' => ['required', 'string', 'digits:4'],
        ]);
    
        $expectedSmsCode = SmsService::getSmsCode();
        $inputSmsCode = $request->input('sms_code');
    
        Log::info('Введённый смс-код: ' . $inputSmsCode);
    
        if ($inputSmsCode !== $expectedSmsCode) {
            SmsService::generateAndStoreSmsCode(session('auth_temp.phone_number'));
    
            throw ValidationException::withMessages([
                'sms_code' => 'Неверный смс-код.',
            ])->redirectTo(route('auth.sms.verify'));
        }
    
        $credentials = session('auth_temp');
    
        if ($credentials) {
            Auth::attempt($credentials, $request->boolean('remember'));
            $request->session()->forget('auth_temp');
            $request->session()->regenerate();
        }
    
        return redirect()->intended(RouteServiceProvider::HOME);
    }
    
    









    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
