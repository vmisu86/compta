        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit employee</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
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

         $employee_nom          = $_POST['salarie_nom'];
         $employee_prenom       = $_POST['salarie_prenom'];
         $employee_phone        = $_POST['salarie_phone'];
         $employee_email        = $_POST['salarie_email'];
         $employee_poste        = $_POST['salarie_poste'];
         $employee_salaire_net  = $_POST['salarie_salaire_NET'];

         $employee_salaire_brut = $employee_salaire_net * 2;

        $query = "INSERT INTO salaires(salarie_nom, salarie_prenom, salarie_phone,salarie_email,salarie_poste,salarie_salaire_NET,salarie_salaire_BRUT) ";

        $query .= "VALUES('{$employee_nom}','{$employee_prenom}','{$employee_phone}','{$employee_email}','{$employee_poste}','{$employee_salaire_net}', '{$employee_salaire_brut}') ";

        $create_employee_query = mysqli_query($connection, $query);

        confirmQuery($create_employee_query);

        echo "<p class='bg-success'>Employee Created: " . " " . "<a href='employees.php'>View Users</a></p> ";

}

?>

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
