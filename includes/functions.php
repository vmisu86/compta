<?php
//--------------------------------------GENERAL------------------------------------------//

//-----------------REDIRECT LOCATION-------------------//
function redirect($location){

    return header("Location:" . $location);
}

//-----------------QUERY CHECK-------------------//
function confirmQuery($result){
    global $connection;
if(!$result){
            die("QUERY FAILED" . mysqli_error($connection));
        }

}

//-----------------RECORD COUNT FROM A TABLE DATA-------------------//
function recordCount($table){

    global $connection;

    $query = "SELECT * FROM " . $table;
    $select_all_posts = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_all_posts);

    confirmQuery($result);

    return $result;
}

//------------------CUSTOMERS-----------------------//
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


//---------------------EMPLOYEE-----------------//

function viewAllEmployees(){
     global $connection;

    $query = "SELECT * FROM salaires";
    $select_all_employees = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_all_employees)){
         $employee_id           = $row['salarie_id'];
         $employee_nom          = $row['salarie_nom'];
         $employee_prenom       = $row['salarie_prenom'];
         $employee_phone        = $row['salarie_phone'];
         $employee_email        = $row['salarie_email'];
         $employee_poste        = $row['salarie_poste'];
         $employee_salaire_net  = $row['salarie_salaire_NET'];
         $employee_salaire_brut = $row['salarie_salaire_BRUT'];

        echo "<tr><td>".$employee_id.
             "</td><td>".$employee_nom.
            "</td><td>".$employee_prenom.
            "</td><td>".$employee_phone.
            "</td><td>".$employee_email.
            "</td><td>".$employee_poste.
            "</td><td>".$employee_salaire_net.
            "</td><td>".$employee_salaire_brut.
            "</td><td>"."<a class='btn btn-warning' href='employees.php?source=edit_employee&edit_empolyee={$employee_id}'>Edit</a>" .
            "</td><td>"."<a class='btn btn-danger' href='employees.php?delete={$employee_id}'>Delete</a>".
            "</td></tr>";
    }
}

//---------------------DELETE - EMPLOYEE-----------------//
function deleteEmployees(){

    global $connection;
if(isset($_GET['delete'])){
    $the_employee_id = $_GET['delete'];
    $query = "DELETE FROM salaires WHERE salarie_id = {$the_employee_id}";
    $delete_query = mysqli_query($connection, $query);
    redirect("employees.php");

}
}


?>
