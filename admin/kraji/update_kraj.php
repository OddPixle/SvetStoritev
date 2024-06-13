<?PHP
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
$id=$_GET['id'];
$test="SELECT k.id AS id, k.ime AS ime, d.ime AS drzava FROM kraji k INNER JOIN drzave d ON d.id=k.drzava_id WHERE k.id=$id";
$izpis=mysqli_query($link,$test);
$drzSql="SELECT * FROM drzave";
$drzave=mysqli_query($link, $drzSql);
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../CSS/izpis.css">
    <title>Svet storitev</title>
</head>
<body>
    <?PHP while($row=mysqli_fetch_array($izpis)){?>
        <form action="vnesi_kraj.php" method="POST">
            <label for="ime" >Ime kraja:</label><br>
            <input type="text" name="ime" value=<?PHP echo '"'.$row['ime'].'"'?> required><br>
            <label for="drzava">Ime drzave:</label><br>
            <select name="drzava">
            <?PHP while($row=mysqli_fetch_array($drzave)){
                echo "<option value=".$row['id'].">";
                echo $row ['ime'];
                echo "</option>";
            } ?>
            </select><br>
            <input type="submit" name="sub">
        </form>

    <?PHP  }?>
</body>
</html>