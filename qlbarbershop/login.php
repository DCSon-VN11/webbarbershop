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

                            <h5 class="auth-title">Đăng nhập</h5>

                            <form method="POST">

                                <div class="form-group mb-3">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="name" required
                                        placeholder="Ví dụ: admin,nva1234,...">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" required
                                        pattern="[0-9]{6}" title="Password gồm 6 ký tự số"
                                        placeholder="Password gồm 6 ký tự số">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button name="btn" class="btn btn-danger btn-block"> Đăng nhập </button>
                                </div>
                                <?php
                                include('data/control.php');
                                session_start();
                                $get = new Data();
                                if (isset($_POST['btn'])) {

                                    $dn = $get->login($_POST['name'], $_POST['password']);
                                    $r = mysqli_num_rows($dn);
                                    if ($r ==0) {
                                        echo "<script>alert('Tài khoản không tồn tại!!!')</script>";
                                    }
                                    else if ($r>0) {
                                        $r = mysqli_fetch_assoc($dn);
                                        $_SESSION['tk'] = $r;
                                        echo "<script>window.location='index.php';</script>";
                                    } else {
                                        echo "<script>alert('Thông tin tài khoản mật khẩu không chính xác!!!')</script>";
                                    }

                                }
                                ?>
                            </form>

                            <div class="text-center">
                                <h5 class="mt-3 text-muted">Sign in with</h5>
                                <ul class="social-list list-inline mt-3 mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"
                                            class="social-list-item border-primary text-primary"><i
                                                class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"
                                            class="social-list-item border-danger text-danger"><i
                                                class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                                class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"
                                            class="social-list-item border-secondary text-secondary"><i
                                                class="mdi mdi-github-circle"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="pages-recoverpw.html" class="text-muted ml-1">Forgot your password?</a></p>
                            <p class="text-muted">Don't have an account? <a href="pages-register.html"
                                    class="text-muted ml-1"><b class="font-weight-semibold">Sign Up</b></a></p>
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