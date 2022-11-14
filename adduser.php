<?php 
include 'adminconnect.php';
if(isset($_GET['del_id']))
{
$id=$_GET['del_id'];
$sql="delete from login where id='$id'";
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
	<form method="post" action="addgameprocess.php" >

		<label>Enter user name</label>
		<input type="text" name="username"><br>
		<label>enter email</label>
		<input type="email" name="email"><br>
		<label>enter password</label>
		<input type="password" name="password"><br>
		<button name="user">add user</button>
		</form>
<table border="1" cellspacing="0">
	<tr>
		<td> id</td>
		<td>user name</td>
		<td>user email</td>
		<td>action</td>
	</tr>


<?php 

$sql="select * from login";
$result = mysqli_query($conn,$sql); 
if(mysqli_num_rows($result)>0){
  	while($row =mysqli_fetch_assoc($result)){ 
		echo "<tr> 
		<td style='padding:27px;'>".$row['id']."</td>

		<td style='padding:27px;'>".$row['name']."</td>
		<td style='padding:27px;'>".$row['email']."</td>
		<td>
	    <form action='useredit.php?id=".$row['id']."' method='post'>
	      <button type='submit' name='user_edit' value='' class='btn btn-success gradienttwo op'>Edit </button>
	      </form>
	      <form action='adduser.php?del_id=".$row['id']."' method='post'>
	      <button type='submit' name='user_delete' value='' class='btn btn-success gradienttwo op'>delete </button>
	      </form>
         </td>
         </tr>";
         }}
 ?>
</table>
</body>
</html>