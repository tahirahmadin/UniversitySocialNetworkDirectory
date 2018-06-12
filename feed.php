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
      <div class="panel panel-default panel-profile m-b-md">
        <div class="panel-heading" style="background-image: url(assets/img/iceland.jpg);"></div>
        <div class="panel-body text-center">
          <a href="profile/index.html">
            <img
              class="panel-profile-img"
              src="assets/profile/<?php echo $detail2['enroll_no']; ?>">
          </a>

          <h5 class="panel-title">
            <?php echo $detail2['full_name']; ?>
          </h5>

          <p class="m-b-md"><?php echo $detail2['tagline']; ?></p>

          <ul class="panel-menu">
            <li class="panel-menu-item">
              <a href="#userModal" class="text-inherit" data-toggle="modal">
                Views
                <h5 class="m-y-0"><?php echo $detail2['views']; ?></h5>
              </a>
            </li>

            <li class="panel-menu-item">
              <a href="#userModal" class="text-inherit" data-toggle="modal">
                Daily Views
                <h5 class="m-y-0"><?php echo $detail2['daily_views']; ?></h5>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="panel panel-default visible-md-block visible-lg-block">
        <div class="panel-body">
          <h5 class="m-t-0">About <small>· <a href="#">Edit</a></small></h5>
          <ul class="list-unstyled list-spaced">
            <li><span class="text-muted icon icon-calendar m-r"></span>Went to <a href="#"><?php echo $detail2['home_city']; ?></a>
            <li><span class="text-muted icon icon-users m-r"></span>Instagram  <a href="http://instagram.com/<?php echo $detail2['insta'];?>">Link</a>
            <li><span class="text-muted icon icon-github m-r"></span>Faculty <a href="#"><?php echo $detail2['faculty_name']; ?></a>
            <li><span class="text-muted icon icon-home m-r"></span>Lives in <a href="#"><?php echo $detail2['cur_city']; ?></a>
            <li><span class="text-muted icon icon-location-pin m-r"></span>From <a href="#"><?php echo $detail2['home_city']; ?></a>
          </ul>
        </div>
      </div>

       <div class="panel panel-default visible-md-block visible-lg-block">
        <div class="panel-body">
          <h5 class="m-t-0">Photos <small>· <a href="#">Edit</a></small></h5>
          <div data-grid="images" data-target-height="150">
            <div>
              <img data-width="640" data-height="640" data-action="zoom" src="assets/img/instagram_5.jpg">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom" src="assets/img/instagram_6.jpg">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom" src="assets/img/instagram_7.jpg">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom" src="assets/img/instagram_8.jpg">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom" src="assets/img/instagram_9.jpg">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom" src="assets/img/instagram_10.jpg">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <ul class="list-group media-list media-list-stream">

        <li class="media list-group-item p-a">
<?php

 echo"   <form method='post' role='form' action='".$_PHP_SELF."'>";

 echo"   <div class='form-group'><textarea class='form-control' rows='3'  placeholder='Message' name='message'></textarea></div>";


 echo"      <div class='form-group'> <input class='form-control' type='hidden' value=".date("l jS \of F h:i:s A")." name='time' ></div>";
    
 echo"    <div class='form-group'>";
 echo"  <div class='m-b-lg'>";
 echo"  <button class='btn btn-primary'  name='senderbutton'>Send Now</button></div></div></form>";

 ?>
    <?php
 $message =$_POST['message'];
 $time =$_POST['time']; 

if(isset($_POST['senderbutton']))
{  
$query = "INSERT INTO `post`(`enroll_no`, `text`, `time`) VALUES ('$enrollsession','$message','$time')";
      
            if (mysqli_query($link,$query)) {
              echo "<p>Successfully posted!.</p>";
                
                
            } else {
                
                echo "<p>There was a problem in posting message - please try again later.</p>";
                } }
        
?>
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
 echo"        <a class='media-left' href='#'> <img class='media-object img-circle' src='assets/profile/".$udetail2['enroll_no']."'></a>";
 echo"         <div class='media-body'><div class='media-heading'><small class='pull-right text-muted'>34 min</small><h5>".$udetail2['full_name']."</h5></div>";
 echo"            <p>".$row['text']."</p>";
          
 echo"          </div></li>";
  }
  ?>
      </ul>
    </div>
    <div class="col-md-3">
      <div class="alert alert-warning alert-dismissible hidden-xs" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <a class="alert-link" href="profile/index.html">Visit your profile!</a> Check your self, you aren't looking too good.
      </div>

      <div class="panel panel-default m-b-md hidden-xs">
        <div class="panel-body">
          <h5 class="m-t-0">Sponsored</h5>
          <div data-grid="images" data-target-height="150">
            <img class="media-object" data-width="640" data-height="640" data-action="zoom" src="assets/img/instagram_2.jpg">
          </div>
          <p><strong>EWYL Inc.</strong> Are you looking for startup solution? You are at the right place.</p>
          <a href="https://www.facebook.com/ewylworkshop" type="button" class="btn btn-primary-outline btn-sm">Order Now</a>
        </div>
      </div>

      <div class="panel panel-default m-b-md hidden-xs">
        <div class="panel-body">
        <h5 class="m-t-0">Profiles <small>· <a href="#">View All</a></small></h5>
        <ul class="media-list media-list-stream">
          <li class="media m-b">
            <a class="media-left" href="#">
              <img
                class="media-object img-circle"
                src="assets/profile/gi4823">
            </a>
            <div class="media-body">
              <strong>Tahir Ahmad</strong> @Gi4823
              <div class="media-body-actions">
 <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='gi4823'><span class='icon icon-add-user'>View Profile</span></button></div></form>
              </div>
            </div>
          </li>
           <li class="media">
            <a class="media-left" href="#">
              <img
                class="media-object img-circle"
                src="assets/profile/amulogo">
            </a>
            <div class="media-body">
              <strong>Fazle Karim</strong> @GI4825
              <div class="media-body-actions">
              <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='gi4825'><span class='icon icon-add-user'>View Profile</span></button></div></form>
              </div>
            </div>
          </li>
        </ul>
        </div>
        <div class="panel-footer">
          Trending people and their profiles.
        </div>
      </div>

      <div class="panel panel-default panel-link-list">
        <div class="panel-body">
          © 2018 AMUConnect.com

          <a href="about.php">About</a>
          <a href="contact.php">Contact Us</a>
          <a href="https://goo.gl/forms/TGQwGPWkEfgdxBJ53">Work With Us</a>
 
        </div>
      </div>
    </div>
  </div>
</div>








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

