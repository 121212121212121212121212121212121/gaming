<?php 
session_start(); 
include "connect.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=E-mail is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
	
        
		$sql = "SELECT * FROM login WHERE email='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $uname && $row['password'] === $pass) {
            	$_SESSION['id'] = $row['id'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['email'] = $row['email'];
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect E-mail or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect E-mail or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}