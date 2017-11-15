        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add employee</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
<?php
if(isset($_POST['create_emplyee'])){

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
            <input type="text" class="form-control" name="salarie_prenom">
        </div>

        <div class="form-group">
            <label for="salarie_nom">Lastname</label>
            <input type="text" class="form-control" name="salarie_nom">
        </div>



        <div class="form-group">
            <label for="salarie_phone">Phone Number</label>
            <input type="text" class="form-control" name="salarie_phone">
        </div>

        <div class="form-group">
            <label for="salarie_email">E-mail</label>
            <input type="email" class="form-control" name="salarie_email">
        </div>

        <div class="form-group">
            <label for="salarie_poste">Post</label>
            <input type="text" class="form-control" name="salarie_poste">
        </div>
        <div class="form-group">
            <label for="salarie_salaire_NET">Salary NET</label>
            <input type="number" min="0" class="form-control" name="salarie_salaire_NET">
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_emplyee" value="Add Employee">
        </div>

    </form>
