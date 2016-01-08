<?php

session_start(); // Starting Session
if(empty($_SESSION['login_user'])){
    header("Location: login.php");
    exit;}
require('connect.php');

// SQL query to fetch information of registerd users and finds user match.
$username = $_SESSION['login_user'];

//Variable declaration
$userinfo = $userinfo = $user_lastname= $user_status = $loan_type= $loan_amount = $userid= '';

// DB query to get userid by username
if($userinfo = $mysqli->query("SELECT * FROM user WHERE username = '$username'"))  //Выборка данных пользователя для дальнейшего использования
    {
        $userinfo = $userinfo->fetch_assoc();
        $userid = $userinfo["userid"];// ID of the user that we will use to query all other data
    }

//DB query to get title of the user
$title = array();
$media = array ();
$text = array();
if($result = $mysqli->query("SELECT * FROM title WHERE userid = '$userid'"))  //Выборка данных пользователя для дальнейшего использования
    {
        $row = $result->fetch_assoc();
        $media["url"] = $row["url"];
        $media["caption"] = $row["caption"];
        $media["credit"] = $row["credit"];
    // Saving array of media to title object
        $title["media"] = $media;

        $text["headline"] = $row["headline"];
        $text["text"] = $row["text"];
    // Saving array of text to title object
        $title["text"] = $text;
        /* free result set */
        $result->free();
    };

// Closing Connection
$mysqli->close();
?>