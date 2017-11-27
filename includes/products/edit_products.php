<?php
if(isset($_GET['edit_product'])){

  $the_produit_id = $_GET['edit_product'];

    $query = "SELECT * FROM produits WHERE produit_id = $the_produit_id ";
    $select_produit_query = mysqli_query($connection,$query);

      while($row = mysqli_fetch_assoc($select_produit_query)) {
        $produit_id = $row['produit_id'];
         $produit_appellation   = $row['produit_appellation'];
         $produit_description   = $row['produit_description'];
         $produit_image         = $row['produit_image'];
         $produit_prix          = $row['produit_prix'];
      }
}
if(isset($_POST['edit_produit'])){
         $error_array = array();
         $success_array = array();
         $produit_appellation       = $_POST['produit_appellation'];
         $produit_description       = $_POST['produit_description'];

         $produit_image             = $_FILES['produit_image']['name'];
         $produit_image_temp        = $_FILES['produit_image']['tmp_name'];

         $produit_prix              = $_POST['produit_prix'];


    move_uploaded_file($produit_image_temp, "./produit_images/$produit_image");


            if(empty($produit_appellation)||empty($produit_description)||empty($produit_prix)){
                array_push($error_array, "Les champs ne peuvent pas être vides");
            }
            else if(strlen($produit_appellation)<=1 || strlen($produit_appellation)>=25){
                array_push($error_array,"L'appellation' entre 2 et 25 caractères" );
            }
            else if(strlen($produit_description)<=1 || strlen($produit_description)>=25){
                array_push($error_array,"La description entre 2 et 25 caractères" );
            }
            else if(strlen($produit_prix)<=1 || strlen($produit_prix)>=12){
                array_push($error_array,"Le prix entre 4 et 12 chiffres" );
            }
            else{

          $query = "UPDATE produits SET ";
          $query .="produit_appellation  = '{$produit_appellation}', ";
          $query .="produit_description = '{$produit_description}', ";
          $query .="produit_image = '{$produit_image}', ";
          $query .="produit_prix   = '{$produit_prix}' ";
          $query .= "WHERE produit_id = '{$the_produit_id}' ";

        $create_employee_query = mysqli_query($connection, $query);

        confirmQuery($create_employee_query);

        array_push($success_array, "Vous avez modifié avec succès le produit <a href ='/compta/products.php'> Retour </a>");
            }
}

?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit produit</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <ol class="breadcrumb">
        <li><a href="dashboard.php">Accueil</a></li>
        <li><a href="products.php">Produits</a></li>
        <li class="active">Edit Produit</li>
    </ol>
    <div class="messages">

        <!--display the errors -->
        <?php
    if($error_array) {
        foreach ($error_array as $key => $value) {
            echo '<div class="alert alert-danger" role="alert">
            <i class="glyphicon glyphicon-exclamation-sign"></i>
            '.$value.'</div>';
            }
        }
    if($success_array){
        foreach($success_array as $key => $val){
            echo '<div class="alert alert-success" role="alert">
            <i class="glyphicon glyphicon-exclamation-sign"></i>
            '.$val.'</div>';
        }
    }
    ?>
    </div>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="salarie_prenom">Appellation</label>
            <input type="text" class="form-control" value="<?php echo $produit_appellation; ?>" name="produit_appellation">
        </div>

        <div class="form-group">
            <label for="salarie_nom">Description</label>
            <input type="text" class="form-control" value="<?php echo $produit_description; ?>" name="produit_description">
        </div>

        <div class="form-group">
         <img width='180px;' class="product_image" src="/compta/produit_images/<?php echo $produit_image; ?>" alt="">
        <input type="file" name="produit_image" class="well well-sm">
        </div>

        <div class="form-group">
            <label for="salarie_email">Prix</label>
            <input type="number" value="<?php echo $produit_prix; ?>" class="form-control" name="produit_prix">
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="edit_produit" value="Edit produit">
        </div>

    </form>
