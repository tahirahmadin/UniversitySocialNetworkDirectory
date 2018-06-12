<?php
session_start();
ob_start();
?>
<?php 
include("header.php");
include("auth.php");

$max="SELECT `id` FROM `student` ORDER BY id DESC LIMIT 1";
$max_value = mysqli_query($link,$max);
if (mysqli_num_rows($max_value)>0) {
  $row1 = mysqli_fetch_assoc($max_value);
    }
    
?>

<?php
$maxengg="SELECT `id` FROM `student` WHERE faculty_name='Engineering' ORDER BY id ";
$max_value_engg = mysqli_query($link,$maxengg);
if (mysqli_num_rows($max_value_engg)>0) {
  $enggmax = mysqli_num_rows($max_value_engg);
    }
?>
<?php
$maxarts="SELECT `id` FROM `student` WHERE faculty_name='Arts' ORDER BY id ";
$max_value_arts = mysqli_query($link,$maxarts);
if (mysqli_num_rows($max_value_arts)>0) {
  $artsmax = mysqli_num_rows($max_value_arts);
    }
?>

<?php
$maxsocial="SELECT `id` FROM `student` WHERE faculty_name='SocialScience' ORDER BY id";
$max_value_social = mysqli_query($link,$maxsocial);
if (mysqli_num_rows($max_value_social)>0) {
  $socialmax = mysqli_num_rows($max_value_social);
    }
?>



<?php
$maxscience="SELECT `id` FROM `student` WHERE faculty_name='Science' ORDER BY id";
$max_value_science = mysqli_query($link,$maxscience);
if (mysqli_num_rows($max_value_science)>0) {
  $sciencemax = mysqli_num_rows($max_value_science);
    }
?>

<?php
$maxlaw="SELECT `id` FROM `student` WHERE faculty_name='Law' ORDER BY id ";
$max_value_law = mysqli_query($link,$maxlaw);
if (mysqli_num_rows($max_value_law)>0) {
  $lawmax = mysqli_num_rows($max_value_law);
    }
?>
<?php
$maxmanagement="SELECT `id` FROM `student` WHERE faculty_name='Management' ORDER BY id ";
$max_value_management = mysqli_query($link,$maxmanagement);
if (mysqli_num_rows($max_value_management)>0) {
  $managementmax = mysqli_num_rows($max_value_management);
    }
?>



<?php
$maxcom="SELECT `id` FROM `student` WHERE faculty_name='Commerce' ORDER BY id ";
$max_value_com = mysqli_query($link,$maxcom);
if (mysqli_num_rows($max_value_com)>0) {
  $commax = mysqli_num_rows($max_value_com);
    }
?>


<?php
$maxmedicine="SELECT `id` FROM `student` WHERE faculty_name='Medicine' ORDER BY id ";
$max_value_medicine = mysqli_query($link,$maxmedicine);
if (mysqli_num_rows($max_value_medicine)>0) {
  $medicinemax = mysqli_num_rows($max_value_medicine);
    }
?>

<?php
$maxssc="SELECT `id` FROM `student` WHERE faculty_name='SHSSC' ORDER BY id ";
$max_value_ssc = mysqli_query($link,$maxssc);
if (mysqli_num_rows($max_value_ssc)>0) {
  $sscmax = mysqli_num_rows($max_value_ssc);
    }
?>
<h4 class='text-primary text-center'>Thanks for <span class="text-success">1,000+ </span>SignUps. 😎</h4>
<div class="container">
<div class="text-center">
  <div class="alert alert-success alert-dismissible">
    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>

    <strong>Are you good in web development? </strong> Want to work with us?  <a href="https://goo.gl/forms/TGQwGPWkEfgdxBJ53"  class="alert-link">Fill this form!</a> 
  </div> 
</div>
</div>

<div class='container p-t-md'>
<div class='row'>
 <div class='col-md-12'>
<ul class='list-group media-list media-list-stream'>
  <li class='list-group-item p-a'>
        <h4 class='m-a-0'>Trending profiles: Overall</h4>
      </li>

      
     <li class='list-group-item media p-a'>
        <div class='media-left'>
          <span class='icon icon-user text-muted'></span>
        </div>

       <div class='media-body'>
       <small class='pull-right'><a href="amutrend.php">View All</a></small>
         <div class='media-heading'> Trending profiles out of total <a href="amutrend.php"><strong><?php echo $row1['id'] ?></strong></a> peoples.</div>

           <div class='m-t'>
             <div class='row'>

<?php
$count=0;
$loop= "SELECT * FROM `student` ORDER BY daily_views DESC LIMIT 4";
$value = mysqli_query($link,$loop);
while ($row = mysqli_fetch_array($value))
{
  $count=$count+1;



echo "                <div class='col-md-3'>";
echo "                   <div class='panel panel-default panel-profile'>";
echo "                     <div class='panel-heading' style='background-image: url(../assets/img/amuheader.jpg);'>";
echo "                            </div>";
                           
echo "                    <div class='panel-body text-center'>";
if($row['image_set']==1){
echo "                      <img class='panel-profile-img ' src='../assets/profile/".$row['enroll_no']."'>";
}else{ 
  echo "<img class='panel-profile-img ' src='../assets/profile/amulogo'>";}
echo "                      <div class='row'>";
echo "             <div class='col-sm-3'></div>";
echo "            <div class='col-sm-6'><h5 class='panel-title'>".$row['full_name']."</h5></div>";
echo "            <div class='col-sm-3'><mark class='pull-right text-primary'>#".$count."</mark></div>";
echo "             </div>";
echo "                       <p class='text-center'>Course:  ".  $row['course_name']."<br>";
echo "                      Batch:  ". $row['pass_year']."</p>";
echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$row['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>";
echo "                     </div>";
echo "                  </div>";
echo "                </div>";

}
?>         

              </div>
            </div>
          </div>
        </li>
      </ul>
    </div> 
  </div>
  </div>








<div class='container p-t-md'>
<div class='row'>
 <div class='col-md-12'>
<ul class='list-group media-list media-list-stream'>
  <li class='list-group-item p-a'>
     <h4 class="m-a-0">Engineering: Trending profiles</h4>
      </li>

      
     <li class='list-group-item media p-a'>
        <div class='media-left'>
          <span class='icon icon-user text-muted'></span>
        </div>

       <div class='media-body'>
          <small class='pull-right text-muted'>updated few seconds ago</small>
          <div class="media-heading">
            Engineering faculty trending profiles out of total <a href="find.php"><strong><?php echo $enggmax ?></strong></a> peoples.
            </div>

           <div class='m-t'>
             <div class='row'>

<?php
$countengg=0;
$engg= "SELECT * FROM `student` WHERE faculty_name='Engineering' ORDER BY views DESC LIMIT 4";
//$engg= "SELECT * FROM `student`  ORDER BY views DESC LIMIT 4";
$engg1 = mysqli_query($link,$engg);
while ($engg2 = mysqli_fetch_array($engg1))
{
  $countengg=$countengg+1;



echo "                <div class='col-md-3'>";
echo "                   <div class='panel panel-default panel-profile'>";
echo "                     <div class='panel-heading' style='background-image: url(../assets/img/zhcetheader.jpg);'>";
echo "                            </div>";
                           
echo "                    <div class='panel-body text-center'>";
if($engg2['image_set']==1){
  echo "                      <img class='panel-profile-img' src='../assets/profile/".$engg2['enroll_no']."'>";
  }else{ 
    echo "<img class='panel-profile-img' src='../assets/profile/amulogo'>";}
echo "                      <div class='row'>";
echo "             <div class='col-sm-3'></div>";
echo "            <div class='col-sm-6'><h5 class='panel-title'>".$engg2['full_name']."</h5></div>";
echo "            <div class='col-sm-3'><mark class='pull-right text-primary'>#".$countengg."</mark></div>";
echo "             </div>";
echo "                       <p class='text-center'>Course:  ".  $engg2['course_name']."<br>";
echo "                      Batch:  ". $engg2['pass_year']."</p>";
echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$engg2['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>";
echo "                     </div>";
echo "                  </div>";
echo "                </div>";

}
?>         

              </div>
            </div>
          </div>
        </li>
      </ul>
    </div> 
  </div>
  </div>

<div class='container p-t-md'>
<div class='row'>
 <div class='col-md-12'>
<ul class='list-group media-list media-list-stream'>
  <li class='list-group-item p-a'>
        <h4 class='m-a-0'>Social Science: Trending profiles</h4>
      </li>

      
     <li class='list-group-item media p-a'>
        <div class='media-left'>
          <span class='icon icon-user text-muted'></span>
        </div>

       <div class='media-body'>
          <small class='pull-right text-muted'>updated few seconds ago</small>
         <div class='media-heading'> Social Science faculty trending profiles out of total <a href="find.php"><strong><?php echo $socialmax; ?></strong></a> peoples.</div>

           <div class='m-t'>
             <div class='row'>

<?php
$countsocial=0;
$social= "SELECT * FROM `student` WHERE faculty_name='SocialScience' ORDER BY daily_views DESC LIMIT 4";
$social1 = mysqli_query($link,$social);
while ($social2 = mysqli_fetch_array($social1))
{
  $countsocial=$countsocial+1;



echo "                <div class='col-md-3'>";
echo "                   <div class='panel panel-default panel-profile'>";
echo "                     <div class='panel-heading' style='background-image: url(../assets/img/artsheader.jpg);'>";
echo "                            </div>";
                           
echo "                    <div class='panel-body text-center'>";
if($social2['image_set']==1){
  echo "                      <img class='panel-profile-img' src='../assets/profile/".$social2['enroll_no']."'>";
  }else{ 
    echo "<img class='panel-profile-img' src='../assets/profile/amulogo'>";}
echo "                      <div class='row'>";
echo "             <div class='col-sm-3'></div>";
echo "            <div class='col-sm-6'><h5 class='panel-title'>".$social2['full_name']."</h5></div>";
echo "            <div class='col-sm-3'><mark class='pull-right text-primary'>#".$countsocial."</mark></div>";
echo "             </div>";
echo "                       <p class='text-center'>Course:  ".  $social2['course_name']."<br>";
echo "                      Batch:  ". $social2['pass_year']."</p>";
echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$social2['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>";
echo "                     </div>";
echo "                  </div>";
echo "                </div>";

}
?>         

              </div>
            </div>
          </div>
        </li>
      </ul>
    </div> 
  </div>
  </div>
</div>


<div class='container p-t-md'>
<div class='row'>
 <div class='col-md-12'>
<ul class='list-group media-list media-list-stream'>
  <li class='list-group-item p-a'>
        <h4 class='m-a-0'>Science: Trending profiles</h4>
      </li>

      
     <li class='list-group-item media p-a'>
        <div class='media-left'>
          <span class='icon icon-user text-muted'></span>
        </div>

       <div class='media-body'>
          <small class='pull-right text-muted'>updated few seconds ago</small>
          <div class='media-heading'> Science faculty trending profiles out of total <a href="find.php"><strong><?php echo $sciencemax;?></strong></a> peoples.</div>

           <div class='m-t'>
             <div class='row'>

<?php
$countscience=0;
$science= "SELECT * FROM `student` WHERE faculty_name='Science' ORDER BY views DESC LIMIT 4";
$science1 = mysqli_query($link,$science);
while ($science2 = mysqli_fetch_array($science1))
{
  $countscience=$countscience+1;


echo "                <div class='col-md-3'>";
echo "                   <div class='panel panel-default panel-profile'>";
echo "                     <div class='panel-heading' style='background-image: url(../assets/img/amuheader.jpg);'>";
echo "                            </div>";
                           
echo "                    <div class='panel-body text-center'>";
if($science2['image_set']==1){
  echo "                      <img class='panel-profile-img' src='../assets/profile/".$science2['enroll_no']."'>";
  }else{ 
    echo "<img class='panel-profile-img' src='../assets/profile/amulogo'>";}
echo "                      <div class='row'>";
echo "             <div class='col-sm-3'></div>";
echo "            <div class='col-sm-6'><h5 class='panel-title'>".$science2['full_name']."</h5></div>";
echo "            <div class='col-sm-3'><mark class='pull-right text-primary'>#".$countscience."</mark></div>";
echo "             </div>";
echo "                       <p class='text-center'>Course:  ".  $science2['course_name']."<br>";
echo "                      Batch:  ". $science2['pass_year']."</p>";
echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$science2['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>";
echo "                     </div>";
echo "                  </div>";
echo "                </div>";

}
?>         

              </div>
            </div>
          </div>
        </li>
      </ul>
    </div> 
  </div>
</div>


<div class='container p-t-md'>
<div class='row'>
 <div class='col-md-12'>
<ul class='list-group media-list media-list-stream'>
  <li class='list-group-item p-a'>
        <h4 class='m-a-0'>Arts: Trending profiles</h4>
      </li>

      
     <li class='list-group-item media p-a'>
        <div class='media-left'>
          <span class='icon icon-user text-muted'></span>
        </div>

       <div class='media-body'>
          <small class='pull-right text-muted'>updated few seconds ago</small>
         <div class='media-heading'> Arts faculty trending profiles out of total  <a href="find.php"><strong><?php echo $artsmax; ?></strong></a> peoples.</div>

           <div class='m-t'>
             <div class='row'>

<?php
$countarts=0;
$arts= "SELECT * FROM `student` WHERE faculty_name='Arts' ORDER BY views DESC LIMIT 4";
$arts1 = mysqli_query($link,$arts);
while ($arts2 = mysqli_fetch_array($arts1))
{
  $countarts=$countarts+1;



echo "                <div class='col-md-3'>";
echo "                   <div class='panel panel-default panel-profile'>";
echo "                     <div class='panel-heading' style='background-image: url(../assets/img/artsheader.jpg);'>";
echo "                            </div>";
                           
echo "                    <div class='panel-body text-center'>";
if($arts2['image_set']==1){
  echo "                      <img class='panel-profile-img' src='../assets/profile/".$arts2['enroll_no']."'>";
  }else{ 
    echo "<img class='panel-profile-img' src='../assets/profile/amulogo'>";}
echo "                      <div class='row'>";
echo "             <div class='col-sm-3'></div>";
echo "            <div class='col-sm-6'><h5 class='panel-title'>".$arts2['full_name']."</h5></div>";
echo "            <div class='col-sm-3'><mark class='pull-right text-primary'>#".$countarts."</mark></div>";
echo "             </div>";
echo "                       <p class='text-center'>Course:  ".  $arts2['course_name']."<br>";
echo "                      Batch:  ". $arts2['pass_year']."</p>";
echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$arts2['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>";
echo "                     </div>";
echo "                  </div>";
echo "                </div>";

}
?>         

              </div>
            </div>
          </div>
        </li>
      </ul>
    </div> 
  </div>
  </div>
</div>


<div class='container p-t-md'>
<div class='row'>
 <div class='col-md-12'>
<ul class='list-group media-list media-list-stream'>
  <li class='list-group-item p-a'>
        <h4 class='m-a-0'>Commerce: Trending profiles</h4>
      </li>

      
     <li class='list-group-item media p-a'>
        <div class='media-left'>
          <span class='icon icon-user text-muted'></span>
        </div>

       <div class='media-body'>
          <small class='pull-right text-muted'>updated few seconds ago</small>
          <div class='media-heading'> Commerce faculty trending profiles out of total  <a href="find.php"><strong><?php echo $commax;?></strong></a> peoples.</div>

           <div class='m-t'>
             <div class='row'>

<?php
$countcom=0;
$com= "SELECT * FROM `student` WHERE faculty_name='Commerce' ORDER BY views DESC LIMIT 4";
$com1 = mysqli_query($link,$com);
while ($com2 = mysqli_fetch_array($com1))
{
  $countcom=$countcom+1;


echo "                <div class='col-md-3'>";
echo "                   <div class='panel panel-default panel-profile'>";
echo "                     <div class='panel-heading' style='background-image: url(../assets/img/commerceheader.jpg);'>";
echo "                            </div>";
                           
echo "                    <div class='panel-body text-center'>";
if($com2['image_set']==1){
  echo "                      <img class='panel-profile-img' src='../assets/profile/".$com2['enroll_no']."'>";
  }else{ 
    echo "<img class='panel-profile-img' src='../assets/profile/amulogo'>";}
echo "                      <div class='row'>";
echo "             <div class='col-sm-3'></div>";
echo "            <div class='col-sm-6'><h5 class='panel-title'>".$com2['full_name']."</h5></div>";
echo "            <div class='col-sm-3'><mark class='pull-right text-primary'>#".$countcom."</mark></div>";
echo "             </div>";
echo "                       <p class='text-center'>Course:  ".  $com2['course_name']."<br>";
echo "                      Batch:  ". $com2['pass_year']."</p>";
echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$com2['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>";
echo "                     </div>";
echo "                  </div>";
echo "                </div>";

}
?>         

              </div>
            </div>
          </div>
        </li>
      </ul>
    </div> 
  </div>
</div>


<div class='container p-t-md'>
<div class='row'>
 <div class='col-md-12'>
<ul class='list-group media-list media-list-stream'>
  <li class='list-group-item p-a'>
        <h4 class='m-a-0'>10+2: Trending profiles</h4>
      </li>

      
     <li class='list-group-item media p-a'>
        <div class='media-left'>
          <span class='icon icon-user text-muted'></span>
        </div>

       <div class='media-body'>
          <small class='pull-right text-muted'>updated few seconds ago</small>
          <div class='media-heading'> 10+2 trending profiles out of total  <a href="find.php"><strong> <?php echo $sscmax;?></strong></a> peoples.</div>

           <div class='m-t'>
             <div class='row'>

<?php
$countssc=0;
$ssc= "SELECT * FROM `student` WHERE faculty_name='SHSSC' ORDER BY views DESC LIMIT 4";
$ssc1 = mysqli_query($link,$ssc);
while ($ssc2 = mysqli_fetch_array($ssc1))
{
  $countssc=$countssc+1;


echo "                <div class='col-md-3'>";
echo "                   <div class='panel panel-default panel-profile'>";
echo "                     <div class='panel-heading' style='background-image: url(../assets/img/amuheader.jpg);'>";
echo "                            </div>";
                           
echo "                    <div class='panel-body text-center'>";
if($ssc2['image_set']==1){
  echo "                      <img class='panel-profile-img' src='../assets/profile/".$ssc2['enroll_no']."'>";
  }else{ 
    echo "<img class='panel-profile-img' src='../assets/profile/amulogo'>";}
echo "                      <div class='row'>";
echo "             <div class='col-sm-3'></div>";
echo "            <div class='col-sm-6'><h5 class='panel-title'>".$ssc2['full_name']."</h5></div>";
echo "            <div class='col-sm-3'><mark class='pull-right text-primary'>#".$countssc."</mark></div>";
echo "             </div>";
echo "                       <p class='text-center'>Course:  ".  $ssc2['course_name']."<br>";
echo "                      Batch:  ". $ssc2['pass_year']."</p>";
echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$ssc2['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>";
echo "                     </div>";
echo "                  </div>";
echo "                </div>";

}
?>         

              </div>
            </div>
          </div>
        </li>
      </ul>
    </div> 
  </div>
</div>



<div class='container p-t-md'>
<div class='row'>
 <div class='col-md-12'>
<ul class='list-group media-list media-list-stream'>
  <li class='list-group-item p-a'>
        <h4 class='m-a-0'>Law: Trending profiles</h4>
      </li>

      
     <li class='list-group-item media p-a'>
        <div class='media-left'>
          <span class='icon icon-user text-muted'></span>
        </div>

       <div class='media-body'>
          <small class='pull-right text-muted'>updated few seconds ago</small>
          <div class='media-heading'> Law faculty trending profiles out of total  <a href="find.php"><strong> <?php echo $lawmax;?></strong></a> peoples.</div>

           <div class='m-t'>
             <div class='row'>

<?php
$countlaw=0;
$law= "SELECT * FROM `student` WHERE faculty_name='Law' ORDER BY views DESC LIMIT 4";
$law1 = mysqli_query($link,$law);
while ($law2 = mysqli_fetch_array($law1))
{
  $countlaw=$countlaw+1;


echo "                <div class='col-md-3'>";
echo "                   <div class='panel panel-default panel-profile'>";
echo "                     <div class='panel-heading' style='background-image: url(../assets/img/lawheader.jpg);'>";
echo "                            </div>";
                           
echo "                    <div class='panel-body text-center'>";
if($law2['image_set']==1){
  echo "                      <img class='panel-profile-img' src='../assets/profile/".$law2['enroll_no']."'>";
  }else{ 
    echo "<img class='panel-profile-img' src='../assets/profile/amulogo'>";}
echo "                      <div class='row'>";
echo "             <div class='col-sm-3'></div>";
echo "            <div class='col-sm-6'><h5 class='panel-title'>".$law2['full_name']."</h5></div>";
echo "            <div class='col-sm-3'><mark class='pull-right text-primary'>#".$countlaw."</mark></div>";
echo "             </div>";
echo "                       <p class='text-center'>Course:  ".  $law2['course_name']."<br>";
echo "                      Batch:  ". $law2['pass_year']."</p>";
echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$law2['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>";
echo "                     </div>";
echo "                  </div>";
echo "                </div>";

}
?>         

              </div>
            </div>
          </div>
        </li>
      </ul>
    </div> 
  </div>
</div>



<div class='container p-t-md'>
<div class='row'>
 <div class='col-md-12'>
<ul class='list-group media-list media-list-stream'>
  <li class='list-group-item p-a'>
        <h4 class='m-a-0'>Management: Trending profiles</h4>
      </li>

      
     <li class='list-group-item media p-a'>
        <div class='media-left'>
          <span class='icon icon-user text-muted'></span>
        </div>

       <div class='media-body'>
          <small class='pull-right text-muted'>updated few seconds ago</small>
          <div class='media-heading'> Management faculty trending profiles out of total <a href="find.php"><strong><?php echo $managementmax; ?></strong></a> peoples.</div>

           <div class='m-t'>
             <div class='row'>

<?php
$countmba=0;
$mba= "SELECT * FROM `student` WHERE faculty_name='Management' ORDER BY views DESC LIMIT 4";
$mba1 = mysqli_query($link,$mba);
while ($mba2 = mysqli_fetch_array($mba1))
{
  $countmba=$countmba+1;


echo "                <div class='col-md-3'>";
echo "                   <div class='panel panel-default panel-profile'>";
echo "                     <div class='panel-heading' style='background-image: url(../assets/img/amuheader.jpg);'>";
echo "                            </div>";
                           
echo "                    <div class='panel-body text-center'>";
if($mba2['image_set']==1){
  echo "                      <img class='panel-profile-img' src='../assets/profile/".$mba2['enroll_no']."'>";
  }else{ 
    echo "<img class='panel-profile-img' src='../assets/profile/amulogo'>";}
echo "                      <div class='row'>";
echo "             <div class='col-sm-3'></div>";
echo "            <div class='col-sm-6'><h5 class='panel-title'>".$mba2['full_name']."</h5></div>";
echo "            <div class='col-sm-3'><mark class='pull-right text-primary'>#".$countmba."</mark></div>";
echo "             </div>";
echo "                       <p class='text-center'>Course:  ".  $mba2['course_name']."<br>";
echo "                      Batch:  ". $mba2['pass_year']."</p>";
echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$mba2['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>";
echo "                     </div>";
echo "                  </div>";
echo "                </div>";

}
?>         

              </div>
            </div>
          </div>
        </li>
      </ul>
    </div> 
  </div>
</div>



<div class='container p-t-md'>
<div class='row'>
 <div class='col-md-12'>
<ul class='list-group media-list media-list-stream'>
  <li class='list-group-item p-a'>
        <h4 class='m-a-0'>Management: Trending profiles</h4>
      </li>

      
     <li class='list-group-item media p-a'>
        <div class='media-left'>
          <span class='icon icon-user text-muted'></span>
        </div>

       <div class='media-body'>
          <small class='pull-right text-muted'>updated few seconds ago</small>
          <div class='media-heading'> Management faculty trending profiles out of total <a href="find.php"><strong><?php echo $sscmax; ?></strong></a> peoples.</div>

           <div class='m-t'>
             <div class='row'>

<?php
$countssc=0;
$ssc= "SELECT * FROM `student` WHERE faculty_name='SHSSC' ORDER BY views DESC LIMIT 4";
$ssc1 = mysqli_query($link,$ssc);
while ($ssc2 = mysqli_fetch_array($ssc1))
{
  $countssc=$countssc+1;


echo "                <div class='col-md-3'>";
echo "                   <div class='panel panel-default panel-profile'>";
echo "                     <div class='panel-heading' style='background-image: url(../assets/img/amuheader.jpg);'>";
echo "                            </div>";
                           
echo "                    <div class='panel-body text-center'>";
if($ssc2['image_set']==1){
  echo "                      <img class='panel-profile-img' src='../assets/profile/".$ssc2['enroll_no']."'>";
  }else{ 
    echo "<img class='panel-profile-img' src='../assets/profile/amulogo'>";}
echo "                      <div class='row'>";
echo "             <div class='col-sm-3'></div>";
echo "            <div class='col-sm-6'><h5 class='panel-title'>".$ssc2['full_name']."</h5></div>";
echo "            <div class='col-sm-3'><mark class='pull-right text-primary'>#".$countssc."</mark></div>";
echo "             </div>";
echo "                       <p class='text-center'>Course:  ".  $ssc2['course_name']."<br>";
echo "                      Batch:  ". $ssc2['pass_year']."</p>";
echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$ssc2['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>";
echo "                     </div>";
echo "                  </div>";
echo "                </div>";

}
?>         

              </div>
            </div>
          </div>
        </li>
      </ul>
    </div> 
  </div>
</div>



<div class='container p-t-md'>
<div class='row'>
 <div class='col-md-12'>
<ul class='list-group media-list media-list-stream'>
  <li class='list-group-item p-a'>
        <h4 class='m-a-0'>Medicine: Trending profiles</h4>
      </li>

      
     <li class='list-group-item media p-a'>
        <div class='media-left'>
          <span class='icon icon-user text-muted'></span>
        </div>

       <div class='media-body'>
          <small class='pull-right text-muted'>updated few seconds ago</small>
          <div class='media-heading'> Medicine faculty trending profiles out of total <a href="find.php"><strong><?php echo $medicinemax; ?></strong></a> peoples.</div>

           <div class='m-t'>
             <div class='row'>

<?php
$countmedicine=0;
$medicine= "SELECT * FROM `student` WHERE faculty_name='Medicine' ORDER BY views DESC LIMIT 4";
$medicine1 = mysqli_query($link,$medicine);
while ($medicine2 = mysqli_fetch_array($medicine1))
{
  $countmedicine=$countmedicine+1;


echo "                <div class='col-md-3'>";
echo "                   <div class='panel panel-default panel-profile'>";
echo "                     <div class='panel-heading' style='background-image: url(../assets/img/amuheader.jpg);'>";
echo "                            </div>";
                           
echo "                    <div class='panel-body text-center'>";
if($medicine2['image_set']==1){
  echo "                      <img class='panel-profile-img' src='../assets/profile/".$medicine2['enroll_no']."'>";
  }else{ 
    echo "<img class='panel-profile-img' src='../assets/profile/amulogo'>";}
echo "                      <div class='row'>";
echo "             <div class='col-sm-3'></div>";
echo "            <div class='col-sm-6'><h5 class='panel-title'>".$medicine2['full_name']."</h5></div>";
echo "            <div class='col-sm-3'><mark class='pull-right text-primary'>#".$countmedicine."</mark></div>";
echo "             </div>";
echo "                       <p class='text-center'>Course:  ".  $medicine2['course_name']."<br>";
echo "                      Batch:  ". $medicine2['pass_year']."</p>";
echo "                       <form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$medicine2['enroll_no']."'><span class='icon icon-add-user'>View Profile</span></button></div></form>";
echo "                     </div>";
echo "                  </div>";
echo "                </div>";

}
?>         

              </div>
            </div>
          </div>
        </li>
      </ul>
    </div> 
  </div>
</div>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
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

