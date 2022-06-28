<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    protected $redirectRoute = 'register.page';

    /**
     * The route that users should be redirected to if validation fails.
     *
     * @var string
     */


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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email:rfc,dns|unique:users,email',
            'city_id' => 'required',
            'name' => 'required|min:3|max:35',
            'notification_settings' => 'required',
            'password' => 'required|min:8|max:25|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Введите email пользователя',
            'email.email' => 'Введите действительный email',
            'email.unique' => 'Пользователь с данным email уже существует',

            'name.required' => 'Введите имя пользователя',
            'name.min' => 'Слишком короткое имя',
            'name.max' => 'Слишком длинное имя',

            'password.required' => 'Введите пароль',
            'password.min' => 'Длина пароля от 8 символов',
            'password.max' => 'Длина пароля не более 25 символов',
            'password.confirmed' => 'Пароли должны совпадать',

            'city_id.required' => 'Укажите город, чтобы находить подходящие задачи',
        ];
    }
}
