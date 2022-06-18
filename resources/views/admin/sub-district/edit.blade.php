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
        <form role="form" action="{{route('sub-district.update',$data_sub_district->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Phường Xã:</label>
                <input type="text" class="form-control" value="{{$data_sub_district->name}}" name="name" placeholder="Tên khoa">
            </div>
            <div class="form-group">
                <label for="cars">Chọn Quận Huyện: </label>
                <select name="district_id" class="form-control input-sm m-bot15">
                    @foreach($data_dis as $key => $dis)
                    @if($data_sub_district->city_id==$dis->id)
                    <option selected value="{{$dis->id}}">{{$dis->name}}</option>
                    @else
                    <option value="{{$dis->id}}">{{$dis->name}}</option>
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