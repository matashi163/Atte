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
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:191',
            ],
            'email' => [
                'required',
                'email',
                'string',
                'max:191',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:191',
                'confirmed',
            ],
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required' => 'お名前を入力してください',
            'name.string' => '名前は文字型で入力してください',
            'name.max' => '名前は191文字以内で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'email.unique' => 'このメールアドレスはすでに登録されています',
            'email.string' => 'メールアドレスは文字型で入力してください',
            'email.max' => 'メールアドレスは191文字以内で入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.max' => 'パスワードは191文字以内で入力してください',
            'password.confirmed' => '確認用パスワードと一致しません',
        ];
    }
}
