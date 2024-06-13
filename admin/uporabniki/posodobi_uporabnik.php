<?PHP
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
$id=$_GET['id'];
if(isset ($_POST['sub'])){
        $ime=$_POST['ime'];
        $priimek=$_POST['priimek'];
        $email=$_POST['email'];
        $rank=$_POST['rank'];
        $test="UPDATE uporabniki SET ime='$ime', priimek='$priimek', email='$email', rank='$rank' WHERE id=$id";
        mysqli_query($link,$test);
     }
header('Location: izpis_uporabnikov.php');