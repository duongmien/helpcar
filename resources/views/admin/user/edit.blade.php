@extends('adminlayout')
@section('admin_content')
<?php

use Illuminate\Support\Facades\Session;

$message = Session::get('message');
if ($message) {

    echo '<script>alert("' . $message . '");</script> ';
    Session::put('message', null);
}
?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <div class="position-center">
        <form role="form" action="{{route('user.update',$data_user->id)}}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="">Họ Tên</label>
                <input type="text" class="form-control" id="" placeholder="" name="name" value="{{$data_user->name}}">
            </div>
            <div class="form-group">
                <label for="">Ngày sinh</label>
                <input type="date" class="form-control" id="" placeholder="" name="DoB" value="{{$data_user->DoB}}">
            </div>
            <div class="form-group">
                <label for="">Giới tính</label>
                <select id="" name="sex" class="form-control">
                    <option ({{$data_user->sex}}=='Nữ' ) ? 'selected' : '' value="Nữ"> Nữ</option>
                    <option ({{$data_user->sex}}=='Nam' ) ? 'selected' : '' value="Nam"> Nam</option>
                    <option ({{$data_user->sex}}=='Khác' ) ? 'selected' : '' value="Khác"> Khác</option>
                </select>
            </div>
    </div>
    <div class="form-group">
        <label for="">Số điện thoại</label>
        <input type="text" class="form-control" id="" placeholder="" name="phone" value="{{$data_user->phone}}">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" id="" placeholder="" name="email" value="{{$data_user->email}}">
    </div>
    <div class="form-group">
        <label for="">CMND</label>
        <input type="text" class="form-control" id="" placeholder="" name="cmnd" value="{{$data_user->CMND}}">
    </div>
    <div class="form-group">
        <label for="">Mật Khẩu</label>
        <input type="text" class="form-control" id="" placeholder="" name="password" value="{{$data_user->password}}">
    </div>
    </div>
    <div class="form-group">
        <label for="">Địa Chỉ</label>
        <input type="text" class="form-control" id="" placeholder="" name="address" value="{{$data_user->diachi}}">
    </div>
    </div>
    <div class="form-group">
        <label for="">Phường Xã</label>
        <select id="" name="idPX" class="form-control">
            @foreach($data_sub_dis as $key => $sub_dis)
            @if($data_user->idPX==$sub_dis->id)
            <option selected value="{{$sub_dis->id}}">{{$sub_dis->name}}</option>
            @else
            <option value="{{$sub_dis->id}}">{{$sub_dis->name}}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Quyền</label>
        <select id="" name="idrole" class="form-control">
            @foreach($data_role as $key => $role)
            @if($data_user->idrole==$role->id)
            <option selected value="{{$role->id}}">{{$role->name}}</option>
            @else
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endif
            @endforeach
        </select>
    </div>
    <button id="submit-btn" class="btn btn-primary">Create</button>
    </form>
    </div>
    </tbody>
</table>
@endsection