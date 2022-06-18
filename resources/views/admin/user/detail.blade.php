@extends('adminlayout')
@section('admin_content')
<h1>THÔNG TIN PHƯỜNG XÃ</h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <h2>Mã Phường Xã: {{$data_detail->id}}</h2>
   <h2>Tên Phường Xã: {{$data_detail->name}}</h2>
   <h2>Tên Quận Huyện: {{$data_detail->district->name}}</h2>
   <h2>Tên Thành Phố: {{$data_detail->district->city->name}}</h2>
</table>
@endsection