<?php 
include("functions.php");
$enrollsession=$_SESSION["enroll"]; 


$prod="SELECT * FROM `student` WHERE enroll_no='$enrollsession'";
$resultf = mysqli_query($link,$prod);

if (mysqli_num_rows($resultf)>0) {
  $rowf = mysqli_fetch_assoc($resultf);
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
    <meta name="description" content="AMUConnect.com | AMU Social Network Cum Directory. Search and connect with Aligs around the world.">
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
    <link href="assets/css/toolkit.css" rel="stylesheet">
    
    <link href="assets/css/application.css" rel="stylesheet">

    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
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


<body class="with-top-navbar">
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K93C9KR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<div class="growl" id="app-growl"></div>

<nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img src="assets/logos/logowhite.png" >
      </a>
    </div>
    <div class="navbar-collapse collapse" id="navbar-collapse-main">

        <ul class="nav navbar-nav hidden-xs">
        <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="profile.php">Profile</a>
          </li>
          <li>
            <a href="trend.php">Trends</a>
          </li>
          <li>
            <a href="messages.php">Messages</a>
          </li>
          <li>
            <a href="find.php">Find An Alig</a>
          </li>
         
        </ul>



        <ul class="nav navbar-nav navbar-right m-r-0 hidden-xs">
        <li >
        <a type="button"  href="update.php">
              <span class="label label-danger">Complete Your Profile</span>
            </a>
          </li>
          <li >
            <a class="app-notifications" href="trend.php">
              <span class="icon icon-eye"> views<span class="label label-danger"><?php echo $rowf['views'];?></span></span>
            </a>
          </li>
          <li>
            <button class="btn btn-default navbar-btn navbar-btn-avitar" data-toggle="popover">
              <img class="img-circle" src="assets/profile/<?php if($rowf['image_set']==1){echo $enrollsession;}else{ echo "amulogo";}?>">
            </button>
          </li>
        </ul>



       

        <ul class="nav navbar-nav hidden-sm hidden-md hidden-lg">
          <li><a href="index.php"> Home</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li >
            <a class="app-notifications" href="trend.php">
              <span class="icon icon-eye"> views<span class="label label-danger"><?php echo $rowf['views'];?></span></span>
            </a>
          </li>
          <li><a href="messages.php">Messages</a></li>
          <li><a href="find.php">Find an Alig</a></li>
          <li><a href="update.php"><strong>Complete your profile</strong></a></li>
          <li><a href="profile.php" >Your Account</a></li>
          <li><a href="logout.php">Logout/Login</a></li>
        </ul>

        <ul class="nav navbar-nav hidden">
          <li><a href="profile.php" >Your Account</a></li>
          <li><a href="logout.php">Logout/Login</a></li>
        </ul>
      </div>
  </div>
</nav>