
<!DOCTYPE html>
<html>
<head>
	    <title>ADMIN</title>
	    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="adminlogin.php" method="post">
           <h2>Admin</h2>
           <?php if (isset($_GET['error'])) { ?>
           <p class="error"><?php echo $_GET['error']; ?></p>
           <?php } ?>
           <label>Username</label>
           <input type="text" name="uname" placeholder="name"><br>

           <label>Password</label>
           <input type="password" name="password" placeholder="Password"><br>

           <button type="submit">Login</button>
     	      <a href="#" class="aa">For Admin Only!</a><br>
            
      </form>
</body>
</html>