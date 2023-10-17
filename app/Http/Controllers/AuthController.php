<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function store(RegisterRequest $request)
    {
        $userData = $request->validated();
        $userData['password'] = Hash::make($userData['password']);
        unset($userData['password_confirmation']);
        User::create($userData);
        return redirect()->route('login');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function authenticate(LoginRequest $request)
    {
        $userData = $request->validated();
        if (auth()->attempt($userData)) {
            request()->session()->regenerate();
            return redirect()->route('index')->with('success', 'Logged in successfully!');
        };
        return redirect()->route('index')->with('success', 'Loged in successfully!');
    }

    /**
     * @return RedirectResponse
     */
    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('index');
    }
}
