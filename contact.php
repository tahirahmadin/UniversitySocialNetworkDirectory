<?php
session_start();
ob_start();
?>

<?php 
include("header.php");
?>

<div class="block app-block-intro">
  <div class="container text-center">
    <h1 class="block-title m-b-sm text-uppercase app-myphone-brand">AMUconnect.com</h1>
 <div class="block block-bordered-lg text-center">
  <div class="container-fluid">
    <p >Aligarh Muslim University directory cum  <strong> Social Network</strong>.
    </p>

<div class="container"> 
  <p>AMUconnect.com is an university directory, started with the aim of <mark>connnecting</mark> university students.</p>
</div>
<p><strong>Kindly fill up this form!</strong></p>
<div class="container"> 
<form   class="form-horizontal" action="<?php $_PHP_SELF ?>" method="post" >

<div class="form-group">
  <label class="col-md-4 control-label">Name: </label>  
  <div class="col-md-8">
 <div class="input-group col-md-6">
       <input class="form-control" type="text" name="full_name"   placeholder="Enter Name" >
      </div>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" >Email: </label>  
  <div class="col-md-8">
  <div class="input-group col-md-6">
<input name="tagline"  type="text" class="form-control" placeholder="Email" >
      </div>
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" >Mobile no.: </label>  
  <div class="col-md-8">
  <div class="input-group col-md-6">
<input name="mobile"  type="text" class="form-control" placeholder="Mobile No.">
      </div>
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" >Enrollment No.: </label>  
  <div class="col-md-8">
  <div class="input-group col-md-6">
<input name="enroll"  type="text" class="form-control" placeholder="Enrollment No.">
      </div>
  </div>
</div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" >Your Message:</label>
  <div class="col-md-8">                     
    <textarea class="form-control" rows="5" cols="20" name="msg"></textarea>
    <button class="btn btn-primary"  name="contact">Send Query</button>
  </div>
</div>
</form>
</div>
<?php

$name=$_POST['full_name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$enroll=$_POST['enroll'];
$message=$_POST['msg'];

if(isset($_POST['contact']))
{
  $sql= "INSERT INTO `query`(`full_name`, `mobile`, `email`, `enroll_no`, `message`) VALUES ('$name','$mobile','$email','$enroll','$message')";     


$ret =mysqli_query($link,$sql);
if(!$ret )
{
  die('Could not send query: ' . mysql_error());
}
print "<p><div class='text-success text-center'>Your query has been sent successfully, We will reply to your Email or Mobile Number within 6 working hours.</div></p>";

}
?>