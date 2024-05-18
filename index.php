<?PHP
include_once 'seja/seja.php';
include_once 'baza/baza.php';

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
                <select id="serviceType" name="storitev">
                    <option value="vodovodar">Vodovodarji</option>
                    <option value="electricar">Elektro inštalaterji</option>
                    <option value="keramicar">Keramičarji</option>
                </select>
                <input type="submit" value="Išči">
                </form>
        </div>
        <?PHP
        if(isset($POST['storitev']));
        $sql="SELECT * FROM storitveniki st
              INNER JOIN storitev s ON s.id=st.storitev_id
              INNER JOIN kraji k ON k.id=st.kraj_id
              INNER JOIN uporabniki u ON u.id=st.uporabnik_id
              WHERE s.ime=lower($POST ['storitev'])";
        for($i=0;$i<10;$i++){
            echo '<div class="rezultati">';

            echo '</div>';
        }
        ?>
    <body>
</html>