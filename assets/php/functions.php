<?php

function selectTimelineByUsername($username)
{
    require('connect.php');
    $events_item = array();
    $events = $event_id = array();
    $start_date = array();
    $title = $timeline = $media = $text = array();

//Variable declaration
    $userinfo = $userid = '';

// DB query to get userid by username
    if ($userinfo = $mysqli->query("SELECT * FROM user WHERE username = '$username'"))  //Выборка данных пользователя для дальнейшего использования
    {
        $userinfo = $userinfo->fetch_assoc();
        $userid = $userinfo["userid"];// ID of the user that we will use to query all other data
    }

//DB query to get title of the user

    if ($result = $mysqli->query("SELECT * FROM title WHERE userid = '$userid'"))  //Выборка данных пользователя для дальнейшего использования
    {
        $row = $result->fetch_assoc();
        $media["url"] = $row["url"];
        $media["caption"] = $row["caption"];
        $media["credit"] = $row["credit"];

        //Convert null value to empty string
        array_walk($media, function (&$item) {
            $item = strval($item);
        });

        // Saving array of media to title object
        $title["media"] = $media;

        $text["headline"] = $row["headline"];
        $text["text"] = $row["text"];

        //Convert null value to empty string
        array_walk($text, function (&$item) {
            $item = strval($item);
        });

        // Saving array of text to title object
        $title["text"] = $text;

        /* free result set */
        $result->free();
    };

    if ($result = $mysqli->query("SELECT * FROM events WHERE userid = '$userid'"))  //Выборка данных пользователя для дальнейшего использования
    {
        while ($row = $result->fetch_assoc()) {
            //Parcing media array
            $media["url"] = $row["url"];
            $media["caption"] = $row["caption"];
            $media["credit"] = $row["credit"];

            //Convert null value to empty string
            array_walk($media, function (&$item) {
                $item = strval($item);
            });

            // Saving array of media to title object
            $events_item["media"] = $media;

            //Parcing text array
            $text["headline"] = $row["headline"];
            $text["text"] = $row["text"];

            //Convert null value to empty string
            array_walk($text, function (&$item) {
                $item = strval($item);
            });

            // Saving array of text to title object
            $events_item["text"] = $text;

            //Parcing start_date array
            $start_date["month"] = $row["month"];
            $start_date["day"] = $row["day"];
            $start_date["year"] = $row["year"];

            //Convert null value to empty string
            array_walk($start_date, function (&$item) {
                $item = strval($item);
            });

            // Saving array of text to title object
            $events_item["start_date"] = $start_date;

            $event_id = $row["event_user_id"];
            $event_id = $username . '-' . $event_id;

            // Saving array of text to title object
            $events_item["unique_id"] = $event_id;

            $events[] = $events_item;
        }

        /* free result set */
        $result->free();
    }
    $timeline= array(
        "title"=> $title,
        "events"=> $events
    );
    $mysqli->close();
    return $timeline;
}
function eventUpdateInfo($username)
{
    $eventid = '';
    require('connect.php');

    //Variable declaration
        $userinfo = $userid = '';

    // DB query to get userid by username
    if ($userinfo = $mysqli->query("SELECT * FROM user WHERE username = '$username'"))  //Выборка данных пользователя для дальнейшего использования
    {
        $userinfo = $userinfo->fetch_assoc();
        $userid = $userinfo["userid"];// ID of the user that we will use to query all other data
    }
    $eventid = $_POST['eventid'];
    $eventid = preg_replace('/\D/', '', $eventid); // Get digit out of hash
    $form = array();
    if ($result = $mysqli->query("SELECT * FROM events WHERE userid = '$userid' AND event_user_id = '$eventid'"))  //Выборка данных пользователя для дальнейшего использования
    {
        $row = $result->fetch_assoc();

        $form["title"] = $row["headline"];
        $form["text"] = $row["text"];
        $form["url"] = $row["url"];

        //Parcing start_date array
        $form["month"] = $row["month"];
        $form["day"] = $row["day"];
        $form["year"] = $row["year"];

        $result->free();
    }
    $mysqli->close();
    return $form;
}
//print_r (json_encode($timeline));
//

// Closing Connection

?>