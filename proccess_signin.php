<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(isset($_POST['remember'])){
        $remeber = true;
    } else{
        $remeber = false;
    }
    require 'admin/connect.php';
    $sql = "select * from customers
    where email = '$email' and password = '$password'";
    $result = mysqli_query($connect, $sql);
    $number_rows = mysqli_num_rows($result);
    if($number_rows == 1){
        //echo "Đăng nhập thành công";
        header('location:index.php?error = "Đăng nhập thành công"');
        session_start();
        $each = mysqli_fetch_array($result);
        $id = $each['id'];
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $each['name'];
        if($remeber){
            $token = uniqid('user_', true);
            $sql = "update customers
            set
            token = '$token'
            where id = '$id'";
            setcookie('remember', $token, time() + 3600*30*12);
        }
    } else{
        header('location:signin.php?error = "Vui lòng đăng nhập lại"');
    }