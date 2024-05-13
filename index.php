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
        <div class="upime">
        <?PHP
        //username
        if(isset($_SESSION['ime']) AND ($_SESSION['priimek'])){
            $i=$_SESSION['ime'];
            $p=$_SESSION['priimek'];
            echo '<div>'.$i.' '.$p.'</div>';
            echo '<a href="uporabniki/odjava.php">Odjava</a>';
        }else{
            echo '<a href="uporabniki/prijava_uporabnika.php">Priajvite se</a>';
        }
        ?>
        </div>
        </div>
        <div class="narocanje">
            <form action="#" method="post">
                <label for="serviceType">Kaj iščete danes:</label>
                <select id="serviceType" name="serviceType">
                    <option value="plumbing">Vodovodarji</option>
                    <option value="electrical">Elektro inštalaterji</option>
                    <option value="tiling">Keramičarji</option>
                </select>
                </form>
        </div>
        
    <body>
</html>