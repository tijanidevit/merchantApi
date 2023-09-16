<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class AuthService.
 */
class AuthService
{
    public function __construct(protected User $user) {
    }
    public function register(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        $user = $this->user->create($data);
        auth()->login($user, true);
        $token = $user->createToken('auth')->plainTextToken;
        return compact('user','token');
    }

    public function login(array $data) : bool
    {
        return auth()->attempt($data);
    }

}
