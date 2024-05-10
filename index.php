<?PHP
include_once 'seja/seja.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Svet storitev</title>
        <link rel="stylesheet" href="CSS/index.css">
    </head>
    <body>
        <div class="header">
        <h1>Svet storitev</h1>
        <?PHP
        //username
        if(isset($_SESSION['ime']) AND ($_SESSION['priimek'])){
            $i=$_SESSION['ime'];
            $p=$_SESSION['priimek'];
            echo '<div class="user"">'.$i.' '.$p.'</div>';
        }else{
            echo '<a href="uporabniki/prijava_uporabnika.php" class="user">Priajvite se</a>';
        }
        ?>
        <div>
            <a href=""><img  src=""></a>
        </div>
        </div>
        <a href="uporabniki/odjava.php">Odjava</a>
    <body>
</html>