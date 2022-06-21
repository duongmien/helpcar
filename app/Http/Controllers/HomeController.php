<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('idrole');
        if ($admin_id & $admin_id == 1) {
            return Redirect::to('home');
        } else {
            return Redirect::to('login')->send();
        }
    }
    public function index()
    {
        return view('page.homeno');
    }
    public function home()
    {
        $this->AuthLogin();
        return view('page.home');
    }
}
