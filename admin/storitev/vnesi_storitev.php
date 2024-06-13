<?PHP
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
        $ime=$_POST['ime'];
        $opis=$_POST['opis'];
        $test="INSERT INTO storitev VALUES (NULL, '$ime', '$opis')";
        mysqli_query($link,$test);
    header('Location: izpis_storitev.php');