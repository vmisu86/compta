
<?php

if(isset($_POST['create_fournisseur'])){

         $error_array = array();
         $success_array = array();
         $fournisseur_nom          = $_POST['fournisseur_nom'];
         $fournisseur_adresse      = $_POST['fournisseur_adresse'];
         $fournisseur_phone        = $_POST['fournisseur_phone'];
         $fournisseur_email        = $_POST['fournisseur_email'];

        if(empty($fournisseur_nom)||empty($fournisseur_adresse)||empty($fournisseur_phone)||empty($fournisseur_email)){
                array_push($error_array, "Les champs ne peuvent pas être vides");
            }
            else if(strlen($fournisseur_nom)<=1 || strlen($fournisseur_nom)>=25){
                array_push($error_array,"Le nom entre 2 et 25 caractères" );
            }
            else if(strlen($fournisseur_adresse)<=1 || strlen($fournisseur_adresse)>=25){
                array_push($error_array,"L'adresse entre 2 et 25 caractères" );
            }
            else if(strlen($fournisseur_phone)<=3 || strlen($fournisseur_phone)>=20){
                array_push($error_array,"Le numéro de téléphone entre 4 et 20 chiffres" );
            }
            else if (!filter_var($fournisseur_email, FILTER_VALIDATE_EMAIL)){
                array_push($error_array,"Format d'email invalide" );
            }
            else{

        $query = "INSERT INTO fournisseurs(fournisseur_nom, fournisseur_adresse, fournisseur_phone,fournisseur_email) ";

        $query .= "VALUES('{$fournisseur_nom}','{$fournisseur_adresse}','{$fournisseur_phone}','{$fournisseur_email}') ";

        $create_fournisseur_query = mysqli_query($connection, $query);

        confirmQuery($create_fournisseur_query);

        array_push($success_array, "Vous avez ajouté avec succès le fournisseur <a href ='/compta/fournisseurs.php'> Back </a>");

}

}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Ajoute Fournisseur</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
        <ol class="breadcrumb">
		  <li><a href="dashboard.php">Accueil</a></li>
		  <li><a href="fournisseurs.php">Fournisseurs</a></li>
		  <li class="active">Ajout Fournisseur</li>
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


                <form method="post">


                    <div class="form-group">
                        <label for="fournisseur_nom">Nom</label>
                        <input type="text" class="form-control" name="fournisseur_nom">
                    </div>

                    <div class="form-group">
                        <label for="fournisseur_adresse">Adresse</label>
                        <input type="text" class="form-control" name="fournisseur_adresse">
                    </div>

                    <div class="form-group">
                        <label for="fournisseur_phone">Numero de phone</label>
                        <input type="text" class="form-control" name="fournisseur_phone">
                    </div>

                    <div class="form-group">
                        <label for="fournisseur_email">E-mail</label>
                        <input type="email" class="form-control" name="fournisseur_email">
                    </div>
                    <input class="btn btn-primary" type="submit" name="create_fournisseur" value="Ajout Fournisseur">
                </form>
