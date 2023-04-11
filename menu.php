
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
      *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }


      .info{
        min-height: 30px;
        background-color: crimson;
        width: 100%;
      }

      .nav-bar{
          height: 70px;
          background-color: red;
          width: 100%;
      }

      .navbar-brand{
          padding-left: 83px;
          margin: auto;
      }

      .form-control{
          float: left;
      }
      .fa-solid::after{
          color: white;
          border-color: aliceblue;
          background-color: white;
      }
      .select, row{
          min-height: 40px;
          background-color: red;
          text-align: center;
          margin-top: 10px;
          padding-top: 10px;

      }
      .content{
          height: 300px;
          background-color: crimson;
          text-align: center;
          line-height: normal;
          width: 100%;
      }

      .topic{
          height: 60px;
      }

      .d-flex{
          width: 40%;
          display: flex;
          text-align: center;
          padding-right: 90px;
      }

      .col-2{
          cursor: pointer;
          text-decoration: none;
      }

      .qr{
          position: relative;
      }
    </style>
    <link rel="stylesheet" href="./vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/js/bootstrap.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script> 
    <script src="bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/js/jquery-3.6.0.min.js"></script>
</head>
<body>
<!-- <div id="tren">
    <ol>
        <li>
            <a href="index.php">
                Trang chủ
            </a>
        </li>
        <?php if(empty($_SESSION['id'])) { ?>
            <li>
                <a href="signin.php">Đăng nhập</a>
            </li>
            <li>
                <a href="signup.php">Đăng kí</a>
            </li>
        <?php } else { ?>
            <li>
                Chào <?php echo $_SESSION['name'] ?>;
                <br>
                <a href="view_cart.php">Xem giỏ hàng</a>
                <br>
                <a href="signout.php">Đăng xuất</a>
            </li>
        <?php } ?>
    </ol>
</div> -->
<div id="tren">
      <div class="container text-light d-sm-none d-md-block d-sm-block">
        <div class="row">
          <a class="qr col-2 text-white" href="./qrcode_media3.scdn.vn.png">
            <i class="fa-solid fa-download text-white"></i>
            Tải ứng dụng</a>
          <a class="col-2 text-white">Chăm sóc khách hàng</a>
          <a class="col-2 text-white">Kiểm tra đơn hàng</a>
          <?php if(empty($_SESSION['id'])) { ?>
              <a class="col-2 offset-4" href="signin.php">Đăng nhập</a>
          <?php } else { ?>
                Chào <?php echo $_SESSION['name'] ?>;
                <a href="view_cart.php">Xem giỏ hàng</a>
                <a href="signout.php">Đăng xuất</a>
          <?php } ?>
          
        </div>
      </div>
    </div>
    <!-- info -->
    <div class="nav-bar text-white navbar-light">
      <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid ">
          <a class="navbar-brand text-white" href="index.php">Trang chủ</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                  <i class="fa-solid fa-bars"></i>
                </a>
              </li>
            </ul>
            <form class="d-flex col-10" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </form>
          </div>
        </div>
      </nav>
    </div>
</body>
</html>