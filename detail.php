<style type="text/css"></style>
<?php 

    $id = $_GET['id'];
    require 'admin/connect.php';
    $sql = "select * from products
    where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
?>

<div id = "giua">
    <h3><?php echo $each['name'] ?></h3>
    <img src="admin/products/photos/<?php echo $each['photo'] ?>" alt="" height = "250px">
    <h4><?php echo $each['price'] ?></h4>
    <h4><?php echo $each['description'] ?></h4>
</div>
