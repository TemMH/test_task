<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => [ 'max:255'],
            'second_name' => [ 'max:255'],
            'middle_name' => [ 'max:255'],
            'phone_number' => ['required', 'string', 'max:20', Rule::unique(User::class)->ignore($this->user()->id)],
            'email' => ['max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
