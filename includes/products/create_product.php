<?php
include_once '../db_connect.php';
include_once '../functions.php';

if(isset($_POST['create_product'])){

         $produit_appellation       = $_POST['produit_appellation'];
         $produit_description       = $_POST['produit_description'];

         $produit_image             = $_FILES['produit_image']['name'];
         $produit_image_temp        = $_FILES['produit_image']['tmp_name'];

         $produit_prix              = $_POST['produit_prix'];

         move_uploaded_file($produit_image_temp , "/compta/product_images/$produit_image" );


        $query = "INSERT INTO produits(produit_appellation, produit_description, produit_image, produit_prix) ";

        $query .= "VALUES('{$produit_appellation}','{$produit_description}','{$produit_image}','{$produit_prix}') ";

        $create_produit_query = mysqli_query($connection, $query);

        confirmQuery($create_produit_query);


        redirect("/compta/products.php");

}

?>
