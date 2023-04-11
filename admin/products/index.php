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
        require "../menu.php";
        require "../connect.php";
        $sql = "select 
        products.*,
        manufactures.name as manufactures_name
        from products
        join manufactures on products.manufactures_id = manufactures.id";
        $result = mysqli_query($connect, $sql);
    ?>
    <a href="form_insert.php">Thêm</a>
    <h1>Quản lí sản phẩm</h1>
    <table border = '1' width = "100%">
        <tr>
        <td>Mã</td>
        <td>Tên</td>
        <td>Ảnh</td>
        <td>Giá</td>
        <td>Tên nhà sản xuất</td>
        <td>Sửa</td>
        <td>Xóa</td>
        </tr>
        
        <?php foreach($result as $each): ?>
            <tr>
                <td><?php echo $each['id'] ?></td>
                <td><?php echo $each['name']?></td>
                <td><img height="50" src="photos/<?php echo $each['photo']?>" alt=""></td>
                <td><?php echo $each['price']?></td>
                <td><?php echo $each['manufactures_name']?></td>
                <td>
                    <a href="form_update.php?id=<?php echo $each['id']?>">Sửa</a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $each['id']?>">Xóa</a>
                </td>
            </tr>

        <?php endforeach ?>
    </table>
</body>
</html>