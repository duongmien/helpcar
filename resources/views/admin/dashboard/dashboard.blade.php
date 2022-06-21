@extends('adminlayout')
@section('admin_content')
<link href="{{asset('frontend_admin/css/./style.css')}}" rel="stylesheet" type="text/css">
<div class="market-updates">
    <h1>THỐNG KÊ</h1>
    <div class="col-md-3 market-update-gd">
        <a href="{{URL::to('/all-product')}}">
            <div class="market-update-block clr-block-2">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-legal"> </i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Danh Mục</h4>
                    <p>{{$cdm}}</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 market-update-gd">
        <a href="{{URL::to('/all-product')}}">
            <div class="market-update-block clr-block-1">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-usd"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Danh Mục Dịch Vụ</h4>
                    <p>{{$cdv}}</p>


                </div>
                <div class="clearfix"> </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 market-update-gd">
        <a href="{{URL::to('/all-user')}}">
            <div class="market-update-block clr-block-3">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-users"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>User</h4>
                    <p>{{$user}}</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 market-update-gd">
        <a href="{{URL::to('/all-order')}}">
            <div class="market-update-block clr-block-4">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Cơ sở cứu hộ</h4>
                    <p>{{$csch}}</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </a>
    </div>
    <div class="clearfix"> </div>
</div>
@endsection