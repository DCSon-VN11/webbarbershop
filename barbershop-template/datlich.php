<?php
include('control.php');
session_start();
if (isset($_GET['dx'])) {
    unset($_SESSION['kh']);
}
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    header("Location: dichvu.php?search=$search");
}
$get = new Data();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Barber X - Barber Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Top Bar Start -->
    <div class="top-bar d-none d-md-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="top-bar-left">
                        <div class="text">
                            <h2>8:00 - 19:00</h2>
                            <p>Mở cửa từ Thứ 2 - Thứ 7</p>
                        </div>
                        <div class="text">
                            <h2>+123 456 7890</h2>
                            <p>Gọi để nhận tư vấn</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="top-bar-right">
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand"><img src="images\logo1.png" alt=""></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="index.php" class="nav-item nav-link ">Trang chủ</a>
                    <a href="dichvu.php" class="nav-item nav-link">Dịch vụ</a>
                    <a href="cuahang.php" class="nav-item nav-link">Cửa hàng</a>
                    <a href="datlich.php" class="nav-item nav-link active">Đặt lịch</a>
                    <?php
                    if (isset($_SESSION['kh'])) { ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['kh']['hoten'] ?></a>
                            <div class="dropdown-menu">
                                <a href="lichhen.php" class="dropdown-item">Lịch hẹn</a>
                                <a data-bs-toggle="modal" href="#tttk" role="button" class="dropdown-item">Thông tin tài khoản</a>
                                <a data-bs-toggle="modal" href="#dmk" role="button" class="dropdown-item">Đổi mật khẩu</a>
                                <a href="datlich.php?dx" class="dropdown-item">Đăng xuất</a>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <a class="nav-item nav-link" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Đăng nhập</a>
                    <?php
                    }
                    ?>

                    <form class="d-flex" role="search">
                        <input required class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->
    <!-- Thông tin tài khoản -->
    <div class="modal fade" id="tttk" aria-hidden="true" aria-labelledby="tttk" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Thông tin tài khoản</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="usr">Họ và Tên:</label>
                            <input value="<?php echo $_SESSION['kh']['hoten'] ?>" required="true" type="text" class="form-control" name="eten" placeholder="Nhập họ và tên">
                        </div>
                        <div class="form-group">
                            <label for="email">Số điện thoại:</label>
                            <input value="<?php echo $_SESSION['kh']['sdt'] ?>" required="true" type="text" pattern="[0-9]{}" title="Nhập đúng định dạng số điện thoại" placeholder="Nhập số điện thoại" class="form-control" name="esdt">
                        </div>
                        <div class="form-group">
                            <label for="address">Đia chỉ:</label>
                            <input value="<?php echo $_SESSION['kh']['diachi'] ?>" type="text" class="form-control" name="ediachi" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Giới tính</label>
                            <select class="form-control" name="egioitinh">
                                <option value="<?php echo $_SESSION['kh']['gioitinh'] ?>"><?php echo $_SESSION['kh']['gioitinh'] ?></option>
                                <option>Nam</option>
                                <option>Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="birthday">Ngày sinh:</label>
                            <input value="<?php echo $_SESSION['kh']['ngaysinh'] ?>" type="date" class="form-control" name="engay" placeholder="Nhập ngày sinh">
                        </div>
                        <div class="form-group">
                            <label for="confirmation_pwd">Xác nhận mật khẩu:</label>
                            <input required="true" type="password" pattern="[0-9]{6}" class="form-control" name="emk" title="Password gồm 6 ký tự số" placeholder="Password gồm 6 ký tự số">
                        </div>
                        <button name="dtt" class="btn btn-primary">Đổi thông tin</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
                <?php
                if (isset($_POST['dtt'])) {
                    if ($_POST['emk'] == $_SESSION['kh']['matkhau']) {
                        $dtt = $get->dtt($_SESSION['kh']['ID_TK'], $_POST['eten'], $_POST['engay'], $_POST['egioitinh'], $_POST['ediachi']);
                        if ($dtt) {
                            $sdtt = $get->login($_POST['esdt'], $_SESSION['kh']['matkhau']);
                            $o = mysqli_fetch_assoc($sdtt);
                            $_SESSION['kh'] = $o;
                            echo "<script>alert('Đổi Thông tin thành công')</script>";
                        } else
                            echo "<script>alert('Không thành công')</script>";
                        echo "<script>window.location='datlich.php';</script>";
                    } else
                        echo "<script>alert('Mật khẩu không chính xác!!!')</script>";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Đổi mật khẩu -->
    <div class="modal fade" id="dmk" aria-hidden="true" aria-labelledby="dmk" tabindex="-1">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Đổi mật khẩu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">

                        <div class="form-group mb-3">
                            <label>Mật khẩu cũ</label>
                            <input class="form-control" type="password" name="old" required pattern="[0-9]{6}" title="Password gồm 6 ký tự số" placeholder="Password gồm 6 ký tự số">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Mật khẩu mới</label>
                            <input class="form-control" type="password" name="new" required pattern="[0-9]{6}" title="Password gồm 6 ký tự số" placeholder="Password gồm 6 ký tự số">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Xác nhận mật khẩu</label>
                            <input class="form-control" type="password" name="cknew" required pattern="[0-9]{6}" title="Password gồm 6 ký tự số" placeholder="Password gồm 6 ký tự số">
                        </div>
                        <div class="form-group mb-0 text-center" style="float:left;">
                            <button name="dmk" class="btn btn-primary"> Đổi </button>
                        </div>
                        <?php
                        if (isset($_POST['dmk'])) {
                            if ($_POST['old'] == $_SESSION['kh']['matkhau']) {
                                if ($_POST['new'] == $_POST['cknew']) {
                                    $dmk = $get->dmk($_SESSION['kh']['ID_TK'], $_POST['new']);
                                    if ($dmk) {
                                        $_SESSION['kh']['matkhau'] = $_POST['new'];
                                        echo "<script>alert('Đổi mật khẩu thành công')</script>";
                                    } else
                                        echo "<script>alert('Không thành công')</script>";
                                    echo "<script>window.location='datlich.php';</script>";
                                } else echo "<script>alert('Xác nhận mật khẩu không trùng khớp')</script>";
                            } else echo "<script>alert('Mật khẩu không chính xác')</script>";
                        }
                        ?>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="qmk" aria-hidden="true" aria-labelledby="qmk" tabindex="-1">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Quên mật khẩu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">

                        <div class="form-group mb-3">
                            <label>Số điện thoại của bạn</label>
                            <input class="form-control" type="text" name="qsdt" required pattern="[0-9]{}" title="Nhập đúng định dạng số điện thoai" placeholder="Nhập số điện thoại">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Mật khẩu mới</label>
                            <input class="form-control" type="password" name="qnew" required pattern="[0-9]{6}" title="Password gồm 6 ký tự số" placeholder="Password gồm 6 ký tự số">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Xác nhận mật khẩu</label>
                            <input class="form-control" type="password" name="ckqnew" required pattern="[0-9]{6}" title="Password gồm 6 ký tự số" placeholder="Password gồm 6 ký tự số">
                        </div>
                        <div class="form-group mb-0 text-center" style="float:left;">
                            <button name="qmk" class="btn btn-primary"> Đổi </button>
                        </div>
                        <?php
                        if (isset($_POST['qmk'])) {
                            $check = $get->checktk($_POST['qsdt']);
                            $r = mysqli_num_rows($check);
                            if ($r > 0) {
                                $r = mysqli_fetch_assoc($check);
                                if ($_POST['qnew'] == $_POST['ckqnew']) {
                                    $qmk = $get->dmk($r['ID_TK'], $_POST['qnew']);
                                    if ($qmk) {
                                        echo "<script>alert('Đổi mật khẩu thành công')</script>";
                                    } else
                                        echo "<script>alert('Không thành công')</script>";
                                    echo "<script>window.location='datlich.php';</script>";
                                } else echo "<script>alert('Xác nhận mật khẩu không trùng khớp')</script>";
                            } else echo "<script>alert('Số điện thoại không chính xác')</script>";
                        }
                        ?>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Đăng nhập</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">

                        <div class="form-group mb-3">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" name="name" required placeholder="Ví dụ: 0123.xxx.xxx">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" required pattern="[0-9]{6}" title="Password gồm 6 ký tự số" placeholder="Password gồm 6 ký tự số">
                            Bạn quên mật khẩu
                            <a style="color: blue;" data-bs-target="#qmk" data-bs-toggle="modal" data-bs-dismiss="modal">Quên mật khẩu</a>
                        </div>

                        <div class="form-group mb-0 text-center" style="float:left;">
                            <button name="btn" class="btn btn-primary"> Đăng nhập </button>
                            Bạn chưa có tài khoản
                            <a style="color: blue;" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Đăng ký</a>
                        </div>
                        <?php
                        if (isset($_POST['btn'])) {
                            $check = $get->checktk($_POST['name']);
                            $r = mysqli_num_rows($check);
                            if ($r == 0) {
                                echo "<script>alert('Tài khoản không tồn tại!!!')</script>";
                            } else {
                                $dn = $get->login($_POST['name'], $_POST['password']);
                                $r = mysqli_num_rows($dn);
                                if ($r) {
                                    $r = mysqli_fetch_assoc($dn);
                                    $_SESSION['kh'] = $r;
                                    echo "<script>window.location='datlich.php';</script>";
                                } else
                                    echo "<script>alert('Thông tin tài khoản mật khẩu không chính xác!!!')</script>";
                            }
                        }
                        ?>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Đăng ký</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="usr">Họ và Tên:</label>
                            <input required="true" type="text" class="form-control" name="ten" placeholder="Nhập họ và tên">
                        </div>
                        <div class="form-group">
                            <label for="email">Số điện thoại:</label>
                            <input required="true" type="text" pattern="[0-9]{}" title="Nhập đúng định dạng số điện thoại" placeholder="Nhập số điện thoại" class="form-control" name="sdt">
                        </div>
                        <div class="form-group">
                            <label for="address">Đia chỉ:</label>
                            <input type="text" class="form-control" name="diachi" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Giới tính</label>
                            <select class="form-control" name="gioitinh">
                                <option value="">-- Chọn giới tính --</option>
                                <option>Nam</option>
                                <option>Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="birthday">Ngày sinh:</label>
                            <input type="date" class="form-control" name="ngay" placeholder="Nhập ngày sinh">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mật khẩu:</label>
                            <input required="true" type="password" pattern="[0-9]{6}" class="form-control" name="mk" title="Password gồm 6 ký tự số" placeholder="Password gồm 6 ký tự số">
                        </div>
                        <div class="form-group">
                            <label for="confirmation_pwd">Xác nhận mật khẩu:</label>
                            <input required="true" type="password" pattern="[0-9]{6}" class="form-control" name="checkmk" title="Password gồm 6 ký tự số" placeholder="Password gồm 6 ký tự số">
                        </div>
                        <button name="dk" class="btn btn-primary">Đăng ký</button>
                        Đã có tài khoản
                        <a style="color: blue;" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Đăng nhập</a>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
                <?php
                if (isset($_POST['dk'])) {
                    $check = $get->checktk($_POST['sdt']);
                    $r = mysqli_num_rows($check);
                    if ($r > 0) {
                        echo "<script>alert('Tài khoản đã tồn tại!!!')</script>";
                    } else {
                        if ($_POST['mk'] == $_POST['checkmk']) {
                            $dk = $get->dangky($_POST['sdt'], $_POST['mk'], $_POST['ten'], $_POST['sdt'], $_POST['ngay'], $_POST['gioitinh'], $_POST['diachi']);
                            if ($dk)
                                echo "<script>alert('Thành công')</script>";
                            else
                                echo "<script>alert('Không thành công')</script>";

                            echo "<script>window.location='datlich.php';</script>";
                        } else
                            echo "<script>alert('Mật khẩu không trùng khớp!!!')</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Đặt lịch</h2>
                </div>
                <div class="col-12">
                    <a href="">Trang chủ</a>
                    <a href="">Đặt lịch</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="section-header text-center" style="margin-top: 90px;">
        <h2>Mời quý Khách đặt lịch</h2>
    </div>
    <div class="contact" style="margin-bottom: 90px;">
        <div class="container-fluid">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <div class="contact-form">
                            <form id="datlich" style="color:aliceblue" method="post">
                                <div class="control-group">
                                    <label>1. Chọn Địa điểm.</label>
                                    <?php
                                    if (isset($_GET['idch'])) {
                                    ?>
                                        <select required class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="ch" id="ch">
                                            <?php
                                            $chid = $get->cuahangid($_GET['idch']);
                                            foreach ($chid as $ch)
                                            ?>
                                            <option value="<?php echo $ch['diachi'] ?>"><?php echo $ch['diachi'] ?></option>
                                            <?php
                                            $ch = $get->cuahang();
                                            foreach ($ch as $c) {
                                            ?>
                                                <option value="<?php echo $c['diachi'] ?>"><?php echo $c['diachi'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                    } else {
                                    ?>
                                        <select required class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="ch" id="ch">
                                            <option value="">Chọn địa điểm</option>
                                            <?php
                                            $ch = $get->cuahang();
                                            foreach ($ch as $c) {
                                            ?>
                                                <option value="<?php echo $c['diachi'] ?>"><?php echo $c['diachi'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="control-group">
                                    <label>2.Chọn dịch vụ.</label>
                                    <?php
                                    if (isset($_GET['iddv'])) { ?>
                                        <select required class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="dv" id="dv">
                                            <?php
                                            $dvid = $get->se_dv_id($_GET['iddv']);
                                            foreach ($dvid as $d)
                                            ?>
                                            <option value="<?php echo $d['dichvu'] ?>"><?php echo $d['dichvu'] ?></option>
                                            <?php
                                            $dv = $get->se_dv();
                                            foreach ($dv as $v) {
                                            ?>
                                                <option value="<?php echo $v['dichvu'] ?>"><?php echo $v['dichvu'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                    } else {
                                    ?>
                                        <select required class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="dv" id="dv">
                                            <option value="">Chọn dịch vụ</option>
                                            <?php
                                            $dv = $get->se_dv();
                                            foreach ($dv as $v) {
                                            ?>
                                                <option value="<?php echo $v['dichvu'] ?>"><?php echo $v['dichvu'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                    }
                                    $time = getdate();
                                    if ($time['mon'] < 10) $thang = "-0" . $time['mon'];
                                    else $thang = "-" . $time['mon'];
                                    if ($time['mday'] < 10) $ngay = "-0" . $time['mday'];
                                    else $ngay = "-" . $time['mday'];
                                    if ($time['hours'] < 5) $gio = "T0" . ($time['hours'] + 5);
                                    else $gio = "T" . ($time['hours'] + 5);
                                    if ($time['minutes'] < 10) $phut = ":0" . $time['minutes'];
                                    else $phut = ":" . $time['minutes'];
                                    $now = $time['year'] . $thang . $ngay . $gio . $phut;
                                    ?>

                                </div>
                                <div class="control-group">
                                    <label>3.Chọn thời gian. </label>
                                    <input required min="<?php echo $now ?>" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" style="background-color: aliceblue; border-radius: 10px; " class="form-control" type="datetime-local" id="time" name="time">

                                </div>
                                <div>
                                    <button name="dl" class="btn" id="sendMessageButton">Đặt lịch hẹn</button>
                                </div>
                            </form>
                            <?php
                            if (isset($_SESSION['kh'])) {
                                if (isset($_POST['dl'])) {
                                    $se = $get->se_dl_time($_SESSION['kh']['ID_TK'], $_POST['time']);
                                    $time = mysqli_num_rows($se);
                                    if ($time > 0) {
                                        echo "<script>alert('Quý khách đã đặt lịch tại thời gian này rồi.')</script>";
                                    } else {
                                        $iddv = $get->se_dv_ten($_POST['dv']);
                                        foreach ($iddv as $idv)
                                            $idch = $get->idch($_POST['ch']);
                                        foreach ($idch as $ich)
                                            $dl = $get->datlich($_SESSION['kh']['ID_TK'], $_POST['time'], $idv['ID_DV'], $ich['ID_CH']);
                                        if ($dl)
                                            echo "<script>alert('Quý khách đã đặt lịch thành công')</script>";
                                        else
                                            echo "<script>alert('Không thành công')</script>";
                                        echo "<script>window.location='index.php';</script>";
                                    }
                                }
                            } else echo "<script>alert('Vui lòng đăng nhập để đặt lịch')</script>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="footer-contact">
                        <h2>Địa chỉ</h2>
                        <p><i class="fa fa-map-marker-alt"></i><?php $ch = $get->cuahangid("1");
                                                                foreach ($ch as $c) echo $c['diachi'] ?></p>
                        <p><i class="fa fa-phone-alt"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope"></i>info@example.com</p>
                        <div class="footer-social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="footer-link">
                        <h2>Danh mục</h2>
                        <a href="dichvu.php">Dịch vụ</a>
                        <a href="cuahang.php">Cửa hàng</a>
                        <a href="datlich.php">Đặt lịch</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container copyright">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; <a href="#">Your Site Name</a>, All Right Reserved.</p>
                </div>
                <div class="col-md-6">
                    <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>