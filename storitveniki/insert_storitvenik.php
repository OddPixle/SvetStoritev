<?php
require_once '../baza/baza.php';
require_once '../seja/seja.php';
//Dobi stvari iz POST. Storitev in kraj je že kot id
$email=$_SESSION['email'];
$stor=$_POST['storitev'];
$kraj=$_POST['kraj'];
$opis=$_POST['opis'];
$insert="INSERT INTO storitveniki (uporabnik_id, storitev_id, kraj_id, dodatki)
    VALUES((SELECT id FROM uporabniki WHERE email='$email'), $stor, $kraj, '$opis');";
echo $insert;

mysqli_query($link,$insert);
//Slike, dobljeno iz https://www.w3schools.com/php/php_file_upload.asp
$target_dir = "../slike/$email/";
$target_file = $target_dir . basename($_FILES["slike"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["slike"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["slike"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
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
  header("Refresh:3;Location:postanite_storitvenik.php");   
// if everything is ok, try to upload file
} else {

  $sql2="INSERT INTO slike_storitveniki (filename, storitvenik_id)
VALUES ($target_file, (SELECT id FROM storitveniki s INNER JOIN uporabniki u ON u.id=s.storitvenik_id WHERE email='$email'));";
mkdir($target_dir);
  if (move_uploaded_file($_FILES["slike"]["tmp_name"], $target_file)&&mysqli_query($link,$sql2)&&mysqli_query($link,$insert)  ) {
    header("Location:settings.php"); 

  } else {
    echo "Sorry, there was an error uploading your file.";
    header("Refresh:3;Location:postanite_storitvenik.php");   
  }
}
