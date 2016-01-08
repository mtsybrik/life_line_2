<?php
$mysqli = mysqli_init();
if (!$mysqli) {
    die('mysqli_init failed');
}
$env='';
//$env ='production';
if($env=='production') {
    $user = 'nevaczsj_root';
    $password = "P@ssword";
    $db = 'nevaczsj_life_line';
    $host = 'localhost';
    $port = 3306;
}
else{
    $user = 'root';
    $password = "root";
    $db = 'life_line';
    $host = 'localhost';
    $port = 3307;
}
if (!$mysqli->real_connect($host, $user, $password, $db, $port)){
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
}
?>