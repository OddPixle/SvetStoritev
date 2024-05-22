<?PHP
require_once '../baza/baza.php';
$sqlcheck="SELECT email FROM uporabniki";
$i=$_POST['ime'];
$p=$_POST['priimek'];
$e=$_POST['mail'];
$g=$_POST['password0'];
$getEmail=mysqli_query($link,$sqlcheck);
while($row=mysqli_fetch_array($getEmail)){
    if($e==$row['mail']){
        header("Location:registracija_uporabnika.php?error=0");
    }
}
if($g!=$_POST['password1']) header("Location:registracija_uporabnika.php?error=1");
$pass=sha1($g);
$vpis="INSERT INTO uporabniki VALUES (NULL,'$i','$e','$pass','$p')";
mysqli_query($link,$vpis);
$structure = '../slike/'.$e;
if (!mkdir($structure, true)) {
    die('Failed to create directories...');
}
header("Location:prijava_uporabnika.php");