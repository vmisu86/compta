
 <?php
 //load_data.php
include "/compta/includes/db_connect.php";

$produitId = $_POST['produitId'];



$sql="SELECT * FROM produits WHERE produit_id = '{$produitId}' ";
$result = mysqli_query($connection,$sql);

while($row = mysqli_fetch_array($result)) {

    echo $row['produit_prix'];

}

mysqli_close($connection);
?>

