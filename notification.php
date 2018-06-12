<?php 

include("header.php");
include("functions.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
      
       #Trend &middot; 
      
    </title>

    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    
      <link href="asset/css/toolkit-inverse.css" rel="stylesheet">
    
    
    <link href="asset/css/application.css" rel="stylesheet">

    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
    </style>
  </head>


<body>
  <div class="container">
    <div class="row">

      <div class="col-sm-12 content">
        <div class="dashhead">
  <div class="dashhead-titles">
    <h6 class="dashhead-subtitle">Dashboards</h6>
    <h2 class="dashhead-title">Overview</h2>
  </div>


<hr class="m-t">
<div class="hr-divider m-t-md m-b">
  <h3 class="hr-divider-content hr-divider-heading">Quick stats</h3>
</div>

<div class="row statcards">
  <div class="col-sm-6 col-lg-3 m-b">
    <div class="statcard statcard-success">
      <div class="p-a">
        <span class="statcard-desc">Page views</span>
        <h2 class="statcard-number">
          12,938
          <small class="delta-indicator delta-positive">5%</small>
        </h2>
        <hr class="statcard-hr m-b-0">
      </div>
      <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[28,68,41,43,96,45,100]}]" data-labels="['a','b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 m-b">
    <div class="statcard statcard-danger">
      <div class="p-a">
        <span class="statcard-desc">Downloads</span>
        <h2 class="statcard-number">
          758
          <small class="delta-indicator delta-negative">1.3%</small>
        </h2>
        <hr class="statcard-hr m-b-0">
      </div>
      <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[4,34,64,27,96,50,80]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 m-b">
    <div class="statcard statcard-info">
      <div class="p-a">
        <span class="statcard-desc">Sign-ups</span>
        <h2 class="statcard-number">
          1,293
          <small class="delta-indicator delta-positive">6.75%</small>
        </h2>
        <hr class="statcard-hr m-b-0">
      </div>
      <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[12,38,32,60,36,54,68]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 m-b">
    <div class="statcard statcard-warning">
      <div class="p-a">
        <span class="statcard-desc">Downloads</span>
        <h2 class="statcard-number">
          758
          <small class="delta-indicator delta-negative">1.3%</small>
        </h2>
        <hr class="statcard-hr m-b-0">
      </div>
      <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[43,48,52,58,50,95,100]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
    </div>
  </div>
</div>


    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/chart.js"></script>
    <script src="asset/js/tablesorter.min.js"></script>
    <script src="asset/js/toolkit.js"></script>
    <script src="asset/js/application.js"></script>
    <script>
      // execute/clear BS loaders for docs
      $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
    </script>
  </body>
</html>

