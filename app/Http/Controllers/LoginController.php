<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index()
    {
        return view('page.login');
    }
    public function check_login(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        $login = User::where('email', $email)->where('password', $password)->first();
        if ($login) {
            if ($login->idrole == 3) {
                Session::put('name', $login->name);
                Session::put('id', $login->id);
                Session::put('idrole', 3);
                Session::put('message', 'Login successful');
                return Redirect::to('/city');
            } else if ($login->idrole == 1) {
                Session::put('name', $login->name);
                Session::put('id', $login->id);
                Session::put('idrole', 1);
                Session::put('message', 'Login successful');
                return Redirect::to('/home');
            }
        } else {
            Session::put('message', 'Incorrect account or password');
            return Redirect::to('/login')->withInput();
        }
    }
    public function logout()
    {
        Session::put('name', null);
        Session::put('id', null);
        return Redirect::to('/');
    }
}
