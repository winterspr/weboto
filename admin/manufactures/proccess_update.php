<?php
    require '../check_super_admin_login.php';
    if(empty($_POST['id'])){
        header('location:form_update.php?error=Phải truyền mã');
        exit;
    }
    $id = $_POST['id'];

    if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phonenumber']) || empty($_POST['photos'])){
        header('location:form_insert.php?id = $id & error=Phải điền đầy đủ thông tin');
        exit;
    }

        $name = $_POST['name'];
        $address = $_POST['address'];
        $phonenumber = $_POST['phonenumber'];
        $photos = $_POST['photos'];
    
    require '../connect.php';
    sql = "update manufactures
    set
    name = '$name',
    address = '$address',
    phonenumber = '$phonenumber',
    photos = '$photos'
    where id = '$id'";
    mysqli_query($connect, $sql);
    $error = mysqli_error($connect);
    mysqli_close($connect);
    if(empty($error)){
        header('location:index.php?success=Sửa thành công');
    } else {
        header('location:form_update.php?id=$id&error=Lỗi truy vấn');
    }
