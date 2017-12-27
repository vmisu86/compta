<?php


function viewAllFactureClient(){

    global $connection;

    $query = "SELECT * FROM factures_cl LEFT JOIN clients ON factures_cl.facture_cl_client_id = clients.client_id";
    $select_all_facture_client = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_all_facture_client)){

        $facture_client_id          = $row['facture_cl_id'];
        $facture_client_client_id   = $row['facture_cl_client_id'];
        $facture_client_ref         = $row['facture_cl_ref'];
        $facture_client_date_em     = $row['facture_cl_date_em'];
        $facture_client_date_rec    = $row['facture_cl_date_rec'];
        $facture_client_taux        = $row['facture_cl_taux'];
        $facture_client_total_HT    = $row['facture_cl_total_HT'];
        $facture_client_montant_TVA = $row['facture_cl_mont_TVA'];
        $facture_client_total_TTC   = $row['facture_cl_total_TTC'];
        $facture_client_payee       = $row['facture_cl_payee'];

        $client_nom = $row['nom'];
        $client_prenom = $row['prenom'];

        confirmQuery($select_all_facture_client);

        if($facture_client_payee == 1){
            $facture_client_payee = "<p class='label label-success'> Payee</p>";
        }

        elseif($facture_client_date_rec > date("Y-m-d")){
            $facture_client_payee = "<p class='label label-warning'>Non payee</p>";
        }
        else{
         $facture_client_payee = "<p class='label label-danger'>En retard</p>";
        }


 echo"<tr>";
 echo"<td>".$facture_client_ref."</td>";
  echo"<td>".$facture_client_date_em. "</td>";
  echo"  <td>".$facture_client_date_rec. "</td>";
  echo"  <td>".$client_prenom." ".$client_nom."</td>";
  echo"  <td>".$facture_client_total_TTC. "</td>";
  echo"  <td>".$facture_client_payee. "</td>";
  echo"  <td>"."
        <div class='dropdown'>
            <button id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Options
                <span class='caret'></span>
                </button>
            <ul class='dropdown-menu' aria-labelledby='dLabel'>
             <li>
                    <a class='' href='factures_client.php?change_to_payee={$facture_client_id}'><i class='fa fa-money' aria-hidden='true'></i> Payee</a>
                </li>
                 <li>
                    <a class='' href='includes/factures/generate_pdf.php?generate_pdf_clint_id={$facture_client_id}'><i class='fa fa-file-text-o' aria-hidden='true'></i> PDF</a>
                </li>
                <li>
                    <a class='' href='factures_client.php?source=edit_client_facture&edit_client_facture={$facture_client_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Modifier</a>
                </li>
                <li>
                    <a rel='$facture_client_id' class='delete_client_facture_link' href='#'><i class='fa fa-trash-o' aria-hidden='true'></i> Supprimer</a>
                </li>
            </ul>
        </div>". "
    </td>
</tr>";
}
}

//------------------------------CHANGER LA FACTURE A PAYEE------------------//

function change_to_payee(){
    global $connection;

    if(isset($_GET['change_to_payee'])){
        $the_facture_clint_id = $_GET['change_to_payee'];

        $query = "UPDATE factures_cl SET facture_cl_payee = '1' WHERE facture_cl_id = '{$the_facture_clint_id}'";

        $change_facture_status = mysqli_query($connection, $query);
        confirmQuery($change_facture_status);
        redirect("factures_client.php");
    }
}

//------------------------------SELECT PRODUITS COMMANDEE POUR LA FACTURE------------------//
function select_produits_commande(){

    global $connection;

    if(isset($_GET['client_facture'])){

    $the_facture_cl_id = $_GET['client_facture'];

    $query = "SELECT * FROM commande_client";
    $select_produit_facture_client = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_produit_facture_client)){

        $produit_appellation = $row['produit_appellation'];
        $commande_produit_quantite = $row['commande_produit_quantite'];
        $commande_produit_prix = $row['commande_produit_prix'];
        $commande_produit_actual_montant = $row['commande_produit_actual_montant'];

        echo"<tr>";
        echo"<td>$produit_appellation</td>";
        echo"<td>$commande_produit_quantite</td>";
        echo"<td>$commande_produit_prix</td>";
        echo"<td>$commande_produit_actual_montant</td>";
        echo"</tr>";
    }
  }
}
//------------------------------SELECT CLIENT POUR LA FACTURE------------------//
function selectClient(){

    global $connection;

    echo"
        <div class='dropdown'>
            <button class='btn btn-default' id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Select Client
                <span class='caret'></span>
                </button>
            <ul class='dropdown-menu' aria-labelledby='dLabel'>
                <li>";

    $query = "SELECT * FROM clients";
    $select_all_client = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_all_client)){
        $client_id = $row['client_id'];
        $client_nom = $row['nom'];
        $client_prenom = $row['prenom'];

        echo "<a href='factures_client.php?source=add_facture_client&client_id=$client_id'><i class='fa fa-plus-circle' aria-hidden='true'></i> ".$client_nom." ".$client_prenom."</a>";
    }
    echo "</li>
            </ul>
        </div>";

        }


//------------------------------DERNIER FACTURE ID CLIENT------------------//
 function lastIdPulsOne(){

     global $connection;
    $query = "SELECT facture_cl_id FROM factures_cl ORDER BY facture_cl_id DESC LIMIT 1";
    $result=mysqli_query($connection, $query);
     if(mysqli_num_rows($result) > 0){
         $max_public_id = mysqli_fetch_row($result);

     }
     confirmQuery($result);
   return $max_public_id[0] + 1;


 }

//------------------------------SELECT PRODUIT POUR LA FACTURE CLIENT------------------//
function selectProduit(){

    global $connection;

    echo "<option value=''>~~SELECT~~</option>";

    $query = "SELECT * FROM produits";
    $select_all_produits = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_all_produits)){
        $produit_id             = $row['produit_id'];
        $produit_appellation    = $row['produit_appellation'];


        echo "<option value='".$row['produit_appellation']."'>".$row['produit_appellation']."</option>";

    }
}

//---------------------SELECT TOUS LES FACTURE PAYEE OU NON-------------------------//

function selectFactureClientPayeeOuNon($type){

    global $connection;

    $query = "SELECT * FROM factures_cl WHERE facture_cl_payee = {$type}";
    $select_non_payee = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_non_payee)){
        $facture_cl_id              = $row['facture_cl_id'];
        $facture_cl_fournisseur_id  = $row['facture_cl_client_id'];
        $facture_cl_ref             = $row['facture_cl_ref'];
        $facture_cl_desc            = $row['facture_cl_desc'];
        $facture_cl_date_rec        = $row['facture_cl_date_rec'];
        $facture_cl_total_TTC       = $row['facture_cl_total_TTC'];
        $facture_cl_payee           = $row['facture_cl_payee'];

        if($facture_cl_payee == 1){
            $facture_cl_payee = "<p class='label label-success'> Payee</p>";
        }

        elseif($facture_cl_date_rec > date("Y-m-d")){
            $facture_cl_payee = "<p class='label label-warning'>Non payee</p>";
        }
        else{
         $facture_cl_payee = "<p class='label label-danger'>En retard</p>";
        }
        echo "<tr><td>{$facture_cl_id}</td>";
        echo "<td>$facture_cl_fournisseur_id</td>";
        echo "<td>$facture_cl_ref</td>";
        echo "<td>$facture_cl_date_rec</td>";
        echo "<td>$facture_cl_total_TTC</td>";
        echo "<td>$facture_cl_payee</td>";
    }
}

//----------------ENVOYER EMAIL POUR LES CLIENT EN RETARD---------------//

function selectFactureClientEmailRappelle(){

    global $connection;

    $query = "SELECT * FROM factures_cl LEFT JOIN clients ON factures_cl.facture_cl_client_id = clients.client_id WHERE facture_cl_date_rec  <= CURDATE() AND facture_cl_payee = 0";
    $select_non_payee = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_non_payee)){
        $facture_cl_id              = $row['facture_cl_id'];
        $facture_cl_ref             = $row['facture_cl_ref'];
        $facture_cl_date_rec        = $row['facture_cl_date_rec'];
        $facture_cl_total_TTC       = $row['facture_cl_total_TTC'];

        $client_nom = $row['nom'];
        $client_prenom = $row['prenom'];
        $client_email = $row['email'];

        confirmQuery($select_non_payee);

        echo "<td>$facture_cl_ref</td>";
        echo "<td>$client_nom"." "."$client_prenom</td>";
        echo "<td>$facture_cl_date_rec</td>";
        echo "<td>$facture_cl_total_TTC</td>";
        echo "<td><a class='btn btn-primary' href='/compta/factures_client.php?source=envoyer_email&reference={$facture_cl_ref}&nom={$client_nom}&email={$client_email}&prenom={$client_prenom}&date_rec={$facture_cl_date_rec}&total={$facture_cl_total_TTC}
        '>Envoyer</a></td>";

    }
}

//--------------------SOMME FACTURE PAYEE / NON PAYEE CLIENT------------------------//
function sommeFactureClient($type){

    global $connection;

    $total = 0;
    $query = "SELECT * FROM factures_cl WHERE facture_cl_payee = {$type} ";
    $select_non_payee = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_non_payee)){
        $facture_cl_total_HT        = $row['facture_cl_total_HT'];
        $facture_cl_mont_TVA        = $row['facture_cl_mont_TVA'];
        $facture_cl_total_TTC       = $row['facture_cl_total_TTC'];

        $total += $facture_cl_total_TTC;
    }
        if($type == 1){
            echo "<td><h2 class='text-center sommepositif'>$total</h2></td>";
        }
        else{
            echo "<td><h2 class='text-center sommenegatif'>$total</h2></td>";
        }

}


//---------------------Fournisseur_Facture VOIR TOUS---------------------------//

function fournisseurNomAfficher($id){
    $query = "SELECT * FROM fournisseurs WHERE fournisseur_id = {$id}";
    $select_all_fournisseurs = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_all_fournisseurs)){
        $fournisseur_nom = $row['fournisseur_nom'];
}
    return $fournisseur_nom;
}

function viewAllFournisseurFacture(){

    global $connection;

    $query = "SELECT * FROM factures_fr";
    $select_all_facture_fr = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_all_facture_fr)){

        $facture_fr_id              = $row['facture_fr_id'];
        $facture_fr_fournisseur_id  = $row['facture_fr_fournisseur_id'];
        $facture_fr_ref             = $row['facture_fr_ref'];
        $facture_fr_desc            = $row['facture_fr_desc'];
        $facture_fr_date_em         = $row['facture_fr_date_em'];
        $facture_fr_date_rec        = $row['facture_fr_date_rec'];
        $facture_fr_total_HT        = $row['facture_fr_total_HT'];
        $facture_fr_mont_TVA        = $row['facture_fr_mont_TVA'];
        $facture_fr_total_TTC       = $row['facture_fr_total_TTC'];
        $facture_fr_payee           = $row['factures_fr_payee'];
        $facture_fr_pdf             = $row['facture_fr_pdf'];

        if($facture_fr_payee == 1){
            $facture_fr_payee = "<p class='label label-success'> Payee</p>";
        }

        elseif($facture_fr_date_rec > date("Y-m-d")){
            $facture_fr_payee = "<p class='label label-warning'>Non payee</p>";
        }
        else{
         $facture_fr_payee = "<p class='label label-danger'>En retard</p>";
        }


         echo "<tr><td>{$facture_fr_id}</td>";
         echo "<td>$facture_fr_fournisseur_id</td>";
         echo "<td>$facture_fr_ref</td>";
        echo "<td>$facture_fr_desc</td>";
        echo "<td>$facture_fr_date_em</td>";
        echo "<td>$facture_fr_date_rec</td>";
        echo "<td>$facture_fr_total_HT</td>";
        echo "<td>$facture_fr_mont_TVA</td>";
        echo "<td>$facture_fr_total_TTC</td>";
        echo "<td>$facture_fr_payee</td>";
         echo "<td>".
             "<div class='dropdown'>
            <button id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Options
                <span class='caret'></span>
                </button>
            <ul class='dropdown-menu' aria-labelledby='dLabel'>
            	<li>
                    <a class='' href='factures_fournisseurs.php?change_to_payee_fournisseur={$facture_fr_id}'><i class='fa fa-money' aria-hidden='true'></i> Payee</a>
                </li>
                <li>
                    <a class='' href='factures_fournisseurs.php?source=edit_fournisseur_facture&edit_facture_id={$facture_fr_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Modifier</a>
                </li>
                <li>
                    <a href='/compta/fournisseur_facture_pdf/$facture_fr_pdf'> <i class='fa fa-download' aria-hidden='true'></i> Telecharger PDF</a>
                </li>
                <li>
                 <a rel='$facture_fr_id' class='delete_fournisseur_facture_link' href='#'><i class='fa fa-trash-o' aria-hidden='true'></i> Supprimer</a>
                </li>
            </ul>
        </div>".
            "</td></tr>";


    }
}

//------------------------------CHANGER LA FACTURE A PAYEE------------------//

function change_to_payee_fournisseur(){
    global $connection;

    if(isset($_GET['change_to_payee_fournisseur'])){
        $the_facture_fournisseur_id = $_GET['change_to_payee_fournisseur'];

        $query = "UPDATE factures_fr SET factures_fr_payee= '1' WHERE facture_fr_id= '{$the_facture_fournisseur_id}'";

        $change_facture_status = mysqli_query($connection, $query);
        confirmQuery($change_facture_status);
        redirect("factures_fournisseurs.php");
    }
}
//--------------- SELECT FOURNISSEURS POUR LA FACTURE--------------------------------//
function selectFournisseur(){

    global $connection;

     $query = "SELECT * FROM fournisseurs";
    $select_all_fournissuer = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_all_fournissuer)){
        $fournisseur_id = $row['fournisseur_id'];
        $fournisseur_nom = $row['fournisseur_nom'];

        echo "<option value='$fournisseur_id'>$fournisseur_nom</option>";

    }
}

//---------------------SELECT TOUS LES FACTURE PAYEE OU NON-------------------------//

function selectFactureFournisseurPayeeOuNon($type){

    global $connection;

    $query = "SELECT * FROM factures_fr WHERE factures_fr_payee = {$type}";
    $select_non_payee = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_non_payee)){
        $facture_fr_id              = $row['facture_fr_id'];
        $facture_fr_fournisseur_id  = $row['facture_fr_fournisseur_id'];
        $facture_fr_ref             = $row['facture_fr_ref'];
        $facture_fr_desc            = $row['facture_fr_desc'];
        $facture_fr_date_rec        = $row['facture_fr_date_rec'];
        $facture_fr_total_HT        = $row['facture_fr_total_HT'];
        $facture_fr_mont_TVA        = $row['facture_fr_mont_TVA'];
        $facture_fr_total_TTC       = $row['facture_fr_total_TTC'];
        $facture_fr_payee           = $row['factures_fr_payee'];

        if($facture_fr_payee == 1){
            $facture_fr_payee = "<p class='label label-success'> Payee</p>";
        }

        elseif($facture_fr_date_rec > date("Y-m-d")){
            $facture_fr_payee = "<p class='label label-warning'>Non payee</p>";
        }
        else{
         $facture_fr_payee = "<p class='label label-danger'>En retard</p>";
        }
        echo "<tr><td>{$facture_fr_id}</td>";
        echo "<td>$facture_fr_fournisseur_id</td>";
        echo "<td>$facture_fr_ref</td>";
        echo "<td>$facture_fr_date_rec</td>";
        echo "<td>$facture_fr_total_TTC</td>";
        echo "<td>$facture_fr_payee</td>";
    }
}




//--------------------SOMME FACTURE PAYEE / NON PAYEE------------------------//
function sommeFactureFournisseur($type){

    global $connection;

    $total = 0;
    $query = "SELECT * FROM factures_fr WHERE factures_fr_payee = {$type} ";
    $select_non_payee = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_non_payee)){
        $facture_fr_total_HT        = $row['facture_fr_total_HT'];
        $facture_fr_mont_TVA        = $row['facture_fr_mont_TVA'];
        $facture_fr_total_TTC       = $row['facture_fr_total_TTC'];

        $total += $facture_fr_total_TTC;
    }
        if($type == 1){
            echo "<td><h2 class='text-center sommepositif'>$total</h2></td>";
        }
        else{
            echo "<td><h2 class='text-center sommenegatif'>$total</h2></td>";
        }

}

//-------------------- Comptabilité mois par mois--------------------//
function recetteFactureParMois(){

    global $connection;
    for($i=1; $i<=12; $i++){

    $balance = 0;
    $total_taxe = 0;
    $total_fournisseur = 0;
    $total_client = 0;

    $query_fournisseur = "SELECT * FROM factures_fr WHERE factures_fr_payee = 1 AND YEAR(facture_fr_date_rec)=YEAR(CURDATE()) AND MONTH(facture_fr_date_rec) = {$i}";
    $select_fournisseur_payee = mysqli_query($connection, $query_fournisseur);
    while($row = mysqli_fetch_array($select_fournisseur_payee)){
        $facture_fr_date_rec        = $row['facture_fr_date_rec'];
        $facture_fr_total_HT        = $row['facture_fr_total_HT'];
        $facture_fr_mont_TVA        = $row['facture_fr_mont_TVA'];
        $facture_fr_total_TTC       = $row['facture_fr_total_TTC'];

        $total_fournisseur -= $facture_fr_total_TTC;

    }
    $query_taxe = "SELECT * FROM taxes WHERE YEAR(facture_cl_date_rec)=YEAR(CURDATE()) AND MONTH(taxe_date_rec) = {$i}";
    $select_taxe_payee = mysqli_query($connection, $query_taxe);
    while($row = mysqli_fetch_array($select_taxe_payee)){

        $taxe_mont = $row['taxe_mont'];

        $total_taxe -= $taxe_mont;

    }

    $query_client = "SELECT * FROM factures_cl WHERE facture_cl_payee = 1 AND YEAR(facture_cl_date_rec)=YEAR(CURDATE()) AND MONTH(facture_cl_date_rec) = {$i}";
    $select_client_payee = mysqli_query($connection, $query_client);
    while($row = mysqli_fetch_array($select_client_payee)){
        $facture_cl_date_rec        = $row['facture_cl_date_rec'];
        $facture_cl_total_HT        = $row['facture_cl_total_HT'];
        $facture_cl_mont_TVA        = $row['facture_cl_mont_TVA'];
        $facture_cl_total_TTC       = $row['facture_cl_total_TTC'];

        $total_client += $facture_cl_total_TTC;

    }
        $balance = $total_client + $total_taxe + $total_fournisseur;
        $nom_mois = date("F", mktime(0, 0, 0, $i, 15));
        echo "<tr>";
        echo "<td>$nom_mois</td>";
       if($balance > 0){
            echo "<td><p class='text-center somme'>Revenu:$total_client, Taxe:$total_taxe, Depense:$total_fournisseur = <strong class='sommepositif' >$balance</strong></p></td>";
        }
        elseif($balance == 0){
            echo "<td><p class='text-center somme'>Revenu:$total_client, Taxe:$total_taxe, Depense:$total_fournisseur = <strong class='sommezero' >$balance</strong></p></td>";
        }
        else{
            echo "<td><p class='text-center somme'>Revenu:$total_client, Taxe:$total_taxe, Depense:$total_fournisseur = <strong class='sommenegatif' >$balance</strong></p></td>";
       }
        echo"</tr>";

}

}

//------------------Comptabilité prévisionnelle sur les mois à venir-------------//

function comptaPrevisionnelle(){

    global $connection;
    for($i=1; $i<=3; $i++){

    $balance = 0;
    $total_taxe = 0;
    $total_fournisseur = 0;
    $total_client = 0;

    $query_fournisseur = "SELECT * FROM factures_fr WHERE facture_fr_date_rec BETWEEN NOW() AND NOW()+INTERVAL {$i} MONTH";
    $select_fournisseur_payee = mysqli_query($connection, $query_fournisseur);
    while($row = mysqli_fetch_array($select_fournisseur_payee)){
        $facture_fr_date_rec        = $row['facture_fr_date_rec'];
        $facture_fr_total_HT        = $row['facture_fr_total_HT'];
        $facture_fr_mont_TVA        = $row['facture_fr_mont_TVA'];
        $facture_fr_total_TTC       = $row['facture_fr_total_TTC'];

        $total_fournisseur -= $facture_fr_total_TTC;

    }
    $query_taxe = "SELECT * FROM taxes WHERE taxe_date_rec BETWEEN NOW()+INTERVAL 1 MONTH AND NOW()+INTERVAL {$i} MONTH";
    $select_taxe_payee = mysqli_query($connection, $query_taxe);
    while($row = mysqli_fetch_array($select_taxe_payee)){

        $taxe_mont = $row['taxe_mont'];

        $total_taxe -= $taxe_mont;

    }

    $query_client = "SELECT * FROM factures_cl WHERE facture_cl_date_rec BETWEEN NOW() AND NOW()+INTERVAL {$i} MONTH";
    $select_client_payee = mysqli_query($connection, $query_client);
    while($row = mysqli_fetch_array($select_client_payee)){
        $facture_cl_date_rec        = $row['facture_cl_date_rec'];
        $facture_cl_total_HT        = $row['facture_cl_total_HT'];
        $facture_cl_mont_TVA        = $row['facture_cl_mont_TVA'];
        $facture_cl_total_TTC       = $row['facture_cl_total_TTC'];

        $total_client += $facture_cl_total_TTC;

    }
        $balance = $total_client + $total_taxe + $total_fournisseur;
        $nom_mois = date("F", mktime(0, 0, 0, $i, 15));
        echo "<tr>";
        echo "<td>$nom_mois</td>";
       if($balance > 0){
            echo "<td><p class='text-center somme'><strong class='sommepositif' >$balance</strong></p></td>";
        }
        elseif($balance == 0){
            echo "<td><p class='text-center somme'><strong class='sommezero' >$balance</strong></p></td>";
        }
        else{
            echo "<td><p class='text-center somme'><strong class='sommenegatif' >$balance</strong></p></td>";
       }
        echo"</tr>";

}

}

?>


