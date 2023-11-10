<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotRequest;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function showRegisterForm() {
        return view('auth.register');
    }

    public function logout() {
        auth('web')->logout();

        return redirect(route('home'));
    }

    public function register(Request $request) {
        $data = $request->validate([
          'name' => ['required', 'string', 'min:2'],
          'email' => ['required', 'email', 'unique:users,email'],
          'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        if ($user) {
            auth('web')->login($user);
        }

        return redirect(route('home'));
    }

    public function login(Request $request) {

        $data = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
        ]);

        if (auth('web')->attempt($data)) {
            return redirect(route('home'));
        };

        return redirect(route('login'))->withErrors(['email' => 'Неверные данные']);
    }

    public function showForgotForm() {
        return view('auth.forgot');
    }

    public function forgot(ForgotRequest $request) {
        $data = $request->validated();

        $user = User::query()->where('email', $data['email'])->first();

        $password = uniqid();
        $user->password = Hash::make($password);
        $user->save();

        $userdata = [
            'email' => $user->email,
            'password' => $password,
        ];

        Mail::to($user)->send(new ForgotPassword($userdata));

        return back()->with(['message' => 'Письмо отправлено на вашу почту']);
    }
}
