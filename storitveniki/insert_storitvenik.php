<?php
require_once '../baza/baza.php';
require_once '../seja/seja.php';

$insert="INSERT INTO storitveniki (uporabnik_id, storitev_id, kraj_id, dodatki)
    VALUES((SELECT id FROM uporabniki WHERE email='".$_SESSION['email']."'), ". $_POST['storitev'].", ". $_POST['kraj'].", '".$_POST['opis']."';";
//mysqli_query($link,$insert);
echo $insert;
//Slike, dobljeno iz https://www.w3schools.com/php/php_file_upload.asp
$target_dir = "../slike/".$_SESSION['email']."/";
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
  echo "<br>Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {


  foreach ($_FILES["slike"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["slike"]["tmp_name"][$key];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["slike"]["name"][$key]);
        if (move_uploaded_file($_FILES["slike"]["tmp_name"], $target_file)) {
          echo "<br> The file ". htmlspecialchars( basename( $_FILES["slike"]["name"])). " has been uploaded.";
      //insertaj link od slik
          $insert_slike="INSERT INTO slike_storitveniki (filename, storitvenik_id)
          VALUES ($target_file, (SELECT id FROM storitveniki WHERE uporabnik_id=(SELECT ID FROM uporabniki WHERE email=".$_POST['email']."))";
          //mysqli_query($link,$insert_slike);
          echo $insert_slike;
        } else {
          echo "<br> Sorry, there was an error uploading your file.";
        };
    }
}
  //header("Refresh:3;URL=index.php");
}
?>