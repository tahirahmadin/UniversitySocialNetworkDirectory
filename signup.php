<?php
include("functions.php");
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
      
    AMUConnect.com SignUp | AMU Directory Cum Social Network &middot;
      
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

<?php 
$condition=0;

if(isset($_POST['submit']))
{
    
    $enroll = $_POST['enroll']; 
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];

    
    
    if ($_POST['enroll'] == '') {
        
        $condition=2;
        
    } else {
        if ($_POST['pass'] == '') {
        
        $condition=3;
        
    } else {
        
        $query = "SELECT 'enroll_no' FROM `student` WHERE enroll_no = '$enroll'";
        
        $result = mysqli_query($link,$query);
        
        if (mysqli_num_rows($result) > 0) {
            
            $condition=4;
          
        } else {
    
     $query = "INSERT INTO `student`(`enroll_no`, `full_name`, `email`, `stud_pass`) VALUES ('$enroll','$name','$email','$pass')"; 
      
            if (mysqli_query($link,$query)) {
              //$_SESSION['enroll']=$enroll; 
                $condition=1;
                
                
            } else {
                
                echo "<p>There was a problem signing you up - please try again later.</p>";
                
            }
            
        }
        
    }
    
    
}
}


?>




<div class="container-fluid container-fill-height">
  <div class="container-content-middle">
    <form method="post" class="m-x-auto text-center app-login-form" role="form" action="<?php $_PHP_SELF ?>">
    <h5 class="text-center">AMU Directory Cum Social Network</h5>
      <a href="../index.php" class="app-brand m-b-lg">
        <img src="../assets/logos/logo.png" >
      </a>
<?php 
if($condition==1)
{
    echo "<div class='text-suceess'><p>Successfully signed up! Kindly, <a href='login.php' class='text-primary'>  Login Now.</a></p></div>";
    $user_id = $_POST['enroll'];
    $result1 = "SELECT * FROM `student` where enroll_no='$user_id'";
    $result= mysqli_query($link,$result1);
    $row = mysqli_fetch_assoc($result);
    $fetch_user_id=$row['enroll_no'];
    $email_id=$row['email'];
    $password=$row['stud_pass'];
    if($user_id==$fetch_user_id) {
    $to = $email_id;
    $subject = "AMUConnect.com | Welcome Message ";
    $txt = "Welcome Alig to AMUConnect.com, Aligarh Muslim University directory cum social network. Kindly share among other Aligs. Your password is : $password. ";
    $headers = "From: contact@amuconnect.com" . "\r\n";
    mail($to,$subject,$txt,$headers);
    }

  }
if($condition==2)
{
    echo "<div class='text-suceess'><p>Enrollment Number is required!</p></div>";
}
if($condition==3)
{
    echo "<div class='text-suceess'><p>password is required.</p></div>";
}
if($condition==4)
{
    echo "<div class='text-suceess'><p> Account with this Enrollment number already exist!.</p></div>";
}
    ?>
      <div class="form-group">
        <input class="form-control" type="text" placeholder="Enrollment No." name="enroll" >
      </div>
 <div class="form-group">
        <input class="form-control" type="text" placeholder="Full Name" name="name" >
      </div>
     <div class="form-group">
     <input type="password" class="form-control" placeholder="Password" name="pass" >
    </div>

   <div class="form-group">
  <input class="form-control" type="email" placeholder="Email" name="email">
  </div>


  <div class="m-b-lg">
  <button class="btn btn-primary" type="submit" name="submit" >Sign Up</button>
  <a href="login.php" role="button" class="btn btn-default" >Log In</a>
      </div>
  


      <footer class="screen-login">
        <a href="login.php" class="text-muted">Already registered? Login Now.</a>
      </footer>
    </form>
    <h6 class="text-center">SignUp Now, To know Who Is Trending In Your Connection</h6>
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