<?php
require_once '../baza/baza.php';
require_once '../seja/seja.php';

if (!isset($_GET['id']) || !isset($_SESSION['email'])) {
    header('Location: ../index.php');
}

$s_id = $_GET['id'];
$krajSql = "SELECT * FROM kraji";
$kraji = mysqli_query($link, $krajSql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Svet storitev</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/poslji_ponudbo.css">
    <link rel="stylesheet" href="../CSS/main.css">
</head>
<body>
    <div class="container-fluid header">
        <div class="row align-items-center">
            <h1 class="col-sm-8">Svet storitev</h1>
            <?php if (isset($_SESSION['ime'])){ ?>
                <div class="col-sm-1 text-center user-info">
                    <? echo $_SESSION['ime'] . ' ' . $_SESSION['priimek']; ?>
                </div>
                <a href="../uporabniki/settings.php" class="col-sm-1 text-center">
                    <img class="settings" src="../uporabljeneSlike/cog.png" alt="Settings">
                </a>
                <a href="../uporabniki/odjava.php" class="btn btn-primary col-sm-1 text-center">Odjava</a>
            <?php }else{
                header('Location: ../index.php');
                } 
            ?>
        </div>
    </div>
    <div class="container">
        <form action="send_ponudbo.php?id=<?PHP echo $s_id ?>" method="POST">
            <div class="form-group">
                <label for="kraj">Kraj:</label>
                <select name="kraj" id="kraj" class="form-control" required>
                    <?php while ($ro = mysqli_fetch_array($kraji)){ ?>
                        <option value="<?= htmlspecialchars($ro['id']) ?>">
                            <?= htmlspecialchars($ro['ime']) ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="opis">Opis dela:</label>
                <input type="text" name="opis" id="opis" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date">Datum:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cena">Cena (€):</label>
                <input type="number" name="cena" id="cena" class="form-control" step="0.01" required>
            </div>
            <input type="submit" name="sub" class="btn btn-custom" value="Pošlji">
        </form>
    </div>
</body>
</html>
