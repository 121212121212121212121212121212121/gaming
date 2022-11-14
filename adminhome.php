<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <?php header("location: admindb.php");  ?>
</body>
</html>

<?php 
}else{
     header("Location: admin.php");
     exit();
}
 ?>
