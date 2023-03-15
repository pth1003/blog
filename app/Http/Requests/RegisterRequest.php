<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
            'rePassword' => 'required|same:password',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Vui lòng nhập tên đầy đủ',
            'username.required' => 'Vui lòng nhập username',
            'password.required' => 'Vui lòng nhập passwork',
            'password.min' => 'Passwork phải có ít nhất 6 kí tự',
            'rePassword' => 'Vui lòng nhập lại password',
            'rePassword' => '2 password chưa giống nhau',
            'email.required' => 'Vui lòng nhập email',
            'email' => 'Email chưa đúng định dạng',
        ];
    }
}
