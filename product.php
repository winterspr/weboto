<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
        #tong{
            width:  100%;
            height: 700px;
            background: black;
        }

        #tren{
            width: 100%;
            height: 20%;
            background: pink;
        }

        #giua{
            width: 100%;
            height: 72%;
            background: red;
        }

        #duoi{
            width: 100%;
            height: 8%;
            background: purple;
        }
    </style>
</head>
<body>
        <div id = "tong container-fluid">
            <?php require 'menu.php' ?>
            <?php require 'detail.php' ?>
            <?php require 'footer.php' ?>
        </div>

</body>

</html>