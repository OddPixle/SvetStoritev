<?php
require_once '../baza/baza.php';
include_once '../seja/seja.php';
$insert="INSERT INTO storitveniki (uporabnik_id, storitev_id, kraj_id, dodatki)
    VALUES((SELECT id FROM uporabniki WHERE email=".$_SESSION['email']."), ". $_POST['storitev'].", ". $_POST['kraj'].", '".$_POST['opis']."'";
mysqli_query($link,$insert);

//Slike, dobljeno iz https://www.w3schools.com/php/php_file_upload.asp
$target_dir = "../slike/".$_SESSION['emial']."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
if ($_FILES["fileToUpload"]["size"] > 500000) {
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
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//insertaj link od slik
    $insert_slike="INSERT INTO slike_storitveniki (filename, storitvenik_id)
    VALUES ($target_file, (SELECT id FROM storitveniki WHERE uporabnik_id=(SELECT ID FROM uporabniki WHERE email=".$_POST['email']."))";
    mysqli_query($link,$insert_slike);
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>