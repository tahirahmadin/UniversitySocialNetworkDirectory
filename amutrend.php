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
$fac=$row['faculty_name'];
$maxfac="SELECT * FROM `student` WHERE faculty_name='$fac' ORDER BY id DESC ";
$max_value_fac = mysqli_query($link,$maxfac);
if (mysqli_num_rows($max_value_fac)>0) {
  $facmax1 = mysqli_fetch_assoc($max_value_fac);
  $facmax = mysqli_num_rows($max_value_fac);
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
    

    <div class="col-md-9">


      <ul class="list-group media-list media-list-stream">
        <li class="list-group-item p-a">
          <h4 class="m-a-0">Top 20 Profiles: Overall</h4>
        </li>


        <li class="list-group-item media p-a">
          <div class="media-left">
            
          </div>

          <div class="media-body">
            <small class="pull-right text-muted">updated few seconds ago.</small>
            

            <div class="m-t">
              <div class="row">

                 <div class="col-md-12">
                  
<?php


$loop= "SELECT * FROM `student` ORDER BY views DESC LIMIT 20";
$value = mysqli_query($link,$loop);

?>

<?php

$total= "SELECT * FROM `student` ORDER BY id DESC LIMIT 1";
$value1 = mysqli_query($link,$total);

if (mysqli_num_rows($value1)>0) {
          $row2 = mysqli_fetch_assoc($value1);
            }
?>

<div class=container">

  <table class="table">
  <thead class="thead-light">
	<tr>
    <th scope="col">Rank</th>
    <th scope="col">Full Name</th>
    <th scope="col">Faculty Name</th>
	<th scope="col">Course Name</th>
    <th scope="col"> Views </th>
    <th scope="col">Profile</th>
  </tr>
  </thead>
  <tbody>

  <?php
    while($row = mysqli_fetch_assoc($value)) {
        $count=$count+1;

    $ss=$row['enroll_no'];	
  echo" <tr>";
  echo" <th scope='row'>#".$count."</th>";
  echo" <td>" .$row['full_name']."</td> ";
  echo" <td>". $row['faculty_name']."</td> ";
  echo" <td>". $row['course_name']."</td>";
  echo" <div class='text-center'><td>".  $row['views']. "</td></div>";
 echo" <td><form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='$ss' ><span class='icon icon-add-user'>View Profile</span></button></div></form></td>";
  echo" </tr> ";
 
  

}

?>

</tbody>
</table>
   
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
            Your profile's popularity status.
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
                      <a type="button" href="trend.php"class="btn btn-primary-outline btn-sm">
                     <span class="icon icon-add-user">Check Your Views</span> 
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
                      <h5 class="panel-title"><?php echo $fac; ?> Rank</h5>
                      <p class="m-b-md">Out of total <?php echo $facmax; ?> people.</p>
                      <div class="media-body-actions">
                      <a type="button" href="facultytrend.php" class="btn btn-primary-outline btn-sm">
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
          Most valuable Alumnus, Who has joined our network.
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

