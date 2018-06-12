<?php
session_start();
ob_start();
?>
<?php 
include("header.php");
include("auth.php");

?>



<div class="block app-block-intro">
  <div class="container text-center">
    <h1 class="block-title m-b-sm text-uppercase app-myphone-brand">Find An Alig</h1>
 <div class="block block-bordered-lg text-center">
  <div class="container-fluid">
    <p class="lead m-b-md">Find Aligs based on <strong> multiple filters.</strong> Facility!
    </p>
    <form class="form-inline" action="<?php $_PHP_SELF ?>" method="post">
        
    <input class="form-control m-b" type="text"  placeholder="Alig's name" name="full_name">
    

 
 <select class="form-control m-b" name="faculty_name" id="meal" onChange="changecat(this.value);">
    <option value="" disabled selected>Select Faculty</option>
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


<select class="form-control m-b" name="dept_name" id="category">
    <option value="" disabled selected>Select</option>
</select>






  <select class="form-control m-b" name="pass_year">
    <option value="" disabled selected>Select year</option>
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



 <select class="form-control m-b" name="hall_name" value="<?php echo $row['hall_name']; ?>">
    <option name="" disabled selected>Select Hall</option>
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



      <button class="btn btn-primary m-b" type="submit"value="check" name="check">Check Now</button>
    </form>
</div>
</div>
</div>
<?php
if(isset($_POST['check']))
{
$full_name= $_POST['full_name'];
$faculty_name= $_POST['faculty_name'];
$dept_name= $_POST['dept_name'];
$pass_year= $_POST['pass_year'];
$hall_name= $_POST['hall_name'];

$sql ="SELECT * FROM `student` WHERE";


if($full_name!="")
  $sql.=" full_name LIKE '%$full_name%' AND";


if($faculty_name!="SELECT")
  $sql.=" faculty_name LIKE '%$faculty_name%' AND";

if($dept_name!="SELECT")
  $sql.=" dept_name LIKE '%$dept_name%' AND";

if($pass_year!="")
  $sql.=" pass_year LIKE '%$pass_year%' AND";

if($hall_name!="SELECT")
  $sql.=" hall_name LIKE '%$hall_name%' AND";

$sql = substr($sql, 0, -4);

if($full_name=="" AND $faculty_name=="" AND $dept_name=="" AND $faculty_no=="" AND $pass_year=="" AND $hall_name=="")
  $sql ="SELECT * FROM `student` ";

$result= mysqli_query($link,$sql);

if(mysqli_num_rows($result)>0) {
   	?> 
	<div class="container">
    <div class="row">
    <div class="col-md-12">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  <br></br>
  <br></br>
  <table class="table">
  <thead>
	<tr>
    <th>Full Name</th>
    <th>Faculty Name</th>
	  <th>Hall Name</th>
    <th>Batch</th>
    <th>Profile</th>
  </tr>
  </thead>
  <tbody>

  <?php
    while($row = mysqli_fetch_assoc($result)) {


$ss=$row['enroll_no'];
echo" <tr class='bg-default'>";
  echo" <td>" .$row['full_name']."</td> ";
  echo" <td>". $row['faculty_name']."</td>";
  echo" <td>". $row['hall_name']."</td>";
  echo" <td>". $row['pass_year']."</td>";
  echo" <td> <div class='text-center'><form method='get' action='viewprofile.php'><div class='form-group'><button class='btn btn-primary-outline btn-sm' type='submit' name='enroll' value='$ss' ><span class='icon icon-add-user'>View Profile</span></button></div></form></div></td>";
  echo" </tr> ";
 
  

}}

  
else 
{

  echo "	<h5 align='center'> No such Alig exist, invite him/her to make our connection strong.";
	echo " <a href='index.php' align='center' >Invite Now.</a></h5>";

} 
}
?>
</tbody>
 </table>
</div>
</div>
<div class="col-md-2"></div>
</div>
  </div>
</div>
  </div>
</div>

      </div>
    </div>
</div>
</div>


    <script type="text/javascript">
    var mealsByCategory = {
    Engineering: ["SELECT","Applied Physics","Applied Chemistry","Applied Mathematics","Architecture","Chemical Engineering","Civil Engineering","Computer Engineering","Electrical Engineering","Electronics Engineering","Mechanical Engineering","Petroleum Studies"],
    Medicine: ["SELECT","Anatomy","Anesthesiology","Biochemistry","Cardiothoracic Surgery","Community Medicine","Dermatology","Ortho Laryngology (ENT)","Forensic Medicine","Medicine","Microbiology","Neuro Surgery","Obstetrics & Gynaecology","Opthalmology","Orthopaedic Surgery","Paediatrics","Paediatric Surgery","Pathology","Pharmacology","Physiology","Plastic Surgery","Psychiatary","Radio Diagnosis","Radio Therapy","Surgery","TB & Respiratory Diseases"],
    Arts: ["SELECT","Arabic","English","Fine Arts","Hindi","Linguistics","Modern Indian Languages","Persian","Philosophy","Sanskrit","Urdu"],
    Science: ["SELECT","Chemistry","Computer Science","Geography","Geology","Mathematics","Physics","Statistics and Operations Research","Remote Sensing and GIS Applications"],
    Management: ["SELECT","Business Administration","New Management Complex"],
    Commerce: ["Commerce"],
    Law: ["Law"],
    SocialScience: ["SELECT","Economics","Education","History","Islamic Studies","Library and Information Sciences","Mass Communication","Psychology","Physical Education","Political Science","Sociology","Social Work"],
    LifeScience: ["SELECT","Biochemistry","Botany","Museology","Wildlife Sciences","Zoology"],
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



    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/chart.js"></script>
    <script src="../assets/js/toolkit.js"></script>
    <script src="../assets/js/application.js"></script>
  </body>
</html>