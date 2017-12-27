
 <?php
 //load_data.php
if(isset($_POST['facture_id']))
{
    $output ='';
    $connection = mysqli_connect("localhost", "root", "", "compta");
    $query = "SELECT * FROM commande_client WHERE facture_cl_id ='".$_POST['id']."'";
    $select_produit_facture_client = mysqli_query($connection, $query);
    $output .='
    <table class="table table-hover">
                    <thead>
                        <th>Appellation</th>
                        <th>Quantite</th>
                        <th>Prix</th>
                        <th>Total HT</th>
                    </thead>
                     <tbody>
    ';


    while($row = mysqli_fetch_array($select_produit_facture_client)){

        $produit_appellation = $row['produit_appellation'];
        $commande_produit_quantite = $row['commande_produit_quantite'];
        $commande_produit_prix = $row['commande_produit_prix'];
        $commande_produit_actual_montant = $row['commande_produit_actual_montant'];

        $output.='
        <tr>
        <td>$produit_appellation</td>
        <td>$commande_produit_quantite</td>
        <td>$commande_produit_prix</td>
        <td>$commande_produit_actual_montant</td>
        </tr>
        ';
    }
    $output .= ' </tbody>
                </table>';

    echo $output;
}
?>








