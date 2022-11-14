<?php
     session_start();
          include'adminconnect.php';


     if (!isset($_SESSION['name'])){
      echo"you are logged out";
          header('location: homes.php');
     }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.gaming.com</title>
    <link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h2>Welcome to<span> Gaming world</span></h2>
      </div>
      <div class="right_area">
        <a href="logout.php" class="logout_btn">Logout</a>
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <img src="a.jpg" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a href="#" class="hov"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="addgame.php"><i class="fas fa-gamepad"></i><span>Add game</span></a>
        <a href="adduser.php"><i class="fas fa-users"></i><span>Add user</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="profile_info">
        <img src="a.jpg" class="profile_image" alt="">
        <h4>Admin</h4>
      </div>
      <a href="#" class="hov"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="addgame.php"><i class="fas fa-gamepad"></i>Add game</span></a>
      <a href="adduser.php"><i class="fas fa-users"></i><span>Add user</span></a>
    </div>
    <!--sidebar end-->
    <div class="content">
      <div class="row mt-4">
        <div class="col">
          <div class="card">
            <h1>Total Games</h1>
            <h3>
              <?php 
                echo $conn->query("SELECT * from game")->num_rows;
             ?>
               
             </h3>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <h1>Total Customer</h1>
            <h3>
              <?php 
                echo $conn->query("SELECT * from login")->num_rows;
             ?>
            </h3>

          </div>
        </div>
        <div class="col">
          <div class="card">
            <h1>Total admin</h1>
            <h3>
              <?php 
                echo $conn->query("SELECT * from admin")->num_rows;
             ?>
            </h3>
          </div>
        </div>

      </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>

  </body>
</html>