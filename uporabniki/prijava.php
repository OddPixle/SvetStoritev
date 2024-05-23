<?PHP
require_once '../baza/baza.php';
include_once '../seja/seja.php';
$email=$_POST['email'];
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
$pass=$_POST['pass'];
if(filter_var($pass)){
$g=password_hash($pass, PASSWORD_DEFAULT);
$sql="SELECT * FROM uporabniki WHERE email='$email'";
$sql1="SELECT * FROM storitveniki WHERE uporabnik_id=(SELECT id FROM uporabniki WHERE email='$email')";
$pass=$_POST['pass'];
$getPass=mysqli_query($link,$sql);
$row=mysqli_fetch_array($getPass);
$getStor=mysqli_query($link,$sql);
    if($getPass){
        if(password_verify($pass,$row['geslo'])){
                $_SESSION['ime']=$row['ime'];
                $_SESSION['priimek']=$row['priimek'];
                $_SESSION['email']=$email;
                //a je ta uporabnik storitvenik
                if(mysqli_num_rows($getStor)===1){
                    $_SESSION['jeStoritvenik']=TRUE;
                }else{
                    $_SESSION['jeStoritvenik']=FALSE;
                }
                header("Refresh:1;URL=../index.php");
        }else{
                echo "Nepravilno podatki";
                header("Refresh:3;URL=prijava_uporbnika.php");
        }
    }else{
        echo 'Napaka pri izvajanju poizvedbe';
    }
}else{
    echo 'Prišlo je do napake pri obliki gesla';
}
}else{
    echo 'Prišlo je do napake pri emailu. (Vnos ni pravilne oblike)';
}
