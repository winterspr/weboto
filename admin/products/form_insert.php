<?php require '../check_admin_login.php'; ?>
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
        include "../menu.php";
        require '../connect.php';
        $sql = "select * from manufactures";
        $result = mysqli_query($connect, $sql);
    ?>
    <form action="proccess_insert.php" method="post" enctype="multipart/form-data">
        Tên
        <input type="text" name="name">
        <br>
        Ảnh
        <input type="file" name="photo">
        <br>
        Giá
        <input type="number" name="price">
        <br>
        Mô tả
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <br>
        Nhà sản xuất
        <select name="manufactures_id" id="">
            <?php foreach($result as $each) : ?>
                <option value="<?php echo $each['id'] ?>">
                    <?php echo $each['name']?>;
                </option>
            <?php endforeach ?>
        </select>
        <br>
        <button>Thêm</button>
    </form>
</body>
</html>