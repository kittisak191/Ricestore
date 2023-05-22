$(document).ready(function() {

    $("#files_cover_img").change(function() {
        var p = $("#picPreview_cover_img");
        var img_width = $('#img_width').val();
        var img_height = $('#img_height').val();
        var nmaxwidth = parseFloat(img_width);
        var nmaxheight = parseFloat(img_height);
        p.fadeOut();
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("files_cover_img").files[0]);
        oFReader.onload = function(oFREvent) {
            p.attr('src', oFREvent.target.result).fadeIn();
            $('img#picPreview_cover_img').imgAreaSelect({
                aspectRatio: nmaxwidth + ':' + nmaxheight,
                onSelectEnd: setpic1
            });
        };
    });
    $("#files_header_room").change(function() {
        var p = $("#picPreview_header_room");
        var img_width = $('#img_width').val();
        var img_height = $('#img_height').val();
        var nmaxwidth = parseFloat(img_width);
        var nmaxheight = parseFloat(img_height);
        p.fadeOut();
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("files_header_room").files[0]);
        oFReader.onload = function(oFREvent) {
            p.attr('src', oFREvent.target.result).fadeIn();
            $('img#picPreview_header_room').imgAreaSelect({
                aspectRatio: nmaxwidth + ':' + nmaxheight,
                onSelectEnd: setpic2
            });
        };
    });
    $("#files_header_gallery").change(function(){
        var p = $("#picPreview_header_gallery");
        var img_width = $('#img_width2').val();
        var img_height = $('#img_height2').val();
        var nmaxwidth=parseFloat(img_width);
        var nmaxheight=parseFloat(img_height);
        p.fadeOut();
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("files_header_gallery").files[0]);
        oFReader.onload = function (oFREvent) {
            p.attr('src', oFREvent.target.result).fadeIn();
            $('img#picPreview_header_gallery').imgAreaSelect({
                aspectRatio: nmaxwidth+':'+nmaxheight,
                onSelectEnd: setpic3
            });
        };
    });
    $("#files_header_contact").change(function(){
        var p = $("#picPreview_header_contact");
        var img_width = $('#img_width3').val();
        var img_height = $('#img_height3').val();
        var nmaxwidth=parseFloat(img_width);
        var nmaxheight=parseFloat(img_height);
        p.fadeOut();
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("files_header_contact").files[0]);
        oFReader.onload = function (oFREvent) {
            p.attr('src', oFREvent.target.result).fadeIn();
            $('img#picPreview_header_contact').imgAreaSelect({
                aspectRatio: nmaxwidth+':'+nmaxheight,
                onSelectEnd: setpic4
            });
        };
    });
    $("#files_aboutus_img1").change(function() {
        var p = $("#picPreview_aboutus_img1");
        var img_width = $('#img_width').val();
        var img_height = $('#img_height').val();
        var nmaxwidth = parseFloat(img_width);
        var nmaxheight = parseFloat(img_height);
        p.fadeOut();
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("files_aboutus_img1").files[0]);
        oFReader.onload = function(oFREvent) {
            p.attr('src', oFREvent.target.result).fadeIn();
            $('img#picPreview_aboutus_img1').imgAreaSelect({
                aspectRatio: nmaxwidth + ':' + nmaxheight,
                onSelectEnd: setpic5
            });
        };
    });
    $("#files_aboutus_img2").change(function(){
        var p = $("#picPreview_aboutus_img2");
        var img_width = $('#img_width2').val();
        var img_height = $('#img_height2').val();
        var nmaxwidth=parseFloat(img_width);
        var nmaxheight=parseFloat(img_height);
        p.fadeOut();
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("files_aboutus_img2").files[0]);
        oFReader.onload = function (oFREvent) {
            p.attr('src', oFREvent.target.result).fadeIn();
            $('img#picPreview_aboutus_img2').imgAreaSelect({
                aspectRatio: nmaxwidth+':'+nmaxheight,
                onSelectEnd: setpic6
            });
        };
    });
    $("#files_service_img").change(function() {
        var p = $("#picPreview_service_img");
        var img_width = $('#img_width').val();
        var img_height = $('#img_height').val();
        var nmaxwidth = parseFloat(img_width);
        var nmaxheight = parseFloat(img_height);
        p.fadeOut();
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("files_service_img").files[0]);
        oFReader.onload = function(oFREvent) {
            p.attr('src', oFREvent.target.result).fadeIn();
            $('img#picPreview_service_img').imgAreaSelect({
                aspectRatio: nmaxwidth + ':' + nmaxheight,
                onSelectEnd: setpic7
            });
        };
    });
    $("#files_room_imgs").change(function() {
        var p = $("#picPreview_room_imgs");
        var img_width = $('#img_width').val();
        var img_height = $('#img_height').val();
        var nmaxwidth = parseFloat(img_width);
        var nmaxheight = parseFloat(img_height);
        p.fadeOut();
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("files_room_imgs").files[0]);
        oFReader.onload = function(oFREvent) {
            p.attr('src', oFREvent.target.result).fadeIn();
            $('img#picPreview_room_imgs').imgAreaSelect({
                aspectRatio: nmaxwidth + ':' + nmaxheight,
                onSelectEnd: setpic8
            });
        };
    });
    $("#files_room_imgl").change(function(){
        var p = $("#picPreview_room_imgl");
        var img_width = $('#img_width2').val();
        var img_height = $('#img_height2').val();
        var nmaxwidth=parseFloat(img_width);
        var nmaxheight=parseFloat(img_height);
        p.fadeOut();
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("files_room_imgl").files[0]);
        oFReader.onload = function (oFREvent) {
            p.attr('src', oFREvent.target.result).fadeIn();
            $('img#picPreview_room_imgl').imgAreaSelect({
                aspectRatio: nmaxwidth+':'+nmaxheight,
                onSelectEnd: setpic9
            });
        };
    });
    $("#files_gallery_img").change(function() {
        var p = $("#picPreview_gallery_img");
        var img_width = $('#img_width').val();
        var img_height = $('#img_height').val();
        var nmaxwidth = parseFloat(img_width);
        var nmaxheight = parseFloat(img_height);
        p.fadeOut();
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("files_gallery_img").files[0]);
        oFReader.onload = function(oFREvent) {
            p.attr('src', oFREvent.target.result).fadeIn();
            $('img#picPreview_gallery_img').imgAreaSelect({
                aspectRatio: nmaxwidth + ':' + nmaxheight,
                onSelectEnd: setpic10
            });
        };
    });

});




function setpic1(i, e) {
    var screenImage = $('img#picPreview_cover_img');
    var theImage = new Image();
    theImage.src = screenImage.attr("src");
    var imageWidth = theImage.width;
    var scaledimagewidth = document.getElementById('picPreview_cover_img').width;
    if (imageWidth > scaledimagewidth) {
        var ar = parseFloat((imageWidth / scaledimagewidth), 2);
    } else {
        var ar = 1;
    }
    $('#x').val(e.x1 * ar);
    $('#y').val(e.y1 * ar);
    $('#w').val(e.width * ar);
    $('#h').val(e.height * ar);
}


function setpic2(i, e) {
    var screenImage = $('img#picPreview_header_room');
    var theImage = new Image();
    theImage.src = screenImage.attr("src");
    var imageWidth = theImage.width;
    var scaledimagewidth = document.getElementById('picPreview_header_room').width;
    if (imageWidth > scaledimagewidth) {
        var ar = parseFloat((imageWidth / scaledimagewidth), 2);
    } else {
        var ar = 1;
    }
    $('#x').val(e.x1 * ar);
    $('#y').val(e.y1 * ar);
    $('#w').val(e.width * ar);
    $('#h').val(e.height * ar);
}


function setpic3(i,e) {
    var screenImage = $('img#picPreview_header_gallery');
    var theImage = new Image();
    theImage.src = screenImage.attr("src");
    var imageWidth = theImage.width;
    var scaledimagewidth = document.getElementById('picPreview_header_gallery').width;
    if ( imageWidth > scaledimagewidth){ var ar =   parseFloat((imageWidth/scaledimagewidth),2);}
    else { var ar = 1;}
    $('#x2').val(e.x1*ar);
    $('#y2').val(e.y1*ar);
    $('#w2').val(e.width*ar);
    $('#h2').val(e.height*ar);
}


function setpic4(i,e) {
    var screenImage = $('img#picPreview_header_contact');
    var theImage = new Image();
    theImage.src = screenImage.attr("src");
    var imageWidth = theImage.width;
    var scaledimagewidth = document.getElementById('picPreview_header_contact').width;
    if ( imageWidth > scaledimagewidth){ var ar =   parseFloat((imageWidth/scaledimagewidth),2);}
    else { var ar = 1;}
    $('#x3').val(e.x1*ar);
    $('#y3').val(e.y1*ar);
    $('#w3').val(e.width*ar);
    $('#h3').val(e.height*ar);
}


function setpic5(i, e) {
    var screenImage = $('img#picPreview_aboutus_img1');
    var theImage = new Image();
    theImage.src = screenImage.attr("src");
    var imageWidth = theImage.width;
    var scaledimagewidth = document.getElementById('picPreview_aboutus_img1').width;
    if (imageWidth > scaledimagewidth) {
        var ar = parseFloat((imageWidth / scaledimagewidth), 2);
    } else {
        var ar = 1;
    }
    $('#x').val(e.x1 * ar);
    $('#y').val(e.y1 * ar);
    $('#w').val(e.width * ar);
    $('#h').val(e.height * ar);
}


function setpic6(i,e) {
    var screenImage = $('img#picPreview_aboutus_img2');
    var theImage = new Image();
    theImage.src = screenImage.attr("src");
    var imageWidth = theImage.width;
    var scaledimagewidth = document.getElementById('picPreview_aboutus_img2').width;
    if ( imageWidth > scaledimagewidth){ var ar =   parseFloat((imageWidth/scaledimagewidth),2);}
    else { var ar = 1;}
    $('#x2').val(e.x1*ar);
    $('#y2').val(e.y1*ar);
    $('#w2').val(e.width*ar);
    $('#h2').val(e.height*ar);
}


function setpic7(i, e) {
    var screenImage = $('img#picPreview_service_img');
    var theImage = new Image();
    theImage.src = screenImage.attr("src");
    var imageWidth = theImage.width;
    var scaledimagewidth = document.getElementById('picPreview_service_img').width;
    if (imageWidth > scaledimagewidth) {
        var ar = parseFloat((imageWidth / scaledimagewidth), 2);
    } else {
        var ar = 1;
    }
    $('#x').val(e.x1 * ar);
    $('#y').val(e.y1 * ar);
    $('#w').val(e.width * ar);
    $('#h').val(e.height * ar);
}


function setpic8(i, e) {
    var screenImage = $('img#picPreview_room_imgs');
    var theImage = new Image();
    theImage.src = screenImage.attr("src");
    var imageWidth = theImage.width;
    var scaledimagewidth = document.getElementById('picPreview_room_imgs').width;
    if (imageWidth > scaledimagewidth) {
        var ar = parseFloat((imageWidth / scaledimagewidth), 2);
    } else {
        var ar = 1;
    }
    $('#x').val(e.x1 * ar);
    $('#y').val(e.y1 * ar);
    $('#w').val(e.width * ar);
    $('#h').val(e.height * ar);
}


function setpic9(i,e) {
    var screenImage = $('img#picPreview_room_imgl');
    var theImage = new Image();
    theImage.src = screenImage.attr("src");
    var imageWidth = theImage.width;
    var scaledimagewidth = document.getElementById('picPreview_room_imgl').width;
    if ( imageWidth > scaledimagewidth){ var ar =   parseFloat((imageWidth/scaledimagewidth),2);}
    else { var ar = 1;}
    $('#x2').val(e.x1*ar);
    $('#y2').val(e.y1*ar);
    $('#w2').val(e.width*ar);
    $('#h2').val(e.height*ar);
}


function setpic10(i, e) {
    var screenImage = $('img#picPreview_gallery_img');
    var theImage = new Image();
    theImage.src = screenImage.attr("src");
    var imageWidth = theImage.width;
    var scaledimagewidth = document.getElementById('picPreview_gallery_img').width;
    if (imageWidth > scaledimagewidth) {
        var ar = parseFloat((imageWidth / scaledimagewidth), 2);
    } else {
        var ar = 1;
    }
    $('#x').val(e.x1 * ar);
    $('#y').val(e.y1 * ar);
    $('#w').val(e.width * ar);
    $('#h').val(e.height * ar);
}




















































