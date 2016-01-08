<?php

session_start(); // Starting Session
if(empty($_SESSION['login_user'])){
    header("Location: login.php");
    exit;}
require('connect.php');
//Receive title & text & date
$headline = $_POST['title'];
$text = $_POST['bodydiv'];
$start_date = $_POST['start_date'];

if($start_date){
    $start_date = date_parse($start_date);
    $month = $start_date['month'];
    $day = $start_date['day'];
    $year = $start_date['year'];
}

// SQL query to fetch information of registerd users and finds user match.
$username = $_SESSION['login_user'];

//Variable declaration
$userinfo = $userid = '';

// DB query to get userid by username
if($userinfo = $mysqli->query("SELECT * FROM user WHERE username = '$username'"))  //Выборка данных пользователя для дальнейшего использования
{
    $userinfo = $userinfo->fetch_assoc();
    $userid = $userinfo["userid"];// ID of the user that we will use to query all other data
}


if (isset($_FILES["file"]["name"]) && $_FILES["file"]["name"] != ''){
    $uploaddir = 'assets/img/uploads';
    $uploadfile = '../' . $uploaddir . basename($_FILES["file"]["name"]);
    $uploadurl = $uploaddir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $uploadfile);
    echo "File is valid, and was successfully uploaded.";
    $picture_select = "SELECT * FROM pictures WHERE url = '$uploadurl'";
    $picture_select = $link->query($picture_select);
    if ($picture_select && $picture_select->num_rows > 0) {
        $pic_select_obj = $picture_select->fetch_object();
        $uploadurl = $pic_select_obj->id;
    } else {
        $query = "INSERT INTO pictures(url) VALUES ('$uploadurl')";
        mysqli_query($link, $query);
        $uploadurl = mysqli_insert_id($link);
    }

//DB query to get title of the user
$title = array();
$media = array ();
$text = array();
if($result = $mysqli->query("SELECT * FROM title WHERE userid = '$userid'"))  //Выборка данных пользователя для дальнейшего использования