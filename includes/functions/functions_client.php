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

 echo "
<tr>
    <td>".$customer_id. "
    </td>
    <td>".$customer_nom. "
    </td>
    <td>".$customer_prenom. "
    </td>
    <td>".$customer_adress. "
    </td>
    <td>".$customer_phone. "
    </td>
    <td>".$customer_email. "
    </td>
    <td>"."
        <div class='dropdown'>
            <button id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Options
                <span class='caret'></span>
                </button>
            <ul class='dropdown-menu' aria-labelledby='dLabel'>
                <li>
                    <a class='' href='customers.php?source=edit_customer&edit_customer={$customer_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Modifier</a>
                </li>
                <li>
                    <a rel='$customer_id' class='delete_customer_link' href='#'><i class='fa fa-trash-o' aria-hidden='true'></i> Supprimer</a>
                </li>
            </ul>
        </div>". "
    </td>
</tr>";


    }
}





?>
