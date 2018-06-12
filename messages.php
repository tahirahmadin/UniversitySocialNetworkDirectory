<?php
session_start();
ob_start();
?>

<?php 
include("header.php");
include("auth.php");

$enrollsession=$_SESSION["enroll"]; 


$msg="SELECT * FROM `messages` WHERE profile_no='$enrollsession'";
$msg1 = mysqli_query($link,$msg);
?>



<?php
$msgsent="SELECT * FROM `messages` WHERE enroll_no='$enrollsession'";
$msgsent1 = mysqli_query($link,$msgsent);
?>









<div class="container p-t-md">
  <div class="row">
 <div class="col-md-6">


      <ul class="list-group media-list media-list-stream">
        <li class="list-group-item p-a">
          <h4 class="m-a-0">Recieved Messages</h4>
        </li>
        <li class="list-group-item media p-a">
        <div class="media-body">
        <div class="m-t">
              <div class="row">
                <div class="col-md-12">
                <div class=container">



<?php
while($msg2 = mysqli_fetch_assoc($msg1)) {

echo" <ul class='media-list media-list-conversation c-w-md'>";
echo"  <li class='media m-b-md'>";
echo"    <a class='media-left'>";
echo"      <img class='img-circle media-object' src='../assets/img/avatar-dhg.png'>";
echo"    </a>";
echo"    <div class='media-body'>";
echo"     <div class='media-body-text'>";
echo     $msg2['message'];
echo"      </div>";
     
echo"       <div class='media-footer'>";
echo"         <small class='text-muted'>";
echo"          <strong > ".$msg2['hint'] ." </strong> @  ".  $msg2['time'];
echo"        </small>";
echo"      </div>";
echo"    </div>";
echo"  </li>";
echo"  </ul>";

}



if (mysqli_num_rows($msg1)==0) {
    echo "No message yet!";
      }

?>

</div>



                </div>
                

              </div>
            </div>
          </div>
        </li>


      </ul>

    </div>




<div class="col-md-6">


<ul class="list-group media-list media-list-stream">
  <li class="list-group-item p-a">
    <h4 class="m-a-0">Sent Messages</h4>
  </li>
  <li class="list-group-item media p-a">
  <div class="media-body">
  <div class="m-t">
        <div class="row">
          <div class="col-md-12">
          <div class=container">



<?php
while($msgsent2 = mysqli_fetch_assoc($msgsent1)) {

echo" <ul class='media-list media-list-conversation c-w-md'>";
echo"  <li class='media media-current-user m-b-md'>";

echo"    <div class='media-body'>";
echo"     <div class='media-body-text'>";
echo     $msgsent2['message'];
echo"      </div>";

echo"       <div class='media-footer'>";
echo"         <small class='text-muted'>";
echo"          <strong > ".$msgsent2['profile_no'] ." </strong> @  ".  $msgsent2['time'];
echo"        </small>";
echo"      </div>";
echo"    </div>";
echo"    <a class='media-left'>";
echo"      <img class='img-circle media-object' src='../assets/img/avatar-dhg.png'>";
echo"    </a>";
echo"  </li>";
echo"  </ul>";



}
if (mysqli_num_rows($msgsent1)==0) {
    echo "You hadn't sent any message yet!";
      }
?>


</div>



          </div>
          

        </div>
      </div>
    </div>
  </li>


</ul>

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






