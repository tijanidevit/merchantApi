<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService) {

    }

    public function logout() : RedirectResponse {
        auth()->logout();
        return redirect()->route('login');
    }

    public function login(LoginRequest $request) : RedirectResponse {
        if ($this->authService->login($request->validated())) {
            if (auth()->user()->role == UserRoleEnum::ADMIN) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('home');
        }
        else{
            return redirect()->back()->with('error', 'Invalid password');
        }

    }

    public function register(RegisterRequest $request) : RedirectResponse {
        if ($this->authService->register($request->validated())) {
            return redirect()->to('login');
        }
        return redirect()->back()->with('error', 'Invalid password');
    }
}
