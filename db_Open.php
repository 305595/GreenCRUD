<?php

//function OpenCon()
 
$dbhost = "localhost";
 $dbuser = "j305595";
 $dbpass = "tunnelsnakes";
 $db = "registry";
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 
 //return $conn;
 
 

?>
