<?php
require_once '../baza/baza.php';
require_once '../seja/seja.php';

if (isset($_POST['action'])) {
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action == 'accept') {
        $status = 1;
    } elseif ($action == 'decline') {
        $status = 0;
    } else {
        header('Location: ../index.php');
    }

    $updateSql = "UPDATE narocila SET sprejeto = $status WHERE id = $id";
    mysqli_query($link, $updateSql);
    header('Location: settings.php');
    
} else {
    header('Location: ../index.php');
    exit();
}
?>
