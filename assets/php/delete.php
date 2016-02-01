<?php
session_start(); // Starting Session
require "connect.php";

$userid="";

// SQL query to fetch information of registerd users and finds user match.
$username = $_SESSION['login_user'];
if(isset($_POST['eventid'])){
    $eventid = $_POST['eventid'];
    $eventid = preg_replace('/\D/', '', $eventid); // Get digit out of hash
}
// DB query to get userid by username
if($userinfo = $mysqli->query("SELECT * FROM user WHERE username = '$username'"))  //Выборка данных пользователя для дальнейшего использования
{
    $userinfo = $userinfo->fetch_assoc();
    $userid = $userinfo["userid"];// ID of the user that we will use to query all other data
}

// DB query to get last eventid by username
$query = "DELETE FROM events WHERE userid='$userid' AND event_user_id='$eventid'";
$mysqli->query($query);


unset($_POST["eventid"]);
// Closing Connection
$mysqli->close();