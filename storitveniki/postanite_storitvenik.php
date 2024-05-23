<?PHP
require_once '../baza/baza.php';
include_once '../seja/seja.php';

$sql ="SELECT id, ime FROM storitev ORDER BY ime;";
$sql1 ="SELECT id, ime FROM kraji ORDER BY ime;";
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
    <form action="insert_storitvenik.php" method="POST" enctype="multipart/form-data">
        
        <select name="kraj" required>
            <?PHP 
                while($row=mysqli_fetch_array($kraji)){
                echo "<option value=".$row['id'].">";
                echo $row ['ime'];
                echo "</option>";
            }?>
        </select>
<br>
        <select name="storitev" required>
        <select id="serviceType" name="storitev">
                    <option value="vodovodar">Vodovodar/ka</option>
                    <option value="keramicar">Keramičar/ka</option>
                </select>
        </select>
<br>
        <label for="opis">Dodatne stvari o sebi</label><br>
        <textarea id="opis" name="opis" maxlength="2000">
        </textarea>
<br>
        <label for="slike">Naloži slike:</label><br>
        <input type="file" id="slike" name="slike" multiple><br><br>
        <br>
        <input type="submit" value="Naprej">
    </form>

</body>
</html>