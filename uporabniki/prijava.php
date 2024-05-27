<?PHP
require_once '../baza/baza.php';
include_once '../seja/seja.php';
$e=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$g=filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
if(filter_var($e, FILTER_VALIDATE_EMAIL)){
$sql="SELECT * FROM uporabniki WHERE email='$e'";
$getPass=mysqli_query($link,$sql);
$row=mysqli_fetch_array($getPass);
    if($getPass){
        echo 'GetPass';
        if(password_verify($g, $row['geslo'])){
                $_SESSION['ime']=$row['ime'];
                $_SESSION['priimek']=$row['priimek'];
                $_SESSION['email']=$email;
                header("URL=../index.php");
        }else{
                echo "Nepravilni podatki";
                //header("Refresh:3; URL=prijava_uporabnika.php");
        }
    }else{
        echo 'Napaka pri izvajanju poizvedbe';
        //header("Refresh:3; URL=prijava_uporabnika.php");
    }
}else{
    echo 'Prišlo je do napake pri emailu. (Vnos ni pravilne oblike)';
    //header("Refresh:3; URL=prijava_uporabnika.php");
}
