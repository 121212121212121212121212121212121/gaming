<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="game.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.15.2/css/all.css' integrity='sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu' crossorigin='anonymous'>
</head>
<body>
  <div class="blog-posts">
      <?php
      include'../adminconnect.php';
      $sql="select * from game order by id desc";
      $result= mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        while($row =mysqli_fetch_assoc($result)){
          echo "
            <div class='post'>
            <a href='gamefile/".$row['gamefile']."' download>
            <img src='".$row['gameimagefile']."' class='post-img'>
            <div class='post-content'>
            <h3>".$row['gamename']."</h3>
             <span class='date'>".$row['gamedate']."</span>
             <i class='fas fa-download'></i>
            </div>
          </a>
          </div>";}}
     ?>
     <a href="index.php"></a>
   </div>
  </div>
</body>
</html>