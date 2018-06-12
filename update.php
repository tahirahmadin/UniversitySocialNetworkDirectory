<?php
session_start();
ob_start();
?>

<?php 
include("header.php");
include("auth.php");
$enroll2=$_SESSION["enroll"]; 
?>

 <?php          
    $enroll=$_SESSION["enroll"]; 
    $full_name = $_POST['full_name'];
    $tagline = $_POST['tagline'];  
    $faculty_no = $_POST['faculty_no']; 
    $gender = $_POST['gender']; 
    $dob= $_POST['dob'];
    $email= $_POST['email']; 
    $mobile= $_POST['mobile'];
    $faculty_name = $_POST['faculty_name']; 
    $dept_name = $_POST['dept_name'];
    $course_name = $_POST['course_name']; 
    $pass_year = $_POST['pass_year']; 
    $hall_name = $_POST['hall_name']; 
    $cur_city = $_POST['cur_city']; 
    $home_city = $_POST['home_city']; 
    $country= $_POST['country'];
    $work_name = $_POST['work_name'];
    $prev_work = $_POST['prev_work']; 
    $bio= $_POST['bio']; 

    $pro="SELECT * FROM `student` WHERE enroll_no='$enroll2'";
    $result = mysqli_query($link,$pro);
    
    if (mysqli_num_rows($result)>0) {
      $row = mysqli_fetch_assoc($result);
        }

       
?>


<?php
if(isset($_POST['submit']))
{
$target_dir = "assets/profile/";
$var2 = $enroll;
$target_file = $target_dir.$var2;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Great Work! ";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


// Check file size
if ($_FILES["fileToUpload"]["size"] > 900000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Your profile picture has been uploaded, kindly <a href='update.php'> refresh</a> the page .";
        $setter=1;
        $sql= "UPDATE `student` SET image_set='$setter' WHERE enroll_no='$enroll'";     
      
      
      $ret =mysqli_query($link,$sql);


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>




<div class="profile-header text-center"
     style="background-image: url(../assets/img/iceland.jpg);">
  <div class="container">
    <div class="container-inner">
    <img class="img-circle media-object" src="../assets/profile/<?php if($row['image_set']==1){echo $enroll;}else{ echo "amulogo";}?>">
      <h3 class="profile-header-user"><?php echo $row['full_name']; ?></h3>
      <p class="profile-header-bio">
      <?php echo $row['tagline']; ?>

      
    </div>
  </div>

  <nav class="profile-header-nav">
    <ul class="nav nav-tabs">
      <li >
        <a href="profile.php">Your Profile</a>
      </li>
      <li class="active">
        <a href="update.php">Edit Your Profile</a>
      </li>
      
    </ul>
  </nav>
</div>
<p> </p>
<p> </p>


<div class="container">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<?php

if(isset($_POST['profileupdate']))
{
  $sql= "UPDATE `student` SET full_name='$full_name', tagline='$tagline',gender='$gender',faculty_no='$faculty_no' ,dob='$dob',email='$email',mobile='$mobile',faculty_name='$faculty_name',dept_name='$dept_name',course_name='$course_name',pass_year='$pass_year',hall_name='$hall_name',cur_city='$cur_city',home_city='$home_city',country='$country',work_name='$work_name',prev_work='$prev_work',bio='$bio' 
  WHERE enroll_no='$enroll'";     

$ret =mysqli_query($link,$sql);
if(!$ret )
{
  die('Could not update data: ' . mysql_error());
}
print "<p><div class='text-success text-center'>Updated details successfully, Kindly<a href='profile.php'> refresh</a> the page!</div></p>";

}
?>



<?php
$instagram=$_POST['insta'];
$linkedin=$_POST['linkedin'];
if(isset($_POST['social']))
{
  $sql= "UPDATE `student` SET insta='$instagram',linkedin='$linkedin' WHERE enroll_no='$enroll2'";     

$ret =mysqli_query($link,$sql);
if(!$ret )
{
  die('Could not update data: ' . mysql_error());
}
print "<p><div class='text-success text-center'>Social Links Updated successfully, Kindly<a href='profile.php'> refresh</a> the page!</div></p>";

}
?>
<div class="text-center">(all fields are optional.)</div>
<form   class="form-horizontal" action="<?php $_PHP_SELF ?>" method="post" >

<div class="form-group">
  <label class="col-md-4 control-label">Name: </label>  
  <div class="col-md-8">
 <div class="input-group col-md-8">
       <input class="form-control" type="text" name="full_name"  value="<?php echo $row['full_name']; ?>" placeholder="Enter full name" >
      </div>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" >Tagline: </label>  
  <div class="col-md-8">
  <div class="input-group col-md-8">
<input name="tagline" value="<?php echo $row['tagline'];?>" type="text" class="form-control">
      </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" >Faculty No: </label>  
  <div class="col-md-8">
  <div class="input-group col-md-6">
<input name="faculty_no" type="text" value="<?php echo $row['faculty_no']; ?>" class="form-control">
      </div>
  
    
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  
  <label class="col-md-4 control-label">Gender</label>
  <div class="col-md-8">
  <select class="form-control col-md-6" name="gender">
    <option name="male">Male</option>
    <option name="female">Female</option>
    <option name="others">Others</option>
  </select>
    </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" >Date Of Birth: </label>  
  <div class="col-md-8">
  <div class="input-group col-md-6">
<input name="dob" type="text" value="<?php echo $row['dob']; ?>" class="form-control">
      </div>
  
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" >Email: </label>  
  <div class="col-md-8">
  <div class="input-group col-md-8">
   <input name="email" type="text" value="<?php echo $row['email']; ?> " class="form-control ">
     </div>
  </div>
</div>


<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Mobile No:</label>  
  <div class="col-md-8">
  <div class="input-group col-md-8">
    <input  name="mobile" type="text" value="<?php echo $row['mobile'];?>" placeholder="Enter mobile number" class="form-control">
    </div>
  </div>
</div>





<div class="form-group">
  <label class="col-md-4 control-label" >Faculty Name:</label>  
  <div class="col-md-8">
 <div class="input-group col-md-8">
 <select class="form-control col-md-4" name="faculty_name" id="meal" onChange="changecat(this.value);">
    <option value="" disabled selected>Select</option>
    <option name="SHSSC">SHSSC</option>
    <option name="Engineering">Engineering</option>
    <option name="Medicine">Medicine</option>
    <option name="Arts">Arts</option>
    <option name="Science">Science</option>
    <option name="Management">Management</option>
    <option name="Commerce">Commerce</option>
    <option name="Law">Law</option>
    <option name="SocialScience">SocialScience</option>
    <option name="LifeScience">LifeScience</option>
    <option name="Unani">Unani</option>
    <option name="AgriculturalScience">Agricultural Science</option>
    <option name="Theology">Life Science</option>
</select>

</div> 
</div> 
</div>






<div class="form-group">
  <label class="col-md-4 control-label" >Department Name:</label>  
  <div class="col-md-8">
 <div class="input-group col-md-8">
<select class="form-control col-md-4" name="dept_name" id="category">
    <option value="" disabled selected>Select</option>
</select>
</div> 
</div> 
</div>



<div class="form-group">
  <label class="col-md-4 control-label">Course Name:</label>  
  <div class="col-md-8">
 <div class="input-group col-md-8">
       <input name="course_name" type="text" value="<?php echo $row['course_name'];?>" placeholder="Last enrolled course" class="form-control">
      </div> 
  </div> 
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Passing year:</label>  
  <div class="col-md-8">
 <div class="input-group col-md-8">
 <select class="form-control col-md-4" name="pass_year" value="<?php echo $row['pass_year'];?>">
    <option value="" disabled selected >Select</option>
    <option value="2023">2023</option>
    <option value="2022">2022</option>
    <option value="2021">2021</option>
    <option value="2020">2020</option>
    <option value="2019">2019</option>
    <option value="2018">2018</option>
    <option value="2017">2017</option>
    <option value="2016">2016</option>
    <option value="2015">2015</option>
    <option value="2014">2014</option>
    <option value="2013">2013</option>
    <option value="2012">2012</option>
    <option value="2011">2011</option>
    <option value="2010">2010</option>
    <option value="2009">2009</option>
    <option value="2008">2008</option>
    <option value="2007">2007</option>
    <option value="2006">2006</option>
    <option value="2005">2005</option>
    <option value="2004">2004</option>
    <option value="2003">2003</option>
    <option value="2002">2002</option>
    <option value="2001">2001</option>
    <option value="2000">2000</option>
    <option value="1999">1999</option>
    <option value="1998">1998</option>
    <option value="1997">1997</option>
    <option value="1996">1996</option>
    <option value="1995">1995</option>
    <option value="1994">1994</option>
    <option value="1993">1993</option>
    <option value="1992">1992</option>
    <option value="1991">1991</option>
    <option value="1990">1990</option>
    <option value="1989">1989</option>
    <option value="1988">1988</option>
    <option value="1987">1987</option>
    <option value="1986">1986</option>
    <option value="1985">1985</option>
    <option value="1984">1984</option>
    <option value="1983">1983</option>
    <option value="1982">1982</option>
    <option value="1981">1981</option>
    <option value="1980">1980</option>
    <option value="1979">1979</option>
    <option value="1978">1978</option>
    <option value="1977">1977</option>
    <option value="1976">1976</option>
    <option value="1975">1975</option>
    <option value="1974">1974</option>
    <option value="1973">1973</option>
    <option value="1972">1972</option>
    <option value="1971">1971</option>
    <option value="1970">1970</option>
    <option value="1969">1969</option>
    <option value="1968">1968</option>
    <option value="1967">1967</option>
    <option value="1966">1966</option>
    <option value="1965">1965</option>
    <option value="1964">1964</option>
    <option value="1963">1963</option>
    <option value="1962">1962</option>
    <option value="1961">1961</option>
    <option value="1960">1960</option>
    <option value="1959">1959</option>
    <option value="1958">1958</option>
    <option value="1957">1957</option>
    <option value="1956">1956</option>
    <option value="1955">1955</option>
    <option value="1954">1954</option>
    <option value="1953">1953</option>
    <option value="1952">1952</option>
    <option value="1951">1951</option>
    <option value="1950">1950</option>
    <option value="1949">1949</option>
    <option value="1948">1948</option>
    <option value="1947">1947</option>
    <option value="1946">1946</option>
    <option value="1945">1945</option>
    <option value="1944">1944</option>
    <option value="1943">1943</option>
    <option value="1942">1942</option>
    <option value="1941">1941</option>
    <option value="1940">1940</option>
    <option value="1939">1939</option>
    <option value="1938">1938</option>
    <option value="1937">1937</option>
    <option value="1936">1936</option>
    <option value="1935">1935</option>
    <option value="1934">1934</option>
    <option value="1933">1933</option>
    <option value="1932">1932</option>
    <option value="1931">1931</option>
    <option value="1930">1930</option>
    <option value="1929">1929</option>
    <option value="1928">1928</option>
    <option value="1927">1927</option>
    <option value="1926">1926</option>
    <option value="1925">1925</option>
    <option value="1924">1924</option>
    <option value="1923">1923</option>
    <option value="1922">1922</option>
    <option value="1921">1921</option>
    <option value="1920">1920</option>
    <option value="1919">1919</option>
    <option value="1918">1918</option>
    <option value="1917">1917</option>
    <option value="1916">1916</option>
    <option value="1915">1915</option>
    <option value="1914">1914</option>
    <option value="1913">1913</option>
    <option value="1912">1912</option>
    <option value="1911">1911</option>
    <option value="1910">1910</option>
    <option value="1909">1909</option>
    <option value="1908">1908</option>
    <option value="1907">1907</option>
    <option value="1906">1906</option>
    <option value="1905">1905</option>
</select>
  </div> 
  </div> 
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Hall Name:</label>  
  <div class="col-md-8">
 <div class="input-group col-md-8">
 <select class="form-control col-md-4" name="hall_name" value="<?php echo $row['hall_name']; ?>">
   <option value="" disabled selected>Select</option>
    <option name="NRSC">NRSC</option>
    <option name="NT Hall">NT Hall</option>
    <option name="Sulaiman Hall">Sulaiman Hall</option>
    <option name="Hadi Hasan Hall">Hadi Hasan Hall</option>
    <option name="VM Hall">VM Hall</option>
    <option name="Habib Hall">Habib Hall</option>
    <option name="BR Ambedkar Hall">BR Ambedkar Hall</option>
    <option name="SZ Hall">SZ Hall</option>
    <option name="BB Fatima Hall">BB Fatima Hall</option>
    <option name="SN Hall">SN Hall</option>
    <option name="RM Hall">RM Hall</option>
    <option name="Aftab Hall">Aftab Hall</option>
    <option name="SS Hall South">SS Hall South</option>
    <option name="SS Hall North">SS Hall North</option>
    <option name="MM Hall">MM Hall</option>
    <option name="Allama Iqbal Hall">Allama Iqbal Hall</option>
    <option name="Abdullah Hall">Abdullah Hall</option>
    <option name="IG Hall">IG Hall</option>
    <option name="Murshidabad Hall">Murshidabad Hall</option>
    <option name="Mallappuram  Hall">Mallapuram Hall</option>
    <option name="Kishanganj Hall">Kishanganj Hall</option>
  </select>
  </div> 
  </div> 
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" >Home City:</label>  
  <div class="col-md-8">
  <div class="input-group">
 <input name="home_city" type="text" value="<?php echo $row['home_city'];?>" placeholder="Home District" class="form-control">
      </div>
 
    
  </div>
</div>




<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" >Current City:</label>  
  <div class="col-md-8">
  <div class="input-group">
 <input  name="cur_city" type="text" value="<?php echo $row['cur_city']; ?>" placeholder="Current District" class="form-control">
      </div>
  </div>
</div>




<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="country" >Current Country:</label>  
  <div class="col-md-8">
  <div class="input-group">
 <input  name="country" type="text" value="<?php echo $row['country'];?>" placeholder="Country name" class="form-control">
  </div>
 </div>
</div>







<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cur_work">Current Work (position):</label>  
  <div class="col-md-8">
  <div class="input-group col-md-8">
      <input name="work_name" type="text" value="<?php echo $row['work_name']; ?>" placeholder="Current position" class="form-control">
      </div> 
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Previous Works (if any):  </label>
  <div class="col-md-8">
  <div class="input-group col-md-8">
     <input  name="prev_work" type="text" value="<?php echo $row['prev_work'];?>" placeholder="Previous positions" class="form-control">
      </div> 
  </div>
</div>


<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" >Overview (max 200 words):</label>
  <div class="col-md-8">                     
    <textarea class="form-control" rows="10"  name="bio"><?php echo $row['bio'];?></textarea>
    <button class="btn btn-primary"  name="profileupdate">Update Now</button>
  </div>
</div>

   

</form>

</div>
<div class="container p-t-md">
<div class="row">

<div class="col-md-3">
<div class="panel panel-default visible-d-block ">
<div class="panel-body">

<form class="form-inline" name="form" method="post" action="update.php" enctype="multipart/form-data" >
<div class="form-group">
<label >Update Profile Picture:</label>
<input type="file" name="fileToUpload" id="fileToUpload">
</div>
<div class="form-group">
<button class="btn btn-primary" type="submit" name="submit">Upload Picture</button>
</form>


</div>
</div>
</div>


</div>



<div class="row">

<div class="col-md-3">
<div class="panel panel-default visible-d-block ">
<div class="panel-body">

<form class="form-inline" name="form" method="post" action="update.php" enctype="multipart/form-data" >
<div class="form-group">
<label >Instagram:</label>
<input type="text" name="insta" placeholder="only username">
</div>
<div class="form-group">
<label >LinkedIn:</label>
<input type="text" name="linkedin" placeholder="only username">
</div>
<div class="form-group">
<button class="btn btn-primary" type="submit" name="social">Update Links</button>
</form>


</div>
</div>
</div>


</div>
</div>




</div>










    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


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





    <script type="text/javascript">
    var mealsByCategory = {
    SHSSC: ["10+2","10"],
    Engineering: ["Applied Physics","Applied Chemistry","Applied Mathematics","Architecture","Chemical Engineering","Civil Engineering","Computer Engineering","Electrical Engineering","Electronics Engineering","Mechanical Engineering","Petroleum Studies","Others"],
    Medicine: ["Anatomy","Anesthesiology","Biochemistry","Cardiothoracic Surgery","Community Medicine","Dermatology","Ortho Laryngology (ENT)","Forensic Medicine","Medicine","Microbiology","Neuro Surgery","Obstetrics & Gynaecology","Opthalmology","Orthopaedic Surgery","Paediatrics","Paediatric Surgery","Pathology","Pharmacology","Physiology","Plastic Surgery","Psychiatary","Radio Diagnosis","Radio Therapy","Surgery","TB & Respiratory Diseases"],
    Arts: ["Arabic","English","Fine Arts","Hindi","Linguistics","Modern Indian Languages","Persian","Philosophy","Sanskrit","Urdu"],
    Science: ["Chemistry","Computer Science","Geography","Geology","Mathematics","Physics","Statistics and Operations Research","Remote Sensing and GIS Applications"],
    Management: ["Business Administration","New Management Complex"],
    Commerce: ["Commerce"],
    Law: ["Law"],
    SocialScience: ["Economics","Education","History","Islamic Studies","Library and Information Sciences","Mass Communication","Psychology","Physical Education","Political Science","Sociology","Social Work"],
    LifeScience: ["Biochemistry","Botany","Museology","Wildlife Sciences","Zoology"],
    Unani: ["All Unani Departments"],
    AgriculturalScience: ["All Agricultural Departments"],
    Theology:["Sunni","Shia"]
}

    function changecat(value) {
        if (value.length == 0) document.getElementById("category").innerHTML = "<option></option>";
        else {
            var catOptions = "";
            for (categoryId in mealsByCategory[value]) {
                catOptions += "<option>" + mealsByCategory[value][categoryId] + "</option>";
            }
            document.getElementById("category").innerHTML = catOptions;
        }
    }
</script>


  </body>
</html>

