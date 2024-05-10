<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Svet storitev</title>
</head>
<body>
    <?PHP
    if(!isset($_SESSION['ime'])){
        echo $_SESSION['ime'].' '.$_SESSION['priimek'];
        echo '<div><a href="postanite_storitvenik.php">Postanite storitvenik</a></div>';
    }else{
        echo '<a href=prijava_uporabnika.php> Prijavite se </a>';
    }
    ?>
</body>
</html>