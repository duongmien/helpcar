@extends('adminlayout')
@section('admin_content')
<h1>THÔNG TIN THÀNH PHỐ</h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <h2>Mã Quyền: {{$data_detail->id}}</h2>
   <h2>Tên Quyền: {{$data_detail->name}}</h2>
</table>
@endsection