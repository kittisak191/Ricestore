<?php

function logout(){
include("include/connect_db.php");
  	session_destroy();
  	echo "<script>window.location='index.php'</script>";	
}
?>



