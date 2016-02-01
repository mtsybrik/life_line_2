<?php

//Variable declaration
$userinfo = $userid = $uploadurl= $month = $day = $year = $headline = $text = $start_date = $unique_id = $eventid = '';
$evenid = '';


session_start(); // Starting Session
require('connect.php');
//Receive title & text & date
$headline = $_POST['title'];
$headline = $mysqli->real_escape_string($headline);
$text = $_POST['body'];
$eventid = $_POST['eventid'];

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
else{
    $uploadurl = $_POST["url"];
}

// DB query to get last eventid by username
if($userinfo = $mysqli->query("SELECT * FROM events WHERE userid = '$userid'"))  //Выборка данных пользователя для дальнейшего использования
{
    while($row = $userinfo->fetch_assoc()) {
        $evenid[] = $row["event_user_id"];// ID of the event that we will use to query all other data
    }
    asort($evenid);
    $unique_id = array_pop($evenid);
    if($eventid == ""){
        $unique_id += 1;
        $query = "INSERT INTO events(url, month, day, year, headline, text, userid, event_user_id)  VALUES ('$uploadurl', '$month', '$day', '$year', '$headline', '$text', '$userid', '$unique_id')";
        $mysqli->query($query);
    }
    else {
        $eventid = preg_replace('/\D/', '', $eventid); // Get digit out of hash
        if ($eventid != "") {
            $unique_id = $eventid;
            $query = "UPDATE events SET url='$uploadurl', month='$month', day='$day', year='$year', headline='$headline', text='$text', userid='$userid' WHERE event_user_id='$unique_id'";
            $mysqli->query($query);
        }
        else{
            $query = "UPDATE title SET url='$uploadurl', headline='$headline', text='$text' WHERE userid='$userid'";
            $mysqli->query($query);
            }
        }
    }
unset($_POST["eventid"]);
// Closing Connection
$mysqli->close();

header("Location: ../../index.php");