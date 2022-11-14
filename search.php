<?php 
          include'adminconnect.php';

     if(isset($_POST['search'])){
          $search=$_POST['search'];
          $sql="SELECT * from game where gamename like '%".$search."%' order by id DESC ";
          $result= mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)>0){
            while($row =mysqli_fetch_assoc($result)){
              echo "
                <div class='card col-sm-4 mb-2'>
                   <img src='games/".$row['gameimagefile']."'>
                  <div class='card-body'>
                    <h5 class='card-title'>".$row['gamename']."</h5>
                    <p class='card-text'>".$row['gamedate']."</p>
                    <a href='gamefile/".$row['gamefile']."' class='btn btn-primary' download>Download <i class='fas fa-download'></i> </a>
                  </div>
                </div>
              ";
            }
          }else{
            echo "<div class='alert alert-warning'>No game named ".$search." found</div>";
          }
     }
 ?>