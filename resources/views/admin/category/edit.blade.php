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
        <form role="form" action="{{route('category.update',$data_category->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Danh Mục Dịch Vụ</label>
                <input type="text" class="form-control" value="{{$data_category->name}}" name="name" placeholder="Tên Thành Phố">
            </div>
            <button id="submit-btn" class="btn btn-primary">Update</button>
        </form>
    </div>
    </tbody>
</table>
@endsection