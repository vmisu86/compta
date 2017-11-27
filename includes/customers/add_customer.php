
<?php

if(isset($_POST['create_customer'])){

         $client_nom          = $_POST['nom'];
         $client_prenom       = $_POST['prenom'];
         $client_adresse       = $_POST['adresse'];
         $client_phone        = $_POST['phone'];
         $client_email        = $_POST['email'];

        if(empty($client_nom)||empty($client_prenom)||empty($client_adresse)||empty($client_phone)||empty($client_email)){
                array_push($error_array, "Les champs ne peuvent pas être vides");
            }
            else if(strlen($client_nom)<=1 || strlen($client_nom)>=25){
                array_push($error_array,"Le nom entre 2 et 25 caractères" );
            }
            else if(strlen($client_prenom)<=1 || strlen($client_prenom)>=25){
                array_push($error_array,"Le prenom entre 2 et 25 caractères" );
            }
            else if(strlen($client_phone)<=3 || strlen($client_phone)>=20){
                array_push($error_array,"Le numéro de téléphone entre 4 et 20 chiffres" );
            }
            else if (!filter_var($client_email, FILTER_VALIDATE_EMAIL)){
                array_push($error_array,"Format d'email invalide" );
            }
            else{

        $query = "INSERT INTO clients(nom, prenom, adresse,phone,email) ";

        $query .= "VALUES('{$client_nom}','{$client_prenom}','{$client_adresse}','{$client_phone}','{$client_email}') ";

        $create_customer_query = mysqli_query($connection, $query);

        confirmQuery($create_customer_query);

        array_push($success_array, "Vous avez ajouté avec succès l'employé <a href ='/compta/employees.php'> Back </a>");

}

}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Ajoute Client</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
        <ol class="breadcrumb">
		  <li><a href="dashboard.php">Accueil</a></li>
		  <li><a href="employees.php">Clients</a></li>
		  <li class="active">Ajout Client</li>
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


                <form action="includes/customers/create_customer.php" method="post">

                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" name="prenom">
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom">
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" name="adresse">
                    </div>

                    <div class="form-group">
                        <label for="phone">Numero de phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <input class="btn btn-primary" type="submit" name="create_customer" value="Ajout Client">
                </form>
