<?php

namespace App\Http\Controllers;

use App\CityModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
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
        $data_all_city = CityModel::all();
        $manager_city = view('admin.city.list')->with('data_all_city', $data_all_city);
        return view('adminlayout')->with('admin.city.list', $manager_city);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('admin.city.add');
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
        $city = new CityModel();
        $city->name =  $request->name;
        $city->save();
        // Thông qua 1 thể hiện của Request
        $request->session()->put('message', 'Add successful');
        return Redirect::to('/city');
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
        $data_detail = CityModel::findorFail($id);
        $manager_city = view('admin.city.detail')->with('data_detail', $data_detail);
        return view('adminlayout')->with('admin.city.detail', $manager_city);
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
        $data_city = CityModel::findOrFail($id);
        $manager_city = view('admin.city.edit')->with('data_city', $data_city);
        return view('adminlayout')->with('admin.city.edit', $manager_city);
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
        $city = CityModel::findOrFail($id);
        $city->name =  $request->name;
        $city->save();
        $request->session()->put('message', 'Upadate successful');
        return Redirect::to('/city');
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
        $city = CityModel::findOrFail($id);
        $city->delete();
        Session::put('message', 'Delete successful');
        return Redirect::to('/city');
    }
}
