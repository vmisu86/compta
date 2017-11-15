<?php

function findAllCustomers(){

    global $connection;

    $query = "SELECT * FROM customers";
    $select_all_customers = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_all_customers)){

        $customer_id = $row['customer_id'];
        $customer_nom = $row['nom'];
        $customer_prenom = $row['prenom'];
        $customer_adress = $row['adresse'];
        $customer_phone = $row['phone'];
        $customer_email = $row['email'];

        echo "<tr><td>". $customer_id . "</td><td>". $customer_nom . "</td><td>". $customer_prenom . "</td></tr>";


    }
}









?>
