<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>.error {color : red}</style>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    ?>
    <h1>Signup</h1>
    <form action="proccess_signup.php" method="post">
    <h2>Tên: </h2>
    <div class="form-field">
        <input type="text" class="form-input" placeholder=" " name="name">
        <label for="Vui lòng nhập tên" class="form-label">Ten</label>
    </div>

    <h2>Email:</h2>
    <div class="form-field">
        <input type="text" class="form-input" placeholder=" " name="email">
        <label for="Vui lòng nhập email" class="form-label">Email</label>
    </div>
    <h2>Password:</h2>
    <div class="form-field">
        <input type="password" class="form-input" placeholder=" " name="password">
        <label for="Vui lòng nhập password" class="form-label">Password</label>
    </div>
    <h2>SDt</h2>
    <div class="form-field">
        <input type="text" class="form-input" placeholder=" " name="phonenumber">
        <label for="Vui lòng nhập số điện thoại" class="form-label">phonenumber</label>
    </div>
    <h2>Địa chỉ</h2>
    <div class="form-field">
        <input type="password" class="form-input" placeholder=" " name="address">
        <label for="Vui lòng nhập địa chỉ" class="form-label">address</label>
    </div>
    <button>Signup</button>

    
    <!-- </form>
    <form action="proccess_signup.php" method="post">
        Tên
        <input type="text" name="name">
        <br>
        email
        <input type="email" name="email">
        <br>
        Mật khẩu
        <input type="password" name="password">
        <br>
        SDT
        <input type="text" name="phonenumber">
        <br>
        Địa chỉ
        <input type="text" name="address">
        <br>
        <button>Đăng kí</button>
    </form> -->
</body>
</html>