<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
    include "/compta/includes/db_connect.php";

$q = $_GET['q'];

    echo $q;

$sql="SELECT * FROM produits WHERE produit_id = $q ";
$result = mysqli_query($connection,$sql);

    confirmQuery($result);
echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['produit_id'] . "</td>";
    echo "<td>" . $row['produit_appellation'] . "</td>";
    echo "<td>" . $row['produit_description'] . "</td>";
    echo "<td>" . $row['produit_image'] . "</td>";
    echo "<td>" . $row['produit_prix'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($connection);
?>
</body>
</html>
