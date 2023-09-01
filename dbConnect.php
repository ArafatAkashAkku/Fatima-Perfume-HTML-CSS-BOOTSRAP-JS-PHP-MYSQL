<?php 

// Connect with the database 
$con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 
// Display error if failed to connect 
if ($con->connect_errno) { 
    printf("Connect failed: %s\n", $con->connect_error); 
    exit(); 
}
?>