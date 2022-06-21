<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HELP CAR Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('frontend_admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('frontend_admin/css/./sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('frontend_admin/vendor/jquery/jquery.min.js')}}"></script>

    <!-- summernote-->
    <script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="//cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- Data table -->
    <link type="text/css" rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HELP<sup>CAR</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Chức năng
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{('/dashboard')}}">
                    <i class="fas fa-fw fa-bell"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{('/user')}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Quản lý Người Dùng</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{('/csch')}}">
                    <i class="fas fa-fw fa-car"></i>
                    <span>Quản lý Cơ sở cứu hộ</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{('/category')}}">
                    <i class="fas fa-fw fa-gavel"></i>
                    <span>Quản lý Danh Mục</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{('/itemcate')}}">
                    <i class="fas fa-fw fa-flag"></i>
                    <span>Quản lý Dịch Vụ</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{('/city')}}">
                    <i class="fas fa-fw fa-map"></i>
                    <span>Quản lý Thành Phố</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{('/district')}}">
                    <i class="fas fa-fw fa-industry"></i>
                    <span>Quản lý Quận Huyện</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{('/sub-district')}}">
                    <i class="fas fa-fw fa-certificate"></i>
                    <span>Quản lý Phường Xã</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{('/role')}}">
                    <i class="fas fa-fw fa-gavel"></i>
                    <span>Quản lý Quyền</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">0</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">0</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <img class="img-profile rounded-circle" src="../public/img/author.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../index.php?act=taikhoan&hand=account" target="_blank">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../?act=home">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Trang chủ shop
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{URL::to('logout')}}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <?php
                                echo "Database ";
                                ?>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @yield('admin_content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website <?php echo date("Y") ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
            <!-- Bootstrap core JavaScript -->
            <script src="{{asset('frontend_admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

            <!-- Core plugin Jquery-->

            <!-- Core plugin JavaScript-->
            <script src="{{asset('frontend_admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

            <!-- Custom scripts for all pages-->
            <script src="{{asset('frontend_admin/js/sb-admin-2.min.js')}}"></script>

            <!-- Custom scripts for all pages-->
            <script src="{{asset('frontend_admin/js/custom-script.js')}}"></script>

            <!-- Page level plugins -->
            <script src="{{asset('frontend_admin/vendor/chart.js/Chart.min.js')}}"></script>

            <!-- Page level custom scripts -->
            <script src="{{asset('frontend_admin/js/demo/chart-area-demo.js')}}"></script>
            <script src="{{asset('frontend_admin/js/demo/chart-pie-demo.js')}}"></script>


</body>

</html>