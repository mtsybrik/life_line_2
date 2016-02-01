$(document).ready(function() {
    var timeline_json;
    var additionalOptions = {
        default_bg_color: {r:36, g:36, b:36},
        hash_bookmark:true,
        height:"100%",
        width:"100%",
        timenav_height: 200,
        is_embed:true
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: 'assets/php/json.php',
        async: false,
        success: function (data) {
            timeline_json = data;
        }
    });
    window.timeline = new TL.Timeline('timeline', timeline_json, additionalOptions);
});
$(document).ready(function() {
    $('div[id="title"]').focus(function() {
        $('button[id="attachment"]').removeClass("hidden");
        $('div[id="body"]')[0].style.display = 'block';
        $('div[id="datepickerdiv"]').removeClass("hidden");
        $('button[id="submitButton"]').removeClass("hidden");
        $('button[id="edit"]').addClass("hidden");
        $('input[id="datepicker"]').removeClass("hidden");
        $('img[id="close"]').removeClass("hidden");
        $('#timeline').css("visibility","hidden");
        $('input[id="url"]').removeClass("hidden");
    });
});
function closeForm() {
    $('button[id="attachment"]').addClass("hidden");
    $('div[id="body"]')[0].style.display = 'none';
    $('div[id="datepickerdiv"]').addClass("hidden");
    $('button[id="submitButton"]').addClass("hidden");
    $('input[id="datepicker"]').addClass("hidden");
    $('input[id="url"]').addClass("hidden");
    $('img[id="close"]').addClass("hidden");
    $('button[id="edit"]').removeClass("hidden");
    $('#timeline').css("visibility", "visible");
}
function onFocus() {
    if (document.getElementById("body").innerHTML == "<p>Few words about your achievement, what it changed in your life?</p>") {
        document.getElementById("body").innerHTML = " ";
    }
}
tinymce.init({
    selector: '#body',
    inline: true,
    menubar: false,  // removes the menubar
    toolbar: ['bold, italic, underline, alignleft, aligncenter, alignright, alignjustify , outdent, indent',
        ' fontselect, fontsizeselect, bullist, numlist']
});
function onBlur(){
    if(document.getElementById("body").innerHTML == "<p> </p>") {
        document.getElementById("body").innerHTML = "<p>Few words about your achievement, what it changed in your life?</p>";
    }
    //$('div[id="body"]').css("margin-bottom","10px");

}
function chooseFile() {
    $("#fileInput").click();
}
$(function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "M dd yy"
    });
});

$(function(){
    $('#edit').click(function () {
        $('button[id="attachment"]').removeClass("hidden");
        $('button[id="submitButton"]').removeClass("hidden");
        $('div[id="body"]')[0].style.display = 'block';
        $('div[id="datepickerdiv"]').removeClass("hidden");
        $('div[id="image"]').removeClass("hidden");
        $('input[id="datepicker"]').removeClass("hidden");
        $('img[id="close"]').removeClass("hidden");
        $('#url').removeClass("hidden");
        $('#timeline').css("visibility","hidden");
        eventid = $(location).attr('hash');
        $.ajax({
            type: "POST",
            dataType: "json",
            url: 'assets/php/update.php',
            data: {eventid : eventid},
            async: false,
            success: function (data) {
                $('div[id="title"]').html(data.title);
                $('div[id="body"]').html(data.text);
                $('input[id="url"]').val(data.url);
                $('input[id="datepicker"]').val(data.start_date.month + ' ' + data.start_date.day + ' '+ data.start_date.year);

            }
        });
    })
});

$(function(){
    $('#submitButton').click(function () {
        var mysave = $('#title').html();
        $('#hiddeninput').val(mysave);
        var mysave2 = $('#body').html();
        $('#hiddeninput2').val(mysave2);
        $('#hiddeninput3').val(eventid);
        delete window.eventid;
        alert("Achievement Added To Your Life Line Successfully...");

    });
});
$(function(){
    $('#delete').click(function () {
        eventid = $(location).attr('hash');
        $.ajax({
            type: "POST",
            dataType: "json",
            url: 'assets/php/delete.php',
            data: {eventid : eventid},
            async: false,
            success: function (data) {
                window.location.reload();
                alert("Achievement Deleted Successfully...");
            }
        });

    });
    });
