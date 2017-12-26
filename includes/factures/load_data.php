 <?php
 //load_data.php
include "/compta/includes/db_connect.php";
 $q = $_GET['q'];

$connection = mysqli_connect('localhost','root','','compta');
if (!$connection) {
    die('Could not connect: ' . mysqli_error($connection));
}

$sql="SELECT * FROM produits WHERE produit_appellation = '".$q."'";
$result = mysqli_query($connection,$sql);

while($row = mysqli_fetch_array($result)) {

    echo $row['produit_prix'];

}

mysqli_close($connection);
?>
