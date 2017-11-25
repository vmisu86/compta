<?php
//------------------PRODUCTS-----------------------//
function viewAllProducts(){

    global $connection;

    $query = "SELECT * FROM produits";
    $select_all_customers = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_all_customers)){

        $produit_id             = $row['produit_id'];
        $produit_appellation    = $row['produit_appellation'];
        $produit_description    = $row['produit_description'];
        $produit_image          = $row['produit_image'];
        $produit_prix           = $row['produit_prix'];

         echo "<tr><td>".$produit_id.
             "</td><td>".$produit_appellation.
            "</td><td>".$produit_description.
            "</td><td>".$produit_image.
            "</td><td>".$produit_prix.
            "</td><td>"."<a class='btn btn-warning' href='products.php?source=edit_product&edit_product={$produit_id}'>Edit</a>" .
            "</td><td>"."<a rel='$produit_id' class='btn btn-danger delete_product_link'>Delete</a>".
            "</td></tr>";


    }
}
//---------------------DELETE - CUSTOMERS-----------------//
function deleteProducts(){

    global $connection;
if(isset($_GET['delete'])){
    $the_clien_id = $_GET['delete'];
    $query = "DELETE FROM clients WHERE client_id = {$the_clien_id}";
    $delete_query = mysqli_query($connection, $query);

    redirect("customers.php");


    }
}

?>
