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
    <form action="{{route('user.store')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Họ Tên</label>
            <input type="text" class="form-control" id="" placeholder="" name="name">
        </div>
        <div class="form-group">
            <label for="">Ngày sinh</label>
            <input type="date" class="form-control" id="" placeholder="" name="DoB">
        </div>
        <div class="form-group">
            <label for="">Giới Tính</label>
            <select id="" name="sex" class="form-control">
                <option value="Nam"> Nam</option>
                <option value="Nữ"> Nữ</option>
                <option value="Khác"> Khác</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Số điện thoại</label>
            <input type="tex" class="form-control" id="" placeholder="" name="phone">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" id="" placeholder="" name="email">
        </div>
        <div class="form-group">
            <label for="">CMND</label>
            <input type="text" class="form-control" id="" placeholder="" name="cmnd">
        </div>
        <div class="form-group">
            <label for="">Mật Khẩu</label>
            <input type="text" class="form-control" id="" placeholder="" name="password">
        </div>
        <div class="form-group">
            <label for="">Địa Chỉ</label>
            <input type="text" class="form-control" id="" placeholder="" name="address">
        </div>
        <div class="form-group">
            <label for="cars">Chọn Phường Xã: </label>
            <select id="" name="idPX" class="form-control">
                @foreach($data_sub_dis as $row)
                <option value="{{$row->id}}">{{$row->name}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cars">Chọn Quyền: </label>
            <select id="" name="idrole" class="form-control">
                @foreach($data_role as $row)
                <option value="{{$row->id}}">{{$row->name}} </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</table>
@endsection