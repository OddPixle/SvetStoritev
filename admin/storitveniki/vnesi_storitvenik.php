<?PHP
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
        $ime=$_POST['ime'];
        $drzava=$_POST['drzava'];
        $test="INSERT INTO storitveniki VALUES (NULL, '$ime', '$drzava')";
        mysqli_query($link,$test);
    header('Location: izpis_krajev.php');