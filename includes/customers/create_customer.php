<?php
include_once '../db_connect.php';
include_once '../functions.php';

if(isset($_POST['create_customer'])){

         $client_nom          = $_POST['nom'];
         $client_prenom       = $_POST['prenom'];
         $client_adresse       = $_POST['adresse'];
         $client_phone        = $_POST['phone'];
         $client_email        = $_POST['email'];


        $query = "INSERT INTO clients(nom, prenom, adresse,phone,email) ";

        $query .= "VALUES('{$client_nom}','{$client_prenom}','{$client_adresse}','{$client_phone}','{$client_email}') ";

        $create_customer_query = mysqli_query($connection, $query);

        confirmQuery($create_customer_query);

        redirect("/compta/customers.php");

}


?>
