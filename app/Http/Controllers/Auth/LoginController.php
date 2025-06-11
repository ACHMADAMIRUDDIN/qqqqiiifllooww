<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
   
    }

    /**
     * Update last_login_at setiap kali login berhasil.
     */
    protected function authenticated(Request $request, $user)
    {
        $user->last_login_at = now();
        $user->save();
    }

    // ...existing methods if any...
}