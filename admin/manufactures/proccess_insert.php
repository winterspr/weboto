<?php
    require '../check_super_admin_login.php';
    $name = $address = $phonenumber = $photos = '';
    $namerr = $addressrr = $phonenumberrr = $photosrr = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($_POST['name'])){
            $namerr = 'Name is required';
        } else {
            $name = $_POST['name'];
            if(!preg_match("/^[a-zA-Z- ]*$/", $name)){
                $namerr = "only letters or white space allowed";
            }
        }
        if(empty($_POST['address'])){
            $addressrr = 'address is required';
        } else {
            $address = $_POST['address'];
            if(!preg_match("/^[a-zA-Z0-9 ]*$/", $address)){
                $addressrr = "only letters, numbers or white space allowed";    
            }
        }
        if(empty($_POST['phonenumber'])){
            $phonenumberrr = 'Phonenumber id required';
        } else{
            $phonenumber = $_POST['phonenumber'];
            if(!preg_match("/^[0-9]*$/", $phonenumber)){
                $phonenumberrr = "only numbers";
            }
        }
        if(empty($_POST['photos'])){
            $photosrr = 'picture is required';
        } else {
            $photos = $_POST['photos'];
            if(!preg_match("/^[a-zA-Z0-9 ]*$/", $photos)){
                $photosrr = "only letters, numbers or white space allowed";
            }
        }
    }
    if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phonenumber']) || empty($_POST['photos']))
    {
        header('location:form_insert.php?error=Phải điền đầy đủ thông tin');
    }
    require '../connect.php';
    $sql = "insert into manufactures(name, address, phonenumber, photos)
        values('$name', '$address', '$phonenumber', '$photos')
    ";

    mysqli_query($connect,$sql);
    mysqli_close($connect);
    header('location:index.php?success=Nhap thanh cong');