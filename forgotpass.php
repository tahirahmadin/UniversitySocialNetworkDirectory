<?php
session_start();
ob_start();
?>

<?php 
include("header.php");
?>

<div class="block app-block-intro">
  <div class="container text-center">
   
 <div class="block block-bordered-lg text-center">
  <div class="container-fluid">


<div class="text-center"><h3><strong>Forgot Password</strong></h3></div>


<div class="text-center"><p><strong>Kindly enter your enrollment number</strong></p></div>
<div class="container"> 
<form   class="form-horizontal" action="<?php $_PHP_SELF ?>" method="post" >

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" >Enrollment No.: </label>  
  <div class="col-md-8">
  <div class="input-group col-md-4">
  <input name="user_id"  type="text" class="form-control" placeholder="Enrollment No.">
      </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 control-label" ></div>  
  <div class="col-md-8">
  <div class="input-group col-md-4">
  <button class="btn btn-primary" name="submit">Request Password</button>
      </div>
  </div>
</div>

</form>
</div>
<?php


  
   
    if(isset($_POST['submit']))
    {
    $user_id = $_POST['user_id'];
    $result1 = "SELECT * FROM `student` where enroll_no='$user_id'";
    $result= mysqli_query($link,$result1);
    $row = mysqli_fetch_assoc($result);
    $fetch_user_id=$row['enroll_no'];
    $email_id=$row['email'];
    $password=$row['stud_pass'];
    if($user_id==$fetch_user_id) {
    $to = $email_id;
    $subject = "AMUConnect.com | Forgot Password ";
    $txt = "Your password has been successfully retrieved, Your password is : $password.";
    $headers = "From: contact@amuconnect.com" . "\r\n";
    mail($to,$subject,$txt,$headers);
    echo $row['full_name']." ,Password has been sent to your registered email id.";
    }
    else{
    echo 'Enrollment no. is case sensitive, Kindly enter correctly!';
    }
    }
?>






