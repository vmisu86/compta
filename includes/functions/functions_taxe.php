<?php

//------------------TAXES-----------------------//
//nous sélectionnons chaque ligne de la base de données et l'affichons dans une table.
function viewAllTaxes(){

    global $connection;

    $query = "SELECT * FROM taxes";
    $select_all_taxes = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_all_taxes)){

        $taxe_id       = $row['taxe_id'];
        $taxe_type     = $row['taxe_type'];
        $taxe_mont     = $row['taxe_mont'];
        $taxe_date_em  = $row['taxe_date_em'];
        $taxe_date_rec = $row['taxe_date_rec'];

 echo "
<tr>
    <td>".$taxe_id. "
    </td>
    <td>".$taxe_type. "
    </td>
    <td>".$taxe_mont. "
    </td>
    <td>".$taxe_date_em. "
    </td>
    <td>".$taxe_date_rec. "
    </td>
    <td>"."
        <div class='dropdown'>
            <button id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Options
                <span class='caret'></span>
                </button>
            <ul class='dropdown-menu' aria-labelledby='dLabel'>
                <li>
                    <a class='' href='taxes.php?source=edit_taxe&edit_taxe={$taxe_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Modifier</a>
                </li>
                <li>
                    <a rel='$taxe_id' class='delete_taxe_link' href='#'><i class='fa fa-trash-o' aria-hidden='true'></i> Supprimer</a>
                </li>
            </ul>
        </div>". "
    </td>
</tr>";


    }
}

?>
