<?php

namespace App\Http\Controllers;

use App\ImageForCSCH;
use App\ImageForGPKD;
use App\ResFacility;
use App\Role;
use App\SubDistrict;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ResFacilityController extends Controller
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
        $data_all_csch = ResFacility::with('role', 'subdistrict')->get();
        $manager_csch = view('admin.csch.list')->with('data_all_csch', $data_all_csch);
        return view('adminlayout')->with('admin.csch.list', $manager_csch);
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
        $data_role = Role::where('id', 2)->orderBy('id', 'desc')->get();
        $manager_csch = view('admin.csch.add')->with('data_sub_dis', $data_sub_dis)->with('data_role', $data_role);
        return view('adminlayout')->with('admin.csch.add', $manager_csch);
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
        $csch = new ResFacility();
        $csch->name =  $request->name;
        $csch->ngaydkkd =  $request->date;
        $csch->tax_code =  $request->tax_code;
        $csch->phone =  $request->phone;
        $csch->email =  $request->email;
        $csch->password = Hash::make($request->password);
        $csch->diachi = $request->address;
        $csch->idPX = $request->idPX;
        $csch->idrole = $request->idrole;
        $csch->save();
        // Insert multi image for GPKD
        if ($request->hasFile('file_images')) {
            $files = $request->file('file_images');
            foreach ($files as $file) {
                $img = new ImageForGPKD();
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(0, 99) . "-" . date('his')  . $extension;
                $destinationPath = 'uploads/gpkd' . '/';
                $file->move($destinationPath, $fileName);
                $img->idcsch = $csch->id;
                $img->name = $fileName;
                $img->save();
            }
        }
        // Insert multi image for CSCH
        if ($request->hasFile('csch_images')) {
            $files = $request->file('csch_images');
            foreach ($files as $file) {
                $img = new ImageForCSCH();
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(0, 99) . "-" . date('his')  . $extension;
                $destinationPath = 'uploads/csch' . '/';
                $file->move($destinationPath, $fileName);
                $img->idcsch = $csch->id;
                $img->name = $fileName;
                $img->save();
            }
        }
        // Thông qua 1 thể hiện của Request
        $request->session()->put('message', 'Add successful');
        return Redirect::to('/csch');
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
        $data_detail = ResFacility::findorFail($id);
        $manager_csch = view('admin.csch.detail')->with('data_detail',   $data_detail);
        return view('adminlayout')->with('admin.csch.detail', $manager_csch);
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
        $data_csch = ResFacility::findOrFail($id);
        $manager_csch = view('admin.csch.edit')->with('data_sub_dis', $data_sub_dis)->with('data_csch', $data_csch)->with('data_role', $data_role);
        return view('adminlayout')->with('admin.csch.edit', $manager_csch);
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
        $csch = ResFacility::findOrFail($id);
        $csch->name =  $request->name;
        $csch->DoB =  $request->DoB;
        $csch->sex =  $request->sex;
        $csch->phone =  $request->phone;
        $csch->email =  $request->email;
        $csch->CMND =  $request->cmnd;
        $csch->password = Hash::make($request->password);
        $csch->diachi = $request->address;
        $csch->idPX = $request->idPX;
        $csch->idrole = $request->idrole;
        $csch->save();
        $request->session()->put('message', 'Upadate successful');
        return Redirect::to('/csch');
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
        $csch = ResFacility::findOrFail($id);
        $csch->delete();
        Session::put('message', 'Delete successful');
        return Redirect::to('/csch');
    }
}
