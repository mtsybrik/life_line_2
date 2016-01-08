<?php

////Selecting event_id by headline and date parameters
//if($event_item_select = $mysqli->query("SELECT eventid FROM events WHERE url = '$uploadurl' AND year = '$year' AND month = '$month' AND day = '$day'"))
//{
//    $event_item_select = $event_item_select->fetch_assoc();
//    $eventid = $event_item_select["eventid"];// ID of the event that we will use to query all other data
//}
//};
//if ($picture_select && $picture_select->num_rows > 0) {
//    $pic_select_obj = $picture_select->fetch_object();
//    $uploadurl = $pic_select_obj->id;
//} else {