<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
      <?php header("location: customerdb.php");  ?>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>