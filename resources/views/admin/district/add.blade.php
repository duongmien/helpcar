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
    <form action="{{route('district.store')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Tên Huyện:</label>
            <input type="text" class="form-control" id="" placeholder="" name="name">
        </div>
        <div class="form-group">
            <label for="cars">Chọn Thành Phố: </label>
            <select id="" name="city_id" class="form-control">
                @foreach($data_city as $row)
                <option value="{{$row->id}}">{{$row->name}} </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</table>
@endsection