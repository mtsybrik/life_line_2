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
            <form action="#">
                <div class="inner-wrap">
                    <input id="title" type="text" name="title"  value="What makes you proud?" />
                    <div id="body" onfocus="onFocus()" onblur="onBlur()" style="display: none"><p>Few words about your achievement, what it changed in your life?</p></div>
                    <div style="height:0px;overflow:hidden;">
                        <input type="file" id="fileInput" name="fileInput" />
                    </div>
                    <button id="attachment" class="hidden" type="button" onclick="chooseFile();"></button>
                    <input id="datepicker"type="text" class="hidden" value="<? echo date('M d Y') ?>">
                    <button id="submitButton" type="submit" class="hidden">Отправить</button>
                </div>
            </form>
        </div>
        <div id="timeline">
			<!-- Timeline.js will genereate the markup here -->
		</div>
        
        <!-- JavaScript includes - jQuery, turn.js and our own script.js -->
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src='assets/js/tinymce/tinymce.min.js'></script>
        <script src="//cdn.knightlab.com/libs/timeline3/latest/js/timeline.js"></script>
        <script src="assets/js/script.js"></script>
<!--        <script src="assets/js/timeline-min.js"></script>-->
<!--    <script src="assets/js/VMM.Timeline.js"></script>-->

    </body>
</html>