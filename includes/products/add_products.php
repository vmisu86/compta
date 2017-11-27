<?php


if(isset($_POST['create_product'])){
         $error_array = array();
         $success_array = array();
         $upload_check = 1;
         $imageFileType = pathinfo($produit_image_with_path,PATHINFO_EXTENSION);

         $produit_appellation       = $_POST['produit_appellation'];
         $produit_description       = $_POST['produit_description'];

         $produit_image             = $_FILES['produit_image']['name'];
         $produit_image_temp        = $_FILES['produit_image']['tmp_name'];

         $produit_prix              = $_POST['produit_prix'];

       //Image verification
         $produit_image_with_path = "./produit_images/$produit_image";
         $imageFileType = pathinfo($produit_image_with_path,PATHINFO_EXTENSION);
            // Check file size max 1Mbyte
        if ($_FILES["produit_image"]["size"] >= 1000000) {
            array_push($error_array, "Désolé, votre fichier est trop volumineux. Max: 1 mégaoctets.");
            $upload_check = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            array_push($error_array, "Désolé, seulement les fichiers JPG, JPEG, PNG et GIF sont autorisés.");
            $upload_check = 0;
        }

        if($upload_check == 0){
            array_push($error_array, "Désolé, votre image n'a pas été téléchargée.");
        // if everything is ok, try to upload file
        }else{
            if( move_uploaded_file($produit_image_temp, $produit_image_with_path)){
                array_push($success_array, "L'image a été téléchargée avec succès");
            }
            else{
                array_push($error_array, "Désolé, une erreur s'est produite lors du chargement de votre image.");
            }
        }

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
         <img width='180px;' class="product_image" src="/compta/produit_images/<?php echo $produit_image; ?>" alt="">
        <input type="file" name="produit_image" class="well well-sm">
        </div>

        <div class="form-group">
            <label for="phone">Prix</label>
            <input type="number" class="form-control" name="produit_prix">
        </div>

        <input class="btn btn-primary" type="submit" name="create_product" value="Ajout Produit">
    </form>
