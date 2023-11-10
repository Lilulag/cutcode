<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login ()
    {
        return view('admin.auth.login');
    }

    public function login_action (LoginRequest $request)
    {
        $data = $request->validated();

        if (auth('admin')->attempt($data)) {
            return redirect(route('admin.posts.index'));
        };

        return $data;
    }

    public function logout_action ()
    {
        auth('admin')->logout();

        return redirect(route('admin.login'));
    }
}
