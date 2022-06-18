@extends('adminlayout')
@section('admin_content')
<a href="{{route('district.create')}}" type="button" class="btn btn-primary"> Thêm mới</a>
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
      <th scope="col">Mã Huyện</th>
      <th scope="col">Tên Huyện</th>
      <th scope="col">Tên Thành Phố</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @foreach($data_all_dis as $key => $row)
    <tr>
      <td><?php echo $i++; ?></td>
      <td>{{$row->id}}</td>
      <td>{{$row->name}}</td>
      <td>{{$row->city->name}}</td>
      <td>
        <a href="{{route('district.show',$row->id)}}" type="button" class="btn btn-success">Xem</a>
        <a href="{{route('district.edit',$row->id)}}" type="button" class="btn btn-warning">Sửa</a>
        <form action="{{route('district.destroy',$row->id)}}" class="btn" method="POST">
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