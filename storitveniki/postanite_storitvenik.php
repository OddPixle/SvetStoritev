<?php
require_once '../baza/baza.php';
include_once '../seja/seja.php';

$sql ="SELECT id, ime FROM storitev ORDER BY ime;";
$sql1 ="SELECT id, ime FROM kraji ORDER BY ime;";
$stor = mysqli_query($link, $sql);
$kraji = mysqli_query($link, $sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Svet storitev</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/postanite_storitvenik.css">
</head>
<body>
    <div class="container">
        <h1>Registracija storitvenika</h1>
        <form action="insert_storitvenik.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="kraj">Kraj</label>
                <select name="kraj" id="kraj" class="form-control" required>
                    <?php 
                    while($row = mysqli_fetch_array($kraji)){
                        echo "<option value=".$row['id'].">";
                        echo $row['ime'];
                        echo "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="serviceType">Storitev</label>
                <select id="serviceType" name="storitev" class="form-control" required>
                    <?php
                    while($row = mysqli_fetch_array($stor)){
                        echo "<option value=".$row['id'].">";
                        echo $row['ime'];
                        echo "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="opis">Dodatne stvari o sebi</label>
                <textarea id="opis" name="opis" class="form-control" maxlength="2000" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="slike">Naloži slike</label>
                <input type="file" id="slike" name="slike[]" class="form-control-file" multiple>
            </div>
            <button type="submit" class="btn btn-custom btn-block">Naprej</button>
        </form>
    </div>
</body>
</html>
