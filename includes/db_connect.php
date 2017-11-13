<?php 	

$localhost = "127.0.0.1";
$username = "vmisu86";
$password = "";
$dbname = "c9";

// db connection
$connection =mysqli_connect($localhost, $username, $password, $dbname);
// check connection
if(!$connection) {
  die("Connection Failed : " . mysqli_error());
} else {
  // echo "Successfully connected";
}

?>