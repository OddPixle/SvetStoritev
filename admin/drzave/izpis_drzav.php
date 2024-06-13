<?php
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
$test="SELECT * FROM drzave";
$izpis=mysqli_query($link,$test);
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../CSS/izpis.css">
        <title>Svet storitev</title>
    </head>
    <body>
    <div class="container">
        <h1>Države</h1>
        <?php
        echo '<table class="table table-striped">';
        while ($row = mysqli_fetch_array($izpis)) {
            echo '<tr><td>' . $row['ime'] . '</td><td>' . $row['kratica'] . '</td>';
            echo '<td><a href="brisi_drzave.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm">Briši</a></td>';
            echo '<td><a href="update_drzave.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm">Posodobi</a></td></tr>';
        }
        echo '</table>';
        ?>
        <h2>Vstavi</h2>
        <form action="vnesi_drzave.php" method="POST">
            <label for="ime">Ime države:</label>
            <input type="text" name="ime" required>
            <label for="kratica">Kratica države:</label>
            <input type="text" name="kratica" required>
            <input type="submit" name="sub" value="Vstavi">
        </form>
        <br>
        <a href="../admin.php" class="btn btn-primary btn-sm">Nazaj</a>
    </div>
</body>
</html>