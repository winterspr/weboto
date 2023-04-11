
<?php
  require '../check_admin_login.php';
  $id = $_POST['id'];
  $name = $_POST['name'];
  $photo_new = $_FILES['photo_new'];
  if($photo_new['size']>0)
 {
    $folder = 'photos/';
    $file_extension = explode('.' , $photo['name'])[1];
    $file_name = time() . '.' . $file_extension;
    $path_file = $folder . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($path_file,PATHINFO_EXTENSION));
     // Check if image file is a actual image or fake image
 if(isset($_POST["submit"])) {
    $check = getimagesize($photo_new["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }
  
  // Check if file already exists
  if (file_exists($path_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($photo_new["tmp_name"], $path_file)) {
      echo "The file ". htmlspecialchars( basename( $photo_new["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
 } else
 {
    $file_name = $_POST['photo_old'];
 }   
 $price = $_POST['price'];
 $description = $_POST['description'];
 $manufactures_id = $_POST['manufactures_id'];

//  $folder = 'photos/';
//  $file_extension = explode('.' , $photo['name'])[1];
//  $file_name = time() . '.' . $file_extension;
//  $path_file = $folder . $file_name;
//  $uploadOk = 1;
//  $imageFileType = strtolower(pathinfo($path_file,PATHINFO_EXTENSION));
 
//  // Check if image file is a actual image or fake image
//  if(isset($_POST["submit"])) {
//    $check = getimagesize($photo["tmp_name"]);
//    if($check !== false) {
//      echo "File is an image - " . $check["mime"] . ".";
//      $uploadOk = 1;
//    } else {
//      echo "File is not an image.";
//      $uploadOk = 0;
//    }
//  }
 
//  // Check if file already exists
//  if (file_exists($path_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//  }
 
//  // Check file size
//  if ($photo["size"] > 500000) {
//    echo "Sorry, your file is too large.";
//    $uploadOk = 0;
//  }
 
//  // Allow certain file formats
//  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//  && $imageFileType != "gif" ) {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//    $uploadOk = 0;
//  }
 
//  // Check if $uploadOk is set to 0 by an error
//  if ($uploadOk == 0) {
//    echo "Sorry, your file was not uploaded.";
//  // if everything is ok, try to upload file
//  } else {
//    if (move_uploaded_file($photo["tmp_name"], $path_file)) {
//      echo "The file ". htmlspecialchars( basename( $photo["name"])). " has been uploaded.";
//    } else {
//      echo "Sorry, there was an error uploading your file.";
//    }
//  }
 
 require '../connect.php';
 $sql = " update products
 set
 name = '$name',
 photo = '$file_name',
 price = '$price',
 description = '$description',
 manufactures_id = '$manufactures_id'
 where id='$id'

";
 // muốn in ảnh ra thì phải chuyển đường dẫn về tên ảnh
 
 mysqli_query($connect, $sql);
 mysqli_close($connect);
 
 