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
<a href="{{route('itemcate.create')}}" type="button" class="btn btn-primary"> Thêm mới</a>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã Dịch Vụ</th>
      <th scope="col">Tên Dịch Vụ</th>
      <th scope="col">Mô Tả</th>
      <th scope="col">Giá Dịch Vụ</th>
      <th scope="col">Thuộc Trung Tâm</th>
      <th scope="col">Thuộc Danh Mục</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @foreach($data_all_itemcate as $key => $row)
    <tr>
      <td><?php echo $i++; ?></td>
      <td>{{$row->id}}</td>
      <td>{{$row->name}}</td>
      <td>{{$row->mota}}</td>
      <td>{{$row->gia}}</td>
      <td>{{$row->resfacility->name}}</td>
      <td>{{$row->categories->name}}</td>
      <td>
        <a href="{{route('itemcate.show',$row->id)}}" type="button" class="btn btn-success">Xem</a>
        <a href="{{route('itemcate.edit',$row->id)}}" type="button" class="btn btn-warning">Sửa</a>
        <form action="{{route('itemcate.destroy',$row->id)}}" class="btn" method="POST">
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