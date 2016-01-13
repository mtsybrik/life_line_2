<?php

//Variable declaration
$userinfo = $userid = $uploadurl= $month = $day = $year = $headline = $text = $start_date = $unique_id ='';
$evenid = array();


session_start(); // Starting Session
if(empty($_SESSION['login_user'])){
    header("Location: login.php");
    exit;}
require('connect.php');
//Receive title & text & date
$headline = $_POST['title'];
$headline = $mysqli->real_escape_string($headline);
$text = $_POST['body'];

$text = $mysqli->real_escape_string($text);

$start_date = $_POST['start_date'];

if($start_date){
    $start_date = date_parse($start_date);
    $month = $start_date['month'];
    $day = $start_date['day'];
    $year = $start_date['year'];
}

// SQL query to fetch information of registerd users and finds user match.
$username = $_SESSION['login_user'];

// DB query to get userid by username
if($userinfo = $mysqli->query("SELECT * FROM user WHERE username = '$username'"))  //Выборка данных пользователя для дальнейшего использования
{
    $userinfo = $userinfo->fetch_assoc();
    $userid = $userinfo["userid"];// ID of the user that we will use to query all other data
}


if (isset($_FILES["file"]["name"]) && $_FILES["file"]["name"] != ''){
    $uploaddir = 'assets/img/uploads/';
    $uploadfile = '../../' . $uploaddir . basename($_FILES["file"]["name"]);
    $uploadurl = $uploaddir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $uploadfile);
//    echo "File is valid, and was successfully uploaded.";
    $uploadurl = $mysqli->real_escape_string($uploadurl);

}

// DB query to get last eventid by username
if($userinfo = $mysqli->query("SELECT * FROM events WHERE userid = '$userid'"))  //Выборка данных пользователя для дальнейшего использования
{
    while($row = $userinfo->fetch_assoc()) {
        $evenid[] = $row["event_user_id"];// ID of the event that we will use to query all other data
    }
    asort($evenid);
    $unique_id = array_pop($evenid);
    $unique_id += 1;
}

$query = "INSERT INTO events(url, month, day, year, headline, text, userid, event_user_id)  VALUES ('$uploadurl', '$month', '$day', '$year', '$headline', '$text', '$userid', '$unique_id')";
$mysqli->query($query);

// Closing Connection
$mysqli->close();
header("Location: ../../index.php");