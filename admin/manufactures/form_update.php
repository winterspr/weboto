<?php require '../check_super_admin_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(empty($_GET['id'])){
            header('location:index.php?error=Vui lòng nhập mã');
        }
        $id = $_GET['id'];
        include '../menu.php';
        require '../connect.php';
        $sql = "select * from manufactures
        where id = '$id'";
        $result = mysqli_query($connect,$sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows === 1 ){
            $each = mysqli_fetch_array($result);
?>
    <form action="proccess_update.php" method = "post">
        <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
        <br>
        name
        <input type="text" name='name' value="<?php echo $each['name'] ?>">
        <br>
        address
        <input type="text" name='address' value="<?php echo $each['address'] ?>">
        <br>
        phonenumber
        <input type="text" name='phonenumber' value="<?php echo $each['phonenumber'] ?>">
        <br>
        photo
        <input type="text" name='photos' value="<?php echo $each['photos'] ?>">
        <br>
        <button>Sửa</button>
    </form>


    <?php } else { ?>
        <h1>Không tìm thấy theo mã này</h1>
    <?php } ?>
</body>
</html>