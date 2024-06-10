<?php
require_once '../baza/baza.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/registracija.css" rel="stylesheet">
    <title>Registracija</title>
</head>
<body>
    <div class="registration-form">
        <h1>Registracija</h1>
        <?php 
        if(isset($_GET['error'])){
            if($_GET['error']==0) echo '<div class="error-message">Email že v uporabi.</div>';
            if($_GET['error']==1) echo '<div class="error-message">Gesli se ne ujemata.</div>';
        }
        ?>
        <form action="registracija.php" method="POST">
            <input type="text" class="form-control" name="ime" placeholder="Ime" required><br>
            <input type="text" class="form-control" name="priimek" placeholder="Priimek" required><br>
            <input type="email" class="form-control" name="email" placeholder="E-mail" required><br>
            <input type="password" class="form-control" name="password0" placeholder="Geslo" required><br>
            <input type="password" class="form-control" name="password1" placeholder="Ponovite geslo" required><br>
            <input type="submit" class="btn" name="sub" value="Registriraj se">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
