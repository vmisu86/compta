
 <?php
 //load_data.php
if(isset($_POST['get_option']))
{
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



 $state = $_POST['get_option'];
 $find=mysql_query($connection,"SELECT * FROM produits WHERE produit_appellation ='$state'");
 while($row=mysql_fetch_array($find))
 {
  echo $row['produit_prix'];
 }
 exit;
}
?>

