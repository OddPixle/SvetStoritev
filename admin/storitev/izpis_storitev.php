<?php
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
$test="SELECT * FROM storitev";
$izpis=mysqli_query($link,$test);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Svet storitev</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="../../CSS/izpis.css">
    </head>
    <body>
    <div class="container">
        <h1>Storitve</h1>
        <?php
        echo '<table>';
        while($row=mysqli_fetch_array($izpis))
        {
            echo'<tr><td>'.$row['ime'].'</td><td> '.$row['opis'];
            echo '<td> <a href="brisi_storitev.php?id='.$row['id'].'" class="btn btn-danger btn-sm">Briši</a></th><td><a href="update_storitev.php?id='.$row['id'].'" class="btn btn-primary btn-sm">Posodobi</a></td></tr>';
        }
        echo '</table>';
        ?>
        <h2>Vstavi storitev</h2>
        <form action="vnesi_storitev.php" method="POST">
            <label for="ime">Ime storitve:</label><br>
            <input type="text" name="ime" required><br>
            <label for="ime">Opis storitve:</label><br>
            <input type="text" name="opis" required><br>
            <input type="submit" name="sub">
        </form>
        <br>
        <a href="../admin.php" class="btn btn-primary btn-sm">Nazaj</a>
        </div>
    <body>
</html>