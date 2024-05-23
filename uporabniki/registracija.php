<?PHP
require_once '../baza/baza.php';
$sqlcheck="SELECT email FROM uporabniki";
$i=$_POST['ime'];
$p=$_POST['priimek'];
$e=$_POST['mail'];
$g=$_POST['password0'];
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    if(filter_var($pass)){

$getEmail=mysqli_query($link,$sqlcheck);
while($row=mysqli_fetch_array($getEmail)){
    if($e==$row['mail']){
        header("Location:registracija_uporabnika.php?error=0");
    }
}
if($g!=$_POST['password1']) header("Location:registracija_uporabnika.php?error=1");
$pass=password_hash($pass, PASSWORD_DEFAULT);
$vpis="INSERT INTO uporabniki VALUES (NULL,'$i','$e','$pass','$p')";
mysqli_query($link,$vpis);
header("Location:prijava_uporabnika.php");

    }else{
        echo 'Prišlo je do napake pri obliki gesla';
    }
}else{
    echo 'Prišlo je do napake pri emailu. (Vnos ni pravilne oblike)';
}