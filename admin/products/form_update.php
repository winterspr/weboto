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
        $id = $_GET['id'];
        require '../menu.php';
        require '../connect.php';
        $sql = "select * from products
        where id = '$id'
        ";
        $result = mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);
        $sql = "select * from manufactures";
        $manufactures = mysqli_query($connect, $sql);
    ?>
    <form action="proccess_update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value = "<?php echo $each['id'] ?>">
        Tên
        <input type="text" name="name" value = "<?php echo $each['name'] ?>">
        <br>
        Đổi ảnh mới
        <input type="file" name="photo_new">
        <br>
        hoặc giữ ảnh cũ
        <img src="photos/<?php echo $each['photo'] ?>" alt="">
        <input type="hidden" name="photo_old" value = "<?php echo $each['photo'] ?>">
        <br>
        Giá
        <input type="number" name="price" value = "<?php echo $each['price'] ?>">
        <br>
        Mô tả
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <br>
        Nhà sản xuất
        <select name="manufactures_id">
            <?php foreach($manufactures as $manufacture): ?>
                <option 
                value="<?php echo $manufacture['id'] ?>"
                <?php if($each['manufactures_id'] == $manufacture['id']) { ?>
                    selected
                <?php } ?>
                >
                <?php echo $manufacture['name'] ?>
                </option>
                <?php endforeach ?>
        </select>
        <br>
        <button>Sửa</button>
    </form>
</body>
</html>