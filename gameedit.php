<?php 
include 'adminconnect.php';

if(isset($_POST['game_edit']))
{
	$id=$_GET['id'];
	$sql="select * from game where id='$id'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);

}
if(isset($_GET['update']))
{
$id=$_GET['update'];
$name=$_POST['gamename'];	
$date=$_POST['gamedate'];
$gamerate=$_POST['gamerate'];


$imgfile = $_FILES['edit_imgfile'];
$gamefile = $_FILES['edit_gamefile'];
		if(!empty($imgfile)){
	        $imgfileName=$_FILES['edit_imgfile']['name'];
	        $imgsize=$_FILES['edit_imgfile']['size'];
	        $imgtemp=$_FILES['edit_imgfile']['tmp_name'];
	        $imgtype=$_FILES['edit_imgfile']['type'];
	        $imgfileError=$_FILES['edit_imgfile']['error'];
	        $imgfileExt=explode('.', $imgfileName);
	        $imgfileActExt=strtolower(end($imgfileExt));
	        $imgallowed =array('png','jpg','jpeg');
 	
            $str=rand(); 
            $result_id = md5($str);  
            $imgfileNewName=$result_id.".".$imgfileActExt;
            $imgtarget='games/'.$imgfileNewName;
            move_uploaded_file($imgtemp, $imgtarget);

            if (in_array($imgfileActExt, $imgallowed)) {
		        if ($imgfileError === 0) {
                    $stmt = "update game set gameimagefile='$imgfileNewName' where id='$id'";
					mysqli_query($conn,$stmt);
		        	echo "image uploaded.";
		        }
            }else{
            	echo "image file not supported.";
            }

        }
        if(!empty($gamefile)){
	        $imgfileName=$_FILES['edit_gamefile']['name'];
	        $imgsize=$_FILES['edit_gamefile']['size'];
	        $imgtemp=$_FILES['edit_gamefile']['tmp_name'];
	        $imgtype=$_FILES['edit_gamefile']['type'];
	        $imgfileError=$_FILES['edit_gamefile']['error'];
	        $imgfileExt=explode('.', $imgfileName);
	        $imgfileActExt=strtolower(end($imgfileExt));
	        $imgallowed =array('png');
 	
            $str=rand(); 
            $result_id = md5($str);  
            $imgfileNewName=$result_id.".".$imgfileActExt;
            $imgtarget='gamefile/'.$imgfileNewName;
            move_uploaded_file($imgtemp, $imgtarget);

            if (in_array($imgfileActExt, $imgallowed)) {
		        if ($imgfileError === 0) {
                    $stmt = "update game set gamefile='$imgfileNewName' where id='$id'";
					mysqli_query($conn,$stmt);
		        	echo "image uploaded.";
		        }
            }else{
            	echo "image file not supported.";
            }

        }

        $stmt = "update game set gamename='$name', gamedate='$date' , rating='$gamerate' where id='$id'";
        mysqli_query($conn,$stmt);
       	header('location: addgame.php');
        die();	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
</head>
<body>
	<?php 
	echo"
<form method='post' action='gameedit.php?update=".$id."' enctype='multipart/form-data'>
		<label for='gamefile'>choise game</label>
		<input type='file' name='edit_gamefile'><br>
		<label for='gamefileimage'>choise game image</label>
	<input type='file' name='edit_imgfile'><br>
		<label for='gamename'>Enter game name</label>
		<input type='text' name='gamename' value=".$row['gamename']."><br>
		<label for='gamedate'>enter game date</label>
		<input type='text' name='gamedate' value=".$row['gamedate']."><br>
		<label for='gamedate'>enter game rating</label>
		<input type='text' name='gamerate' value=".$row['rating']."><br>
		<button type='submit' name='updategame'>update game</button>
		</form>";



		?>
	<a href="addgame.php">go back</a>
</body>
</html>