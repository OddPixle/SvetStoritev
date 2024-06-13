<?php
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
$test="SELECT * FROM uporabniki";
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
        <h1>Uporabniki</h1>
        <?php
        echo '<table>';
        while($row=mysqli_fetch_array($izpis))
        {
            echo'<tr><td>'.$row['ime'].'</td><td> '.$row['priimek'].'</td><td> '.$row['email'].'</td><td> '.$row['rank'].'</td>';
            echo '<td> <a href="brisi_uporabnik.php?id='.$row['id'].'" class="btn btn-danger btn-sm">Briši</a></th><td><a href="update_uporabnik.php?id='.$row['id'].'" class="btn btn-primary btn-sm">Posodobi</a></td></tr>';
        }
        echo '</table>';
        ?>
        <h1>Vnesite uporabnika</h1>
        <?php 
        if(isset($_GET['error'])){
            if($_GET['error']==0) echo '<div class="error-message">Email že v uporabi.</div>';
            if($_GET['error']==1) echo '<div class="error-message">Gesli se ne ujemata.</div>';
        }
        ?>
        <form action="vnesi_uporabnik.php" method="POST">
            <input type="text" class="form-control" name="ime" placeholder="Ime" required><br>
            <input type="text" class="form-control" name="priimek" placeholder="Priimek" required><br>
            <input type="email" class="form-control" name="email" placeholder="E-mail" required><br>
            <input type="password" class="form-control" name="password0" placeholder="Geslo" required><br>
            <input type="password" class="form-control" name="password1" placeholder="Ponovite geslo" required><br>
            <input type="submit" class="btn" name="sub" value="Registriraj se">
        </form>
        <br>
        <a href="../admin.php" class="btn btn-primary btn-sm">Nazaj</a>
        </div>
    <body>
</html>