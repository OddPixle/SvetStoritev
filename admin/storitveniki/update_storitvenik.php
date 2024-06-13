<?PHP
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
$id=$_GET['id'];
$test="SELECT s.id, st.id AS storitevId, u.id AS uporabnikId, k.id AS krajId, s.dodatki, u.email, st.ime AS storitev, k.ime AS kraj FROM storitveniki s INNER JOIN kraji k ON k.id=s.kraj_id
        INNER JOIN storitev st ON st.id=s.storitev_id
        INNER JOIN uporabniki u ON u.id=s.uporabnik_id WHERE s.id=$id";
$izpis=mysqli_query($link,$test);
$krajSql="SELECT * FROM kraji";
$kraji=mysqli_query($link, $krajSql);
$storSql="SELECT * FROM storitev";
$storitev=mysqli_query($link, $storSql);
$upoSql="SELECT * FROM uporabniki";
$uporabniki=mysqli_query($link, $upoSql);
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
        <form action="posodobi_storitvenik.php?id=<?PHP echo $_GET['id']?>" method="POST">
            <label for="email" >Email:</label><br>
            <select name="email" class="form-control mr-2">
            <?PHP 
            echo "<option value=".$row['uporabnikId'].">";
            echo $row ['email'];
            echo "</option>";
            while($ro=mysqli_fetch_array($uporabniki)){
                echo "<option value=".$ro['id'].">";
                echo $ro ['email'];
                echo "</option>";
            } ?>
            </select><br>
            <label for="kraj" >Kraj:</label><br>
            <select name="kraj" class="form-control mr-2">
            <?PHP 
            echo "<option value=".$row['krajId'].">";
            echo $row ['kraj'];
            echo "</option>";
            while($ro=mysqli_fetch_array($kraji)){
                echo "<option value=".$ro['id'].">";
                echo $ro ['ime'];
                echo "</option>";
            } ?>
            </select><br>
            <label for="storitev" >Storitev:</label><br>
            <select name="storitev" class="form-control mr-2">
            <?PHP 
            echo "<option value=".$row['storitevId'].">";
            echo $row ['storitev'];
            echo "</option>";
            while($ro=mysqli_fetch_array($storitev)){
                echo "<option value=".$ro['id'].">";
                echo $ro ['ime'];
                echo "</option>";
            } ?>
            </select><br>
            <label for="dodatki">Opis:</label><br>
            <input type="text" name="dodatki" value=<?PHP echo '"'.$row['dodatki'].'"'?>><br>
            <input type="submit" name="sub">
        </form>

    <?PHP  }?>
</body>
</html>