<?php
//------------------PRODUCTS-----------------------//
//nous sélectionnons chaque ligne de la base de données et l'affichons dans une table.
function viewAllProducts(){

    global $connection;

    $query = "SELECT * FROM produits";
    $select_all_produits = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_all_produits)){

        $produit_id             = $row['produit_id'];
        $produit_appellation    = $row['produit_appellation'];
        $produit_description    = $row['produit_description'];
        $produit_image          = $row['produit_image'];
        $produit_prix           = $row['produit_prix'];

         echo "<tr><td>$produit_id</td>";
         echo "<td>$produit_appellation</td>";
         echo "<td>$produit_description</td>";
         echo "<td><img width='80px;' src='/compta/produit_images/$produit_image' alt='image'></td>";
         echo "<td>$produit_prix</td>";
         echo "<td>".
             "<div class='dropdown'>
            <button id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Options
                <span class='caret'></span>
                </button>
            <ul class='dropdown-menu' aria-labelledby='dLabel'>
                <li>
                    <a class='' href='products.php?source=edit_product&edit_product={$produit_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Modifier</a>
                </li>
                <li>
                 <a rel='$produit_id' class=' delete_product_link' href='#'><i class='fa fa-trash-o' aria-hidden='true'></i> Supprimer</a>
                </li>
            </ul>
        </div>".
            "</td></tr>";


    }
}


?>


