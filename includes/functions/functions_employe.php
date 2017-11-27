<?php
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

 echo "
<tr>
    <td>".$employee_id. "
    </td>
    <td>".$employee_nom. "
    </td>
    <td>".$employee_prenom. "
    </td>
    <td>".$employee_phone. "
    </td>
    <td>".$employee_email. "
    </td>
    <td>".$employee_poste. "
    </td>
    <td>".$employee_salaire_net. "
    </td>
    <td>".$employee_salaire_brut. "
    </td>
    <td>"."
        <div class='dropdown'>
            <button id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Options
                <span class='caret'></span>
                </button>
            <ul class='dropdown-menu' aria-labelledby='dLabel'>
                <li>
                    <a class='' href='employees.php?source=edit_employee&edit_empolyee={$employee_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Modifier</a>
                </li>
                <li>
                    <a rel='$employee_id' class=' delete_link' href='#'><i class='fa fa-trash-o' aria-hidden='true'></i> Supprimer</a>
                </li>
            </ul>
        </div>". "
    </td>
</tr>";
    }
}

//---------------------DELETE - EMPLOYEE-----------------//

?>
