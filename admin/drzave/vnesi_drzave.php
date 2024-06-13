<?PHP
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
        $ime=$_POST['ime'];
        $kratica=$_POST['kratica'];
        $test="INSERT INTO drzave VALUES (NULL, '$ime', '$kratica')";
        mysqli_query($link,$test);
    header('Location: izpis_drzav.php');