<?php session_start(); ?>
<meta charset="utf-8">
<?php
include 'include/connect_db.php'; 

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($username) or empty($password)){

		echo "<script>alert('กรุณากรอก username และ password ให้ถูกต้อง'),window.location='index.php'</script>";
		
	}else{
	
		$result=mysqli_query($conn,"SELECT * FROM admin_rice where username = '$username'  and password = '$password'") or die(mysqli_error());
		$num = mysqli_num_rows($result);
		$sql = mysqli_fetch_array($result);

		if($username == $sql["username"] and $password == $sql["password"]) {
			$_SESSION['login_result'] = true;
			$_SESSION['login_user'] = $sql["username"];
			$_SESSION['login_id'] = $sql["id"];
		

			if(!empty($_POST["remember"])) {
			    setcookie ("member_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
			    setcookie ("member_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
			    if(isset($_COOKIE["member_login"])) {
			        setcookie ("member_login","");
			    }
			    if(isset($_COOKIE["member_password"])) {
			        setcookie ("member_password","");
			    }
			}
			    echo "<script>window.location='index.php?module=home&action=home_index'</script>";
			
		}else{
			
			$_SESSION['login_result'] = false;
			echo "<script>alert('Username หรือ Password ผิดพลาด'),window.location='index.php'</script>";
				
		}
	}	
?>