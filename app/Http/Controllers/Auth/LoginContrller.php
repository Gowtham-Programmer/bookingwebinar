<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginContrller extends Controller
{
    public function showAdminLogin()
    {
        return view('auth.admin-login');
    }

    public function showUserLogin()
    {
        return view('auth.user-login');
    }
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
        }
        return redirect('/user/dashboard');
    }
}