<?php


if(isset($_POST['create_emplyee'])){
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
            else if (!filter_var($employee_email, FILTER_VALIDATE_EMAIL)){
                array_push($error_array,"Format d'email invalide" );
            }
            else if(strlen($employee_poste)<=1 || strlen($employee_poste)>=25){
                array_push($error_array,"La poste entre 2 et 25 caractères" );
            }
            else if(strlen($employee_salaire_net)<=1 || strlen($employee_salaire_net)>=12){
                array_push($error_array,"Le salaire entre 4 et 12 chiffres" );
            }
            else{

        $query = "INSERT INTO salaires(salarie_nom, salarie_prenom, salarie_phone,salarie_email,salarie_poste,salarie_salaire_NET,salarie_salaire_BRUT) ";

        $query .= "VALUES('{$employee_nom}','{$employee_prenom}','{$employee_phone}','{$employee_email}','{$employee_poste}','{$employee_salaire_net}', '{$employee_salaire_brut}') ";

        $create_employee_query = mysqli_query($connection, $query);

        confirmQuery($create_employee_query);


                 array_push($success_array, "Vous avez ajouté avec succès l'employé <a href ='/compta/employees.php'> Back </a>");
            }

}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Ajoute Employe</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
        <ol class="breadcrumb">
		  <li><a href="dashboard.php">Accueil</a></li>
		  <li><a href="employees.php">Employes</a></li>
		  <li class="active">Ajout Employe</li>
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
                        <label for="salarie_prenom">Prenom</label>
                        <input type="text" class="form-control" name="salarie_prenom">
                    </div>

                    <div class="form-group">
                        <label for="salarie_nom">Nom</label>
                        <input type="text" class="form-control" name="salarie_nom">
                    </div>

                    <div class="form-group">
                        <label for="salarie_phone">Numero Phone</label>
                        <input type="text" class="form-control" name="salarie_phone">
                    </div>

                    <div class="form-group">
                        <label for="salarie_email">E-mail</label>
                        <input type="email" class="form-control" name="salarie_email">
                    </div>

                    <div class="form-group">
                        <label for="salarie_poste">Poste</label>
                        <input type="text" class="form-control" name="salarie_poste">
                    </div>
                    <div class="form-group">
                        <label for="salarie_salaire_NET">Salaire NET</label>
                        <input type="number" min="0" class="form-control" name="salarie_salaire_NET">
                    </div>
                    <input class="btn btn-primary" type="submit" name="create_emplyee" value="Ajout Employe">
                </form>



