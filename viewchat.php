<?php
session_start();
ob_start();
?>

<?php 
include("header.php");
include("auth.php");

$enrollsession=$_SESSION["enroll"]; 
$enrollpost=$_POST['enrollchat'];
$a=$_SESSION["samnewala"];

$msg="SELECT * FROM `chat` WHERE (enroll_no='$enrollsession' AND profile_no='$enrollsession' AND initiate='$enrollsession') OR (enroll_no='$enrollpost' AND profile_no='$enrollsession' AND initiate='$enrollsession')";
$msg1 = mysqli_query($link,$msg);
?>





<div class="container p-t-md">
  <div class="row">
 <div class="col-md-12">


      <ul class="list-group media-list media-list-stream">
        <li class="list-group-item p-a">
          <h4 class="m-a-0">Chat With Messages</h4>
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
<form method="post" class="m-x-auto text-center app-login-form" role="form" action="<?php $_PHP_SELF ?>">
    <div class="text-center">
     
</div>
<?php 
  if($var>0){

    echo "<div class='text-center'><p>Your message has been sent sucessfully.<a href='http://www.amuconnect.com' >Back To Home</a> or send another message</p></div>";
  }
?>
      <div class="form-group">
        
        <textarea class="form-control" rows="5"  placeholder="Your anonymous message" name="message"></textarea>
      </div>
    
    <div class="form-group">
  <div class="m-b-lg">
  <button class="btn btn-primary"  name="senderbutton">Send</button>
      </div>
    </div>

    </form>


                </div>
                

              </div>
            </div>
          </div>
        </li>


      </ul>

    </div>











  </div>
</div>






<?php
$message =$_POST['message'];
$initiate=$enrollsession;

if(isset($_POST['senderbutton']))
{  
$query = "INSERT INTO `chat`(`enroll_no`, `profile_no`, `message`, `initiate`) VALUES ('$enrollsession','$a','$message','$initiate')";
      
            if (mysqli_query($link,$query)) {
            $var=1;
                
                
            } else {
                
                echo "<p>There was a problem in sending message - please try again later.</p>";
                } }
        
?>












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






