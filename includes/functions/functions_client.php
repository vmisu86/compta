<?php


//------------------CUSTOMERS-----------------------//
function viewAllCustomers(){

    global $connection;

    $query = "SELECT * FROM clients";
    $select_all_customers = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_all_customers)){

        $customer_id = $row['client_id'];
        $customer_nom = $row['nom'];
        $customer_prenom = $row['prenom'];
        $customer_adress = $row['adresse'];
        $customer_phone = $row['phone'];
        $customer_email = $row['email'];

         echo "<tr><td>".$customer_id.
             "</td><td>".$customer_nom.
            "</td><td>".$customer_prenom.
            "</td><td>".$customer_adress.
            "</td><td>".$customer_phone.
            "</td><td>".$customer_email.
            "</td><td>"."<a class='btn btn-warning' href='customers.php?source=edit_employee&edit_empolyee={$customer_id}'>Edit</a>" .
            "</td><td>"."<a rel='$customer_id' class='btn btn-danger delete_customer_link'>Delete</a>".
            "</td></tr>";


    }
}
//---------------------DELETE - CUSTOMERS-----------------//
function deleteCustomers(){

    global $connection;
if(isset($_GET['delete'])){
    $the_clien_id = $_GET['delete'];
    $query = "DELETE FROM clients WHERE client_id = {$the_clien_id}";
    $delete_query = mysqli_query($connection, $query);

    redirect("customers.php");


    }
}





?>
