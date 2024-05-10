<?php
    //Povezava na bazo
$host="localhost";
$user="root";
$password="";
$link=mysqli_connect($host,$user,$password)
    or die("Ne morem do strežnika");

$db =mysqli_select_db($link, "svetstoritev")
    or die("Baza ni dostopna.");
    //za našo pisavo dodamo
    mysqli_set_charset($link, "utf8");


