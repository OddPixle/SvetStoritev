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
    <form action="insert_storitvenik.php" method="POST">
        
        <select name="kraj" required>
            <?PHP 
                while($row=mysqli_fetch_array($kraji)){
                echo "<option value=".$row['id'].">";
                echo $row ['ime'];
                echo "</option>";
            }?>
        </select>

        <select name="storitev" required>
            <?PHP
            while($row=mysqli_fetch_array($stor)){
                echo "<option value=".$row['id'].">";
                echo $row ['ime'];
                echo "</option>";
            }
            ?>
        </select>

        <label for="opis">Dodatne stvari o sebi</label>
        <textarea id="opis" name="opis" maxlength="2000">
        </textarea>

        <label for="files">Naloži slike:</label>
        <input type="file" id="files" name="files" multiple><br><br>
        <input type="submit" value="Naprej">
    </form>

</body>
</html>