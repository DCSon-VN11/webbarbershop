<?php
include('data/control.php');
session_start();
if (!isset($_SESSION['tk'])) {
    echo "<script>alert('Bạn chưa đăng nhập!!!')</script>";
    echo "<script>window.location='login.php';</script>";
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
                                <h4 class="page-title">Danh sách Dịch vụ</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">
                                        <div class="row element-button">
                                            <div class="col-sm-4">
                                                <a class="btn btn-primary" href="data/themdichvu.php" title="Thêm"><i class="fas fa-plus"></i>
                                                    Tạo mới Dịch vụ</a>
                                            </div>
                                        </div>
                                    </h4>
                                    <br>
                                    <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" id="basic-datatable">
                                        <thead>
                                            <tr>

                                                <th width="150">Tên Dịch vụ</th>

                                                <th>Giá tiền</th>
                                                <th width="300">Chi tiết</th>
                                                <th>Danh mục</th>
                                                <th>Ảnh dịch vụ</th>
                                                <th width="110px">Tính năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $get = new data();
                                            $se = $get->se_dv();
                                            foreach ($se as $r) {
                                            ?>
                                                <tr>
                                                    <input type="hidden" value="<?php echo $r['ID_DV'] ?>">
                                                    <td><?php echo $r['dichvu'] ?></td>
                                                    <td><?php echo $r['gia'] ?></td>
                                                    <td><?php echo $r['chitiet'] ?></td>
                                                    <?php $dm = $get->se_dm_ten($r['ID_DM']);
                                                    foreach ($dm as $d)
                                                    ?>
                                                    <td><?php echo $d['danhmuc'] ?></td>
                                                    <td> <img class="img-card-person" src="assets/images/dichvu/<?php echo $r['anhdichvu'] ?>" alt="<?php echo $r['anhdichvu'] ?>"> </td>
                                                    <td class="table-td-center"><a class="btn btn-primary btn-sm deletebtn" title="Xóa" onclick="return confirm('Bạn có muốn xóa dịch vụ này?');" href="data/xoa.php?dv=<?php echo $r['ID_DV'] ?>"><i class="fas fa-trash-alt"></i>
                                                        </a>
                                                        <button id="but" class="btn btn-primary btn-sm editbtn">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </td>
                                                    <?php
                                                    $i=0;
                                                    $seha = $get->se_ha_iddv($r['ID_DV']);
                                                    foreach ($seha as $ha) { 
                                                        $i+=1;
                                                        ?>
                                                        <input type="hidden" value="<?php echo $ha['hinhanh'] ?>">
                                                    <?php
                                                    }
                                                    ?>
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
            <!-- Modal UPDATE-->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin dịch vụ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="row" method="post" enctype="multipart/form-data">
                                <div class="form-group col-md-4">
                                    <input type="hidden" name="id" id="id">
                                    <label class="control-label">Tên dịch vụ</label>
                                    <input class="form-control" type="text" name="ten" id="ten" required placeholder="Tên dịch vụ">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">Giá</label>
                                    <input class="form-control" type="text" name="gia" id="gia" required placeholder="Ví dụ: 100.000 VNĐ = 100">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label">Danh mục</label>
                                    <select class="form-control" name="danhmuc" id="danhmuc">
                                        <option value="">-- Chọn Danh mục --</option>
                                        <?php
                                        $dm = $get->se_dm();
                                        foreach ($dm as $d) {
                                        ?>
                                            <option><?php echo $d['danhmuc'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="control-label">Chi tiết dịch vụ</label>
                                    <textarea class="form-control" rows="3" name="chitiet" id="chitiet" placeholder="Nhập chi tiết dịch vụ"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Ảnh dịch vụ</label>
                                    <div id="myfileupload">
                                        <input type="file" name="file" />
                                    </div>
                                    <input type="hidden" name="anh" id="anh">
                                    <img style="float: left;margin-top:10px;" width="150px" height="150px" name="img" id="img" src="" alt="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Ảnh Mô tả</label>
                                    <div id="myfileupload">
                                        <input type="file" name="files[]" multiple="multiple" />
                                        <?php
                                            for($t =0;$t<$i;$t++){ ?>
                                                <img id="imgs[<?php echo $t ?>]" style="float: left;margin-top:10px;margin-left:10px;" width="150px" height="150px" src="" alt="">
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" name="btn" id="btn">Sửa</button>
                            <button class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        </div>
                        <?php
                        if (isset($_POST['btn'])) {
                            if (empty($_FILES['file']['name'])) $img = $_POST['anh'];
                            else {
                                $img = $_FILES['file']['name'];
                                move_uploaded_file($_FILES['file']['tmp_name'], 'assets/images/dichvu/' . $_FILES['file']['name']);
                            }
                            if (!empty($_FILES['files']['name'][0])) {
                                $seha = $get->se_ha_iddv($_POST['id']);
                                foreach ($seha as $r) {
                                    unlink("assets/images/dichvu/" . $r['hinhanh']);
                                }
                                $delha = $get->del_ha($_POST['id']);
                                foreach ($_FILES['files']['name'] as $n => $imgs) {
                                    move_uploaded_file($_FILES['files']['tmp_name'][$n], 'assets/images/dichvu/' . $imgs);
                                    $ha = $get->in_ha($imgs, $_POST['id']);
                                }
                            }
                            $sedm = $get->se_dm_id($_POST['danhmuc']);
                            foreach ($sedm as $n)
                                $in = $get->up_dv(
                                    $_POST['id'],
                                    $_POST['ten'],
                                    $_POST['gia'],
                                    $_POST['chitiet'],
                                    $n['ID_DM'],
                                    $img
                                );
                            if ($in)
                                echo "<script>alert('Thành công')</script>";
                            else
                                echo "<script>alert('Không thành công')</script>";

                            echo "<script>window.location='dichvu.php';</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- END MODAL UPDATES -->

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
    <script>
        $(document).ready(function() {

            $('.editbtn').on('click', function() {
                $('#myModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text().trim();
                }).get();
                var a = $tr.find("input").map(function() {
                    return $(this).val();
                }).get();
                var file = $tr.find("img").attr("src").slice(21);

                $('#id').val(a);
                $('#ten').val(data[0]);
                $('#gia').val(data[1]);
                $('#chitiet').val(data[2]);
                $('#danhmuc').val(data[3]);
                $('#anh').val(file);
                console.log(data);
                console.log(a);
                
                
                const img = document.querySelector('#img');
                img.src = "assets/images/dichvu/" + file;
                img.alt = file;
                for(var i = 0; i < a.length; i++){
                    document.images["imgs["+i+"]"].src="assets/images/dichvu/" +a[i+1];
                }
            });
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