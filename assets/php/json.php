<?php
require "functions.php";
$test = $_POST['test'];

$timeline= array(
                "title"=> $title,
                "events"=> $events
            );

echo json_encode($timeline);
?>