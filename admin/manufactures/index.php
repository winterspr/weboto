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
    <h1>Đây là khu vực nhà sản xuất </h1>
    <?php
        include '../menu.php';
    ?>
    <a href="form_insert.php">Thêm</a>
    <?php
        require '../connect.php';
        $page = 1;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }

        $find = '';
        if(isset($_GET['find']))
        {
            $find = $_GET['find'];
        }

        $sql_employees = "select count(*) from manufactures
        where 
        name like '%$find%'
        ";

        $arr_employees = mysqli_query($connect, $sql_employees);
        $result_of_employees = mysqli_fetch_array($arr_employees);
        $employees = $result_of_employees['count(*)'];
        $employees_on_page = 2;
        $pages = ceil($employees / $employees_on_page);
        $skip = $employees_on_page*($page - 1);
        $sql = "select * from manufactures
        where
        name like '%$find%'
        limit $employees_on_page offset $skip
        ";
        $result = mysqli_query($connect, $sql);
    ?>
    <table border='1' width='100%'>
        <caption>
            <form action="">
                <input type="search" name="find" value="<?php echo $find ?>">
            </form>
        </caption>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Địa Chỉ</th>
            <th>Điện thoại</th>
            <th>Ảnh</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>

        <?php foreach ($result as $each): ?>
            <tr>
                <td><?php echo $each['id'] ?></td>
                <td><?php echo $each['name'] ?></td>
                <td><?php echo $each['address'] ?></td>
                <td><?php echo $each['phonenumber'] ?></td>
                <td>
                    <img src="<?php echo $each['photos'] ?>" alt="" height = '100'>
                </td>
                <td>
                    <a href="form_update.php?id=<?php echo $each['id'] ?>">Sửa</a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $each['id'] ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <?php for($i=1; $i<=$pages; $i++){ ?>
        <a href="?page=<?php echo $i ?>&$find=<?php echo $find ?>">
            <?php echo $i?>
        </a>
    <?php } ?>
</body>
</html>