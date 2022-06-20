<?php

namespace App\Http\Controllers;

use App\CityModel;
use App\districtModel;
use App\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DistrictController extends Controller
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
        $data_all_dis = District::with('city')->get();
        $manager_dis = view('admin.district.list')->with('data_all_dis', $data_all_dis);
        return view('adminlayout')->with('admin.district.list', $manager_dis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        $data_city = CityModel::orderBy('id', 'desc')->get();
        $manager_city = view('admin.district.add')->with('data_city', $data_city);
        return view('adminlayout')->with('admin.district.add', $manager_city);
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
        $district = new District();
        $district->name =  $request->name;
        $district->city_id = $request->city_id;
        $district->save();
        // Thông qua 1 thể hiện của Request
        $request->session()->put('message', 'Add successful');
        return Redirect::to('/district');
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
        $data_detail = District::findorFail($id);
        $manager_dis = view('admin.district.detail')->with('data_detail', $data_detail);
        return view('adminlayout')->with('admin.district.detail', $manager_dis);
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
        $data_city = CityModel::orderBy('id', 'desc')->get();
        $data_district = District::findOrFail($id);
        $manager_dis = view('admin.district.edit')->with('data_district', $data_district)->with('data_city', $data_city);
        return view('adminlayout')->with('admin.district.edit', $manager_dis);
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
        $district = District::findOrFail($id);
        $district->name =  $request->name;
        $district->city_id = $request->city_id;
        $district->save();
        $request->session()->put('message', 'Upadate successful');
        return Redirect::to('/district');
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
        $district = District::findOrFail($id);
        $district->delete();
        Session::put('message', 'Delete successful');
        return Redirect::to('/district');
    }
}
