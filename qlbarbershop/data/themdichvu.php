<?php
include('control.php');
session_start();
if (!isset($_SESSION['tk'])) {
    echo "<script>alert('Bạn chưa đăng nhập!!!')</script>";
    echo "<script>window.location='../login.php';</script>";
} else
    $tk = $_SESSION['tk'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Upvex - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/ThoiTrangToc-020.jpg">

    <!-- third party css -->
    <link href="../assets\libs\datatables\dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="../assets\libs\datatables\responsive.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="../assets\libs\datatables\buttons.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="../assets\libs\datatables\select.bootstrap4.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->
    <!-- App css -->
    <link href="../assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="../assets\css\app.min.css" rel="stylesheet" type="text/css">
    <link href="../assets\css\main.css" rel="stylesheet" type="text/css">
</head>

<body onload="time()" class="left-side-menu-light topbar-dark">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img <?php if ($tk['level'] == 0) { ?> src="../assets\images\users\user.jpg" <?php } else { ?> src="../assets\images\nhanvien/<?php echo $tk['anhtaikhoan'] ?>" <?php } ?> alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            <?php echo $tk['hoten'] ?> <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0 text-white">
                                <?php
                                if ($tk['level'] == 0) echo "Admin";
                                else echo "Quản trị viên";
                                ?>
                            </h5>
                        </div>
                        <div class="dropdown-divider"></div>
                        <!-- item-->
                        <a href="doimk.php" class="dropdown-item notify-item">
                            <i class="la la-key"></i>
                            <span>Đổi mật khẩu</span>
                        </a>
                        <a href="logout.php" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Đăng xuất</span>
                        </a>
                    </div>
                </li>
            </ul>
            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.php" class="logo text-center">
                    <span class="logo-lg">
                        <img src="../assets\images\logo.png" alt="" height="24">
                        <!-- <span class="logo-lg-text-light">Upvex</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">X</span> -->
                        <img src="../assets/images/ThoiTrangToc-020.jpg" alt="" height="28">
                    </span>
                </a>
            </div>
            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="icon-menu"></i>
                    </button>
                </li>
            </ul>
        </div>
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li>
                        <a href="../index.php">
                            <i class="icon-speedometer"></i>
                            <span> Bảng điều khiển </span>
                        </a>
                    </li>
                    <li>
                        <a <?php
                            if ($tk['level'] == 0) { ?> href="../nhanvien.php" <?php } else { ?> onclick="return alert('Bạn không có quyền truy cập!!!')" <?php } ?>>
                            <i class="icon-people"></i>
                            <span> Quản lý Nhân viên</span>
                        </a>
                    </li>
                    <li>
                        <a href="../khachhang.php">
                            <i class="icon-user"></i>
                            <span> Quản lý Khách hàng </span>
                        </a>
                    </li>

                    <li>
                        <a href="../dichvu.php">
                            <i class=" icon-layers"></i>
                            <span> Quản lý Dịch vụ </span>
                        </a>
                    </li>

                    <li>
                        <a href="../datlich.php">
                            <i class="icon-basket"></i>
                            <span> Quản lý Đặt lịch </span>
                        </a>
                    </li>

                    <li>
                        <a <?php
                            if ($tk['level'] == 0) { ?> href="../cuahang.php" <?php } else { ?> onclick="return alert('Bạn không có quyền truy cập!!!')" <?php } ?>>
                            <i class="icon-home"></i>
                            <span> Quản lý Cửa hàng </span>
                        </a>
                    </li>

                    <li>
                        <a href="../thongke.php">
                            <i class="icon-pie-chart"></i>
                            <span> Thống kê </span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Sidebar -->
            <div class="clearfix"></div>
            <!-- Sidebar -left -->
        </div>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <div id="clock"></div>
                                    </ol>
                                </div>
                                <h4 class="page-title">Thêm Dịch vụ</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-md-12">

                            <div class="tile">

                                <h3 class="tile-title">Tạo mới dịch vụ
                                    <button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        Quản lý Danh mục
                                    </button>
                                </h3>
                                <div class="tile-body">
                                    <form class="row" method="post" enctype="multipart/form-data">
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Tên dịch vụ</label>
                                            <input class="form-control" type="text" name="ten" required placeholder="Tên dịch vụ">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Giá</label>
                                            <input class="form-control" type="text" name="gia"  pattern="[0-9]{}" required placeholder="Ví dụ: 100.000 VNĐ = 100">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Danh mục</label>
                                            <select class="form-control" name="danhmuc">
                                                <option value="">-- Chọn Danh mục --</option>
                                                <?php
                                                $get = new data();
                                                $se = $get->se_dm();
                                                foreach ($se as $r) {
                                                ?>
                                                    <option><?php echo $r['danhmuc'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label class="control-label">Chi tiết dịch vụ</label>
                                            <textarea class="form-control" rows="3" name="chitiet" placeholder="Nhập chi tiết dịch vụ"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Ảnh dịch vụ</label>
                                            <div id="myfileupload">
                                                <input type="file" name="file" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Ảnh Mô tả</label>
                                            <div id="myfileupload">
                                                <input type="file" name="files[]" multiple="multiple" />
                                            </div>
                                        </div>
                                        <button name="btn" class="btn btn-primary">Lưu lại</button>

                                        <a style="margin-left: 20px;" class="btn btn-primary" href="../dichvu.php">Hủy bỏ</a>
                                    </form>
                                </div>
                                <?php
                                if (isset($_POST['btn'])) {
                                    move_uploaded_file($_FILES['file']['tmp_name'], '../assets/images/dichvu/' . $_FILES['file']['name']);
                                    $dm = $get->se_dm_id($_POST['danhmuc']);
                                    foreach ($dm as $d)
                                        $in = $get->in_dv(
                                            $_POST['ten'],
                                            $_POST['gia'],
                                            $_POST['chitiet'],
                                            $d['ID_DM'],
                                            $_FILES['file']['name']
                                        );
                                    $id = mysqli_insert_id($conn);
                                    foreach ($_FILES['files']['name'] as $n => $imgs) {
                                        $ha = $get->in_ha($imgs, $id);
                                        move_uploaded_file($_FILES['files']['tmp_name'][$n], '../assets/images/dichvu/' . $imgs);
                                    }
                                    if ($in)
                                        echo "<script>alert('Thành công')</script>";
                                    else
                                        echo "<script>alert('Không thành công')</script>";

                                    echo "<script>window.location='../dichvu.php';</script>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Danh mục</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form class="row" method="post" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                        <div class="form-group col-sm-10">
                                            <label class="control-label">Tên Danh mục</label>
                                            <input class="form-control" type="text" name="dm" placeholder="Nhập tên danh mục">
                                        </div>
                                        <div class="form-group col-sm-2 ">
                                            <button class="btn btn-primary" name="but" id="btn">Thêm</button>
                                        </div>
                                        </div>
                                    </form>
                                        <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" id="basic-datatable">
                                            <thead>
                                                <tr>

                                                    <th>Tên</th>
                                                    <th>Tính năng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $se = $get->se_dm();
                                                foreach ($se as $r) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $r['danhmuc'] ?></td>
                                                        <td class="table-td-center"><a class="btn btn-primary btn-sm deletebtn" title="Xóa" onclick="return confirm('Bạn có muốn xóa danh mục này?');" href="xoa.php?dm=<?php echo $r['ID_DM'] ?>">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                </div>
                                <div class="modal-footer">
                                </div>
                                <?php
                                if (isset($_POST['but'])) {
                                    $in = $get->in_dm($_POST['dm']);
                                    if ($in)
                                        echo "<script>alert('Thành công')</script>";
                                    else
                                        echo "<script>alert('Không thành công')</script>";

                                    echo "<script>window.location='themdichvu.php';</script>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    2019 &copy; Upvex theme by <a href="">Coderthemes</a>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-right footer-links d-none d-sm-block">
                                        <a href="javascript:void(0);">About Us</a>
                                        <a href="javascript:void(0);">Help</a>
                                        <a href="javascript:void(0);">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- end Footer -->

                </div>
                <!-- ============================================================== -->
                <!-- End Page content -->
                <!-- ============================================================== -->
            </div>
            <!-- END wrapper -->
            <script type="text/javascript">
                //Thời Gian
                function time() {
                    var today = new Date();
                    var weekday = new Array(7);
                    weekday[0] = "Chủ Nhật";
                    weekday[1] = "Thứ Hai";
                    weekday[2] = "Thứ Ba";
                    weekday[3] = "Thứ Tư";
                    weekday[4] = "Thứ Năm";
                    weekday[5] = "Thứ Sáu";
                    weekday[6] = "Thứ Bảy";
                    var day = weekday[today.getDay()];
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1;
                    var yyyy = today.getFullYear();
                    var h = today.getHours();
                    var m = today.getMinutes();
                    var s = today.getSeconds();
                    m = checkTime(m);
                    s = checkTime(s);
                    nowTime = h + " giờ " + m + " phút " + s + " giây";
                    if (dd < 10) {
                        dd = '0' + dd
                    }
                    if (mm < 10) {
                        mm = '0' + mm
                    }
                    today = day + ', ' + dd + '/' + mm + '/' + yyyy;
                    tmp = '<span class="date"> ' + today + ' - ' + nowTime +
                        '</span>';
                    document.getElementById("clock").innerHTML = tmp;

                    function checkTime(i) {
                        if (i < 10) {
                            i = "0" + i;
                        }
                        return i;
                    }
                }
                setInterval(time, 1000);
            </script>
            <!-- Vendor js -->
            <script src="../assets\js\vendor.min.js"></script>

            <!-- Third Party js-->
            <script src="../assets\libs\peity\jquery.peity.min.js"></script>
            <script src="../assets\libs\apexcharts\apexcharts.min.js"></script>
            <script src="../assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js"></script>
            <script src="../assets\libs\jquery-vectormap\jquery-jvectormap-us-merc-en.js"></script>

            <!-- Dashboard init -->
            <script src="../assets\js\pages\dashboard-2.init.js"></script>

            <!-- App js -->
            <script src="../assets\js\app.min.js"></script>

</body>

</html>