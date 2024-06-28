<?php

namespace App\Http\Requests\Apperciation;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            'sender_id' => 'required|integer|exists:users,id',
            'recipient_id' => 'required|integer|exists:users,id',
            'appreciation_type_id' => 'required|integer|exists:appreciation_types,id',

        ];
    }
}
