@extends('adminlayout')
@section('admin_content')
<h1>THÔNG TIN CƠ SỞ CỨU HỘ</h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <h2>Mã Cơ sở cứu hộ: {{$data_detail->id}}</h2>
   <h2>Tên Cơ sở cứu hộ: {{$data_detail->name}}</h2>
   <h2>Ngày ĐKKD: {{$data_detail->ngaydkkd}}</h2>
   <h2>Mã số thuế: {{$data_detail->tax_code}}</h2>
   <h2>Số điện thoại: {{$data_detail->phone}}</h2>
</table>
@endsection