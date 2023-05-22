$(document).ready(function() {
    $('.bxslider').bxSlider({
        auto: true,
        autoControls: false,
        pager: false
    });



    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    
    
    
    $('#plan').click(function() {
        $('html,body').animate({
            scrollTop: $("#plan_shw").offset().top
        }, 600);
        return false;
    });
    $('#roomtype').click(function() {
        $('html,body').animate({
            scrollTop: $("#roomtype_shw").offset().top
        }, 600);
        return false;
    });
    $('#roomrate').click(function() {
        $('html,body').animate({
            scrollTop: $("#roomrate_shw").offset().top
        }, 600);
        return false;
    });
    $('#facilities').click(function() {
        $('html,body').animate({
            scrollTop: $("#facilities_shw").offset().top
        }, 600);
        return false;
    });
    $('#gallery').click(function() {
        $('html,body').animate({
            scrollTop: $("#gallery_shw").offset().top
        }, 600);
        return false;
    });

});



function loadPlan(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("shw_plan").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "ajax/ajax_plan.php?id="+id, true);
    xhttp.send();
}

function loadRoom(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("shw_room").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "ajax/ajax_room.php?id="+id, true);
    xhttp.send();
}
