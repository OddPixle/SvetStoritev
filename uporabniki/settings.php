<?php
include_once '../baza/baza.php';
include_once '../seja/seja.php';

if (!isset($_SESSION['ime'])) {
    header('Location: ../index.php');
    exit();
}

$id = $_SESSION['id'];
$email = $_SESSION['email'];
$sql = "SELECT * FROM storitveniki WHERE uporabnik_id = (SELECT id FROM uporabniki WHERE email = '$email')";
$result = mysqli_query($link, $sql);
$sqlUpNar = "SELECT k.ime AS kraj, u.ime, u.priimek, n.opis, n.cena, n.cas, n.sprejeto 
             FROM narocila n 
             INNER JOIN storitveniki s ON s.id = n.storitvenik_id
             INNER JOIN uporabniki u ON u.id = s.uporabnik_id
             INNER JOIN kraji k ON k.id = n.kraj_id 
             WHERE n.uporabnik_id = $id";
$upNar = mysqli_query($link, $sqlUpNar);
if (mysqli_num_rows($result) == 1) {
    $sqlStor = "SELECT s.id 
    FROM storitveniki s 
    INNER JOIN uporabniki u ON u.id = s.uporabnik_id 
    WHERE email = '$email'";
$rez = mysqli_query($link, $sqlStor);
$a = mysqli_fetch_array($rez);
$s_id = $a['id'];

$sqlStorNar = "SELECT n.id, k.ime AS kraj, u.ime, u.priimek, n.opis, n.cena, n.cas, n.sprejeto 
       FROM narocila n 
       INNER JOIN uporabniki u ON u.id = n.uporabnik_id
       INNER JOIN kraji k ON k.id = n.kraj_id 
       WHERE n.storitvenik_id = $s_id";
$stor = mysqli_query($link, $sqlStorNar);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Svet storitev</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        .header {
            background-color: #fd7e14;
            color: white;
            padding: 10px 0;
            margin-bottom: 20px;
        }
        .header h1 {
            margin-left: 15px;
        }
        .container {
            max-width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 2px solid #fd7e14;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #fd7e14;
            border-color: #fd7e14;
            color: white;
        }
        .btn-custom:hover {
            background-color: #e76d10;
            border-color: #e76d10;
        }
    </style>
</head>
<body>
    <div class="container-fluid header">
        <div class="row align-items-center">
            <h1 class="col-sm-8">Svet storitev</h1>
            <div class="col-sm-1 text-center">
                <?= htmlspecialchars($_SESSION['ime'] . ' ' . $_SESSION['priimek']) ?>
            </div>
            <a href="odjava.php" class="btn btn-primary col-sm-1 text-center">Odjava</a>
        </div>
    </div>

    <div class="container">
        <h1>Nastavitve</h1>
        <?php

        if (mysqli_num_rows($result) == 0) {
            echo '<div class="alert alert-info" role="alert">';
            echo '<a href="../storitveniki/postanite_storitvenik.php" class="btn btn-custom">Postanite storitvenik</a>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-info" role="alert">';
            echo '<a href="../storitveniki/izbriši_storitvenik.php" class="btn btn-custom">Izbrišite storitvenika</a>';
            echo '</div>';
        }
        ?>

        <div class="table-container">
            <h1>Vaša naročila</h1>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Ime</th>
                        <th>Priimek</th>
                        <th>Kraj</th>
                        <th>Opis</th>
                        <th>Cena</th>
                        <th>Čas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($upNar)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['ime']); ?></td>
                            <td><?= htmlspecialchars($row['priimek']); ?></td>
                            <td><?= htmlspecialchars($row['kraj']); ?></td>
                            <td><?= htmlspecialchars($row['opis']); ?></td>
                            <td><?= htmlspecialchars($row['cena']); ?></td>
                            <td><?= htmlspecialchars($row['cas']); ?></td>
                            <td>
                                <?php
                                switch ($row['sprejeto']) {
                                    case 0:
                                        echo 'Zavrnjeno';
                                        break;
                                    case 1:
                                        echo 'Sprejeto';
                                        break;
                                    case 2:
                                        echo 'Še v obdelavi';
                                        break;
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?PHP if(mysqli_num_rows($result) == 1):?>
            <h1>Naročila za storitve</h1>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Ime</th>
                        <th>Priimek</th>
                        <th>Kraj</th>
                        <th>Opis</th>
                        <th>Cena</th>
                        <th>Čas</th>
                        <th>Akcija</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($stor)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['ime']); ?></td>
                            <td><?= htmlspecialchars($row['priimek']); ?></td>
                            <td><?= htmlspecialchars($row['kraj']); ?></td>
                            <td><?= htmlspecialchars($row['opis']); ?></td>
                            <td><?= htmlspecialchars($row['cena']); ?></td>
                            <td><?= htmlspecialchars($row['cas']); ?></td>
                            <td>
                                <?PHP if($row['sprejeto']==2){?>
                                <form action="posodobi_status.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']); ?>">
                                    <button type="submit" name="action" value="accept" class="btn btn-success btn-sm">Sprejmi</button>
                                    <button type="submit" name="action" value="decline" class="btn btn-danger btn-sm">Zavrni</button>
                                </form>
                                <?php }else if($row['sprejeto']==1){ ?>
                                    Sprejeto
                                <?php }else if($row['sprejeto']==0){ ?>
                                    Zavrnjeno
                            <?php } ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?PHP endif?>
        </div>
        <a class="btn btn-custom" href="../index.php">Nazaj</a>
    </div>
</body>
</html>
