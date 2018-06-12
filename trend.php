<?php
session_start();
ob_start();
?>

<?php 
include("header.php");
include("auth.php");

$enrollsession=$_SESSION["enroll"]; 



$pro="SELECT * FROM `student` WHERE enroll_no='$enrollsession'";
$result = mysqli_query($link,$pro);
if (mysqli_num_rows($result)>0) {
  $row = mysqli_fetch_assoc($result);
    }
?>

<?php
//query for rank of amu


$rcount=0;
$rankover="SELECT * FROM `student` ORDER BY views DESC";
$rankover1 = mysqli_query($link,$rankover);
while ($rankover2 = mysqli_fetch_array($rankover1))
{
  $rcount=$rcount+1;
  $str1 = $enrollsession;
  $str2 = $rankover2['enroll_no'];

  if((strcmp($str1,$str2))==0){
$rfcount=$rcount;
  }
  
}
?>

<?php
//query for rank of faculty


$fac_check=$row['faculty_name'];

$rcountfac=0;
$rankfac="SELECT * FROM `student` WHERE faculty_name='$fac_check' ORDER BY views DESC";
$rankfac1 = mysqli_query($link,$rankfac);
while ($rankfac2 = mysqli_fetch_array($rankfac1))
{
  $rcountfac=$rcountfac+1;
  $strfac1 = $enrollsession;
  $strfac2 = $rankfac2['enroll_no'];

  if((strcmp($strfac1,$strfac2))==0){
$rfcountfac=$rcountfac;
  }
  
}
?>


<?php
$fac=$row['faculty_name'];
$maxfac="SELECT * FROM `student` WHERE faculty_name='$fac' ORDER BY id DESC";
$max_value_fac = mysqli_query($link,$maxfac);
if (mysqli_num_rows($max_value_fac)>0) {
  $facmax = mysqli_num_rows($max_value_fac);
    }
?>




<?php
//query for views
$loop= "SELECT * FROM `student` ORDER BY views DESC LIMIT 1";
$value = mysqli_query($link,$loop);

if (mysqli_num_rows($value)>0) {
          $row1 = mysqli_fetch_assoc($value);
            }
?>



<?php
$loop1= "SELECT * FROM `student` ORDER BY daily_views DESC LIMIT 1";
$value1 = mysqli_query($link,$loop1);

if (mysqli_num_rows($value1)>0) {
          $row3 = mysqli_fetch_assoc($value1);
            }
?>




<?php
$count=0;
$total= "SELECT * FROM `student` ORDER BY id DESC LIMIT 1";
$value1 = mysqli_query($link,$total);

if (mysqli_num_rows($value1)>0) {
          $row2 = mysqli_fetch_assoc($value1);
            }
?>


<?php
$tmale="SELECT * FROM `student` WHERE gender='Male' ORDER BY views DESC LIMIT 1";
$tmale1 = mysqli_query($link,$tmale);
if (mysqli_num_rows($tmale1)>0) {
  $tmale2 = mysqli_fetch_assoc($tmale1);
    }
?>

<?php
$tfemale="SELECT * FROM `student` WHERE gender='Female' ORDER BY views DESC LIMIT 1";
$tfemale1 = mysqli_query($link,$tfemale);
if (mysqli_num_rows($tfemale1)>0) {
  $tfemale2 = mysqli_fetch_assoc($tfemale1);
    }
?>

<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <button type="button" class="btn btn-sm btn-primary pull-right app-new-msg js-newMsg">New message</button>
        
      </div>

      <div class="modal-body p-a-0 js-modalBody">
        <div class="modal-body-scroller">
         

          <div class="hide m-a js-conversation">
            <ul class="media-list media-list-conversation">

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container p-t-md">
  <div class="row">
    <div class="col-md-3">

      <div class="list-group m-b-md">
        <a href="http://facebook.com/amuconnectofficial" class="list-group-item">
          <span class="icon icon-facebook pull-right"></span>
          Like us on Facebook
        </a>
        <a href="https://www.linkedin.com/company/amuconnectofficial/" class="list-group-item">
          <span class="icon icon-linkedin pull-right"></span>
          follow us on LinkedIn
        </a>
      </div>

       <div class="panel panel-default visible-md-block visible-lg-block">
        <div class="panel-body">
          <h5 class="m-t-0">Most Viewed Male <small>· <a href="amutrend.php">View All</a></small></h5>
 <div class="m-t">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default panel-profile">
        <div class="panel-heading" style="background-image: url(../assets/img/iceland.jpg);"></div>
        <div class="panel-body text-center">
          <img class="panel-profile-img" src="../assets/profile/<?php if($tmale2['image_set']==1){echo $tmale2['enroll_no'];}else{ echo "amulogo";}?>">
          <h5 class="panel-title"><?php echo $tmale2['full_name'] ?></h5>
          <p class="m-b-md"><?php echo $tmale2['tagline'] ?> | Faculty: <?php echo $tmale2['faculty_name'] ?></p>
  <?php        echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$tmale2['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>"; ?>
        </div>
      </div>
    </div>
  </div>
</div>
        </div>
      </div>


      


         
       <div class="panel panel-default visible-md-block visible-lg-block">
        <div class="panel-body">
          <h5 class="m-t-0">Most Viewed Female <small>· <a href="amutrend.php">View All</a></small></h5>
 <div class="m-t">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default panel-profile">
        <div class="panel-heading" style="background-image: url(../assets/img/iceland.jpg);"></div>
        <div class="panel-body text-center">
          <img class="panel-profile-img" src="../assets/profile/<?php if($tfemale2['image_set']==1){echo $tfemale2['enroll_no'];}else{ echo "amulogo";}?>">
          <h5 class="panel-title"><?php echo $tfemale2['full_name'] ?></h5>
          <p class="m-b-md"><?php echo $tfemale2['tagline'] ?> | Faculty: <?php echo $tfemale2['faculty_name'] ?></p>
          <?php        echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$tfemale2['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>"; ?>
        </div>
      </div>
    </div>
  </div>
</div>
        </div>
      </div>

       
    </div>

    <div class="col-md-6">


      <ul class="list-group media-list media-list-stream">
        <li class="list-group-item p-a">
          <h3 class="m-a-0">Your Popularity</h3>
        </li>


        <li class="list-group-item media p-a">
          <div class="media-left">
            <span class="icon icon-user text-muted"></span>
          </div>

          <div class="media-body">
            <small class="pull-right text-muted">updated few seconds ago.</small>
            <div class="media-heading">
            Your profile views status.
            </div>

            <div class="m-t">
              <div class="row">

                 <div class="col-md-6">
                  <div class="panel panel-default panel-profile">
                    <div class="panel-body text-center">
                    <small class="pull-center text-muted">Overall</small>
                    <div class="text-primary"> <h2><?php echo $row['views']; ?></h2></div>

                      <h5 class="panel-title">Total Views</h5>
                      <p class="m-b-md">Most viewed profile has <?php echo $row1['views']; ?> views</p>
                     
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="panel panel-default panel-profile">
                    <div class="panel-body text-center">
                    <small class="pull-center text-muted">Daily</small>
                    <div class="text-primary"> <h2><?php echo $row['daily_views']; ?></h2></div>

                      <h5 class="panel-title">Total Daily Views</h5>
                      <p class="m-b-md">Most viewed profile has <?php echo $row3['daily_views']; ?> views</p>
                     
                    </div>
                  </div>
                </div>
               
            </div>
          </div>
        </li>


      </ul>







    
      <ul class="list-group media-list media-list-stream">
        
        <li class="list-group-item media p-a">
        <div class="media-left">
            <span class="icon icon-user text-muted"></span>
          </div>
          <div class="media-body">
          <small class="pull-right text-muted">updated few seconds ago.</small>
            <div class="media-heading">
            Popularity based rank.
            </div>
            <div class="m-t">
              <div class="row">


                <div class="col-md-6">
                  <div class="panel panel-default panel-profile">
                    <div class="panel-heading"
                         style="background-image: url(../assets/img/popular.jpeg);"></div>
                    <div class="panel-body text-center">
                      <h2> <?php echo $rfcount;?></h2>
                      <h5 class="panel-title">University Rank</h5>
                      <p class="m-b-md">Out of total <?php echo $row2['id']; ?> people.</p>
                      <a type="button" href="amutrend.php" class="btn btn-primary-outline btn-sm">
                    <span class="icon icon-add-user">Check Full List</span></a>
                    </a>
                    </div>
                  </div>
                </div>

                 <div class="col-md-6">
                  <div class="panel panel-default panel-profile">
                    <div class="panel-heading"
                         style="background-image: url(../assets/img/trending.png);"></div>
                    <div class="panel-body text-center">
                    <h2> <?php echo $rfcountfac;?></h2>
                      <h5 class="panel-title"><?php echo $row['faculty_name']; ?> Rank</h5>
                      <p class="m-b-md">Out of <?php echo $facmax; ?>  people.</p>
                      <div class="media-body-actions">
                      <a href="facultytrend.php" type="button" class="btn btn-primary-outline btn-sm">
                      <span class="icon icon-add-user">Check Full List</span> 
                     </a>
                     </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </li>


      </ul>
    </div>


    <div class="col-md-3">
    <div class="panel panel-default visible-sd-block visible-xs-block">
        <div class="panel-body">
          <h5 class="m-t-0">Most Viewed Male <small>· <a href="amutrend.php">View All</a></small></h5>
 <div class="m-t">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default panel-profile">
        <div class="panel-heading" style="background-image: url(../assets/img/iceland.jpg);"></div>
        <div class="panel-body text-center">
          <img class="panel-profile-img" src="../assets/profile/<?php if($tmale2['image_set']==1){echo $tmale2['enroll_no'];}else{ echo "amulogo";}?>">
          <h5 class="panel-title"><?php echo $tmale2['full_name'] ?></h5>
          <p class="m-b-md"><?php echo $tmale2['tagline'] ?></p>
          <p class="m-b-md">Batch: <?php echo $tmale2['pass_year'] ?> | Faculty: <?php echo $tmale2['faculty_name'] ?></p>
          <?php        echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$tmale2['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>"; ?>
        </div>
      </div>
    </div>
  </div>
</div>
        </div>
      </div>


      


         
       <div class="panel panel-default visible-sd-block visible-xs-block">
        <div class="panel-body">
          <h5 class="m-t-0">Most Viewed Female <small>· <a href="amutrend.php">View All</a></small></h5>
 <div class="m-t">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default panel-profile">
        <div class="panel-heading" style="background-image: url(../assets/img/iceland.jpg);"></div>
        <div class="panel-body text-center">
          <img class="panel-profile-img" src="../assets/profile/<?php if($tfemale2['image_set']==1){echo $tfemale2['enroll_no'];}else{ echo "amulogo";}?>">
          <h5 class="panel-title"><?php echo $tfemale2['full_name'] ?></h5>
          <p class="m-b-md"><?php echo $tfemale2['tagline'] ?></p>
          <p class="m-b-md">Batch: <?php echo $tfemale2['pass_year'] ?> | Faculty: <?php echo $tfemale2['faculty_name'] ?></p>
          <?php        echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$tfemale2['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>"; ?>
        </div>
      </div>
    </div>
  </div>
</div>
        </div>
      </div>




      <div class="panel panel-default m-b-md hidden-xs">
        <div class="panel-body">
        <h5 class="m-t-0">Popular Alumni <small>· <a href="find.php">View All</a></small></h5>
        <ul class="media-list media-list-stream">

<?php
$new="SELECT * FROM `student` ORDER BY id DESC LIMIT 3";
$new_user = mysqli_query($link,$new);
while ($new_user1 = mysqli_fetch_array($new_user))
{
?>

           <li class="media">
            <a class="media-left" >
            <?php if($new_user1['image_set']==1){
  echo "                      <img class='media-object img-circle' src='../assets/profile/amulogo'>";
  }else{ 
    echo "<img class='media-object img-circle' src='../assets/profile/amulogo'>";} ?>
            </a>
            <div class="media-body">
              <strong><?php echo $new_user1['full_name']; ?></strong>
              <div class="media-body-actions">
                <?php        echo " <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$new_user1['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>"; ?>
              </div>
            </div>
          </li>

<?php
}
?>

        </ul>
        </div>
        <div class="panel-footer">
          Newly joined users of AMUConnect.com family.
        </div>
      </div>

        <div class="panel panel-default">
          <div class="panel-body">
          © 2018 AMUconnect.com 
          <a href="about.php">About</a> 
          <a href="contact.php">Contact</a>
          <div class="text-default"> AMUconnect.com is an Aligarh Muslim University students directory.</div>
          </div>
      </div>
    </div>

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
<?php
include("footer.php");
?>