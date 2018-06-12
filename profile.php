<?php
session_start();
ob_start();
?>

<?php 


$enroll2=$_SESSION["enroll"]; 

?>

<?php 
include("header.php");
include("auth.php");     

$enroll=$_SESSION["enroll"];  
$pro="SELECT * FROM `student` WHERE enroll_no='$enroll'";
$result = mysqli_query($link,$pro);

if (mysqli_num_rows($result)>0) {
  $row = mysqli_fetch_assoc($result);
    }
?>
<div class="profile-header text-center"
     style="background-image: url(../assets/img/iceland.jpg);">
  <div class="container">
    <div class="container-inner">
      <img class="img-circle media-object" src="../assets/profile/<?php if($row['image_set']==1){echo $enroll;}else{ echo "amulogo";}?>">
      <h3 class="profile-header-user"><?php echo $row['full_name'];?></h3>
      <p class="profile-header-bio">
      <?php echo $row['tagline'];?>
      </p>
    </div>
  </div>

  <nav class="profile-header-nav">
    <ul class="nav nav-tabs">
      <li class="active">
        <a href="index.php">Your personal details</a>
      </li>
      <li>
        <a href="update.php">Edit your personal details</a>
      </li>
    </ul>
  </nav>
</div>






  <div class="container">
  <div class="row">
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-10 text-center"><h2>AMUConnect Profile</h2></div>
  </div>
  <div class="col-md-12">
  <div class="col-md-10 text-center"><p>Your every single detail can be helpful for other Alig.</p> 
  <div class="form-group text-center"><ul>
  <input type="text" value="<?php echo "www.amuconnect.com/viewprofile.php?enroll=".$enroll2;?>" id="myInput">
 <button class="btn btn-primary" onclick="myFunction()">Copy Your Profile Url</button>


</ul>
</div>
</div>
  </div>





</div>
  <div class="col-md-2"></div>
  <div class="col-md-10">
  




  <table class="table" >
   
    <tbody>
      <tr>
       <td><strong>Enrollment No:</strong></td>
        <td><div class="col-sm-3 "><?php echo $row['enroll_no']; ?></div></td> 
      </tr>      
      <tr>
        <td><p><strong>Faculty No:</strong></p></td>
        <td><div class="col-sm-4 "><?php echo $row['faculty_no'];?></div></td> 
      </tr>
      <tr>
        <td><p><strong>Passing year:</strong></p></td>
        <td><div class="col-sm-4"><?php echo $row['pass_year']; ?></div></td>
      </tr>
      <tr>
        <td><p><strong>Faculty Name:</strong></p></td>
        <td><div class="col-sm-4"><?php echo $row['faculty_name']; ?></div></td>
      </tr>
      <tr>
        <td><p><strong>Department Name:</strong></p></td>
        <td><div class="col-sm-4"><?php echo $row['dept_name']; ?></div></td>
      </tr>
      <tr>
        <td><p><strong>Course Name:</strong></p></td>
        <td><div class="col-sm-4"><?php echo $row['course_name']; ?></div></td>
      </tr>
      <tr>
      <td><p><strong>Hall Name:</strong></p></td>
        <td><div class="col-sm-4"><?php echo $row['hall_name']; ?></div></td>
      </tr>
      <tr>
        <td><p><strong>Date of Birth:</strong></p></td>
        <td><div class="col-sm-4"><?php echo $row['dob']; ?></div></td> 
      </tr>
      <tr>
        <td><p><strong>Mobile No:</strong></p></td>
        <td><div class="col-sm-4"><?php echo $row['mobile']; ?></div></td> 
      </tr>
      <tr>
        <td><p><strong>Email:</strong></p></td>
        <td><div class="col-sm-4"><?php echo $row['email']; ?></div></td> 
      </tr>
      <tr>
        <td><p><strong>Current Work:</strong></p></td>
        <td><div class="col-sm-4"><?php echo $row['work_name']; ?></div></td>
      </tr>
      <tr>
        <td><p><strong>Previous Work:</strong></p></td>
        <td><div class="col-sm-4"><?php echo $row['prev_work']; ?></div></td>
      </tr>
      <td><p><strong>Home City:</strong></p></td>
        <td><div class="col-sm-4"><?php echo $row['home_city']; ?></div></td>
      </tr>
      <td><p><strong>Current City:</strong></p></td>
        <td><div class="col-sm-4"><?php echo $row['cur_city']; ?></div></td>
      </tr>
      <td><p><strong>Current Country:</strong></p></td>
        <td><div class="col-sm-4"><?php echo $row['country']; ?></div></td>
      </tr>
      <td><p><strong>About Me:<strong></p></td>
        <td><div class="col-sm-8"><?php echo $row['bio']; ?></div></td>
      </tr>
    </tbody>
  </table>
</div>
<div class="col-md-2"></div>
</div>
</div>
</div>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");
  alert("Copied the Url: " + copyText.value);
}
</script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/chart.js"></script>
    <script src="../assets/js/toolkit.js"></script>
    <script src="../assets/js/application.js"></script>
  </body>
</html>
