<?php
$mysqli = mysqli_init();
if (!$mysqli) {
    die('mysqli_init failed');
}
$env='';
//$env ='production';
if($env=='production') {
    $user = 'gennurys_root';
    $password = "P@ssword";
    $db = 'gennurys_Life_line_2';
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