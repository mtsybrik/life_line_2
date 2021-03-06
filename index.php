<?
session_start(); // Starting Session
require 'assets/php/functions.php';

if(empty($_SESSION['login_user'])){
    header("Location: login.php");
    exit;}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Life Line</title>
        <!-- The default timeline stylesheet -->
<!--        <link rel="stylesheet" href="assets/css/timeline.css" />-->
        <link title="timeline-styles" rel="stylesheet" href="//cdn.knightlab.com/libs/timeline3/latest/css/timeline.css">
        <!-- Our customizations to the theme -->
        <link rel="stylesheet" href="assets/css/styles.css" />
        
        <!-- Google Fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Dancing+Script|Antic+Slab" />
        <!--Css for datepicker-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->


    </head>
    
    <body>
        <div class="form-style-10" id="form">
            <form action="assets/php/insert.php" method="POST" enctype="multipart/form-data">
                <div class="inner-wrap">
                    <img src="assets/img/close.png" id="close" class="hidden" onclick="closeForm()">
                    <div contenteditable="true" data-placeholder="Add achievement" id="title"></div>
                    <div id="body" onfocus="onFocus()" onblur="onBlur()" style="display: none"><p>Few words about your achievement, what it changed in your life?</p></div>
                    <div class="hidden">
                        <input type="file" id="fileInput" name="file" />
                        <textarea id="hiddeninput" name="title"></textarea>
                        <textarea id="hiddeninput2" name="body"></textarea>
                        <textarea id="hiddeninput3" name="eventid"></textarea>
                    </div>
                    <div id="popup" class="hidden"></div>
                    <button id="attachment" class="hidden" type="button" onclick="chooseFile();"></button>
                    <input id="url" name="url" type="text" class="hidden" placeholder="Link to video or image">
                    <input id="datepicker" name="start_date" type="text" class="hidden" value="<? echo date('M d Y') ?>">
                    <button id="submitButton" type="submit" class="hidden">Отправить</button>
                </div>
            </form>
        </div>
        <div><button id="edit">Edit</button></div>
        <div><button id="delete">Delete</button></div>
        <div class="hidden" id="image">
            <img id="ratio" class="hidden" src="http://placehold.it/16x9"/>
        </div>
        <div id="timeline">
			<!-- Timeline.js will genereate the markup here -->
		</div>
        
        <!-- JavaScript includes - jQuery, turn.js and our own script.js -->
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="assets/js/jquery.bpopup.min.js"></script>
        <script src='assets/js/tinymce/tinymce.min.js'></script>
        <script src="//cdn.knightlab.com/libs/timeline3/latest/js/timeline.js"></script>
        <script src="assets/js/script.js"></script>
<!--        <script src="assets/js/timeline-min.js"></script>-->
<!--    <script src="assets/js/VMM.Timeline.js"></script>-->

    </body>
</html>