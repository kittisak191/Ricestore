function del_pic(del_id,field,id){
		var cn=confirm("ยืนยันการลบรูปภาพ");
			if(cn){
				$('#pictr').html("<img src='admin_image/wait.gif' width='220' height='20' />");	
				$.post("admin_manage/del_pic.php",{del_id:del_id,field:field,id:id},function(data){
				//alert("ลบข้อมูลเรียบร้อยแล้ว");
				$('#pictr').fadeOut(800);
			});
		}
	}
	function del_file(del_id,field,id){
		var cn=confirm("ยืนยันการลบไฟล์");
			if(cn){
				$('#pictr').html("<img src='admin_image/wait.gif' width='220' height='20' />");	
				$.post("admin_manage/del_file.php",{del_id:del_id,field:field,id:id},function(data){
				//alert("ลบข้อมูลเรียบร้อยแล้ว");
				$('#pictr').fadeOut(800);
			});
		}
	}
	function del_pic1(del_id,table,field,id){
		var cn=confirm("ยืนยันการลบรูปภาพ");
			if(cn){
				$('#'+del_id).html("<td class=\"tb-line\" colspan=\"7\"><img src='admin_image/wait.gif' width='220' height='20' /></td>");	
				$.post("admin_manage/del_pic1.php",{del_id:del_id,table:table,field:field,id:id},function(data){
				//alert("ลบข้อมูลเรียบร้อยแล้ว");
				$('#'+del_id).fadeOut(800);
			});
		}
	}
	function del_pic2(del_id,table,field,id){
		var cn=confirm("ยืนยันการลบรูปภาพ");
			if(cn){
				$('#'+del_id).html("<img src='admin_image/wait_change.gif' width='20' height='20' />");	
				$.post("admin_manage/del_pic2.php",{del_id:del_id,table:table,field:field,id:id},function(data){
				//alert("ลบข้อมูลเรียบร้อยแล้ว");
				$('#'+del_id).fadeOut(800);
			});
		}
	}
function del_tr(del_id,field,id){
		var cn=confirm("ยืนยันการลบ");
			if(cn){
				$('#'+del_id).html("<td class=\"tb-line\" colspan=\"7\"><img src='admin_image/wait.gif' width='220' height='20' /></td>");	
				$.post("admin_manage/del_tr.php",{del_id:del_id,field:field,id:id},function(data){
				//alert("ลบข้อมูลเรียบร้อยแล้ว");
				$('#'+del_id).fadeOut(800);
			});
		}
	}


function change_show(show_id,field,id,shows){
		var cn=confirm("ยืนยันการแก้ไขข้อมูล");
			if(cn){
				var change="#change"+show_id;
				$(change).html("<img src='admin_image/wait_change.gif' width='20' height='20' />");	
				$.post("admin_manage/change_show.php",{show_id:show_id,field:field,id:id,shows:shows},function(data){
				//alert("ยืนยันการแก้ไขข้อมูล");
				$(change).html(data);
			});
		}
	}
function change_show1(show_id,field,id,shows){
		var cn=confirm("ยืนยันการแก้ไขข้อมูล");
			if(cn){
				var change1="#change1"+show_id;
				$(change1).html("<img src='admin_image/wait_change.gif' width='20' height='20' />");	
				$.post("admin_manage/change_show1.php",{show_id:show_id,field:field,id:id,shows:shows},function(data){
				//alert("ยืนยันการแก้ไขข้อมูล");
				$(change1).html(data);
			});
		}
	}


function show_index(show_id,field,id,shows){
		var cn=confirm("ยืนยันการแก้ไขข้อมูล");
			if(cn){
				var change="#s_index"+show_id;
				$(change).html("<img src='admin_image/wait_change.gif' width='20' height='20' />");	
				$.post("admin_manage/show_index.php",{show_id:show_id,field:field,id:id,shows:shows},function(data){
				alert("ยืนยันการแก้ไขข้อมูล");
				$(change).html(data);
			});
		}
	}



function del_map(del_id,field,id){
		var cn=confirm("ยืนยันการลบรูปภาพ");
			if(cn){
				$('#pictr1').html("<img src='admin_image/wait.gif' width='220' height='20' />");	
				$.post("admin_manage/del_map.php",{del_id:del_id,field:field,id:id},function(data){
				alert("ลบข้อมูลเรียบร้อยแล้ว");
				$('#pictr1').fadeOut(800);
			});
		}
	}
function CheckNum(){
		if (event.keyCode < 48 || event.keyCode > 57){
		      event.returnValue = false;
	    	}
	}

