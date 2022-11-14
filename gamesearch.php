<?php
     session_start();
          include'adminconnect.php';

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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="customerdb.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <style type="text/css">
      
header{
  padding: 10px!important;
  height: 70px!important;
}
.card img{
    height: 150px;
    width: auto;
    object-fit: cover;
}
.card-body{
background: white;
}
.card{
    background: none!important;
    border: none!important;
}
    </style>
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
        <a href="customerdb.php"  ><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="#"  class="hov"><i class="fas fa-info-circle"></i><span>Game</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="profile_info">
        <img src="z.jpg" class="profile_image" alt="">
        <h4>Customer</h4>
      </div>
      <a href="customerdb.php" ><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="#" class="hov"><i class="fas fa-info-circle"></i><span>Game</span></a>
    </div>
    <!--sidebar end-->

    <div class="content">
    <div class="input-group mb-3">
      <input type="text" id="searchbtn" class="form-control" placeholder="Search for game.">
      <button class="btn btn-primary" type="button">search</button>
    </div>
      <div class="row" id="list">
          <?php
          $sql="select * from game order by id desc";
          $result= mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)>0){
            while($row =mysqli_fetch_assoc($result)){
              echo "
                <div class='card col-sm-4 mb-2'>
                   <img src='games/".$row['gameimagefile']."'>
                  <div class='card-body'>
                    <h5 class='card-title'>".$row['gamename']."</h5>
                    <p>".$row['gamedate']."</p>
                    <p>rating:".$row['rating']."/5</p>

                    <a href='gamefile/".$row['gamefile']."' class='btn btn-primary' download>Download <i class='fas fa-download'></i> </a>
                  </div>
                </div>
              ";}}
         ?>
       </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    $("#searchbtn").keyup(function(){
        var search = $("#searchbtn").val();
        $.ajax({
          type:'POST',
          url:'search.php',
          data:{
            search:search,
          },
          success:function(data){
            $("#list").html(data);
          }
        })
      });
    });
    </script>

  </body>
</html>