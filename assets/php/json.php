<?php
session_start(); // Starting Session
require "functions.php";
// SQL query to fetch information of registerd users and finds user match.
$username = $_SESSION['login_user'];

$timeline = selectTimelineByUsername($username);
echo json_encode($timeline);

?>