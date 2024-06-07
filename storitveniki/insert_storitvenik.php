<?php
require_once '../baza/baza.php';
require_once '../seja/seja.php';

// Get data from POST
$email = $_SESSION['email'];
$stor = $_POST['storitev'];
$kraj = $_POST['kraj'];
$opis = $_POST['opis'];

// Insert into storitveniki table
$insert = "INSERT INTO storitveniki (uporabnik_id, storitev_id, kraj_id, dodatki)
    VALUES ((SELECT id FROM uporabniki WHERE email=?), ?, ?, ?);";
$stmt = mysqli_prepare($link, $insert);
mysqli_stmt_bind_param($stmt, 'siss', $email, $stor, $kraj, $opis);
mysqli_stmt_execute($stmt);
$storitvenik_id = mysqli_insert_id($link);

// Handle image uploads
$target_dir = "../slike/$email/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

foreach ($_FILES as $key => $tmp_name) {
    $target_file = $target_dir . basename($_FILES['slike']['name'][$key]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($tmp_name);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES['slike']['size'][$key] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($tmp_name, $target_file)) {
            // Insert into slike_storitveniki table
            $sql2 = "INSERT INTO slike_storitveniki (filename, storitvenik_id) VALUES (?, ?);";
            $stmt2 = mysqli_prepare($link, $sql2);
            mysqli_stmt_bind_param($stmt2, 'si', $target_file, $storitvenik_id);
            mysqli_stmt_execute($stmt2);

            if (mysqli_stmt_affected_rows($stmt2) > 0) {
                echo "The file " . htmlspecialchars(basename($_FILES['slike']['name'][$key])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

header("Refresh:3;Location:postanite_storitvenik.php");
