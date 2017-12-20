
<?php
if(isset($_GET['edit_taxe'])){

  $the_taxe_id = $_GET['edit_taxe'];

    $query = "SELECT * FROM taxes WHERE taxe_id = $the_taxe_id ";
    $select_taxe_query = mysqli_query($connection,$query);

      while($row = mysqli_fetch_assoc($select_taxe_query)) {
        $taxe_id = $row['taxe_id'];
        $taxe_type = $row['taxe_type'];
        $taxe_mont = $row['taxe_mont'];
        $taxe_date_em = $row['taxe_date_em'];
        $taxe_date_rec = $row['taxe_date_rec'];
      }
}
if(isset($_POST['edit_taxe'])){

  $error_array = array();
         $success_array = array();
         $dateMin = "1950-01-01";
         $dateMax = "2050-01-01";

         $taxe_type          = $_POST['taxe_type'];
         $taxe_mont          = $_POST['taxe_mont'];
         $taxe_date_em       = $_POST['taxe_date_em'];
         $taxe_date_rec      = $_POST['taxe_date_rec'];

        if(empty($taxe_type)||empty($taxe_mont)||empty($taxe_date_em)||empty($taxe_date_rec)){
                array_push($error_array, "Les champs ne peuvent pas être vides");
            }
            else if(strlen($taxe_type)<=1 || strlen($taxe_type)>=25){
                array_push($error_array,"La type de taxe entre 2 et 25 caractères" );
            }
            else if(strlen($taxe_mont)<=1 || strlen($taxe_mont)>=10){
                array_push($error_array,"La montant entre 2 et 10 caractères" );
            }
            else if($taxe_date_em < $dateMin || $taxe_date_em > $dateMax){
                array_push($error_array,"La date recu doit etre entre 1950 et 2050" );
            }
            else if ($taxe_date_rec<=$dateMin || $taxe_date_rec>=$dateMax){
                array_push($error_array,"La date payee doit etre entre 1950 et 2050" );
            }
            else{


          $query = "UPDATE taxes SET ";
          $query .="taxe_type      = '{$taxe_type}', ";
          $query .="taxe_mont      = '{$taxe_mont}', ";
          $query .="taxe_date_em   = '{$taxe_date_em}', ";
          $query .="taxe_date_rec  = '{$taxe_date_rec}' ";
          $query .= "WHERE taxe_id = '{$the_taxe_id}' ";

        $create_employee_query = mysqli_query($connection, $query);

        confirmQuery($create_employee_query);

        array_push($success_array, "Vous avez modifié avec succès la taxe <a href ='/compta/taxes.php'> Back </a>");
            }


}

?>
        <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Taxe</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <ol class="breadcrumb">
        <li><a href="dashboard.php">Accueil</a></li>
        <li><a href="taxes.php">Taxes</a></li>
        <li class="active">Edit Taxe</li>
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
        <div class="row">
        <div class="form-group col-md-8">
            <label for="taxe_type">Type de Taxe</label>
            <input type="text" value="<?php echo $taxe_type; ?>" class="form-control" name="taxe_type">
        </div>
</div>
       <div class="row">
        <div class="form-group col-md-8">
            <label for="taxe_mont">Taxe Montant</label>
            <input type="text" value="<?php echo $taxe_mont; ?>" class="form-control" name="taxe_mont">
        </div>
</div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="taxe_date_em">Date Recu</label>
                <input type="text" value="<?php echo $taxe_date_em; ?>" data-date-format='yyyy-mm-dd' name="taxe_date_em" data-provide="datepicker" id="taxe_date_em" class="form-control" readonly placeholder="Selectionez la date">
            </div>
            <div class="form-group col-md-4">
                <label for="taxe_date_rec">Date de recouvrement</label>
                <input type="text" value="<?php echo $taxe_date_rec; ?>" data-date-format='yyyy-mm-dd' name="taxe_date_rec" data-provide="datepicker" id="taxe_date_rec" class="form-control" readonly placeholder="Selectionez la date">
            </div>
        </div>
            <input class="btn btn-primary" type="submit" name="edit_taxe" value="Ajout Taxe">
    </form>

