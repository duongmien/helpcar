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
        <form role="form" action="{{route('district.update',$data_district->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Ngành</label>
                <input type="text" class="form-control" value="{{$data_district->name}}" name="name" placeholder="Tên khoa">
            </div>
            <div class="form-group">
                <label for="cars">Chọn Thành Phố: </label>
                <select name="city_id" class="form-control input-sm m-bot15">
                    @foreach($data_city as $key => $city)
                    @if($data_district->city_id==$city->id)
                    <option selected value="{{$city->id}}">{{$city->name}}</option>
                    @else
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <button id="submit-btn" class="btn btn-primary">Update</button>
        </form>
    </div>
    </tbody>
</table>
@endsection