<?php
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
$test="SELECT s.id, s.dodatki, u.email, st.ime AS storitev, k.ime AS kraj FROM storitveniki s INNER JOIN kraji k ON k.id=s.kraj_id
        INNER JOIN storitev st ON st.id=s.storitev_id
        INNER JOIN uporabniki u ON u.id=s.uporabnik_id";
$izpis=mysqli_query($link,$test);
$krajSql="SELECT * FROM kraji";
$kraji=mysqli_query($link, $krajSql);
$storSql="SELECT * FROM storitev";
$storitev=mysqli_query($link, $storSql);
$upoSql="SELECT * FROM uporabniki";
$uporabniki=mysqli_query($link, $upoSql);
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
        <h1>Storitveniki</h1>
        <?php
        echo '<table class="table table-striped">';
        while($row=mysqli_fetch_array($izpis))
        {
            echo'<tr><td>'.$row['email'].'</td><td> '.$row['kraj'].'</td><td> '.$row['storitev'].'</td><td> '.$row['dodatki'].'</td>';
            echo '<td> <a href="brisi_storitvenik.php?id='.$row['id'].'" class="btn btn-danger btn-sm">Briši</a></td>
            <td><a href="update_storitvenik.php?id='.$row['id'].'"class="btn btn-primary btn-sm" >Posodobi</a></td></tr>';
        }
        echo '</table>';
        ?>
        <a href="../admin.php" class="btn btn-primary btn-sm">Nazaj</a>
        </div>
    <body>
</html>