<?php
include_once '../db_connect.php';
include_once '../functions/functions_general.php';

if(isset($_POST['create_product'])){
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
                array_push($error_array,"L'appellation entre 2 et 25 caractères" );
            }
            else if(strlen($produit_description)<=1 || strlen($produit_description)>=25){
                array_push($error_array,"L'description' entre 2 et 25 caractères" );
            }
            else if(strlen($produit_prix)<=1 || strlen($produit_prix)>=12){
                array_push($error_array,"Le prix entre 4 et 12 chiffres" );
            }
            else{

        $query = "INSERT INTO produits(produit_appellation, produit_description, produit_image, produit_prix) ";

        $query .= "VALUES('{$produit_appellation}','{$produit_description}','{$produit_image}','{$produit_prix}') ";

        $create_produit_query = mysqli_query($connection, $query);

        confirmQuery($create_produit_query);

                array_push($success_array, "Vous avez bien ajouter le produit. <a href ='/compta/products.php'> Retour </a>");

            }
    }


?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ajoute Produit</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <ol class="breadcrumb">
        <li><a href="dashboard.php">Accueil</a></li>
        <li><a href="products.php">Produits</a></li>
        <li class="active">Ajout Produit</li>
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
            <label for="prenom">Appellation</label>
            <input type="text" class="form-control" name="produit_appellation">
        </div>

        <div class="form-group">
            <label for="nom">Description</label>
            <input type="text" class="form-control" name="produit_description">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="produit_image">
        </div>

        <div class="form-group">
            <label for="phone">Prix</label>
            <input type="number" class="form-control" name="produit_prix">
        </div>

        <input class="btn btn-primary" type="submit" name="create_product" value="Ajout Produit">
    </form>
