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
    <form action="{{route('itemcate.store')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Tên Dịch Vụ</label>
            <input type="text" class="form-control" id="" placeholder="" name="name">
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <input type="text" class="form-control" id="" placeholder="" name="mota">
        </div>
        <div class="form-group">
            <label for="">Giá Dịch Vụ</label>
            <input type="text" class="form-control" id="" placeholder="" name="gia">
        </div>
        <div class="form-group">
            <label for="cars">Chọn Cơ sở cung cấp dịch vụ: </label>
            <select id="" name="idcsch" class="form-control">
                @foreach($data_csch as $row)
                <option value="{{$row->id}}">{{$row->name}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cars">Chọn Danh mục dịch vụ: </label>
            <select id="" name="idDM" class="form-control">
                @foreach($data_cat as $row)
                <option value="{{$row->id}}">{{$row->name}} </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</table>
@endsection