<?php 
include 'adminconnect.php';
if(isset($_GET['del_id']))
{
$id=$_GET['del_id'];
$sql="delete from game where id='$id'";
mysqli_query($conn,$sql);
}





 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
		<style type="text/css">
			img{
				height: 100px;
				width: 100px;
				object-fit: cover;
			}
		</style>
</head>
<body>
	<form method="post" action="addgameprocess.php" enctype="multipart/form-data">
		<label for="gamefile">choise game</label>
		<input type="file" name="gamefile"><br>
		<label for="gamefileimage">choise game image</label>
			<input type="file" name="gamefileimage"><br>
		<label for="gamename">Enter game name</label>
		<input type="text" name="gamename"><br>
		<label for="gamedate">enter game date</label>
		<input type="text" name="gamedate"><br>
		<label for="gamedate">enter game rating from 1-5</label>
		<input type="text" name="gamerate"><br>
		<button name="addgame">addgame</button>
		</form>
<table border="1" cellspacing="0">
	<tr>
		<td> id</td>
		<td>image</td>
		<td>gamename</td>
		<td>addeddate</td>
		<td>action</td>
	</tr>


<?php 

$sql="select * from game";
$result = mysqli_query($conn,$sql); 
if(mysqli_num_rows($result)>0){
  	while($row =mysqli_fetch_assoc($result)){ 
		echo "<tr> 
		<td style='padding:27px;'>".$row['id']."</td>
		<td style='padding:27px;'><img src='games/".$row['gameimagefile']."'</td>

		<td style='padding:27px;'>".$row['gamename']."</td>
		<td style='padding:27px;'>".$row['gamedate']."</td>
		<td>
	    <form action='gameedit.php?id=".$row['id']."' method='post'>
	      <button type='submit' name='game_edit' value='' class='btn btn-success gradienttwo op'>Edit </button>
	      </form>
	      <form action='addgame.php?del_id=".$row['id']."' method='post'>
	      <button type='submit' name='game_delete' value='' class='btn btn-success gradienttwo op'>delete </button>
	      </form>
         </td>
         </tr>";
         }}
 ?>
</table>
</body>
</html>