<?PHP
require_once '../baza/baza.php';
include_once '../seja/seja.php';
$mail=$_POST['email'];
$pass=$_POST['pass'];
$g=sha1($pass);
$sql="SELECT * FROM uporabniki WHERE email='$mail' AND geslo='$g'";
$sql1="SELECT * FROM storitveniki WHERE uporabnik_id=(SELECT id FROM uporabniki WHERE email='$mail')";
$pass=$_POST['pass'];
$getPass=mysqli_query($link,$sql);
$getStor=mysqli_query($link,$sql);
    if($getPass){
        if(mysqli_num_rows($getPass)===1){
            $row=mysqli_fetch_array($getPass);
                $_SESSION['ime']=$row['ime'];
                $_SESSION['priimek']=$row['priimek'];
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