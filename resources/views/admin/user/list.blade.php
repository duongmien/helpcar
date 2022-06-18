@extends('adminlayout')
@section('admin_content')
<a href="{{route('user.create')}}" type="button" class="btn btn-primary"> Thêm mới</a>
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
      <th scope="col">Họ Tên</th>
      <th scope="col">Giới tính</th>
      <th scope="col">Ngày sinh</th>
      <th scope="col">SĐT</th>
      <th scope="col">Email</th>
      <th scope="col">Phường xã</th>
      <th scope="col">Quyền</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @foreach($data_all_user as $key => $row)
    <tr>
      <td><?php echo $i++; ?></td>
      <td>{{$row->id}}</td>
      <td>{{$row->name}}</td>
      <td>{{$row->sex}}</td>
      <td>{{$row->DoB}}</td>
      <td>{{$row->phone}}</td>
      <td>{{$row->email}}</td>
      <td>{{$row->subdistrict->name}}</td>
      <td>
        <a href="{{route('user.show',$row->id)}}" type="button" class="btn btn-success">Xem</a>
        <a href="{{route('user.edit',$row->id)}}" type="button" class="btn btn-warning">Sửa</a>
        <form action="{{route('user.destroy',$row->id)}}" class="btn" method="POST">
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