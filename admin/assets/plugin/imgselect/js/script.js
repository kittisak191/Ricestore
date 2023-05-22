/**
 *
 * Crop Image While Uploading With jQuery
 * 
 * Copyright 2013, Resalat Haque
 * http://www.w3bees.com/
 *
 *//*

// set info for cropping image using hidden fields
function setInfo(i, e) {
	$('#x').val(e.x1);
	$('#y').val(e.y1);
	$('#w').val(e.width);
	$('#h').val(e.height);
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
		};
	});


	// implement imgAreaSelect plug in (http://odyniec.net/projects/imgareaselect/)
	$('#uploadPreview').imgAreaSelect({
		// set crop ratio (optional)
		maxWidth: 1280, maxHeight: 1024,handles: true,
		aspectRatio: '3:4',
		onSelectEnd: setInfo
	});
});

*/

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
$('img#uploadPreview').imgAreaSelect({  });
};
});

// implement imgAreaSelect plug in (http://odyniec.net/projects/imgareaselect/)
$('img#uploadPreview').imgAreaSelect({
// set crop ratio (optional)
aspectRatio: '3:4',
onSelectEnd: setInfo
});
});