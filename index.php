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
        echo '<div class="username">';
        if(isset($_SESSION['ime']) AND ($_SESSION['priimek'])){
            $i=$_SESSION['ime'];
            $p=$_SESSION['priimek'];
            echo '<div>'.$i.' '.$p.'</div>';
            echo '<a href="uporabniki/odjava.php">Odjava</a>';
        }else{
            echo '<a href="uporabniki/prijava_uporabnika.php">Priajvite se</a>';
        }
        echo '</div>';
        ?>
        </div>
        
    <body>
</html>