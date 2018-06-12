<?php
session_start();
ob_start();
?>

<?php 
include("header.php");  

$enrollpost=$_GET["enroll"];
$enrollsession=$_SESSION["enroll"]; 
$_SESSION["samnewala"]=$enrollpost;


$pro="SELECT * FROM `student` WHERE enroll_no='$enrollpost'";
$result = mysqli_query($link,$pro);

if (mysqli_num_rows($result)>0) {
  $row = mysqli_fetch_assoc($result);
    }
?>

<?php
//whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
?>

<?php
$_SESSION["image_value"]=$row['image_set'];
$check= "SELECT * FROM `views` WHERE enroll_no='$enrollpost' AND profile_no='$ip_address'";
$check1 = mysqli_query($link,$check);

$cond=5;
if(mysqli_num_rows($check1)>0) {
    $checker=1;
    }
    else{
      $checker=0;
      $daalo="INSERT INTO `views`(`enroll_no`, `profile_no`) VALUES('$enrollpost','$ip_address')";
      $daalo1 = mysqli_query($link,$daalo);
    
    }
?>


<?php
//code for views count
$viewscount= $row['views'];
$dailycount= $row['daily_views'];
if(($enrollsession!=$enrollpost) && ($checker==0)){
  $viewscount=$viewscount+1;
  $dailycount=$dailycount+1;
  $sql= "UPDATE `student` SET `views`='$viewscount' WHERE enroll_no='$enrollpost';";
  $retval = mysqli_query($link,$sql);
  $sqld= "UPDATE `student` SET `daily_views`='$dailycount' WHERE enroll_no='$enrollpost';";
  $retvald = mysqli_query($link,$sqld);
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}

}
?>







<div class="profile-header text-center"
     style="background-image: url(../assets/img/iceland.jpg);">
  <div class="container">
    <div class="container-inner">
    <img class="img-circle media-object" src="../assets/profile/<?php if($row['image_set']==1){echo $row['enroll_no'];}else{ echo "amulogo";}?>">
      <h3 class="profile-header-user"><?php echo $row['full_name'];?></h3>
      <p class="profile-header-bio">
      <?php echo $row['tagline'];?></p>
     <p>˅</p>
      <p><a href="sendmsg.php" role="button" class="btn btn-primary">Send Message Anonymously<span class="icon icon-eye"></span></a></p>
    </div>
  </div>

  <nav class="profile-header-nav">
    <ul class="nav nav-tabs">
      <li class="active">
        <a href="index.php">User's personal details </a>
      </li>

    </ul>
  </nav>
</div>



  <div class="container">
  <div class="row">
  <div class="col-md-12 ">
  <div class="col-md-3 "></div>
  <div class="col-md-6">
  <h3 align="center">AMUConnect Public Profile</h3>
  <p align="center">Connection with Aligs is just click apart. |     <strong>Views:</strong> <button type="button" class="btn btn-lg btn-pill btn-default"><?php echo $viewscount;?></button></p>
  

  <div class="form-group text-center"><ul>
  <input type="text" value="<?php echo "www.amuconnect.com/viewprofile.php?enroll=".$enrollpost;?>" id="myInput">
<button  class="btn btn-primary" onclick="myFunction()">Copy profile url</button>

</ul>
</div>








  <table class="table" >
   
    <tbody>
      <tr>
        <td><p><strong>Enrollment No:</strong></p></td>
        <td><div class="col-sm-6"><?php echo $row['enroll_no']; ?></div></td> 
      </tr>      
      <tr>
        <td><p><strong>Faculty No:</strong></p></td>
        <td><div class="col-sm-6"><?php echo $row['faculty_no'];?></div></td> 
      </tr>
      <tr>
        <td><p><strong>Passing year:</strong></p></td>
        <td><div class="col-sm-6"><?php echo $row['pass_year']; ?></div></td>
      </tr>



      <tr>
        <td><p><strong>Faculty Name:</strong></p></td>
        <td><div class="col-sm-6"><?php
if(isset($_SESSION["enroll"]) && !empty($_SESSION["enroll"])) {
  echo $row['faculty_name'];
}
else{
  echo" <p><i><a href='login.php'> Login to view this detail</a></i></p>";
}
?></div></td>
      </tr>
      <tr>
        <td><p><strong>Department Name:</strong></p></td>
        <td><div class="col-sm-6"><?php
if(isset($_SESSION["enroll"]) && !empty($_SESSION["enroll"])) {
  echo $row['dept_name'];
}
else{
  echo" <p><i><a href='login.php'> Login to view this detail</a></i></p>";
}
?></div></td>
      </tr>
      <tr>
        <td><p><strong>Course Name:</strong></p></td>
        <td><div class="col-sm-6"><?php echo $row['course_name']; ?></div></td>
      </tr>
      <tr>
      <td><p><strong>Hall Name:</strong></p></td>
        <td><div class="col-sm-6"><?php echo $row['hall_name']; ?></div></td>
      </tr>
      <tr>
        <td><p><strong>Date of Birth:</strong></p></td>
        <td><div class="col-sm-6"><?php echo $row['dob']; ?></div></td> 
      </tr>
      <tr>
        <td><p><strong>Mobile No:</strong></p></td>
        <td><div class="col-sm-6"><?php
if(isset($_SESSION["enroll"]) && !empty($_SESSION["enroll"])) {
  echo $row['mobile'];
}
else{
  echo" <p><i><a href='login.php'> Login to view this detail</a></i></p>";
}
?></div></td> 
      </tr>
      <tr>
        <td><p><strong>Email:</strong></p></td>
        <td><div class="col-sm-6"><?php
if(isset($_SESSION["enroll"]) && !empty($_SESSION["enroll"])) {
  echo $row['email'];
}
else{
  echo" <p><i><a href='login.php'> Login to view this detail</a></i></p>";
}
?></div></td> 
      </tr>
      <tr>
        <td><p><strong>Current Work:</strong></p></td>
        <td><div class="col-sm-6"><?php
if(isset($_SESSION["enroll"]) && !empty($_SESSION["enroll"])) {
  echo $row['work_name'];
}
else{
  echo" <p><i><a href='login.php'> Login to view this detail</a></i></p>";
}
?></div></td>
      </tr>
      <tr>
        <td><p><strong>Previous Work:</strong></p></td>
        <td><div class="col-sm-6"><?php
if(isset($_SESSION["enroll"]) && !empty($_SESSION["enroll"])) {
  echo $row['prev_work'];
}
else{
  echo" <p><i><a href='login.php'> Login to view this detail</a></i></p>";
}
?></div></td>
      </tr>
      <tr>
      <td><p><strong>Home City:</strong></p></td>
        <td><div class="col-sm-6"><?php echo $row['home_city']; ?></div></td>
      </tr>
      <tr>
      <td><p><strong>Current City:</strong></p></td>
        <td><div class="col-sm-6"><?php
if(isset($_SESSION["enroll"]) && !empty($_SESSION["enroll"])) {
  echo $row['cur_city'];
}
else{
  echo" <p><i><a href='login.php'> Login to view this detail</a></i></p>";
}
?></div></td>
      </tr>
      <tr>
      <td><p><strong>Current Country:</strong></p></td>
        <td><div class="col-sm-6"><?php echo $row['country']; ?></div></td>
      </tr>
      <tr>
      <td><p><strong>About Me:<strong></p></td>
        <td><div class="col-sm-8"><?php echo $row['bio']; ?></div></td>
      </tr>
      <tr>
      <td><p><strong>Social Links:<strong></p></td>
        <td><div class="col-sm-8">
        <ul class="avatar-list">
  <li class="avatar-list-item">
   <a href="http://instagram.com/<?php echo $row['insta']; ?>"> <img class="img-circle" src="../assets/logos/instalogo.png">
   </a>
  </li>
  <li class="avatar-list-item">
   <a href="http://linkedin.com/in/<?php echo $row['linkedin']; ?>"> <img class="img-circle" src="../assets/logos/linkedinlogo.png">
   </a>
  </li>
</ul></div></td>
      </tr>
    </tbody>
  </table>
</div>
  <div class="col-md-3"></div>
</div>
</div>
</div>


<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
</script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/chart.js"></script>
    <script src="../assets/js/toolkit.js"></script>
    <script src="../assets/js/application.js"></script>
  </body>
</html>