$(document).ready(function() {
    var timeline_json;
    var additionalOptions = {
        default_bg_color: {r:36, g:36, b:36},
        //timenav_height: 200
    }
    $.ajax({
        type: "POST",
        dataType: "json",
        data: {"test": "worked"},
        url: 'assets/php/json.php',
        async: false,
        success: function (data) {
            timeline_json = data;
        }
    });
    window.timeline = new TL.Timeline('timeline', timeline_json, additionalOptions);
    });
$(document).ready(function() {
    $('input[id="title"]').focus(function() {
        $('button[id="attachment"]').removeClass("hidden");
        $('div[id="body"]')[0].style.display = 'block';
        $('div[id="datepickerdiv"]').removeClass("hidden");
        $('button[id="submitButton"]').removeClass("hidden");
        $('input[id="datepicker"]').removeClass("hidden");
        if (this.value == this.defaultValue){
            this.value = '';
        }
        if(this.value != this.defaultValue){
            this.select();
        }
    });
});
$(document).mouseup(function (e)
{
    var container = $("#form");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        var item = document.getElementById("title");
        if (item.value == ''){
                item.value = item.defaultValue ? item.defaultValue : '';
                $('button[id="attachment"]').addClass("hidden");
                $('div[id="body"]')[0].style.display = 'none';
                $('div[id="datepickerdiv"]').addClass("hidden");
                $('button[id="submitButton"]').addClass("hidden");
                $('input[id="datepicker"]').addClass("hidden");
            }
        }
});
tinymce.init({
    selector: '#body',
    inline: true,
    menubar: false,  // removes the menubar
    toolbar: ['bold, italic, underline, alignleft, aligncenter, alignright, alignjustify , outdent, indent',
                ' fontselect, fontsizeselect, bullist, numlist']
});
function onFocus(){
    if(document.getElementById("body").innerHTML == "<p>Few words about your achievement, what it changed in your life?</p>"){
        document.getElementById("body").innerHTML= "";
    }
    $('div[id="body"]').css("margin-bottom","75px");
}
function onBlur(){
    $('div[id="body"]').css("margin-bottom","10px");
    if(document.getElementById("body").innerHTML == "" || document.getElementById("test").innerHTML=='<p><br data-mce-bogus="1"></p>') {
        document.getElementById("body").innerHTML = "<p>Few words about your achievement, what it changed in your life?</p>";
    }
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
    $('#submitButton').click(function () {
        var mysave = $('#body').html();
        $('#hiddeninput').val(mysave);
    });
});
//
//$(document).ready(function(){
//    var form = $('form');
//    form.submit(function(){
//        $.post($(this).attr('action'), $(this).serialize(), function(response){
//            alert("Your achievement successfully added to your timeline");
//            window.location.reload();
//        },'json');
//        return false;
//    });
//});

