<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => [
                'required',
                'string',
                'max:191',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique(User::class, 'email'),
                'string',
                'max:191',
            ],
            'password' => [
                'required',
                'min:8',
                'max:191',
                'confirmed',
            ],
        ], [
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
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
