<?PHP
require_once '../seja/seja.php';
require_once '../baza/baza.php';
if(isset($_POST['sub'])){
$userEmail=$_SESSION['email'];
$sqlUser="SELECT id FROM uporabniki WHERE email='$userEmail'";
$user=mysqli_query($link, $sqlUser);
$row=mysqli_fetch_array($user);
$userId=$row['id'];
$storitvenikId=$_GET['id'];
$krajId=$_POST['kraj'];
$opis=$_POST['opis'];
$date=$_POST['date'];
$datum=date('Y-m-d H:i:s', strtotime($date));
$cena=$_POST['cena'];
$sql="INSERT INTO narocila (uporabnik_id, storitvenik_id, kraj_id, opis, cena, cas, sprejeto) VALUES ($userId, $storitvenikId, $krajId, '$opis', $cena, '$datum',2)";
echo $sql;
mysqli_query($link,$sql);
header('Location: ../uporabniki/settings.php');
}else{
    header('Location: ../index.php');
}