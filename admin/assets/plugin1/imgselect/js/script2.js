function setInfo(i, e) {
// Get on screen image
var screenImage = $("#uploadPreview");

// Create new offscreen image to test
var theImage = new Image();
theImage.src = screenImage.attr("src");

// Get accurate measurements from that.
var imageWidth = theImage.width;

//Get width of resized image
var scaledimagewidth = document.getElementById("uploadPreview").width;

if ( imageWidth > scaledimagewidth){ var ar =   imageWidth/scaledimagewidth;}
else { var ar = 1;}
$('#x').val(e.x1*ar);
$('#y').val(e.y1*ar);
$('#w').val(e.width*ar);
$('#h').val(e.height*ar);
}

 $(document).ready(function() {
var p = $("#uploadPreview");

// prepare instant preview
$("#uploadImage").change(function(){
// fadeOut or hide preview
p.fadeOut();

// prepare HTML5 FileReader
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

oFReader.onload = function (oFREvent) {
p.attr('src', oFREvent.target.result).fadeIn();
$('img#uploadPreview').imgAreaSelect({ });
};
});

// implement imgAreaSelect plug in (http://odyniec.net/projects/imgareaselect/)
$('img#uploadPreview').imgAreaSelect({
// set crop ratio (optional)
aspectRatio: '4:3',
onSelectEnd: setInfo
});
});