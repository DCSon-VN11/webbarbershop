<?php
include('data/control.php');
session_start();
if (!isset($_SESSION['tk'])) {
    echo "<script>alert('Bạn chưa đăng nhập!!!')</script>";
    echo "<script>window.location='login.php';</script>";
} else
    $tk = $_SESSION['tk'];
$get = new data();
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
    <link rel="shortcut icon" href="assets/images/ThoiTrangToc-020.jpg">

    <!-- third party css -->
    <link href="assets\libs\datatables\dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="assets\libs\datatables\responsive.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="assets\libs\datatables\buttons.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="assets\libs\datatables\select.bootstrap4.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->
    <!-- App css -->
    <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\app.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>

<body onload="time()" class="left-side-menu-light topbar-dark">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img <?php if ($tk['level'] == 0) { ?> src="assets\images\users\user.jpg" <?php } else { ?> src="assets\images\nhanvien/<?php echo $tk['anhtaikhoan'] ?>" <?php } ?> alt="user-image" class="rounded-circle">
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
                        <img src="assets\images\logo.png" alt="" height="24">
                        <!-- <span class="logo-lg-text-light">Upvex</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">X</span> -->
                        <img src="assets/images/ThoiTrangToc-020.jpg" alt="" height="28">
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
                        <a href="index.php">
                            <i class="icon-speedometer"></i>
                            <span> Bảng điều khiển </span>
                        </a>
                    </li>
                    <li>
                        <a <?php
                            if ($tk['level'] == 0) { ?> href="nhanvien.php" <?php } else { ?> onclick="return alert('Bạn không có quyền truy cập!!!')" <?php } ?>>
                            <i class="icon-people"></i>
                            <span> Quản lý Nhân viên</span>
                        </a>
                    </li>
                    <li>
                        <a href="khachhang.php">
                            <i class="icon-user"></i>
                            <span> Quản lý Khách hàng </span>
                        </a>
                    </li>

                    <li>
                        <a href="dichvu.php">
                            <i class=" icon-layers"></i>
                            <span> Quản lý Dịch vụ </span>
                        </a>
                    </li>

                    <li>
                        <a href="datlich.php">
                            <i class="icon-basket"></i>
                            <span> Quản lý Đặt lịch </span>
                        </a>
                    </li>

                    <li>
                        <a <?php
                            if ($tk['level'] == 0) { ?> href="cuahang.php" <?php } else { ?> onclick="return alert('Bạn không có quyền truy cập!!!')" <?php } ?>>
                            <i class="icon-home"></i>
                            <span> Quản lý Cửa hàng </span>
                        </a>
                    </li>

                    <li>
                        <a href="thongke.php">
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
                                <h4 class="page-title">Danh sách Đặt lịch</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" id="basic-datatable">
                                        <thead>
                                            <tr>
                                                <th>Tên Khách hàng</th>
                                                <th>Tên dịch vụ</th>
                                                <th>Thời gian</th>
                                                <th>Giá</th>
                                                <th>Chi nhánh</th>
                                                <th>Trạng thái</th>
                                                <th width="60px">Tính năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_GET['xn'])) {
                                                $xn = $get->cndl($_GET['xn']);
                                            }
                                            if (isset($_GET['huy'])) {
                                                $huy = $get->huydl($_GET['huy']);
                                            }
                                            $dl = $get->se_dl();
                                            foreach ($dl as $r) {
                                            ?>
                                                <tr>
                                                    <td><?php
                                                        $kh = $get->se_kh_id($r['ID_TK']);
                                                        $k = mysqli_fetch_assoc($kh);
                                                        echo $k['hoten'];
                                                        ?></td>
                                                    <td><?php
                                                        $kh = $get->se_dv_id($r['ID_DV']);
                                                        $k = mysqli_fetch_assoc($kh);
                                                        echo $k['dichvu'];
                                                        ?></td>
                                                    <td><?php
                                                        echo $r['thoigian'];
                                                        ?></td>
                                                    <td><?php
                                                        $kh = $get->se_dv_id($r['ID_DV']);
                                                        $k = mysqli_fetch_assoc($kh);
                                                        echo $k['gia'];
                                                        ?></td>
                                                    <td><?php
                                                        $kh = $get->se_ch_id($r['ID_CH']);
                                                        $k = mysqli_fetch_assoc($kh);
                                                        echo $k['diachi'];
                                                        ?></td>
                                                    <td><?php
                                                        if ($r['tinhtrang'] == 0) echo "Chờ xác nhận";
                                                        else if ($r['tinhtrang'] == 1) echo "Thành công";
                                                        else if ($r['tinhtrang'] == 2) echo "Bị hủy";
                                                        ?></td>
                                                    <td class="table-td-center">
                                                        <?php
                                                        if ($r['tinhtrang'] == 0) {
                                                        ?>
                                                            <a class="btn btn-primary btn-sm check" type="button" title="Chấp nhận" href="datlich.php?xn=<?php echo $r['ID_KDL'] ?>"><i class="fa fa-check"></i>
                                                            </a>
                                                            <a class="btn btn-danger btn-sm deletebtn" onclick="return confirm('Bạn có muốn hủy lịch hẹn này?');" href="datlich.php?huy=<?php echo $r['ID_KDL'] ?>">
                                                                X
                                                            </a>
                                                        <?php
                                                        } else if ($r['tinhtrang'] == 1) {
                                                        ?>
                                                            <a class="btn btn-outline-success btn-sm check" disable><i class="fa fa-check"></i>
                                                            </a>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <a class="btn btn-outline-danger btn-sm deletebtn " disabled>X
                                                            </a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                    <!-- end row-->


                </div> <!-- container -->

            </div> <!-- content -->

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
    <script src="assets\js\vendor.min.js"></script>

    <!-- third party js -->
    <script src="assets\libs\datatables\jquery.dataTables.min.js"></script>
    <script src="assets\libs\datatables\dataTables.bootstrap4.js"></script>
    <script src="assets\libs\datatables\dataTables.responsive.min.js"></script>
    <script src="assets\libs\datatables\responsive.bootstrap4.min.js"></script>
    <script src="assets\libs\datatables\dataTables.buttons.min.js"></script>
    <script src="assets\libs\datatables\buttons.bootstrap4.min.js"></script>
    <script src="assets\libs\datatables\buttons.html5.min.js"></script>
    <script src="assets\libs\datatables\buttons.flash.min.js"></script>
    <script src="assets\libs\datatables\buttons.print.min.js"></script>
    <script src="assets\libs\datatables\dataTables.keyTable.min.js"></script>
    <script src="assets\libs\datatables\dataTables.select.min.js"></script>
    <script src="assets\libs\pdfmake\pdfmake.min.js"></script>
    <script src="assets\libs\pdfmake\vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="assets\js\pages\datatables.init.js"></script>

    <!-- App js -->
    <script src="assets\js\app.min.js"></script>

</body>

</html>