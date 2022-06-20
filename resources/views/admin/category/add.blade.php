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
    <form action="{{route('category.store')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Tên Danh Mục Dịch Vụ</label>
            <input type="text" class="form-control" id="" placeholder="" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</table>
@endsection