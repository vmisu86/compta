<?php
if(isset($_GET['edit_empolyee'])){

  $the_employee_id = $_GET['edit_empolyee'];

    $query = "SELECT * FROM salaires WHERE salarie_id = $the_employee_id ";
    $select_users_query = mysqli_query($connection,$query);

      while($row = mysqli_fetch_assoc($select_users_query)) {
         $employee_nom          = $row['salarie_nom'];
         $employee_prenom       = $row['salarie_prenom'];
         $employee_phone        = $row['salarie_phone'];
         $employee_email        = $row['salarie_email'];
         $employee_poste        = $row['salarie_poste'];
         $employee_salaire_net  = $row['salarie_salaire_NET'];

         $employee_salaire_brut = $employee_salaire_net * 2;
      }
}
if(isset($_POST['edit_empolyee'])){
         $error_array = array();
         $success_array = array();
         $employee_nom          = $_POST['salarie_nom'];
         $employee_prenom       = $_POST['salarie_prenom'];
         $employee_phone        = $_POST['salarie_phone'];
         $employee_email        = $_POST['salarie_email'];
         $employee_poste        = $_POST['salarie_poste'];
         $employee_salaire_net  = $_POST['salarie_salaire_NET'];

         $employee_salaire_brut = $employee_salaire_net * 2;
            if(empty($employee_nom)||empty($employee_prenom)||empty($employee_phone)||empty($employee_email)||empty($employee_poste)||empty($employee_salaire_net)){
                array_push($error_array, "Les champs ne peuvent pas être vides");
            }
            else if(strlen($employee_nom)<=1 || strlen($employee_nom)>=25){
                array_push($error_array,"Le nom entre 2 et 25 caractères" );
            }
            else if(strlen($employee_prenom)<=1 || strlen($employee_prenom)>=25){
                array_push($error_array,"Le prenom entre 2 et 25 caractères" );
            }
            else if(strlen($employee_phone)<=3 || strlen($employee_phone)>=20){
                array_push($error_array,"Le numéro de téléphone entre 4 et 20 chiffres" );
            }
            else if(strlen($employee_poste)<=1 || strlen($employee_poste)>=25){
                array_push($error_array,"La poste entre 2 et 25 caractères" );
            }
            else if(strlen($employee_salaire_net)<=1 || strlen($employee_salaire_net)>=12){
                array_push($error_array,"Le salaire entre 4 et 12 chiffres" );
            }
            else{

          $query = "UPDATE salaires SET ";
          $query .="salarie_nom  = '{$employee_nom}', ";
          $query .="salarie_prenom   =  '{$employee_prenom}', ";
          $query .="salarie_phone = '{$employee_phone}', ";
          $query .="salarie_email = '{$employee_email}', ";
          $query .="salarie_poste   = '{$employee_poste}', ";
          $query .="salarie_salaire_NET= '{$employee_salaire_net}', ";
          $query .="salarie_salaire_BRUT= '{$employee_salaire_brut}' ";
          $query .= "WHERE salarie_id = '{$the_employee_id}' ";

        $create_employee_query = mysqli_query($connection, $query);

        confirmQuery($create_employee_query);

        array_push($success_array, "Vous avez modifié avec succès l'employé <a href ='/compta/employees.php'> Back </a>");
            }
}

?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit employee</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <ol class="breadcrumb">
        <li><a href="dashboard.php">Accueil</a></li>
        <li><a href="employees.php">Employes</a></li>
        <li class="active">Edit Employe</li>
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
    <form action="" method="post">

        <div class="form-group">
            <label for="salarie_prenom">Firstname</label>
            <input type="text" class="form-control" value="<?php echo $employee_prenom; ?>" name="salarie_prenom">
        </div>

        <div class="form-group">
            <label for="salarie_nom">Lastname</label>
            <input type="text" class="form-control" value="<?php echo $employee_nom; ?>" name="salarie_nom">
        </div>



        <div class="form-group">
            <label for="salarie_phone">Phone Number</label>
            <input type="text" value="<?php echo $employee_phone; ?>" class="form-control" name="salarie_phone">
        </div>

        <div class="form-group">
            <label for="salarie_email">E-mail</label>
            <input type="email" value="<?php echo $employee_email; ?>" class="form-control" name="salarie_email">
        </div>

        <div class="form-group">
            <label for="salarie_poste">Post</label>
            <input type="text" value="<?php echo $employee_poste; ?>" class="form-control" name="salarie_poste">
        </div>
        <div class="form-group">
            <label for="salarie_salaire_NET">Salary NET</label>
            <input type="number" min="0" value="<?php echo $employee_salaire_net; ?>" class="form-control" name="salarie_salaire_NET">
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="edit_empolyee" value="Update Employee">
        </div>

    </form>
