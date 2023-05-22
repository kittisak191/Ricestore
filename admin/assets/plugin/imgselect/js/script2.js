

$(document).ready(function() {


	$("#pic1").change(function(){
		var p = $("#uploadPreview1");
		var img_width = $('#img_width').val();
		var img_height = $('#img_height').val();


		var nmaxwidth=parseFloat(img_width);
		var nmaxheight=parseFloat(img_height);

		
		

		p.fadeOut();


		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("pic1").files[0]);

		oFReader.onload = function (oFREvent) {
			p.attr('src', oFREvent.target.result).fadeIn();
			$('img#uploadPreview1').imgAreaSelect({

				aspectRatio: nmaxwidth+':'+nmaxheight,
				onSelectEnd: setInfo1
			});
		};
	});




	$("#pic2").change(function(){
		var p = $("#uploadPreview2");
		var img_width = $('#img_width').val();
		var img_height = $('#img_height').val();


		var nmaxwidth=parseFloat(img_width);
		var nmaxheight=parseFloat(img_height);

		
		

		p.fadeOut();


		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("pic2").files[0]);

		oFReader.onload = function (oFREvent) {
			p.attr('src', oFREvent.target.result).fadeIn();
			$('img#uploadPreview2').imgAreaSelect({

				aspectRatio: nmaxwidth+':'+nmaxheight,
				onSelectEnd: setInfo2
			});
		};
	});


	$("#pic3").change(function(){
		var p = $("#uploadPreview3");
		var img_width = $('#img_width').val();
		var img_height = $('#img_height').val();


		var nmaxwidth=parseFloat(img_width);
		var nmaxheight=parseFloat(img_height);


		p.fadeOut();


		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("pic3").files[0]);

		oFReader.onload = function (oFREvent) {
			p.attr('src', oFREvent.target.result).fadeIn();
			$('img#uploadPreview3').imgAreaSelect({

				aspectRatio: nmaxwidth+':'+nmaxheight,
				onSelectEnd: setInfo3
			});
		};
	});

	$("#pic4").change(function(){
		var p = $("#uploadPreview4");
		var img_width = $('#img_width').val();
		var img_height = $('#img_height').val();


		var nmaxwidth=parseFloat(img_width);
		var nmaxheight=parseFloat(img_height);

		
		

		p.fadeOut();


		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("pic4").files[0]);

		oFReader.onload = function (oFREvent) {
			p.attr('src', oFREvent.target.result).fadeIn();
			$('img#uploadPreview4').imgAreaSelect({

				aspectRatio: nmaxwidth+':'+nmaxheight,
				onSelectEnd: setInfo4
			});
		};
	});


	$("#slide").change(function(){
		var p = $("#slidePreview");
		var img_width = $('#img_width').val();
		var img_height = $('#img_height').val();


		var nmaxwidth=parseFloat(img_width);
		var nmaxheight=parseFloat(img_height);

		p.fadeOut();


		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("slide").files[0]);

		oFReader.onload = function (oFREvent) {
			p.attr('src', oFREvent.target.result).fadeIn();
			$('img#slidePreview').imgAreaSelect({

				aspectRatio: nmaxwidth+':'+nmaxheight,
				onSelectEnd: setslide
			});
		};
	});



	$("#pic").change(function(){
		var p = $("#picPreview");
		var img_width = $('#img_width').val();
		var img_height = $('#img_height').val();


		var nmaxwidth=parseFloat(img_width);
		var nmaxheight=parseFloat(img_height);

		p.fadeOut();


		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("pic").files[0]);

		oFReader.onload = function (oFREvent) {
			p.attr('src', oFREvent.target.result).fadeIn();
			$('img#picPreview').imgAreaSelect({

				aspectRatio: nmaxwidth+':'+nmaxheight,


				onSelectEnd: setpic
			});
		};
	});





});


function setInfo1(i,e) {


	var screenImage = $('img#uploadPreview1');


	var theImage = new Image();
	theImage.src = screenImage.attr("src");


	var imageWidth = theImage.width;

	var scaledimagewidth = document.getElementById('uploadPreview1').width;

	if ( imageWidth > scaledimagewidth){ var ar =   parseFloat((imageWidth/scaledimagewidth),2);}
	else { var ar = 1;}
	$('#x').val(e.x1*ar);
	$('#y').val(e.y1*ar);
	$('#w').val(e.width*ar);
	$('#h').val(e.height*ar);
}

function setInfo2(i,e) {



	var screenImage = $('img#uploadPreview2');


	var theImage = new Image();
	theImage.src = screenImage.attr("src");


	var imageWidth = theImage.width;

	var scaledimagewidth = document.getElementById('uploadPreview2').width;

	if ( imageWidth > scaledimagewidth){ var ar =   parseFloat((imageWidth/scaledimagewidth),2);}
	else { var ar = 1;}
	$('#x').val(e.x1*ar);
	$('#y').val(e.y1*ar);
	$('#w').val(e.width*ar);
	$('#h').val(e.height*ar);
}

function setInfo3(i,e) {

	
var screenImage = $('img#uploadPreview3');


	var theImage = new Image();
	theImage.src = screenImage.attr("src");


	var imageWidth = theImage.width;

	var scaledimagewidth = document.getElementById('uploadPreview3').width;

	if ( imageWidth > scaledimagewidth){ var ar =   parseFloat((imageWidth/scaledimagewidth),2);}
	else { var ar = 1;}
	$('#x').val(e.x1*ar);
	$('#y').val(e.y1*ar);
	$('#w').val(e.width*ar);
	$('#h').val(e.height*ar);
}

function setInfo4(i,e) {


	var screenImage = $('img#uploadPreview4');



	var theImage = new Image();
	theImage.src = screenImage.attr("src");


	var imageWidth = theImage.width;

	var scaledimagewidth = document.getElementById('uploadPreview4').width;

	if ( imageWidth > scaledimagewidth){ var ar =   parseFloat((imageWidth/scaledimagewidth),2);}
	else { var ar = 1;}
	$('#x').val(e.x1*ar);
	$('#y').val(e.y1*ar);
	$('#w').val(e.width*ar);
	$('#h').val(e.height*ar);
}

function setslide(i,e) {


var screenImage = $('img#slidePreview');

	var theImage = new Image();
	theImage.src = screenImage.attr("src");


	var imageWidth = theImage.width;

	var scaledimagewidth = document.getElementById('slidePreview').width;

	if ( imageWidth > scaledimagewidth){ var ar =   parseFloat((imageWidth/scaledimagewidth),2);}
	else { var ar = 1;}
	$('#x').val(e.x1*ar);
	$('#y').val(e.y1*ar);
	$('#w').val(e.width*ar);
	$('#h').val(e.height*ar);
}


function setpic(i,e) {

	var screenImage = $('img#picPreview');

	var theImage = new Image();
	theImage.src = screenImage.attr("src");


	var imageWidth = theImage.width;


	var scaledimagewidth = document.getElementById('picPreview').width;

	

	if ( imageWidth > scaledimagewidth){ var ar =   parseFloat((imageWidth/scaledimagewidth),2);}
	else { var ar = 1;}
	

	$('#x').val(e.x1*ar);
	$('#y').val(e.y1*ar);
	$('#w').val(e.width*ar);
	$('#h').val(e.height*ar);
}