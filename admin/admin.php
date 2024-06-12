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
    <link rel="stylesheet" href="../CSS/main.css">
    <title>Svet storitev</title>
</head>
<body>
<div class="container-fluid header">
        <div class="row align-items-center">
            <h1 class="col-sm-8">Svet storitev</h1>
            <?php
            if(isset($_SESSION['ime'])){
                $i=$_SESSION['ime'];
                $p=$_SESSION['priimek'];
                echo '<div class="col-sm-1 text-center user-info">'.$i.' '.$p.'</div>';
                echo '<a href="uporabniki/settings.php" class="col-sm-1 text-center"><img class="settings" src="../uporabljeneSlike/cog.png"></a>';
                echo '<a href="uporabniki/odjava.php" class="btn btn-primary col-sm-1 text-center">Odjava</a>';
            } else {
                echo '<a href="uporabniki/prijava_uporabnika.php" class="btn btn-primary col-sm-3">Prijavite se</a>';
            }
            ?>
        </div>
    </div>
    
</body>
</html>