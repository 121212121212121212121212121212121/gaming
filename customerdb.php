<?php
     session_start();

     if (!isset($_SESSION['email'])){
      echo"you are logged out";
          header('location: homes.php');
     }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.Gaming.com</title>
    <link rel="stylesheet" href="customerdb.css">
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
        <img src="z.jpg" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a href="#"  class="hov"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="gamesearch.php"><i class="fas fa-gamepad"></i><span>Game</span></a>
         
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="profile_info">
        <img src="z.jpg" class="profile_image" alt="">
        <h4><?php 
        
echo $_SESSION['email'];
         ?></h4>
      </div>
      <a href="#" class="hov"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="gamesearch.php"><i class="fas fa-gamepad"></i><span>Game</span></a>
      
    </div>
    <!--sidebar end-->

    <div class="content">
      <div class="card">
        <p>Welcome <?php echo $_SESSION['email']; ?></p>
      </div>
      <div class="card">
        <p>A game is a structured form of play, usually undertaken for entertainment or fun, and sometimes used as an educational tool.[1] Games are distinct from work, which is usually carried out for remuneration, and from art, which is more often an expression of aesthetic or ideological elements. However, the distinction is not clear-cut, and many games are also considered to be work (such as professional players of spectator sports or games) or art (such as jigsaw puzzles or games involving an artistic layout such as Mahjong, solitaire, or some video games).</p>
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