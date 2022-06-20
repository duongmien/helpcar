<?php

namespace App\Http\Controllers;

use App\Role;
use App\SubDistrict;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('idrole');
        if ($admin_id && $admin_id == 3) {
            return Redirect::to('city');
        } else {
            return Redirect::to('login')->send();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AuthLogin();
        $data_all_user = User::with('role', 'subdistrict')->get();
        $manager_user = view('admin.user.list')->with('data_all_user', $data_all_user);
        return view('adminlayout')->with('admin.user.list', $manager_user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        $data_sub_dis = SubDistrict::orderBy('id', 'desc')->get();
        $data_role = Role::where('id', 1)->orWhere('id', 3)->orderBy('id', 'desc')->get();
        $manager_user = view('admin.user.add')->with('data_sub_dis', $data_sub_dis)->with('data_role', $data_role);
        return view('adminlayout')->with('admin.user.add', $manager_user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->AuthLogin();
        $user = new User();
        $user->name =  $request->name;
        $user->DoB =  $request->DoB;
        $user->sex =  $request->sex;
        $user->phone =  $request->phone;
        $user->email =  $request->email;
        $user->CMND =  $request->cmnd;
        $user->password = md5($request->password);
        $user->diachi = $request->address;
        $user->idPX = $request->idPX;
        $user->idrole = $request->idrole;
        $user->save();
        // Thông qua 1 thể hiện của Request
        $request->session()->put('message', 'Add successful');
        return Redirect::to('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->AuthLogin();
        $data_sub_dis = SubDistrict::orderBy('id', 'desc')->get();
        $data_role = Role::where('id', 1)->orWhere('id', 3)->orderBy('id', 'desc')->get();
        $data_user = User::findOrFail($id);
        $manager_user = view('admin.user.edit')->with('data_sub_dis', $data_sub_dis)->with('data_user', $data_user)->with('data_role', $data_role);
        return view('adminlayout')->with('admin.user.edit', $manager_user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->AuthLogin();
        $user = User::findOrFail($id);
        $user->name =  $request->name;
        $user->DoB =  $request->DoB;
        $user->sex =  $request->sex;
        $user->phone =  $request->phone;
        $user->email =  $request->email;
        $user->CMND =  $request->cmnd;
        $user->password = md5($request->password);
        $user->diachi = $request->address;
        $user->idPX = $request->idPX;
        $user->idrole = $request->idrole;
        $user->save();
        $request->session()->put('message', 'Upadate successful');
        return Redirect::to('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->AuthLogin();
        $user = User::findOrFail($id);
        $user->delete();
        Session::put('message', 'Delete successful');
        return Redirect::to('/user');
    }
}
