<?php
    $servername = "amuconnect.com";
    $username = "amuconn1_admin";
    $password = ".tdgjmptA2";
    $database="amuconn1_profile";
    
    // Create connection
    $link = new mysqli($servername, $username, $password,$database);

        if (mysqli_connect_error()) {
    
            die ("There was an error connecting to the database");
    
        } 

 ?>