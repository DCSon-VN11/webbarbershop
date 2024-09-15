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
                                <h4 class="page-title">Bảng điều khiển</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <?php
                        $now = getdate();
                        $dh = $get->se_dl();
                        $i = 0;
                        $tien = 0;
                        $nhuy=0;
                        $nthanhcong=0;
                        foreach ($dh as $r) {
                            $t = str_replace(" ", "-", $r['thoigian']);
                            $t1 = explode('-', $t);
                            if ($t1[0] == $now['year'] && $t1[1] == $now['mon'] && $t1[2] == $now['mday']) {
                                $i += 1;
                                if($r['tinhtrang']==2) $nhuy+=1;
                                if($r['tinhtrang']==1){ $nthanhcong+=1;
                                $dv = $get->se_dv_id($r['ID_DV']);
                                $gia = mysqli_fetch_assoc($dv);
                                $tien += $gia['gia'];}
                            }
                        }
                        ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small warning coloured-icon"><i class='icon fa-3x icon-bag'></i>
                                <div class="info">
                                    <h4 style="font-size: 20px;">Đơn hàng</h4>

                                    <p><b><?php echo $i ?> đơn hàng</b></p>
                                    <p class="float-right text-muted mb-0">Trong ngày</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon"><i class='icon fa-3x icon-credit-card'></i>
                                <div class="info">
                                    <h4 style="font-size: 20px;">Thu nhập</h4>
                                    <p><b><?php echo number_format($tien, 0, ',', '.') ?> VNĐ</b></p>
                                    <p class="float-right text-muted mb-0">Trong ngày</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small danger coloured-icon"><i class='icon fa-3x fas fa-shopping-cart'></i>
                                <div class="info">
                                    <h4>Đơn hàng hủy</h4>
                                    <p><b><?php echo $nhuy ?> đơn hàng</b></p>
                                    <p class="float-right text-muted mb-0">Trong ngày</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon"><i class='icon  fas fa-users fa-3x'></i>
                                <div class="info">
                                    <?php
                                    $nv = $get->se_tk_nv();
                                    $n = mysqli_num_rows($nv);
                                    ?>
                                    <h4 style="font-size: 20px;">Nhân viên</h4>
                                    <p><b><?php echo $n ?> nhân viên</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card-box">
                            <h4 class="header-title mb-3">Đơn đặt lịch mới</h4>

                            <div class="table-responsive">
                                <table class="table table-centered table-borderless table-hover mb-0" id="datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="border-top-0">Tên Khách hàng</th>
                                            <th class="border-top-0">Tên dịch vụ</th>
                                            <th class="border-top-0">Thời gian</th>
                                            <th class="border-top-0">Giá</th>
                                            <th class="border-top-0">Chi nhánh</th>
                                            <th class="border-top-0">Trạng thái</th>
                                            <th class="border-top-0" width="60px">Tính năng</th>
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
                                        $dh=$get->tktheongay();
                                        foreach ($dh as $r) {
                                            $t = str_replace(" ", "-", $r['thoigian']);
                                            $t1 = explode('-', $t);
                                            if ($t1[0] == $now['year'] && $t1[1] == $now['mon'] && $t1[2] == $now['mday'] ) {
                                        ?>
                                                <tr>
                                                    <td>
                                                        <span>
                                                            <?php
                                                            $kh = $get->se_kh_id($r['ID_TK']);
                                                            $k = mysqli_fetch_assoc($kh);
                                                            echo $k['hoten'];
                                                            ?></span>
                                                    </td>
                                                    <td>
                                                        <span>
                                                            <?php
                                                            $kh = $get->se_dv_id($r['ID_DV']);
                                                            $k = mysqli_fetch_assoc($kh);
                                                            echo $k['dichvu'];
                                                            ?></span>
                                                    </td>
                                                    <td><?php
                                                        echo $r['gio'];
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
                                                            <a class="btn btn-primary btn-sm check" type="button" title="Chấp nhận" href="index.php?xn=<?php echo $r['ID_KDL'] ?>"><i class="fa fa-check"></i>
                                                            </a>
                                                            <a class="btn btn-danger btn-sm deletebtn" onclick="return confirm('Bạn có muốn hủy lịch hẹn này?');" href="index.php?huy=<?php echo $r['ID_KDL'] ?>">
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
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->

                        </div> <!-- end card-box-->
                    </div> <!-- end col-->

                </div>
                <!-- end row -->

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

    <!-- Third Party js-->
    <script src="assets\libs\peity\jquery.peity.min.js"></script>
    <script src="assets\libs\apexcharts\apexcharts.min.js"></script>
    <script src="assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets\libs\jquery-vectormap\jquery-jvectormap-us-merc-en.js"></script>

    <!-- Dashboard init -->
    <script src="assets\js\pages\dashboard-2.init.js"></script>

    <!-- App js -->
    <script src="assets\js\app.min.js"></script>

</body>

</html>