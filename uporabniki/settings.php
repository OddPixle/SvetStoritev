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
    <h1>Nastavitve</h1>
    <?PHP
        echo $_SESSION['ime'].' '.$_SESSION['priimek'];
        if($_SESSION['jeStoritvenik']){
        echo '<div><a href="../storitveniki/postanite_storitvenik.php">Postanite storitvenik</a></div>';
        }
    ?>
    <a class="gumb" href="../index.php">Nazaj</a>
</body>
</html>