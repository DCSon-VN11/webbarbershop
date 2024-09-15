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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

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
                                <h4 class="page-title">Báo cáo Thống kê</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon"><i class='icon fa-3x icon-credit-card'></i>
                                <div class="info">
                                    <?php
                                    $t = 0;
                                    $dt = $get->se_dl();
                                    foreach ($dt as $tdt) {
                                        if($tdt['tinhtrang']==1){
                                            $dv = $get->se_dv_id($tdt['ID_DV']);
                                        $gia = mysqli_fetch_assoc($dv);
                                        $t += $gia['gia'];
                                        }
                                    }
                                    ?>
                                    <h4 style="font-size: 20px;">Thu nhập</h4>
                                    <p><b><?php echo number_format($t, 0, ',', '.') ?> VNĐ</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small info coloured-icon"><i class='icon fa-3x fas fa-user'></i>
                                <div class="info">
                                    <?php
                                    $kh = $get->se_kh();
                                    $nkh = mysqli_num_rows($kh);
                                    ?>
                                    <h4 style="font-size: 20px;">Khách hàng</h4>
                                    <p><b><?php echo $nkh ?> khách hàng</b></p>
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

                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small info coloured-icon"><i class='icon icon-layers fa-3x'></i>
                                <div class="info">
                                    <?php
                                    $dv = $get->se_dv();
                                    $n = mysqli_num_rows($dv);
                                    ?>
                                    <h4>Tổng Dịch vụ</h4>
                                    <p><b><?php echo $n ?> dịch vụ</b></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lx-3">
                            <div class="widget-small warning coloured-icon"><i class='icon fa-3x icon-bag'></i>
                                <div class="info">
                                    <?php
                                    $dh = $get->se_dl();
                                    $n = mysqli_num_rows($dh);
                                    ?>
                                    <h4 style="font-size: 20px;">Đơn hàng</h4>
                                    <p><b><?php echo $n ?> đơn hàng</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lx-3">
                            <div class="widget-small danger coloured-icon"><i class='icon fa-3x fas fa-shopping-cart'></i>
                                <div class="info">
                                    <?php
                                    $dhh = $get->se_dl_huy();
                                    $n = mysqli_num_rows($dhh);
                                    ?>
                                    <h4>Đơn hàng hủy</h4>
                                    <p><b><?php echo $n ?> đơn hàng</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <!-- Portlet card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript: void(0);" onclick="location.reload()" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                        <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <h4 class="header-title mb-0">Thống kê Doanh thu
                                        <script type="text/javascript">
                                            document.write(new Date().getFullYear());
                                        </script>
                                    </h4>

                                    <div id="cardCollpase1" class="collapse pt-3 show" dir="ltr">
                                        <canvas id="myChart"></canvas>
                                        <div class="text-center">
                                            <div class="row mt-3">
                                            </div> <!-- end row -->

                                        </div>
                                    </div> <!-- collapsed end -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript: void(0);" onclick="location.reload()" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                        <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <h4 class="header-title mb-0">Doanh thu Chi nhánh</h4>
                                    <div id="cardCollpase2" class="collapse pt-3 show" dir="ltr">
                                        <canvas id="myChart1"></canvas>
                                        <div class="text-center">
                                            <div class="row mt-3">
                                            </div> <!-- end row -->
                                        </div>
                                    </div> <!-- collapsed end -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">
                                        <div class="row element-button">
                                            <div class="col-4">
                                                <h4 class="page-title">Dịch vụ thịnh hành</h4>
                                            </div>
                                        </div>
                                    </h4>
                                    <br>
                                    <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="150">Tên Dịch vụ</th>
                                                <th width="300">Giá tiền</th>
                                                <th>Ảnh dịch vụ</th>
                                                <th>Danh mục</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $kdl = $get->se_dl_lm();
                                            foreach ($kdl as $dl) {
                                                $dv = $get->se_dv_id($dl['ID_DV']);
                                                foreach ($dv as $d) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $d['dichvu'] ?></td>
                                                        <td><?php echo number_format($d['gia'], 0, ',', '.') ?> VNĐ</td>
                                                        <td><img class="img-card-person" src="assets/images/dichvu/<?php echo $d['anhdichvu'] ?>" alt="<?php echo $d['anhdichvu'] ?>"></td>
                                                        <td>
                                                            <?php
                                                            $dm = $get->se_dm_ten($d['ID_DM']);
                                                            $m = mysqli_fetch_assoc($dm);
                                                            echo $m['danhmuc'];
                                                            ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
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
    <?php 
        for($i=0;$i<12;$i++){
            $thang[$i]=$i+1;
        }
        $tkthang=0;
        $tkyear=$get->tktheonam();
        for($i=0;$i<12;$i++){
            $tktien[$i]=0;
            foreach($tkyear as $tk){
                if($tk['thang']==$thang[$i]){
                    $tktien[$i]+=$tk['gia'];
                    if($tk['thang']>$tkthang){
                        $tkthang=$tk['thang'];
                    }
                }
            }
        }
        echo $tktien[3];
    ?>
    <script>
        var xValues = [<?php for($i=0;$i<$tkthang;$i++) {?> "Tháng <?php echo $thang[$i] ?>", <?php } ?>];
        console.log(xValues);

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [ {
                    data: [<?php for($i=0;$i<$tkthang;$i++) {?> "<?php echo $tktien[$i] ?>", <?php } ?>],
                    borderColor: "blue",
                    backgroundColor: "blue",
                    fill: false
                }]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
    </script>
    <?php
    $a=0;
    $dc=$get->se_dch();
    foreach ($dc as $tch) {
        $tench[$a]=$tch['chinhanh'];
        $a+=1;
    }
    $tk = $get->tktheocn();
    
    for ($j = 0; $j < $a; $j++) {
        $tien[$j]=0;
        foreach ($tk as $cn) {
            if($cn['chinhanh'] == $tench[$j]) {
                $tien[$j]+=$cn['gia'];
            }
        }
    }
    ?>
    <script>
        var xValues = [<?php for($i=0;$i<$a;$i++) {?> "<?php echo $tench[$i] ?>", <?php } ?>];
        var yValues = [<?php for($i=0;$i<$a;$i++) {?> "<?php echo $tien[$i] ?>", <?php } ?>];
        var barColors = ["red", "green", "blue", "orange","white"];

        new Chart("myChart1", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                }
            }
        });
    </script>
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