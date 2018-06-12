<?php
session_start();
ob_start();
?>
<?php 
include("header.php");
include("auth.php");

$enrollsession=$_SESSION["enroll"]; 
?>

<body class="with-top-navbar">
  

<?php


$detail="SELECT * FROM `student` WHERE enroll_no='$enrollsession'";
$detail1 = mysqli_query($link,$detail);
if (mysqli_num_rows($detail1)>0) {
  $detail2= mysqli_fetch_array($detail1);
    }

    ?>


<div class="container p-t-md">
  <div class="row">
    <div class="col-md-3">
    </div>

    <div class="col-md-6">
      <ul class="list-group media-list media-list-stream">

        <li class="media list-group-item p-a">
        </li>


<?php
$count=0;
$loop= "SELECT * FROM `post` LIMIT 20";
$value = mysqli_query($link,$loop);
while ($row = mysqli_fetch_array($value))
{
  
$enrollfind=$row['enroll_no'];

$udetail="SELECT * FROM `student` WHERE enroll_no='$enrollfind'";
$udetail1 = mysqli_query($link,$udetail);
if (mysqli_num_rows($udetail1)>0) {
  $udetail2= mysqli_fetch_array($udetail1);
    }



 echo"       <li class='media list-group-item p-a'>";
 echo"        <a class='media-left' href='#'> <img class='media-object img-circle' src='assets/profile/gi4823'></a>";
 echo"         <div class='media-body'><div class='media-heading'><small class='pull-right text-muted'>text post</small><h5>".$udetail2['full_name']."</h5></div>";
 echo"            <p>".$row['text']."</p>";
 echo"   <form method='post' role='form' action='".$_PHP_SELF."'>";
 echo"   <div class='form-group'> <input class='form-control' type='hidden' value=".$row['id']." name='id' ></div>";
 echo"  <button class='btn btn-primary'  name='senderbutton'>Delete Now</button></div></div></form>";        
 echo"          </div></li>";
  }
  ?>
      </ul>
    </div>
    <div class="col-md-3">
      


    </div>
  </div>
</div>


<?php
 $id =$_POST['id'];

if(isset($_POST['senderbutton']))
{  
$query = "DELETE FROM `post` WHERE id='$id'";
      
            if (mysqli_query($link,$query)) {
              echo "<p>Successfully deleted! Kindly <a href='updatefeed.php'>refresh the page</a></p>";
                
                
            } else {
                
                echo "<p>There was a problem in deleting  feed - please try again later.</p>";
                } }
        
?>





    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
    <script>
      // execute/clear BS loaders for docs
      $(function(){
        if (window.BS&&window.BS.loader&&window.BS.loader.length) {
          while(BS.loader.length){(BS.loader.pop())()}
        }
      })
    </script>
  </body>
</html>

