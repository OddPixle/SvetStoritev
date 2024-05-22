<?PHP
include_once '../baza/baza.php';
include_once '../seja/seja.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Svet storitev</title>
</head>
<body>
    <?PHP
        echo $_SESSION['ime'].' '.$_SESSION['priimek'];
        echo '<div><a href="../storitveniki/postanite_storitvenik.php">Postanite storitvenik</a></div>';
    ?>
</body>
</html>