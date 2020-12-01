<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:1|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:255',
            'password_confirmation' => 'required|string|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'обязательное поле',
            'name.string' => 'некорректное значение',
            'name.min' => 'минимальная длина - 1 символ',
            'name.max' => 'максимальная длина - 255 символов',

            'email.required' => 'обязательное поле',
            'email.string' => 'некорректное значение',
            'email.email' => 'некорректный email',
            'email.max' => 'максимальная длина - 255 символов',
            'email.unique' => 'пользователь с таким email уже существует',

            'password.required' => 'обязательное поле',
            'password.string' => 'некорректное значение',
            'password.min' => 'минимальная длина - 8 символов',
            'password.max' => 'максимальная длина - 255 символов',

            'password_confirmation.required' => 'обязательное поле',
            'password_confirmation.string' => 'некорректное значение',
            'password_confirmation.same' => 'пароли не совпадают',
        ];
    }
}
