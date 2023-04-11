<?php
    session_start();
    if(isset($_COOKIE['remember'])){
        $token = $_COOKIE['remember'];
        require 'admin/connect.php';
        $sql = "select * from customers
        where token = '$token'
        limit 1";
        $result = mysqli_query($connect, $sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 1){
            $_SESSION['id'] = $each['id'];
            $_SESSION['name'] = $each['name'];
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./vendor/fontawesome/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <style type="text/css">
        /* input{
            line-height: normal;
        }

        button{
            cursor: pointer;
        }

        body{
            margin: 0 auto;
            text-align: center;
            padding: 20px;
        }

        .form-input{
            border: 1px solid black;
            border-radius: 4px;
            width: 20%;
            height: 30px;
            transition: 0.25 ease;
        }

        h2{
            width: 91%;
        }

        .form-input:focus{
            border-color: chocalate;
        }

        .form-field{
            position: relative;
        }
        .form-label{
            position: absolute;
            top: 25%;
            transform: translateY(-50%);
            left: 40%;
            user-select: none;
            color: gray;
            pointer-events: none;
        }
        .form-input:not(:placeholder-shown) +.form-label,

        .form-input:focus+.form-label{
            top: 0;
            padding: 0 1px;
            display: inline-block;
            background-color: white;
            color: red;
            transition: 0.25s ease;
        }

        .left{
            text-align: right;
            width: 15%;
        }

        .right{
            width: 60%;
            text-align: right;
        }

        button{
            background-color: deepskyblue;
            color: aliceblue;
            width: 300px;
            height: 40px;
            font-size: 20px;
            border-radius: 4px;
            border: none;
        }

         button:hover{
            background: #000;
            transition: 0.5s ease;
        } */

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -0.75rem;
            margin-left: -0.75rem;
        }

        .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
        .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
        .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
        .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
        .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
        .col-xl-auto {
            position: relative;
            width: 100%;
            padding-right: 0.75rem;
            padding-left: 0.75rem;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #e3e6f0;
            border-radius: 0.35rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }

        .p-0 {
            padding: 0 !important;
        }

        .p-5 {
            padding: 3rem !important;
        }

        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
        }

        @media (min-width: 992px) {
        .col-lg {
            flex-basis: 0;
            flex-grow: 1;
            max-width: 100%;
        }
        .row-cols-lg-1 > * {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .row-cols-lg-2 > * {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .row-cols-lg-3 > * {
            flex: 0 0 33.33333%;
            max-width: 33.33333%;
        }
        .row-cols-lg-4 > * {
            flex: 0 0 25%;
            max-width: 25%;
        }
        .row-cols-lg-5 > * {
            flex: 0 0 20%;
            max-width: 20%;
        }
        .row-cols-lg-6 > * {
            flex: 0 0 16.66667%;
            max-width: 16.66667%;
        }
        .col-lg-auto {
            flex: 0 0 auto;
            width: auto;
            max-width: 100%;
        }
        .col-lg-1 {
            flex: 0 0 8.33333%;
            max-width: 8.33333%;
        }
        .col-lg-2 {
            flex: 0 0 16.66667%;
            max-width: 16.66667%;
        }
        .col-lg-3 {
            flex: 0 0 25%;
            max-width: 25%;
        }
        .col-lg-4 {
            flex: 0 0 33.33333%;
            max-width: 33.33333%;
        }
        .col-lg-5 {
            flex: 0 0 41.66667%;
            max-width: 41.66667%;
        }
        .col-lg-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .col-lg-7 {
            flex: 0 0 58.33333%;
            max-width: 58.33333%;
        }
        .col-lg-8 {
            flex: 0 0 66.66667%;
            max-width: 66.66667%;
        }
        .col-lg-9 {
            flex: 0 0 75%;
            max-width: 75%;
        }
        .col-lg-10 {
            flex: 0 0 83.33333%;
            max-width: 83.33333%;
        }
        .col-lg-11 {
            flex: 0 0 91.66667%;
            max-width: 91.66667%;
        }
        .col-lg-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .order-lg-first {
            order: -1;
        }
        .order-lg-last {
            order: 13;
        }
        .order-lg-0 {
            order: 0;
        }
        .order-lg-1 {
            order: 1;
        }
        .order-lg-2 {
            order: 2;
        }
        .order-lg-3 {
            order: 3;
        }
        .order-lg-4 {
            order: 4;
        }
        .order-lg-5 {
            order: 5;
        }
        .order-lg-6 {
            order: 6;
        }
        .order-lg-7 {
            order: 7;
        }
        .order-lg-8 {
            order: 8;
        }
        .order-lg-9 {
            order: 9;
        }
        .order-lg-10 {
            order: 10;
        }
        .order-lg-11 {
            order: 11;
        }
        .order-lg-12 {
            order: 12;
        }
        .offset-lg-0 {
            margin-left: 0;
        }
        .offset-lg-1 {
            margin-left: 8.33333%;
        }
        .offset-lg-2 {
            margin-left: 16.66667%;
        }
        .offset-lg-3 {
            margin-left: 25%;
        }
        .offset-lg-4 {
            margin-left: 33.33333%;
        }
        .offset-lg-5 {
            margin-left: 41.66667%;
        }
        .offset-lg-6 {
            margin-left: 50%;
        }
        .offset-lg-7 {
            margin-left: 58.33333%;
        }
        .offset-lg-8 {
            margin-left: 66.66667%;
        }
        .offset-lg-9 {
            margin-left: 75%;
        }
        .offset-lg-10 {
            margin-left: 83.33333%;
        }
        .offset-lg-11 {
            margin-left: 91.66667%;
        }
        }
        .d-none {
            display: none !important;
        }

        @media (min-width: 992px) {
            .d-lg-none {
                display: none !important;
            }
            .d-lg-inline {
                display: inline !important;
            }
            .d-lg-inline-block {
                display: inline-block !important;
            }
            .d-lg-block {
                display: block !important;
            }
            .d-lg-table {
                display: table !important;
            }
            .d-lg-table-row {
                display: table-row !important;
            }
            .d-lg-table-cell {
                display: table-cell !important;
            }
            .d-lg-flex {
                display: flex !important;
            }
            .d-lg-inline-flex {
                display: inline-flex !important;
            }
        }

        *,
        *::after,
        *::before {
            box-sizing: border-box;
        }

        .bg-login-image {
                background: url("https://source.unsplash.com/K4mSJ7kc0As/600x800");
                background-position: center;
                background-size: cover;
        }
    
        .justify-content-center {
            justify-content: center !important;
        }

        .o-hidden {
            overflow: hidden !important;
        }

        .text-center {
            text-align: center !important;
        }

        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6 {
            margin-bottom: 0.5rem;
            font-weight: 400;
            line-height: 1.2;
        }

        h1, .h1 {
            font-size: 2.5rem;
        }

        h2, .h2 {
            font-size: 2rem;
        }

        h3, .h3 {
            font-size: 1.75rem;
        }

        h4, .h4 {
            font-size: 1.5rem;
        }

        h5, .h5 {
            font-size: 1.25rem;
        }

        h6, .h6 {
            font-size: 1rem;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        .mb-5,
        .my-5 {
            margin-bottom: 3rem !important;
        }


        form.user .custom-checkbox.small label {
            line-height: 1.5rem;
        }

        form.user .form-control-user {
            font-size: 0.8rem;
            border-radius: 10rem;
            padding: 1.5rem 1rem;
        }

        form.user .btn-user {
            font-size: 0.8rem;
            border-radius: 10rem;
            padding: 0.75rem 1rem;
        }

        .container,
        .container-fluid,
        .container-sm,
        .container-md,
        .container-lg,
        .container-xl {
            width: 100%;
            padding-right: 0.75rem;
            padding-left: 0.75rem;
            margin-right: auto;
            margin-left: auto;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .was-validated .form-control:valid, .form-control.is-valid {
            border-color: #1cc88a;
            padding-right: calc(1.5em + 0.75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%231cc88a' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        .was-validated .form-control:valid:focus, .form-control.is-valid:focus {
            border-color: #1cc88a;
            box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.25);
        }

        .was-validated textarea.form-control:valid, textarea.form-control.is-valid {
            padding-right: calc(1.5em + 0.75rem);
            background-position: top calc(0.375em + 0.1875rem) right calc(0.375em + 0.1875rem);
        }

        form.user .form-control-user {
            font-size: 0.8rem;
            border-radius: 10rem;
            padding: 1.5rem 1rem;
        }

        form.user .custom-checkbox.small label {
            line-height: 1.5rem;
        }

        small {
            font-size: 80%;
        }   

        .was-validated .custom-control-input:valid ~ .custom-control-label, .custom-control-input.is-valid ~ .custom-control-label {
            color: #1cc88a;
        }

        .was-validated .custom-control-input:valid ~ .custom-control-label::before, .custom-control-input.is-valid ~ .custom-control-label::before {
            border-color: #1cc88a;
        }

        .was-validated .custom-control-input:valid:checked ~ .custom-control-label::before, .custom-control-input.is-valid:checked ~ .custom-control-label::before {
            border-color: #34e3a4;
            background-color: #34e3a4;
        }

        .was-validated .custom-control-input:valid:focus ~ .custom-control-label::before, .custom-control-input.is-valid:focus ~ .custom-control-label::before {
            box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.25);
        }

        .was-validated .custom-control-input:valid:focus:not(:checked) ~ .custom-control-label::before, .custom-control-input.is-valid:focus:not(:checked) ~ .custom-control-label::before {
            border-color: #1cc88a;
        }

        form.user .custom-checkbox.small label {
            line-height: 1.5rem;
        }

        form.user .btn-user {
            font-size: 0.8rem;
            border-radius: 10rem;
            padding: 0.75rem 1rem;
        }

        .btn-primary {
            color: #fff;
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #2e59d9;
            border-color: #2653d4;
        }

        .btn-primary:focus, .btn-primary.focus {
            color: #fff;
            background-color: #2e59d9;
            border-color: #2653d4;
            box-shadow: 0 0 0 0.2rem rgba(105, 136, 228, 0.5);
        }

        .btn-primary.disabled, .btn-primary:disabled {
            color: #fff;
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
        .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #2653d4;
            border-color: #244ec9;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(105, 136, 228, 0.5);
        }

        .btn-google {
            color: #fff;
            background-color: #ea4335;
            border-color: #fff;
        }

        .btn-google:hover {
            color: #fff;
            background-color: #e12717;
            border-color: #e6e6e6;
        }

        .btn-google:focus, .btn-google.focus {
            color: #fff;
            background-color: #e12717;
            border-color: #e6e6e6;
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.5);
        }

        .btn-google.disabled, .btn-google:disabled {
            color: #fff;
            background-color: #ea4335;
            border-color: #fff;
        }

        .btn-google:not(:disabled):not(.disabled):active, .btn-google:not(:disabled):not(.disabled).active,
        .show > .btn-google.dropdown-toggle {
            color: #fff;
            background-color: #d62516;
            border-color: #dfdfdf;
        }

        .btn-google:not(:disabled):not(.disabled):active:focus, .btn-google:not(:disabled):not(.disabled).active:focus,
        .show > .btn-google.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.5);
        }

        .btn-facebook {
            color: #fff;
            background-color: #3b5998;
            border-color: #fff;
        }

        .btn-facebook:hover {
            color: #fff;
            background-color: #30497c;
            border-color: #e6e6e6;
        }

        .btn-facebook:focus, .btn-facebook.focus {
            color: #fff;
            background-color: #30497c;
            border-color: #e6e6e6;
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.5);
        }

        .btn-facebook.disabled, .btn-facebook:disabled {
            color: #fff;
            background-color: #3b5998;
            border-color: #fff;
        }

        .btn-facebook:not(:disabled):not(.disabled):active, .btn-facebook:not(:disabled):not(.disabled).active,
        .show > .btn-facebook.dropdown-toggle {
            color: #fff;
            background-color: #2d4373;
            border-color: #dfdfdf;
        }

        .btn-facebook:not(:disabled):not(.disabled):active:focus, .btn-facebook:not(:disabled):not(.disabled).active:focus,
        .show > .btn-facebook.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.5);
        }

        .btn-block {
            display: block;
            width: 100%;
        }

        @media (prefers-reduced-motion: reduce) {
            .btn {
                transition: none;
            }
        }


        .btn-block + .btn-block {
            margin-top: 0.5rem;
        }

        input[type="submit"].btn-block,
        input[type="reset"].btn-block,
        input[type="button"].btn-block {
            width: 100%;
        } 
        
        
        /* @media print {
        /* *,
        *::before,
        *::after {
            text-shadow: none !important;
            box-shadow: none !important;
            box-sizing: border-box;
        } */ */
        a:not(.btn) {
            text-decoration: underline;
        }
        abbr[title]::after {
            content: " (" attr(title) ")";
        }
        pre {
            white-space: pre-wrap !important;
        }
        pre,
        blockquote {
            border: 1px solid #b7b9cc;
            page-break-inside: avoid;
        }
        thead {
            display: table-header-group;
        }
        tr,
        img {
            page-break-inside: avoid;
        }
        p,
        h2,
        h3 {
            orphans: 3;
            widows: 3;
        }
        h2,
        h3 {
            page-break-after: avoid;
        }
        @page {
            size: a3;
        }
        body {
            min-width: 992px !important;
        }
        .container {
            min-width: 992px !important;
        }
        .navbar {
            display: none;
        }
        .badge {
            border: 1px solid #000;
        }
        .table {
            border-collapse: collapse !important;
        }
        .table td,
        .table th {
            background-color: #fff !important;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dddfeb !important;
        }
        .table-dark {
            color: inherit;
        }
        .table-dark th,
        .table-dark td,
        .table-dark thead th,
        .table-dark tbody + tbody {
            border-color: #e3e6f0;
        }
        .table .thead-dark th {
            color: inherit;
            border-color: #e3e6f0;
        }
}

        html {
        position: relative;
        min-height: 100%;
        }

        body {
        height: 100%;
        }

        a:focus {
            outline: none;
        }

        body {
            margin: 0;
            font-family: Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #858796;
            text-align: left;
            background-color: #fff;
        }
        .border-0 {
            border: 0 !important;
        }

        .bg-gradient-primary {
            background-color: #4e73df;
            background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
            background-size: cover;
        }
    </style>
</head>
<body class="bg-gradient-primary">
    <?php
        if(isset($_GET['error'])){
            echo $_GET['error'];
        }
    ?>
    <!-- <h1>Login</h1>
    <form action="proccess_signin.php" method="post">
    <h2>Email:</h2>
    <div class="form-field">
        <input type="text" class="form-input" placeholder=" " name="email">
        <label for="Vui lòng nhập email" class="form-label">Email</label>
    </div>
    <h2>Password:</h2>
    <div class="form-field">
        <input type="password" class="form-input" placeholder=" " name="password">
        <label for="Vui lòng nhập password" class="form-label">Password</label>
    </div>
    Remember
    <input type="checkbox" class="left" name="remember">
    <p class="right"><a href="forgot-password.php">Quên mật khẩu</a></p>
    <div class="right">
        <p>Create an account <a href="signup.php">Sign up</a></p>
    </div>
    <button> <b>Login</b> </button>
    <h4><b>Or Login By</b></h4>
    <button>
        <i class="fa-brands fa-facebook"></i>
        <b>Login with FB</b>
    </button>
    </form> -->
    
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="proccess_signin.php" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                name="email"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="remember">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <br>
                                        <button class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        <button>
                                        <button class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot_password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="signup.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
     <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>