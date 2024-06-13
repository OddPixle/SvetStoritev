<?php
require_once '../baza/baza.php';
include_once '../seja/seja.php';
$email=$_POST['email'];
$geslo=$_POST['geslo'];
$e = filter_var($email, FILTER_SANITIZE_EMAIL);
$g = filter_var($geslo, FILTER_SANITIZE_STRING);
if (filter_var($e, FILTER_VALIDATE_EMAIL)) {
    $sql = "SELECT * FROM uporabniki WHERE email='$e'";
    $result = mysqli_query($link, $sql);
    if ($result) {
        $row = mysqli_fetch_array($result);
        if ($row) {
            if (password_verify($g, $row['geslo'])) {
                $_SESSION['ime'] = $row['ime'];
                $_SESSION['priimek'] = $row['priimek'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['rank']=$row['rank'];
                $_SESSION['id']=$row['id'];
                header("Location: ../index.php");
            } else {
                echo "Nepravilni podatki";
                // header("Refresh:3; URL=prijava_uporabnika.php");
            }
        } else {
            echo "Nepravilni podatki";
            // header("Refresh:3; URL=prijava_uporabnika.php");
        }
    } else {
        echo 'Napaka pri izvajanju poizvedbe';
        // header("Refresh:3; URL=prijava_uporabnika.php");
    }
} else {
    echo 'Prišlo je do napake pri emailu. (Vnos ni pravilne oblike)';
    // header("Refresh:3; URL=prijava_uporabnika.php");
}