<?php
session_start();
ob_start();
?>

<?php 
include("header.php");
include("auth.php");
$var=0;
$enrollsession=$_SESSION["enroll"]; 
$a=$_SESSION["samnewala"];
$b=$_SESSION["image_value"];
$msg="SELECT * FROM `messages` WHERE enroll_no='$enrollsession'";
$msg1 = mysqli_query($link,$msg);

if (mysqli_num_rows($msg1)>0) {
  $msg2 = mysqli_fetch_assoc($msg1);
    }
?>


<?php
 $message =$_POST['message'];
 $hint =$_POST['hint'];
 $time =$_POST['time']; 

if(isset($_POST['senderbutton']))
{  
$query = "INSERT INTO `messages`(`enroll_no`, `profile_no`, `message`, `hint`, `time`) VALUES ('$enrollsession','$a','$message','$hint','$time')";
      
            if (mysqli_query($link,$query)) {
            $var=1;
                
                
            } else {
                
                echo "<p>There was a problem in sending message - please try again later.</p>";
                } }
        
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
    <div class="col-md-2"> </div>

    <div class="col-md-8">
      <ul class="list-group media-list media-list-stream">
        <li class="list-group-item p-a">
          <h3 class="m-a-0">Send anonymous message to this user</h3>
        </li>
       <li class="list-group-item media p-a">
            <div class="media-body">
            <div class="m-t">
              <div class="row">

                 <div class="col-md-12">
                  <div class="panel panel-default panel-profile">
                    <div class="panel-body text-center">
                    
                
   <div class="container-fluid container-fill-height">
  <div class="container-content-middle">


    <form method="post" class="m-x-auto text-center app-login-form" role="form" action="<?php $_PHP_SELF ?>">
    <div class="text-center">
      <a class="app-brand m-b-lg">
      <img class="img-circle" src="../assets/profile/<?php if($b==1){echo $a;}else{ echo "amulogo";}?>" >
      </a>
</div>
<?php 
  if($var>0){

    $user_id = $a;
    $result1 = "SELECT * FROM `student` where enroll_no='$user_id'";
    $result= mysqli_query($link,$result1);
    $row = mysqli_fetch_assoc($result);
    $fetch_user_id=$row['enroll_no'];
    $email_id=$row['email'];
    $password=$row['stud_pass'];
    if($user_id==$fetch_user_id) {
    $to = $email_id;
    $subject = "AMUConnect.com | Unread Message Notification ";
    $txt = "Your have just recieved an anonymous message. Visit and check it out!.";
    $headers = "From: contact@amuconnect.com" . "\r\n";
    mail($to,$subject,$txt,$headers);
    echo "<div class='text-center'><p>Your message has been sent sucessfully.<a href='http://www.amuconnect.com' >Back To Home</a> or send another message</p></div>";
  }}
?>
      <div class="form-group">
        
        <textarea class="form-control" rows="3"  placeholder="Your anonymous message" name="message"></textarea>
      </div>

      <div class="form-group">
        <input class="form-control" type="text" placeholder="Your Anonymous name or hint" name="hint" >
      </div>

      <div class="form-group">
        <input class="form-control" type="hidden" value="<?php echo date("l jS \of F Y h:i:s A");?>" name="time" >
      </div>
    
    <div class="form-group">
  <div class="m-b-lg">
  <button class="btn btn-primary"  name="senderbutton">Send Now</button>
      </div>
    </div>

    </form>
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


    <div class="col-md-2"></div>

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
