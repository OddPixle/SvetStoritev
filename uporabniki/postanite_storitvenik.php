<?PHP
require_once '../baza/baza.php';
$sql ="SELECT ime FROM storitev ORDER BY ime;";
$sql1 ="SELECT ime FROM kraji ORDER BY ime;";
$stor=mysqli_query($link,$sql);
$kraji=mysqli_query($link,$sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Svet storitev</title>
</head>
<body>
    <form>
        <select name="kraji">
            <?PHP 
                while($row=mysqli_fetch_array($kraji)){
                echo "<option>";
                echo $row ['ime'];
                echo "</option>";
            }?>
        </select>
        <select name="storitev">
            <?PHP
            while($row=mysqli_fetch_array($stor)){
                echo "<option>";
                echo $row ['ime'];
                echo "</option>";
            }
            ?>
        </select>
    </form>
</body>
</html>