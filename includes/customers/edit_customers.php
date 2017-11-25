        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit employee</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
<?php
if(isset($_GET['edit_customer'])){

  $the_customer_id = $_GET['edit_customer'];

    $query = "SELECT * FROM salaires WHERE salarie_id = $the_customer_id ";
    $select_customers_query = mysqli_query($connection,$query);

      while($row = mysqli_fetch_assoc($select_customers_query)) {
        $client_id        = $row['client_id'];
        $client_nom       = $row['nom'];
        $client_prenom    = $row['prenom'];
        $client_adresse    = $row['adresse'];
        $client_phone     = $row['phone'];
        $client_email     = $row['email'];
      }
}
if(isset($_POST['edit_empolyee'])){

         $client_nom          = $_POST['nom'];
         $client_prenom       = $_POST['prenom'];
         $client_adresse       = $_POST['adresse'];
         $client_phone        = $_POST['phone'];
         $client_email        = $_POST['email'];


        $query = "INSERT INTO clients(nom, prenom, adresse,phone,email) ";

        $query .= "VALUES('{$client_nom}','{$client_prenom}','{$client_adresse}','{$client_phone}','{$client_email}') ";

        $create_employee_query = mysqli_query($connection, $query);

        confirmQuery($create_employee_query);

        echo "<p class='bg-success'>Employee Created: " . " " . "<a href='employees.php'>View Users</a></p> ";

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
            <input class="btn btn-primary" type="submit" name="edit_empolyee" value="Update Employee">
        </div>

    </form>
