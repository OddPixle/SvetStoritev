<?PHP
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
$id=$_GET['id'];
$sql="DELETE FROM uporabniki WHERE id=$id";
mysqli_query($link,$sql);
header('Location: izpis_uporabnikov.php');