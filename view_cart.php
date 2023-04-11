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
        session_start();
        $cart = $_SESSION['cart'];
        if(empty($_SESSION['cart'])){
            header('location:index.php');
        }
        $sum = 0;
    ?>
    <table border = '1' width = '100%'>
        <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Xóa</th>
        </tr>
        <?php foreach($cart as $id => $each) : ?>
            <tr>
                <td>
                    <img src="admin/products/photos/<?php echo $each['photo'] ?>" alt="" height = '100px'>
                </td>
                <td><?php echo $each['name'] ?></td>
                <td>
                    <?php echo $each['price'] ?>
                </td>
                <td>
                    <a href="update_quantity.php?id=<?php echo $id ?>&type=decre">-</a>
                    <?php echo $each['quantity'] ?>
                    <a href="update_quantity.php?id=<?php echo $id ?>&type=incre">+</a>
                </td>
                <td>
                    <?php
                        $result = $each['price'] * $each['quantity'];
                        echo $result;
                        $sum+=$result;
                    ?>
                </td>
                <td>
                    <a href="delete_cart.php?id=<?php echo $id ?>">X</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <h1>Tổng tiền: <?php echo $sum ?></h1>
    <?php
        $id = $_SESSION['id'];
        require 'admin/connect.php';
        $sql = "select * from customers
        where id = '$id'";
        $result = mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);

    ?>
    <form action="proccess_checkout.php" method="post">
        Tên người nhận
        <input type="text" name="name_receiver" value="<?php echo $each['name'] ?>">
        <br>
        SDT
        <input type="text" name="phonenumber_receiver" value="<?php echo $each['phonenumber'] ?>">
        <br>
        Địa chỉ
        <input type="text" name="address_receiver" value="<?php echo $each['address'] ?>">
        <br>
        <button>Thanh toán</button>
    </form>

</body>
</html>