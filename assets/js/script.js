$(function(){
	
	var timeline = new VMM.Timeline();
	timeline.init("data.json");

});
$(document).ready(function() {
    $('input[id="title"]').focus(function() {
        $('button[id="attachment"]').removeClass("hidden");
        $('div[id="body"]')[0].style.display = 'block';
        $('div[id="datepickerdiv"]').removeClass("hidden");
        if (this.value == this.defaultValue){
            this.value = '';
        }
        if(this.value != this.defaultValue){
            this.select();
        }
    });
    $('input[type="text"]').blur(function() {
        if (this.value == ''){
            this.value = (this.defaultValue ? this.defaultValue : '');
            $('button[id="attachment"]').addClass("hidden");
            $('div[id="body"]')[0].style.display = 'none';
            $('div[id="datepickerdiv"]').addClass("hidden");
        }
    });
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
        dateFormat: "d M yy"
    });
});
