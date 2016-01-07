<?php
$test = $_POST['test'];

$timeline= array(
                "title"=> array(
                    "media"=> array(
                        "url"=> "assets/img/notes.png",
                        "caption"=> "",
                        "credit"=> "<a href='http://dribbble.com/shots/221641-iOS-Icon'>iOS Icon by Asher</a>"
                    ),
                    "text"=> array(
                        "headline"=> "Johnny B Goode",
                        "text"=> "<i><span class='c1'>Designer</span> & <span class='c2'>Developer</span></i>"
                    )
                ),
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