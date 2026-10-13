<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fio' => 'required|regex:/^[а-яА-ЯёЁ\s]+$/u',
            'email' => 'required|email|unique:users',
            'login' => 'required|min:8|regex:/^[a-zA-Z0-9]+$/u|unique:users',
            'phone' => 'required|regex:/^8\(\d{3}\)\d{3}-\d{2}-\d{2}$/',
            'password' => 'required|min:8'
        ];
    }
}
