@extends('adminlayout')
@section('admin_content')
<h1>THÔNG TIN QUẬN HUYỆN</h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <h2>Mã Quận Huyện: {{$data_detail->id}}</h2>
   <h2>Tên Quận Huyện: {{$data_detail->name}}</h2>
   <h2>Tên Thành Phố: {{$data_detail->city->name}}</h2>
</table>
@endsection