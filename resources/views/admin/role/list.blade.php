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
<a href="{{route('role.create')}}" type="button" class="btn btn-primary"> Thêm mới</a>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã Quyền</th>
      <th scope="col">Tên Quyền</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @foreach($data_all_role as $key => $row)
    <tr>
      <td><?php echo $i++; ?></td>
      <td>{{$row->id}}</td>
      <td>{{$row->name}}</td>
      <td>
        <a href="{{route('role.show',$row->id)}}" type="button" class="btn btn-success">Xem</a>
        <a href="{{route('role.edit',$row->id)}}" type="button" class="btn btn-warning">Sửa</a>
        <form action="{{route('role.destroy',$row->id)}}" class="btn" method="POST">
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