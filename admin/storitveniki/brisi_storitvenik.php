<?PHP
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
$id=$_GET['id'];
$sql1="DELETE FROM slike_storitveniki WHERE storitvenik_id=$id;";
$sql2="DELETE FROM storitveniki WHERE id=$id";
mysqli_query($link,$sql1);
mysqli_query($link,$sql2);

header('Location: izpis_storitveniki.php');