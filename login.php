<?php  
session_start();
include("functions.php");




if(isset($_POST['submit']))
{


  $enroll = $_POST['enroll']; 
  $pass = $_POST['pass'];
  $cond=5;
  $query= "SELECT * FROM `student` WHERE enroll_no = '$enroll' AND  stud_pass='$pass'";
  $result=mysqli_query($link,$query);
  
          
          if (mysqli_num_rows($result)>0) {         
            
              $_SESSION["enroll"] = $_POST['enroll'];
              header('Location: index.php');
           
          }
          else{
            $cond=10;
          }





}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K93C9KR');</script>
<!-- End Google Tag Manager -->
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AMUConnect.com | AMU Directory Cum Social Network">
    <meta name="keywords" content="AMU, AMU Social Network, AMU Directory, AMU Alumni, AMU Website, Aligarh Muslim University, AMU Aligarh,AMUConnect.com">
    <meta name="author" content="Aligarh Muslim University AMUConnect.com">
    <meta property="og:image" content="http://amuconnect.com/assets/logos/amuconnect.png>
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1024">
<meta property="og:image:height" content="1024">
    <title>
      
    AMUConnect.com | AMU Directory Cum Social Network &middot;
      
    </title>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="../assets/css/toolkit.css" rel="stylesheet">
    
    <link href="../assets/css/application.css" rel="stylesheet">

    <style>

      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
    </style>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-39488113-12"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-39488113-12');
</script>
  </head>


<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K93C9KR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<div class="container-fluid container-fill-height">
  <div class="container-content-middle">
  
    <form role="form" class="m-x-auto text-center app-login-form" method="post" action="<?php $_PHP_SELF ?>">
    <h5 class="text-center">AMU Directory Cum Social Network</h5>
      <a href="index.php" class="app-brand m-b-lg">
        <img src="../assets/logos/logo.png" >
      </a>
      <div class="text-danger text-center">
<?php if($cond==10){echo "Enter valid login credentials!"; }?>
</div>
      <div class="form-group">
        <input class="form-control" placeholder="Enrollment No." name="enroll">
        <span class="help-block"></span>
      </div>

      <div class="form-group m-b-md">
        <input type="password" class="form-control" placeholder="Password" name="pass">
        <span class="help-block"></span>
      </div>

      <div class="m-b-lg">
        <button class="btn btn-primary" type="submit" name="submit" >Log In</button>
        <a href="signup.php" role="button" class="btn btn-default" >Sign Up</a>
      </div>

     <footer class="screen-login">
        <a href="forgotpass.php" class="text-muted">Forgot password? </a>
      </footer>
    </form>
    <h6 class="text-center">Social Network | Anonymous Messaging | Alumni Search | Trends</h6>
    <div class="text-center"><a href="contact.php" class="text-muted">Facing problem? Contact us</a></div>
  </div>
</div>


    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/chart.js"></script>
    <script src="../assets/js/toolkit.js"></script>
    <script src="../assets/js/application.js"></script>
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