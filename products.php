<style type="text/css">
    .tungsp{
        width: 33%;
        /*border: 1px solid black;*/
        height: 250px;
        float: left;
    }
</style>

<?php
    require 'admin/connect.php';
    $sql = "select * from products";
    $result = mysqli_query($connect, $sql);
?>

<div id="giua">
    <?php foreach($result as $each): ?>
        <div class="tungsp">
            <h3><?php echo $each['name'] ?></h3>
            <img src="admin/products/photos/<?php echo $each['photo'] ?>" alt="" height="100">  
            <p>  Giá: <?php echo $each['price'] ?></p> 
            <a href="product.php?id=<?php echo $each['id'] ?>">Xem chi tiết >>>></a>
            <br>
            <?php if(!empty($_SESSION['id'])) { ?>
                <a href="add_to_cart.php?id=<?php echo $each['id'] ?>">Thêm vào gỉo hàng</a>
            <?php } ?>
        </div>
    <?php endforeach?>
</div>