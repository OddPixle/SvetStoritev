<?php
require_once '../baza/baza.php';
require_once '../seja/seja.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/admin.css">
    <link rel="stylesheet" href="../CSS/main.css">
    <title>Svet storitev</title>
</head>
<body>
<div class="container-fluid header">
        <div class="row align-items-center">
            <h1 class="col-sm-8">Svet storitev</h1>
            <?php
            if(isset($_SESSION['ime'])&&$_SESSION['rank']==='admin'){
                $i=$_SESSION['ime'];
                $p=$_SESSION['priimek'];
                echo '<div class="col-sm-1 text-center user-info">'.$i.' '.$p.'</div>';
                echo '<a href="uporabniki/settings.php" class="col-sm-1 text-center"><img class="settings" src="../uporabljeneSlike/cog.png"></a>';
                echo '<a href="uporabniki/odjava.php" class="btn btn-primary col-sm-1 text-center">Odjava</a>';
            } else {
                header('Location: ../index.php');            
            }
            ?>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center full-height">
        <div class="btn-container">
            <a href="drzave/izpis_drzav.php" class="btn btn-primary">Države</a>
            <a href="storitev/izpis_storitev.php" class="btn btn-primary">Storitve</a>
            <a href="kraji/izpis_krajev.php" class="btn btn-primary">Kraji</a>
            <a href="uporabniki/izpis_uporabnikov.php" class="btn btn-primary">Uporabniki</a>
            <a href="storitveniki/izpis_storitveniki.php" class="btn btn-primary">Storitveniki</a>
            <a href="../index.php" class="btn btn-danger">Nazaj</a>
        </div>
    </div>
</body>
</html>