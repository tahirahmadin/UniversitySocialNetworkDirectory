<?php
//Database credentials
$dbHost     = 'amuconnect.com';
$dbUsername = 'amuconn1_admin';
$dbPassword = '.tdgjmptA2';
$dbName     = 'amuconn1_profile';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>