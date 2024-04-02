<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SigupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //chỉ trả về true or false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => ['required',],
            'password' => 'required|confirmed'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute Tên không được để trống',
            'email.required' => ':attribute Email không được để trống',
            'password.required' => ':attribute Password không được để trống'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email' => 'Hòm thư điện tử',
            'password' => 'Mật khẩu'
        ];
    }
}
