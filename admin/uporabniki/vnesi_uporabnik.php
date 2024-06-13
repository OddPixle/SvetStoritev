<?PHP
require_once '../../baza/baza.php';
require_once '../../seja/seja.php';
if($_SESSION['rank']!='admin')header('Location: ../../index.php'); 
$sqlcheck="SELECT email FROM uporabniki";
$e=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$g=filter_var($_POST['password0'], FILTER_SANITIZE_STRING);
$i=filter_var($_POST['ime'], FILTER_SANITIZE_STRING);
$pr=filter_var($_POST['priimek'], FILTER_SANITIZE_STRING);
$gc=filter_var($_POST['password1'], FILTER_SANITIZE_STRING);
if(filter_var($e, FILTER_VALIDATE_EMAIL)){
    if(filter_var($g)){

$getEmail=mysqli_query($link,$sqlcheck);
while($row=mysqli_fetch_array($getEmail)){
    if($e==$row['email']){
        header("Location:izpis_uporabnikov.php?error=0");
    }
}
if($g!=$gc) header("Location:izpis_uporabnikov.php?error=1");
$pass=password_hash($g, PASSWORD_DEFAULT);
$vpis="INSERT INTO uporabniki (ime, priimek, email, geslo) VALUES ('$i','$pr','$e','$pass')";
mysqli_query($link,$vpis);
header("Location:izpis_uporabnikov.php");

    }else{
        echo 'Prišlo je do napake pri obliki gesla';
    }
}else{
    echo 'Prišlo je do napake pri emailu. (Vnos ni pravilne oblike)';
}