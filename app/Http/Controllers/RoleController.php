<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
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
        $data_all_role = Role::all();
        $manager_role = view('admin.role.list')->with('data_all_role', $data_all_role);
        return view('adminlayout')->with('admin.role.list', $manager_role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('admin.role.add');
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
        $role = new Role();
        $role->name =  $request->name;
        $role->save();
        // Thông qua 1 thể hiện của Request
        $request->session()->put('message', 'Add successful');
        return Redirect::to('/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->AuthLogin();
        $data_detail = Role::findorFail($id);
        $manager_role = view('admin.role.detail')->with('data_detail', $data_detail);
        return view('adminlayout')->with('admin.role.detail', $manager_role);
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
        $data_role = Role::findOrFail($id);
        $manager_role = view('admin.role.edit')->with('data_role', $data_role);
        return view('adminlayout')->with('admin.role.edit', $manager_role);
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
        $role = Role::findOrFail($id);
        $role->name =  $request->name;
        $role->save();
        $request->session()->put('message', 'Upadate successful');
        return Redirect::to('/role');
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
        $role = Role::findOrFail($id);
        $role->delete();
        Session::put('message', 'Delete successful');
        return Redirect::to('/role');
    }
}
