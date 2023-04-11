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
        include '../menu.php'
    ?>
    <form action="proccess_insert.php" method='post'>
        name
        <input type="text" name='name'>
        <br>
        address
        <input type="text" name='address'>
        <br>
        phonenumber
        <input type="text" name='phonenumber'>
        <br>
        photo
        <input type="text" name='photos'>
        <br>
        <button>
            Thêm
        </button>
    </form>

</body>
</html>