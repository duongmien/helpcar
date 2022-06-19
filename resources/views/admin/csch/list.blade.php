@extends('adminlayout')
@section('admin_content')
<a href="{{route('csch.create')}}" type="button" class="btn btn-primary"> Thêm mới</a>
<hr>
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
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">ID</th>
      <th scope="col">Tên CSCH</th>
      <th scope="col">Ngày ĐKKD</th>
      <th scope="col">MSKD</th>
      <th scope="col">SĐT</th>
      <th scope="col">Email</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Phường xã</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @foreach($data_all_csch as $key => $row)
    <tr>
      <td><?php echo $i++; ?></td>
      <td>{{$row->id}}</td>
      <td>{{$row->name}}</td>
      <td>{{$row->ngaydkkd}}</td>
      <td>{{$row->tax__code}}</td>
      <td>{{$row->phone}}</td>
      <td>{{$row->email}}</td>
      <td>{{$row->diachi}}</td>
      <td>{{$row->subdistrict->name}}</td>
      <td>
        <a href="{{route('csch.show',$row->id)}}" type="button" class="btn btn-success">Xem</a>
        <a href="{{route('csch.edit',$row->id)}}" type="button" class="btn btn-warning">Sửa</a>
        <form action="{{route('csch.destroy',$row->id)}}" class="btn" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Xóa</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
@endsection