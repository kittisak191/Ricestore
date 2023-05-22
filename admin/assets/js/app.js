/*****
* CONFIGURATION
*/
    //Main navigation
    $.navigation = $('nav > ul.nav');

	$.panelIconOpened = 'icon-arrow-up';
	$.panelIconClosed = 'icon-arrow-down';

	//Default colours
	$.brandPrimary =  '#20a8d8';
	$.brandSuccess =  '#4dbd74';
	$.brandInfo =     '#63c2de';
	$.brandWarning =  '#f8cb00';
	$.brandDanger =   '#f86c6b';

	$.grayDark =      '#2a2c36';
	$.gray =          '#55595c';
	$.grayLight =     '#818a91';
	$.grayLighter =   '#d1d4d7';
	$.grayLightest =  '#f8f9fa';

'use strict';

/****
* MAIN NAVIGATION
*/

$(document).ready(function($){

	// Add class .active to current link
	$.navigation.find('a').each(function(){

		var cUrl = String(window.location);

		if (cUrl.substr(cUrl.length - 1) == '#') {
			cUrl = cUrl.slice(0,-1);
		}

		if ($($(this))[0].href==cUrl) {
			$(this).addClass('active');

			$(this).parents('ul').add(this).each(function(){
			    $(this).parent().addClass('nt').addClass('open');
			});
		}
	});

	// Dropdown Menu
	$.navigation.on('click', 'a', function(e){

		if ($.ajaxLoad) {
			e.preventDefault();
		}

        if ($(this).hasClass('nav-dropdown-toggle')) {
			$(this).parent().removeClass('nt').toggleClass('open');
		}

	});

	function resizeBroadcast() {

		var timesRun = 0;
		var interval = setInterval(function(){
			timesRun += 1;
			if(timesRun === 5){
				clearInterval(interval);
			}
			window.dispatchEvent(new Event('resize'));
		}, 62.5);
	}

	/* ---------- Main Menu Open/Close, Min/Full ---------- */
	$('.navbar-toggler').click(function(){

		var bodyClass = localStorage.getItem('body-class');

		if ($(this).hasClass('layout-toggler') && $('body').hasClass('sidebar-off-canvas')) {
			$('body').toggleClass('sidebar-opened').parent().toggleClass('sidebar-opened');
			//resize charts
			resizeBroadcast();

		} else if ($(this).hasClass('layout-toggler') && ($('body').hasClass('sidebar-nav') || bodyClass == 'sidebar-nav')) {
			$('body').toggleClass('sidebar-nav');
			localStorage.setItem('body-class', 'sidebar-nav');
			if (bodyClass == 'sidebar-nav') {
				localStorage.clear();
			}
			//resize charts
			resizeBroadcast();
		} else {
			$('body').toggleClass('mobile-open');
		}
	});

	$('.aside-toggle').click(function(){
		$('body').toggleClass('aside-menu-open');

		//resize charts
		resizeBroadcast();
	});

	$('.sidebar-close').click(function(){
		$('body').toggleClass('sidebar-opened').parent().toggleClass('sidebar-opened');
	});

	/* ---------- Disable moving to top ---------- */
	$('a[href="#"][data-top!=true]').click(function(e){
		e.preventDefault();
	});

});

/****
* CARDS ACTIONS
*/

$(document).on('click', '.card-actions a', function(e){
	e.preventDefault();

	if ($(this).hasClass('btn-close')) {
		$(this).parent().parent().parent().fadeOut();
	} else if ($(this).hasClass('btn-minimize')) {
		var $target = $(this).parent().parent().next('.card-block');
		if (!$(this).hasClass('collapsed')) {
			$('i',$(this)).removeClass($.panelIconOpened).addClass($.panelIconClosed);
		} else {
			$('i',$(this)).removeClass($.panelIconClosed).addClass($.panelIconOpened);
		}

	} else if ($(this).hasClass('btn-setting')) {
		$('#myModal').modal('show');
	}

});

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function init(url) {

	/* ---------- Tooltip ---------- */
	$('[rel="tooltip"],[data-rel="tooltip"]').tooltip({"placement":"bottom",delay: { show: 400, hide: 200 }});

	/* ---------- Popover ---------- */
	$('[rel="popover"],[data-rel="popover"],[data-toggle="popover"]').popover();

}


$(document).ready(function() {

    $('#myTable').DataTable();
    $('#myTable1').DataTable();
    $('#myTable2').DataTable();
    $('.dateP1').datepicker({format:"yyyy-mm-dd"});
    $('.dateP01').datepicker({format:"yyyy-mm-dd"});

    $('.dateP011').datetimepicker({format:"dd",startView: "date",minViewMode: "date"});
    $('.dateP02').datepicker({format:"mm",startView: "months",minViewMode: "months"});
    $('.dateP03').datepicker({format:"yyyy",startView: "years",minViewMode: "years"});


});

$(function () {
    $('#datetimepicker4').datetimepicker({
        format: "YYYY-MM-DD"
    });

    $("#datetimepicker4").on("dp.change", function (e) {
        $('#datetimepicker5').data("DateTimePicker").minDate(e.date);
    });
 
});

$(function () {
    $('#datetimepicker8').datetimepicker({
        format: "YYYY-MM-DD"
    });

    $("#datetimepicker8").on("dp.change", function (e) {
        $('#datetimepicker9').data("DateTimePicker").minDate(e.date);
    });
 
});


$(function () {
    $('#datetimepicker6').datetimepicker({
        format: "DD"
    });

    $("#datetimepicker6").on("dp.change", function (e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
 
});



$(function(){
    CKEDITOR.replace( 'editor1', { skin : 'moono', toolbar : [ ['Paste','Source','-','Templates','-','Maximize','-','FontSize','Font','Table','-','Bold','Italic','Underline','-','JustifyLeft','JustifyCenter','JustifyRight','-','TextColor','BGColor','-','Outdent','Indent','-','Link','-','Image','-','NumberedList','-','BulletedList'] ], });
    CKEDITOR.replace( 'editor2', { skin : 'moono', toolbar : [ ['Paste','Source','-','Templates','-','Maximize','-','FontSize','Font','Table','-','Bold','Italic','Underline','-','JustifyLeft','JustifyCenter','JustifyRight','-','TextColor','BGColor','-','Outdent','Indent','-','Link','-','Image','-','NumberedList','-','BulletedList'] ], });
});



function showreviews(str) {
    if (str == "") {
        document.getElementById("txtHint1").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint1").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/get_reviews.php?id="+str,true);
        xmlhttp.send();
    }
}


function showdetail(str) {
    if (str == "") {
        document.getElementById("txtHint2").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/get_reservation.php?id="+str,true);
        xmlhttp.send();
    }
}




    


