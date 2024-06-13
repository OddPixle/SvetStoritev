<?PHP
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
$sql="SELECT * FROM uporabniki WHERE id=".$_GET['id'];
$izpis=mysqli_query($link,$sql);
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
    <form action="posodobi_uporabnik.php?id=<?PHP echo $_GET['id']?>" method="post">
        <label for="ime">Ime:</label><br>
        <input type="text" name="ime"  value=<?PHP echo '"'.$row['ime'].'"'?>><br>
        <label for="kratica">Priimek:</label><br>
        <input type="text" name="priimek" value=<?PHP echo '"'.$row['priimek'].'"'?>><br>
        <label for="kratica">Email:</label><br>
        <input type="text" name="email" value=<?PHP echo '"'.$row['email'].'"'?>><br>
        <label for="kratica">Rank:</label><br>
        <input type="text" name="rank" value=<?PHP echo '"'.$row['rank'].'"'?>><br>
    	<input type="submit" name="sub">
    </form>
    <?PHP  }?>
</body>
</html>