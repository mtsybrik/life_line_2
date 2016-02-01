<?php

session_start(); // Starting Session
require "functions.php";
// SQL query to fetch information of registerd users and finds user match.
$username = $_SESSION['login_user'];
$eventid = $_POST['eventid'];

$form = eventUpdateInfo($username,$eventid);
echo json_encode($form);
unset($_POST["eventid"]);
?>