<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit employee</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php
if(isset($_GET['edit_product'])){

  $the_product_id = $_GET['edit_product'];

    $query = "SELECT * FROM produits WHERE produit_id = $the_product_id ";
    $select_pruducts_query = mysqli_query($connection,$query);

      while($row = mysqli_fetch_assoc($select_pruducts_query)) {
        $produit_id             = $row['produit_id'];
        $produit_appellation    = $row['produit_appellation'];
        $produit_description    = $row['produit_description'];
        $produit_image          = $row['produit_image'];
        $produit_prix           = $row['produit_prix'];


      }
}
   if(isset($_POST['update_post'])) {


         $produit_appellation       = $_POST['produit_appellation'];
         $produit_description       = $_POST['produit_description'];

         $produit_image             = $_FILES['image']['name'];
         $produit_image_temp        = $_FILES['image']['tmp_name'];

         $produit_prix              = $_POST['produit_prix'];


        //Here we said if we don't upload a new image we keep the original image
        if(empty($produit_image)) {

        $query = "SELECT * FROM produits WHERE produit_id = $the_product_id ";
        $select_image = mysqli_query($connection,$query);

        while($row = mysqli_fetch_array($select_image)) {

           $produit_image = $row['produit_image'];

        }
}
        $post_title = mysqli_real_escape_string($connection, $post_title);

          $query = "UPDATE produits SET ";
          $query .="produit_appellation  = '{$produit_appellation}', ";
          $query .="produit_description = '{$produit_description}', ";
          $query .="produit_image   =  '{$produit_image}', ";
          $query .="produit_prix = '{$produit_prix}' ";
          $query .= "WHERE produit_id = {$the_produit_id} ";

        $update_post = mysqli_query($connection,$query);

        confirmQuery($update_post);

        echo "<p class='bg-success'>Produit mis à jour. <a href='/compta/products.php?p_id={$the_product_id}'>Voir Produit </a></p>";

    }

?>
    <form action="" method="post">

        <div class="form-group">
            <label for="prenom">Appellation</label>
            <input type="text" class="form-control" value="<?php echo $produit_appellation; ?>" name="produit_appellation">
        </div>

        <div class="form-group">
            <label for="nom">Description</label>
            <input type="text" class="form-control" value="<?php echo $produit_description; ?>" name="produit_description">
        </div>

        <div class="form-group">
            <label for="adresse">Image</label>
            <input type="file"  value="<?php echo $produit_image; ?>" name="produit_image">
        </div>

        <div class="form-group">
            <label for="phone">Prix</label>
            <input type="number" class="form-control" value="<?php echo $produit_prix; ?>" name="produit_prix">
        </div>

        <input class="btn btn-primary" type="submit" name="create_product" value="Ajout Produit">
    </form>
