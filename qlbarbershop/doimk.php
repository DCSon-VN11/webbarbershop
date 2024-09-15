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

    <!-- App css -->
    <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\app.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</head>

<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                
                                    <span><img src="assets\images\logo1.png" alt="" height="26"></span>
                                
                            </div>

                            <h5 class="auth-title">Đổi mật khẩu</h5>

                            <form method="POST">

                            <div class="form-group mb-3">
                                    <label for="password">Password cũ</label>
                                    <input class="form-control" type="password" name="oldpassword" required pattern="[0-9]{6}" title="Password gồm 6 ký tự số"
                                        placeholder="Password gồm 6 ký tự số">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password mới</label>
                                    <input class="form-control" type="password" name="newpassword" required pattern="[0-9]{6}" title="Password gồm 6 ký tự số"
                                        placeholder="Password gồm 6 ký tự số">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Nhập lại Password mới</label>
                                    <input class="form-control" type="password" name="testpassword" required pattern="[0-9]{6}" title="Password gồm 6 ký tự số"
                                        placeholder="Password gồm 6 ký tự số">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button name="btn" class="btn btn-danger btn-block"> Đổi mật khẩu </button>
                                </div>
                                <?php
                                $get = new Data();
                                if (isset($_POST['btn'])) {

                                    if($_POST['oldpassword']==$tk['matkhau']) {
                                        if($_POST['newpassword']==$_POST['testpassword']){
                                            $doi=$get->doimk($_POST['newpassword'],$tk['ID_TK']);
                                            if($doi) {
                                                $_SESSION['tk']['matkhau'] = $_POST['newpassword'];
                                                echo "<script>alert('Thành công')</script>";
                                            }
                                            else
                                                echo "<script>alert('Không thành công')</script>";
        
                                            echo "<script>window.location='index.php';</script>";
                                        }
                                        else echo "<script>alert('Mật khẩu chưa trùng khớp')</script>";
                                    }
                                    else echo "<script>alert('Mật khẩu không đúng')</script>";
                                }
                                ?>
                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="pages-recoverpw.html" class="text-muted ml-1">Forgot your password?</a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        2019 &copy; Upvex theme by <a href="" class="text-muted">Coderthemes</a>
    </footer>

    <!-- Vendor js -->
    <script src="assets\js\vendor.min.js"></script>

    <!-- App js -->
    <script src="assets\js\app.min.js"></script>

</body>

</html>