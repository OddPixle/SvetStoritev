<?php
require_once '../baza/baza.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
</head>
<body>
    <h1>Registracija</h1>
    <?php 
    if(isset($_GET['error'])){
    if($_GET['error']==0) echo 'Email že v uporabi.';
    if($_GET['error']==1) echo 'Gesli se ne ujemata.';
    }
    ?>
    <form action="registracija.php" method="POST">
        <input type="text" name="ime" placeholder="Ime" required><br>
        <input type="text" name="priimek" placeholder="Priimek" required><br>
        <input type="email" name="email" placeholder="E-mail" required><br>
        <input type="password" name="password0" placeholder="Geslo" required><br>
        <input type="password" name="password1" placeholder="Ponovite geslo" required><br>
            <input type="submit" name="sub" value="Registriraj se">
    </form>
</body>
</html>