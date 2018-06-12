<?php
session_start();
ob_start();
?>

<?php 
include("header.php");
include("auth.php");

$enrollsession=$_SESSION["enroll"]; 
$enrollpost="gh5387";
$enrollpost1="gi4824";

$msg="SELECT * FROM `initiator` WHERE enroll_no='$enrollsession'  AND initiate='$enrollsession'";
$msg1 = mysqli_query($link,$msg);
?>



<?php
$msgsent="SELECT * FROM `initiator` WHERE  profile_no='$enrollsession' AND initiate <> '$enrollpost'";
$msgsent1 = mysqli_query($link,$msgsent);
?>





<div class="container p-t-md">
  <div class="row">
 <div class="col-md-6">


<ul class="list-group media-list media-list-stream">
        <li class="list-group-item p-a">
          <h4 class="m-a-0">Initiated Chats</h4>
        </li>
        <li class="list-group-item media p-a">

<ul class='media-list media-list-users list-group'>
        <?php






while($msg2 = mysqli_fetch_assoc($msg1)) {

    $loop= "SELECT * FROM `student` WHERE enroll_no='$enrollpost'";
    $value = mysqli_query($link,$loop);
    $row = mysqli_fetch_array($value);
echo"  <li class='list-group-item'>";
echo"    <div class='media'>";
echo"      <a class='media-left' href='#'>";
echo"         <img class='media-object img-circle' src='../assets/profile/".$enrollpost."'></a>";
echo"      <div class='media-body'>";
echo"         <button class='btn btn-primary-outline btn-sm pull-right'>";
echo "                       <form method='get' action='test.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$msg['enroll_no']."'><span class='icon icon-add-user'>Chat Now</span></button></div></form>";
echo"        <strong>".$row['full_name']."</strong>";
echo"        <small> @ ".$row['enroll_no']."</small>";
echo"       </div>";
echo"    </div>";
echo"   </li>";

}
?>
</ul>


        </li>


      </ul>

    </div>




<div class="col-md-6">

<ul class="list-group media-list media-list-stream">
        <li class="list-group-item p-a">
          <h4 class="m-a-0">Unknown Chats</h4>
        </li>
        <li class="list-group-item media p-a">
<ul class="list-group media-list media-list-stream">

<?php




if (mysqli_num_rows($msgsent1)>0) {
while($msg3 = mysqli_fetch_assoc($msgsent1)) {

    $loopmsg3= "SELECT * FROM `student` WHERE enroll_no='$enrollpost1'";
    $valuemsg3 = mysqli_query($link,$loopmsg3);

    if (mysqli_num_rows($valuemsg3)>0) {
        $rowmsg3 = mysqli_fetch_array($valuemsg3);

 



echo"  <li class='list-group-item'>";
echo"    <div class='media'>";
echo"      <a class='media-left' href='#'>";
echo"         <img class='media-object img-circle' src='../assets/profile/amulogo.png'></a>";
echo"      <div class='media-body'>";
echo"         <button class='btn btn-primary-outline btn-sm pull-right'>";
echo "                       <form method='get' action='test.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='".$rowmsg3['enroll_no']."'><span class='icon icon-add-user'>Chat Now</span></button></div></form>";
echo"        <strong>".$rowmsg3['enroll_no']."</strong>";
echo"        <small> @ ".$rowmsg3['full_name']."</small>";
echo"       </div>";
echo"    </div>";
echo"   </li>";

}
else{
    echo "No message yet";
}}}
?>
</ul>


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






