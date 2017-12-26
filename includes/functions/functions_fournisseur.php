<?php

//--------------------SELECT ALL FOURNISSEUR-------------------------//
//nous sélectionnons chaque ligne de la base de données et l'affichons dans une table.
function viewAllFournisseurs(){

        global $connection;

    $query = "SELECT * FROM fournisseurs";
    $select_all_fournisseurs = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_all_fournisseurs)){

        $fournisseur_id = $row['fournisseur_id'];
        $fournisseur_nom = $row['fournisseur_nom'];
        $fournisseur_adresse = $row['fournisseur_adresse'];
        $fournisseur_phone = $row['fournisseur_phone'];
        $fournisseur_email = $row['fournisseur_email'];

 echo "
<tr>
    <td>".$fournisseur_id. "
    </td>
    <td>".$fournisseur_nom. "
    </td>
    <td>".$fournisseur_adresse. "
    </td>
    <td>".$fournisseur_phone. "
    </td>
    <td>".$fournisseur_email. "
    </td>
    <td>"."
        <div class='dropdown'>
            <button id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Options
                <span class='caret'></span>
                </button>
            <ul class='dropdown-menu' aria-labelledby='dLabel'>
                <li>
                    <a class='' href='fournisseurs.php?source=edit_fournisseur&edit_fournisseur={$fournisseur_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Modifier</a>
                </li>
                <li>
                    <a rel='$fournisseur_id' class='delete_fournisseur_facture_link' href='#'><i class='fa fa-trash-o' aria-hidden='true'></i> Supprimer</a>
                </li>
            </ul>
        </div>". "
    </td>
</tr>";


    }
}


?>
