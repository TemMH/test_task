<?php

use App\Http\Controllers\AppreciationTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppreciationController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\CommentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');

Route::get('/appreciations/{user}', [AppreciationController::class, 'indexUser'])->name('appreciations.indexUser');
Route::get('/appreciation/{appreciation}', [AppreciationController::class, 'show'])->name('appreciation.show');

Route::post('/appreciation', [AppreciationController::class, 'store'])->name('appreciation.store');

Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');

Route::post('/comment/assessment', [AssessmentController::class, 'commentassessment'])->name('comment.assessment');




require __DIR__.'/auth.php';
