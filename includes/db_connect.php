<?php 	

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "compta";

// db connection
$connection =mysqli_connect($localhost, $username, $password, $dbname);
// check connection
if(!$connection) {
  die("Connection Failed : " . mysqli_error());
} else {
  // echo "Successfully connected";
}

?>
