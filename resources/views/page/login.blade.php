<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('assets/login.css')}}">
  <title>Help Car!</title>
</head>
<?php

use Illuminate\Support\Facades\Session;

$message = Session::get('message');
if ($message) {
  echo '<script>alert("' . $message . '");</script> ';
  Session::put('message', null);
}
?>

<body>
  <div class="container">
    <div class="row">
      <div class="col d-flex justify-content-center">
        <div class="wraprer">
          <h2 class="text-center text-orange font-weight-bold">ĐĂNG NHẬP TÀI KHOẢN</h2>
          <form class="mt-5" action="{{URL::to('/check-login')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nhập Email</label>
              <input type="email" class="form-control" name="email" placeholder="Nhập email đăng ký của bạn.....">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Mật Khẩu</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Nhập mật khẩu .....">
            </div>
            <div class="d-flex justify-content-center action mt-5">
              <button type="submit" class="btn btn-primary mx-2 button-orange-reverse">Đăng nhập</button>
              <button type="submit" class="btn btn-primary mx-2 button-orange">Quên mật khẩu</button>
            </div>
          </form>
          <h5 class="text-center mt-4 font-weight-bold">Bạn chưa có tài khoản. <a href="#" class="text-orange cursor-pointer">Đăng ký ngay</a></h5>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>