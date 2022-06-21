<?php

namespace App\Http\Controllers;

use App\Categories;
use App\ItemCate;
use App\ResFacility;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $cdm = Categories::count();
        $cdv = ItemCate::count();
        $user = User::count();
        $csch = ResFacility::count();
        $manager_das = view('admin.dashboard.dashboard')->with('cdm', $cdm)->with('cdv', $cdv)->with('user', $user)->with('csch', $csch);
        return view('adminlayout')->with('admin.dashboard.dashboard', $manager_das);
    }
}
