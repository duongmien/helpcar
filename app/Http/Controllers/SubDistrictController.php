<?php

namespace App\Http\Controllers;

use App\CityModel;
use App\District;
use App\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Mockery\Matcher\Subset;

class SubDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_all_sub_dis = SubDistrict::with('district')->get();
        $manager_dis = view('admin.sub-district.list')->with('data_all_sub_dis', $data_all_sub_dis);
        return view('adminlayout')->with('admin.sub-district.list', $manager_dis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_dis = District::orderBy('id', 'desc')->get();
        $manager_dis = view('admin.sub-district.add')->with('data_dis', $data_dis);
        return view('adminlayout')->with('admin.sub-district.add', $manager_dis);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sub_district = new SubDistrict();
        $sub_district->name =  $request->name;
        $sub_district->district_id = $request->district_id;
        $sub_district->save();
        // Thông qua 1 thể hiện của Request
        $request->session()->put('message', 'Add successful');
        return Redirect::to('/sub-district');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_detail = SubDistrict::findorFail($id);
        $manager_dis = view('admin.sub-district.detail')->with('data_detail', $data_detail);
        return view('adminlayout')->with('admin.sub-district.detail', $manager_dis);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_dis = District::orderBy('id', 'desc')->get();
        $data_sub_district = SubDistrict::findOrFail($id);
        $manager_dis = view('admin.sub-district.edit')->with('data_sub_district', $data_sub_district)->with('data_dis',    $data_dis);
        return view('adminlayout')->with('admin.sub-district.edit', $manager_dis);
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
        $sub_district = SubDistrict::findOrFail($id);
        $sub_district->name =  $request->name;
        $sub_district->district_id = $request->district_id;
        $sub_district->save();
        $request->session()->put('message', 'Upadate successful');
        return Redirect::to('/sub-district');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_district = SubDistrict::findOrFail($id);
        $sub_district->delete();
        Session::put('message', 'Delete successful');
        return Redirect::to('/sub-district');
    }
}
