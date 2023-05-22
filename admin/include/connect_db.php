<?php
	date_default_timezone_set('Asia/Bangkok');
	$host="localhost";
	$username="root";
	$password="";
	$db="ricestore";
	$conn=mysqli_connect($host,$username,$password,$db);
	if(!$conn) {
		die('Not connected : '.mysqli_error());
	}
	mysqli_set_charset($conn, 'utf8');
?>

