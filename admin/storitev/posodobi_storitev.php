<?PHP
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
$id=$_GET['id'];
if(isset ($_POST['sub'])){
        $ime=$_POST['ime'];
        $opis=$_POST['opis'];
        $test="UPDATE storitev SET ime='$ime', opis='$opis' WHERE id=$id";
        mysqli_query($link,$test);
     }
header('Location: izpis_storitev.php');