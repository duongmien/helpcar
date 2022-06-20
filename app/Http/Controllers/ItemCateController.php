<?php

namespace App\Http\Controllers;

use App\Categories;
use App\ItemCate;
use App\ResFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ItemCateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $data_all_itemcate = ItemCate::with('categories', 'ResFacility')->get();
        $manager_itemcate = view('admin.itemcate.list')->with('data_all_itemcate', $data_all_itemcate);
        return view('adminlayout')->with('admin.itemcate.list', $manager_itemcate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        $data_cat = Categories::orderBy('id', 'desc')->get();
        $data_csch = ResFacility::orderBy('id', 'desc')->get();
        $manager_all = view('admin.itemcate.add')->with('data_cat', $data_cat)->with('data_csch', $data_csch);
        return view('adminlayout')->with('admin.itemcate.add', $manager_all);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
