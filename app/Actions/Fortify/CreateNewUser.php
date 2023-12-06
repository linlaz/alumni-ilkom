<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\tahunMasukNotMatchNIM;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'nim' => ['required','regex:/^07\d{5,6}\d{0,7}$/','unique:users,nim'],
            'tahun_masuk' => ['required','digits:4','integer', new tahunMasukNotMatchNIM],
            'password' => $this->passwordRules(),
        ])->validate();
        try {
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'nim' => $input['nim'],
                'tahun_masuk' => $input['tahun_masuk'],
                'password' => Hash::make($input['password']),
                'is_active' => false,
            ]);
            $user->assignRole('pengguna');
            return $user;
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }
}
