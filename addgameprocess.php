<?php 
include 'adminconnect.php';
 
	if(isset($_POST['gamename'])){
        $gamename=$_POST['gamename'];
        $gamedate=$_POST['gamedate'];
        $gamefile=$_FILES['gamefile'];
        $gamefileimage =$_FILES['gamefileimage'];
        $gamerate=$_POST['gamerate'];
       
		if( (!empty($gamename)) && (!empty($gamedate))  && (!empty($gamefile)) && (!empty($gamefileimage)) )
		{
	        $gamefileimageName=$_FILES['gamefileimage']['name'];
	        $gamefileimagesize=$_FILES['gamefileimage']['size'];
	        $gamefileimagetemp=$_FILES['gamefileimage']['tmp_name'];
	        $gamefileimagetype=$_FILES['gamefileimage']['type'];
	        $gamefileimageError=$_FILES['gamefileimage']['error'];
	        $gamefileimageExt=explode('.', $gamefileimageName);
	        $gamefileimageActExt=strtolower(end($gamefileimageExt));
	        $gamefileimageallowed =array('jpg' , 'jpeg', 'png');

	        $gamefileName=$_FILES['gamefile']['name'];
	        $gamesize=$_FILES['gamefile']['size'];
	        $gametemp=$_FILES['gamefile']['tmp_name'];
	        $gametype=$_FILES['gamefile']['type'];
	        $gamefileError=$_FILES['gamefile']['error'];  
	        $gamefileExt=explode('.', $gamefileName);
	        $gamefileActExt=strtolower(end($gamefileExt));
	        $gameallowed =array('exe');

	        if ( in_array($gamefileimageActExt, $gamefileimageallowed) && in_array($gamefileActExt, $gameallowed) ) {
	            if ($gamefileimageError === 0 && $gamefileError === 0) {
	                    $query="SELECT gamename from game where gamename=? LIMIT 1";
	                    $stmt = $conn->prepare($query);
	                    $stmt -> bind_param("s", $gamename);
	                    $stmt -> execute();
	                    $stmt -> bind_result($gamename);
	                    $stmt ->store_result();
	                    if(!$stmt->fetch()){
	                        $str=rand(); 
	                        $result_id = md5($str);  
	                        $gamefileimageNewName="profile".$result_id.".".$gamefileimageActExt;
	                        $gamefileimagetarget='games/'.$gamefileimageNewName;
	                        move_uploaded_file($gamefileimagetemp, $gamefileimagetarget);
	                        $gamefileNewName="profile".$result_id.".".$gamefileActExt;
	                        $gametarget='gamefile/'.$gamefileNewName;
	                        move_uploaded_file($gametemp, $gametarget);
	                        $stmt->close();
	                        $stmt = $conn->prepare("INSERT INTO game(gamename,gamedate,gameimagefile,gamefile,rating) VALUES(?,?,?,?,?)");
	                        $stmt -> bind_param("ssssi",$gamename,$gamedate,$gamefileimageNewName,$gamefileNewName,$gamerate);
	                        $stmt -> execute();
	                         header('location: addgame.php');
	                    }else{
	                        echo "Sorry but the game already exist.";
	                    }
	                    $stmt->close();
	                    $conn->close();
	            }else{
	                echo "file was corrupted please try again with different file.";
	            }
	        }else{
	            echo 'Wrong file type only supports jpg, jpeg, png as image and exe as game.';
	        }
	    }
	    else{
	    	echo "PLease fill all fileds";
	    }
	}

	if(isset($_POST['username'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
       
		if( (!empty($username)) && (!empty($email))  && (!empty($password)) )
		{

	                    $query="SELECT email from login where email=? LIMIT 1";
	                    $stmt = $conn->prepare($query);
	                    $stmt -> bind_param("s", $email);
	                    $stmt -> execute();
	                    $stmt -> bind_result($email);
	                    $stmt ->store_result();
	                    if(!$stmt->fetch()){

	                        $stmt = $conn->prepare("INSERT INTO login(name,email,password) VALUES(?,?,?)");
	                        $stmt -> bind_param("sss",$username,$email,$password);
	                        $stmt -> execute();
	                         header('location: adduser.php');
	                    }else{
	                        echo "Sorry but the email already exist.";
	                    }
	                    $stmt->close();
	                    $conn->close();
	    }
	    else{
	    	echo "PLease fill all fileds";
	    }
	}
 ?>