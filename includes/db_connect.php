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
}



//
//$db['db_host'] = 'localhost';
//$db['db_user'] = 'demo2_cms2_db2';
//$db['db_pass'] = '[R5(fpdK}EUP';
//$db['db_name'] = 'demo_compta';
//
//foreach($db as $key => $value){
//    define(strtoupper($key), $value);
//}
//
//$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//if($connection){
//    echo"";
//}

?>


