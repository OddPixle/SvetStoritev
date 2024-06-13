<?PHP
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
$id=$_GET['id'];
if(isset ($_POST['email'])){
        $uId=$_POST['email'];
        $sId=$_POST['storitev'];
        $kId=$_POST['kraj'];
        $dodatki=$_POST['dodatki'];
        $test="UPDATE storitveniki SET uporabnik_id='$uId', storitev_id=$sId, kraj_id=$kId, dodatki='$dodatki' WHERE id=$id";
        mysqli_query($link,$test);
     }
header('Location: izpis_storitveniki.php');