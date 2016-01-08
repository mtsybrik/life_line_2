<?php
require "functions.php";
$test = $_POST['test'];

$timeline= array(
                "title"=> $title,
                "events"=> array(
                    array(
                        "media"=> array(
                              "url"=> "http://vimeo.com/22439234",
                              "caption"=> "",
                              "credit"=> ""
                        ),
                        "start_date"=> array(
                              "month"=> "2",
                              "day"=> "",
                              "year"=> "2009"
                        ),
                        "text"=> array(
                              "headline"=> "My first experiment in time-lapse photography",
                              "text"=> "Nature at its finest in this video."
                        )
                    ),
                    array(
                        "media"=> array(
                              "url"=> "http://vimeo.com/22439234",
                              "caption"=> "",
                              "credit"=> ""
                        ),
                        "start_date"=> array(
                              "month"=> "3",
                              "day"=> "",
                              "year"=> "2013"
                        ),
                        "text"=> array(
                              "headline"=> "My first experiment in time-lapse photography",
                              "text"=> "Nature at its finest in this video."
                        )
                    ),
                    array(
                        "media"=> array(
                              "url"=> "http://vimeo.com/22439234",
                              "caption"=> "",
                              "credit"=> ""
                        ),
                        "start_date"=> array(
                              "month"=> "4",
                              "day"=> "",
                              "year"=> "2014"
                        ),
                        "text"=> array(
                              "headline"=> "My first experiment in time-lapse photography",
                              "text"=> "Nature at its finest in this video."
                        )
                    ),
                    array(
                        "media"=> array(
                              "url"=> "http://vimeo.com/22439234",
                              "caption"=> "",
                              "credit"=> ""
                        ),
                        "start_date"=> array(
                              "month"=> "5",
                              "day"=> "",
                              "year"=> "2015"
                        ),
                        "text"=> array(
                              "headline"=> "My first experiment in time-lapse photography",
                              "text"=> "Nature at its finest in this video."
                        )
                    )
                )
            );

echo json_encode($timeline);
?>