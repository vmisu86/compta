
<?php
if(isset($_GET['edit_customer'])){

  $the_customer_id = $_GET['edit_customer'];

    $query = "SELECT * FROM clients WHERE client_id = $the_customer_id ";
    $select_customers_query = mysqli_query($connection,$query);

      while($row = mysqli_fetch_assoc($select_customers_query)) {
        $client_id        = $row['client_id'];
        $client_nom       = $row['nom'];
        $client_prenom    = $row['prenom'];
        $client_adresse   = $row['adresse'];
        $client_phone     = $row['phone'];
        $client_email     = $row['email'];
      }
}
if(isset($_POST['edit_customer'])){

         $client_nom          = $_POST['nom'];
         $client_prenom       = $_POST['prenom'];
         $client_adresse      = $_POST['adresse'];
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


          $query = "UPDATE clients SET ";
          $query .="nom              = '{$client_nom}', ";
          $query .="prenom           = '{$client_prenom}', ";
          $query .="adresse          = '{$client_adresse}', ";
          $query .="phone            = '{$client_phone}', ";
          $query .="email            = '{$client_email}' ";
          $query .= "WHERE client_id = '{$the_customer_id}' ";

        $create_employee_query = mysqli_query($connection, $query);

        confirmQuery($create_employee_query);

        array_push($success_array, "Vous avez modifié avec succès le client <a href ='/compta/customers.php'> Back </a>");
            }
}

?>
        <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Client</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <ol class="breadcrumb">
        <li><a href="dashboard.php">Accueil</a></li>
        <li><a href="customers.php">Clients</a></li>
        <li class="active">Edit Client</li>
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

    <form action="" method="post">

        <div class="form-group">
            <label for="salarie_prenom">Prenom</label>
            <input type="text" class="form-control" value="<?php echo $client_prenom; ?>" name="salarie_prenom">
        </div>

        <div class="form-group">
            <label for="salarie_nom">Nom</label>
            <input type="text" class="form-control" value="<?php echo $client_nom; ?>" name="salarie_nom">
        </div>



        <div class="form-group">
            <label for="salarie_phone">Numero de phone</label>
            <input type="text" value="<?php echo $client_phone; ?>" class="form-control" name="salarie_phone">
        </div>

        <div class="form-group">
            <label for="salarie_email">E-mail</label>
            <input type="email" value="<?php echo $client_email; ?>" class="form-control" name="salarie_email">
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="edit_customer" value="Update Client">
        </div>

    </form>
