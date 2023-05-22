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


function checkPass() {
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if (pass1.value == pass2.value) {
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    } else {
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}



function showCom(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
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
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/getcom.php?id="+str,true);
        xmlhttp.send();
    }
}

function showComMain(str) {
    if (str == "") {
        document.getElementById("txtHintMain").innerHTML = "";
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
                document.getElementById("txtHintMain").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/getcom.php?id="+str,true);
        xmlhttp.send();
    }
}

function showFol(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
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
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/getfol.php?id="+str,true);
        xmlhttp.send();
    }
}

function showFile(str) {
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
        xmlhttp.open("GET","ajax/getfile.php?id="+str,true);
        xmlhttp.send();
    }
}

function showLink(str) {
    if (str == "") {
        document.getElementById("textarea").innerHTML = "";
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
                document.getElementById("textarea").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/getlink.php?id="+str,true);
        xmlhttp.send();
    }
}

function showLinkCom(str) {
    if (str == "") {
        document.getElementById("textarea").innerHTML = "";
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
                document.getElementById("textarea").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/getlinkcom.php?id="+str,true);
        xmlhttp.send();
    }
}

function showLinkFol(str,comid) {
    if (str == "") {
        document.getElementById("textarea").innerHTML = "";
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
                document.getElementById("textarea").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/getlinkfol.php?id="+str+"&comid="+comid,true);
        xmlhttp.send();
    }
}

function showLinkFol1(str,comid,fol) {
    if (str == "") {
        document.getElementById("textarea").innerHTML = "";
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
                document.getElementById("textarea").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/getlinkfol1.php?id="+str+"&comid="+comid+"&fol="+fol,true);
        xmlhttp.send();
    }
}

function showLinkFol2(str,comid,fol,fol1) {
    if (str == "") {
        document.getElementById("textarea").innerHTML = "";
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
                document.getElementById("textarea").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/getlinkfol2.php?id="+str+"&comid="+comid+"&fol="+fol+"&fol1="+fol1,true);
        xmlhttp.send();
    }
}


$(function(){
    CKEDITOR.replace( 'editor1', { skin : 'moono', toolbar : [ ['Paste','Source','-','Templates','-','Maximize','-','FontSize','Font','Table','-','Bold','Italic','Underline','-','JustifyLeft','JustifyCenter','JustifyRight','-','TextColor','BGColor','-','Outdent','Indent','-','Link','-','Image','-','NumberedList','-','BulletedList'] ], });
    CKEDITOR.replace( 'editor2', { skin : 'moono', toolbar : [ ['Paste','Source','-','Templates','-','Maximize','-','FontSize','Font','Table','-','Bold','Italic','Underline','-','JustifyLeft','JustifyCenter','JustifyRight','-','TextColor','BGColor','-','Outdent','Indent','-','Link','-','Image','-','NumberedList','-','BulletedList'] ], });
});




$("#anc_add1").click(function() {
    $('#tbl1 tr').last().after('<tr><td colspan="2"><input name="imgs[]" placeholder="หัวข้อ" type="file" class="form-control" ></td></tr><tr><td width="50%"><input name="title[]" placeholder="หัวข้อ" type="text" class="form-control" ></td><td><input name="detail[]" placeholder="รายละเอียด" type="text" class="form-control"></td></tr>');
});

$("#anc_rem1").click(function() {
    if ($('#tbl1 tr').size() > 2) {
        $('#tbl1 tr:last-child').remove();
    } else {
        alert('ไม่สามารถลบแถวได้ !!');
    }
});


$("#anc_add2").click(function() {
    $('#tbl2 tr').last().after('<tr><td colspan="2"><input name="imgs[]" placeholder="" type="file" class="form-control"></td></tr><tr><td><input name="detail[]" placeholder="รายละเอียด" type="text" class="form-control"></td></tr>');
});

$("#anc_rem2").click(function() {
    if ($('#tbl2 tr').size() > 2) {
        $('#tbl2 tr:last-child').remove();
    } else {
        alert('ไม่สามารถลบแถวได้ !!');
    }
});

$("#anc_add3").click(function() {
    $('#tbl3 tr').last().after('<tr><td colspan="3"><input type="file" class="form-control" id="uploadImagep" name="plan_img[]" required="required" ></td></tr><td><input name="plan_th[]" placeholder="ชื่อแบบแปลน (TH)" type="text" class="form-control" required="required"></td><td><input name="plan_en[]" placeholder="ชื่อแบบแปลน (EN)" type="text" class="form-control"></td><td><input name="plan_ch[]" placeholder="ชื่อแบบแปลน (CH)" type="text" class="form-control"></td></tr>');
});

$("#anc_rem3").click(function() {
    if ($('#tbl3 tr').size() > 2) {
        $('#tbl3 tr:last-child').remove();
    } else {
        alert('One row should be present in table');
    }
});

$("#anc_add4").click(function() {
    $('#tbl4 tr').last().after('<tr><td><input type="text" class="form-control" placeholder="รายละเอียดแปลน (TH)" name="plan_dtitle_th[]" required="required" ></td><td><input type="text" class="form-control" placeholder="รายละเอียดแปลน (EN)" name="plan_dtitle_en[]"></td><td><input type="text" class="form-control" placeholder="รายละเอียดแปลน (CH)" name="plan_dtitle_ch[]"></td></tr>');
});

$("#anc_rem4").click(function() {
    if ($('#tbl4 tr').size() > 1) {
        $('#tbl4 tr:last-child').remove();
    } else {
        alert('One row should be present in table');
    }
});


$("#anc_add5").click(function() {
    $('#tbl5 tr').last().after('<tr><td colspan="3"><input type="file" class="form-control" id="uploadImagei" name="plan_icon[]" required="required" ></td></tr><tr><td><input name="plan_detail_th[]" placeholder="ข้อมูลแปลนบ้าน (TH)" type="text" class="form-control"></td><td><input name="plan_detail_en[]" placeholder="ข้อมูลแปลนบ้าน (EN)" type="text" class="form-control"></td><td><input name="plan_detail_ch[]" placeholder="ข้อมูลแปลนบ้าน (CH)" type="text" class="form-control"></td></tr>');
});

$("#anc_rem5").click(function() {
    if ($('#tbl5 tr').size() > 2) {
        $('#tbl5 tr:last-child').remove();
    } else {
        alert('One row should be present in table');
    }
});


$("#anc_add6").click(function() {
    $('#tbl6 tr').last().after('<tr><td><input name="gall_detail_th[]" placeholder="หัวข้อ (TH)" type="text" class="form-control"></td><td><input name="gall_detail_en[]" placeholder="หัวข้อ (EN)" type="text" class="form-control"></td><td><input name="gall_detail_ch[]" placeholder="หัวข้อ (CH)" type="text" class="form-control"></td></tr>');
});

$("#anc_rem6").click(function() {
    if ($('#tbl6 tr').size() > 1) {
        $('#tbl6 tr:last-child').remove();
    } else {
        alert('One row should be present in table');
    }
});

$("#anc_add7").click(function() {
    $('#tbl7 tr').last().after('<tr><td colspan="3"><textarea rows="5" cols="40" name="projectgall_detail_code[]" class="form-control" placeholder="VIRTUAL TOUR 360"></textarea></td></tr><tr><td><input name="projectgall_detail_th[]" placeholder="หัวข้อ (TH)" type="text" class="form-control"></td><td><input name="projectgall_detail_en[]" placeholder="หัวข้อ (EN)" type="text" class="form-control"></td><td><input name="projectgall_detail_ch[]" placeholder="หัวข้อ (CH)" type="text" class="form-control"></td></tr>');
});

$("#anc_rem7").click(function() {
    if ($('#tbl7 tr').size() > 2) {
        $('#tbl7 tr:last-child').remove();
    } else {
        alert('One row should be present in table');
    }
});

$("#anc_add8").click(function() {
    $('#tbl8 tr').last().after('<tr><td><input name="projectlocation_th[]" placeholder="สถานที่ใกล้เคียง (TH)" type="text" class="form-control"></td><td><input name="projectlocation_en[]" placeholder="สถานที่ใกล้เคียง (EN)" type="text" class="form-control"></td><td><input name="projectlocation_ch[]" placeholder="สถานที่ใกล้เคียง (CH)" type="text" class="form-control"></td></tr><tr><td colspan="3"><input name="projectlocation_km[]" placeholder="ระยะทาง" type="text" class="form-control"></td></tr>');
});

$("#anc_rem8").click(function() {
    if ($('#tbl8 tr').size() > 2) {
        $('#tbl8 tr:last-child').remove();
    } else {
        alert('One row should be present in table');
    }
});

$("#anc_add9").click(function() {
    $('#tbl9 tr').last().after('<tr><td><input type="text" name="address_th[]" id="address_th"  class="form-control" placeholder="ที่อยู่ (TH)"></td><td><input type="text"  name="address_en[]" id="address_en" class="form-control" placeholder="ที่อยู่ (EN)"></td><td><input type="text"  name="address_ch[]" id="address_ch" class="form-control" placeholder="ที่อยู่ (CH)"></td></tr>');
});

$("#anc_rem9").click(function() {
    if ($('#tbl9 tr').size() > 1) {
        $('#tbl9 tr:last-child').remove();
    } else {
        alert('One row should be present in table');
    }
});


$("#anc_add10").click(function() {
    $('#tbl10 tr').last().after('<tr><td><input type="text" name="haddress_th[]" id="haddress_th" required="required" class="form-control" placeholder="ที่อยู่ (TH)"></td><td><input type="text"  name="haddress_en[]" id="haddress_en" class="form-control" placeholder="ที่อยู่ (EN)"></td><td><input type="text"  name="haddress_ch[]" id="haddress_ch" class="form-control" placeholder="ที่อยู่ (CH)"></td></tr>');
});

$("#anc_rem10").click(function() {
    if ($('#tbl10 tr').size() > 1) {
        $('#tbl10 tr:last-child').remove();
    } else {
        alert('One row should be present in table');
    }
});


$("#anc_add11").click(function() {
    $('#tbl11 tr').last().after('<tr><td colspan="3"><input type="file" class="form-control" id="files_hotdealsdetail" name="hotdealsdetail_img[]" required="required"></td></tr><tr><td><input name="hotdealsdetail_th[]" placeholder="รายละเอียดย่อย (TH)" type="text" class="form-control" required="required"></td><td><input name="hotdealsdetail_en[]" placeholder="รายละเอียดย่อย (EN)" type="text" class="form-control"></td><td><input name="hotdealsdetail_ch[]" placeholder="รายละเอียดย่อย (CH)" type="text" class="form-control"></td></tr>');
});

$("#anc_rem11").click(function() {
    if ($('#tbl11 tr').size() > 2) {
        $('#tbl11 tr:last-child').remove();
    } else {
        alert('One row should be present in table');
    }
});


$("#anc_add12").click(function() {
    $('#tbl12 tr').last().after('<tr><td><input name="title_th[]" placeholder="หัวข้อ (TH)" type="text" class="form-control" required="required"></td><td><input name="detail_th[]" placeholder="รายละเอียด (TH)" type="text" class="form-control"></td></tr><tr><td><input name="title_en[]" placeholder="หัวข้อ (EN)" type="text" class="form-control"></td><td><input name="detail_en[]" placeholder="รายละเอียด (EN)" type="text" class="form-control"></td></tr><tr><td><input name="title_ch[]" placeholder="หัวข้อ (CH)" type="text" class="form-control"></td><td><input name="detail_ch[]" placeholder="รายละเอียด (CH)" type="text" class="form-control"></td></tr>');
});

$("#anc_rem12").click(function() {
    if ($('#tbl12 tr').size() > 3) {
        $('#tbl12 tr:last-child').remove();
    } else {
        alert('One row should be present in table');
    }
});


$("#anc_add13").click(function() {
    $('#tbl13 tr').last().after('<tr><td><input type="text" name="pastadd_th[]" id="pastadd_th" required="required" class="form-control" placeholder="ที่อยู่ (TH)"></td><td><input type="text"  name="pastadd_en[]" id="pastadd_en" class="form-control" placeholder="ที่อยู่ (EN)"></td> <td><input type="text"  name="pastadd_ch[]" id="pastadd_ch" class="form-control" placeholder="ที่อยู่ (CH)"></td></tr>');
});

$("#anc_rem13").click(function() {
    if ($('#tbl13 tr').size() > 1) {
        $('#tbl13 tr:last-child').remove();
    } else {
        alert('One row should be present in table');
    }
});


$("#anc_add14").click(function() {
    $('#tbl14 tr').last().after('<tr><td colspan="3"><input type="file" class="form-control" id="uploadImagep" name="building_img[]"></td></tr><tr><td><input name="building_th[]" placeholder="ชื่อแปลนอาคาร (TH)" type="text" class="form-control"></td><td><input name="building_en[]" placeholder="ชื่อแปลนอาคาร (EN)" type="text" class="form-control"></td><td><input name="building_ch[]" placeholder="ชื่อแปลนอาคาร (CH)" type="text" class="form-control"></td></tr>');
});

$("#anc_rem14").click(function() {
    if ($('#tbl14 tr').size() > 2) {
        $('#tbl14 tr:last-child').remove();
    } else {
        alert('One row should be present in table');
    }
});
/**/

// setup the varriables
var textarea = document.getElementById("textarea");
var answer = document.getElementById("copyAnswer");
var copy   = document.getElementById("copyBlock");
copy.addEventListener('click', function(e) {

   // Select some text (you could also create a range)
   textarea.select(); 

   // Use try & catch for unsupported browser
   try {

       // The important part (copy selected text)
       var successful = document.execCommand('copy');

       if(successful) answer.innerHTML = 'Copied!';
       else answer.innerHTML = 'Unable to copy!';
   } catch (err) {
       answer.innerHTML = 'Unsupported Browser!';
   }
});


function showApp(str) {
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
        xmlhttp.open("GET","ajax/getapp.php?id="+str,true);
        xmlhttp.send();
    }
}


function showPro(str) {
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
        xmlhttp.open("GET","ajax/getpro.php?id="+str,true);
        xmlhttp.send();
    }
}


function showHome(str) {
    if (str == "") {
        document.getElementById("txtHint3").innerHTML = "";
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
                document.getElementById("txtHint3").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/getwizehome.php?id="+str,true);
        xmlhttp.send();
    }
}

function showTheme(str) {
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
        xmlhttp.open("GET","ajax/gettheme.php?id="+str,true);
        xmlhttp.send();
    }
}
