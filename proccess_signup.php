<?php
    //$name = $_POST['name'];
    //$email= $_POST['email'];
    
    //$phonenumber = $_POST['phonenumber'];
    

    $name = $email = $phonenumber = $password = $address = "";
    $namerr = $emailrr = $phonenumberrr = $passwordrr = $addressrr = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST['name'])){
            $namerr = "name is required";
        } else {
            $name = $_POST['name'];
            //check if name only contains letters or whitespace
            if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
                $namerr = "name only contains letters or whitespace"; 
            }
        }
        if(empty($_POST['email'])){
            $emailrr = "email is required";
        } else {
            $email = $_POST['email'];
            //check if email address is well-formed
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailrr = "email address must be well_formed";
            }
        }
        if(empty($_POST['password'])){
            $passwordrr = "password is required";
        } else {
            $password = $_POST['password'];
            //check if name only contains letters or whitespace
            if(!preg_match("/^[a-zA-Z0-9' ]*$/", $password)){
                $passwordrr = "password only contains letters or whitespace"; 
            }
        }
        if(empty($_POST['phonenumber'])){
            $phonenumberrr = "phonenumber is required";
        } else {
            $phonenumber = $_POST['phonenumber'];
            //check if phonenumber only contains number
            if(!preg_match("/^[0-9]*$/", $phonenumber)){
                $phonenumberrr = "phonenumber only contains number";
            }
        }
        if(empty($_POST['address'])){
            $addressrr = "address is required";
        } else {
            $address = $_POST['address'];
            //check if name only contains letters or whitespace
            if(!preg_match("/^[a-zA-Z0-9-' ]*$/", $address)){
                $addressrr = "address only contains letters or whitespace"; 
            }
        }
    }
    //$password = $_POST['password'];
    //$address = $_POST['address'];

    require 'admin/connect.php';
    $sql = "select count(*) from customers
    where email = '$email'";
    $result = mysqli_query($connect, $sql);
    $number_rows = mysqli_fetch_array($result)['count(*)'];

    if($number_rows == 1){
        session_start();
        $_SESSION['error'] = "Tài khoản đã tồn tại. Vui lòng đăng kí tài khoản khác";
        header('location:signup.php');
        exit; 
    }

    $sql = "insert into customers(name, email, password, phonenumber, address)
    value ('$name', '$email', '$password', '$phonenumber', '$address')";
    mysqli_query($connect, $sql);

    $sql = "select id from customers
    where email = '$email'";
    $result = mysqli_query($connect, $sql);
    $id = mysqli_fetch_array($result)['id'];
    session_start();
    $_SESSION['name'] = $name;
    mysqli_close($connect);

