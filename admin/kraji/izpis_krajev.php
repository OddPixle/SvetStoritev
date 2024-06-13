<?php
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
$test="SELECT k.id AS id, k.ime AS ime, d.ime AS drzava FROM kraji k INNER JOIN drzave d ON d.id=k.drzava_id";
$izpis=mysqli_query($link,$test);
$drzSql="SELECT * FROM drzave";
$drzave=mysqli_query($link, $drzSql);
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
        <h1>Kraji</h1>
        <?php
        echo '<table class="table table-striped">';
        while($row=mysqli_fetch_array($izpis))
        {
            echo'<tr><td>'.$row['ime'].'</td><td> '.$row['drzava'];
            echo '<td> <a href="brisi_kraj.php?id='.$row['id'].'" class="btn btn-danger btn-sm">Briši</a></td>
            <td><a href="update_kraj.php?id='.$row['id'].'"class="btn btn-primary btn-sm" >Posodobi</a></td></tr>';
        }
        echo '</table>';
        ?>
        <h2>Vstavi kraj</h2>
        <form action="vnesi_kraj.php" method="POST">
            <label for="ime">Ime kraja:</label><br>
            <input type="text" name="ime" required><br>
            <label for="drzava">Ime drzave:</label><br>
            <select name="drzava" class="form-control mr-2">
            <?PHP while($row=mysqli_fetch_array($drzave)){
                echo "<option value=".$row['id'].">";
                echo $row ['ime'];
                echo "</option>";
            } ?>
            </select><br>
            <input type="submit" name="sub">
        </form>
        <br>
        <a href="../admin.php" class="btn btn-primary btn-sm">Nazaj</a>
        </div>
    <body>
</html>