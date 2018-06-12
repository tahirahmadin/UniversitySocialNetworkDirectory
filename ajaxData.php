<?php
//Include the database configuration file
include 'functions.php';

if(!empty($_POST["country_id"])){
    //Fetch all state data
    $query = "SELECT * FROM states WHERE country_id=".$_POST['country_id']."  ORDER BY name ASC";
    $result=mysqli_query($link,$query);
    //echo $query;
    //Count total number of rows
  
    
    //State option list
    if(mysqli_num_rows($result)>0){
        echo '<option value="">Select state</option>';
        while($row = mysqli_fetch_assoc($result)){ 
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}elseif(!empty($_POST["state_id"])){
    //Fetch all city data
    $query = $link->query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']."  ORDER BY name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //City option list
    if($rowCount > 0){
        echo '<option value="">Select city</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>