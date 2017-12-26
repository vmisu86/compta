<script>
                    $(document).ready(function() {

                        var final_total_amt = $('#facture_cl_total_TTC').text();
                        var count = 1;
                        var selectProduit = "<?php selectProduit(); ?>"
                        $(document).on('click', '#add_row', function() {
                            count = count + 1;

                            $('#total_item').val(count);
                            var html_code = '';
                            html_code += '<tr id="row' + count + '">';
                            html_code += '<td><span id="sr_no">' + count + '</span></td>';

                            html_code += '<td><select class="form-control input-sm" name="produit_appellation[]" id="produit_appellation' + count + '" onchange="showProduit(this.value)">'+selectProduit+'</select></td>';


                            html_code += '<td><input type="text" name="commande_produit_quantite[]" id="commande_produit_quantite' + count + '" data-srno="1" class="form-control input-sm commande_produit_quantite"></td>';

                            html_code += '<td><input type="text" name="commande_produit_prix[]" id="commande_produit_prix' + count + '" readonly  data-srno="1" class="form-control input-sm commande_produit_prix"></td>';

                            html_code += '<td><input type="text" name="commande_produit_actual_montant[]" id="commande_produit_actual_montant' + count + '" data-srno="1" class="form-control input-sm commande_produit_actual_montant" readonly></td>';

                            html_code += '<td><input type="text" name="commande_taxe_montant[]" id="commande_taxe_montant' + count + '" data-srno="1" readonly class="form-control input-sm number_only commande_taxe_montant"></td>';

                            html_code += '<td><input type="text" name="commande_produit_final_montant[]" id="commande_produit_final_montant' + count + '" data-srno="1" readonly class="form-control input-sm 	commande_produit_final_montant"></td>';

                            html_code += '<td><button type="button" name="remove_row" id="' + count + '" class="btn btn-danger btn-xs remove_row">X</button></td>';
                            html_code += '</tr>';
                            $('#invoice-item-table').append(html_code);
                        });

                        $(document).on('click', '.remove_row', function() {
                            var row_id = $(this).attr("id");
                            var total_item_amount = $('#commande_produit_final_montant' + row_id).val();
                            var final_amount = $('#facture_cl_total_TTC').text();
                            var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
                            $('#facture_cl_total_TTC').text(result_amount);
                            $('#row' + row_id).remove();
                            count--;
                            $('#total_item').val(count);
                        });


                        function cal_final_total(count) {
                            var final_item_total = 0;
                            var final_total_TVA = 0;
                            var final_total_HTC = 0;
                            for (j = 1; j <= count; j++) {
                                var quantity = 0;
                                var price = 0;
                                var actual_amount = 0;
                                var tax_amount = 0;
                                var item_total = 0;
                                quantity = $('#commande_produit_quantite' + j).val();

                                price = $('#commande_produit_prix' + j).val();

                                actual_amount = parseFloat(quantity) * parseFloat(price);
                                $('#commande_produit_actual_montant' + j).val(actual_amount);


                                tax_amount = parseFloat(actual_amount) * 0.2;
                                $('#commande_taxe_montant' + j).val(tax_amount);

                                item_total = parseFloat(actual_amount) + parseFloat(tax_amount);
                                $('#commande_produit_final_montant' + j).val(item_total);

                                final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                                final_total_TVA = parseFloat(final_total_TVA) + parseFloat(tax_amount);
                                final_total_HTC = parseFloat(final_total_HTC) + parseFloat(actual_amount);

                            }
                            $('#facture_cl_total_TTC').val(final_item_total);
                            $('#facture_cl_total_TVA').val(final_total_TVA);
                            $('#facture_cl_total_HTC').val(final_total_HTC);
                        }

                        //Display the conted values in the cases
                        $(document).on('blur', '.commande_produit_quantite', function() {
                            cal_final_total(count);

                        });

//                        $(document).on('blur', '.commande_produit_prix', function() {
//                            cal_final_total(count);
//                        });

        });

                </script>



<?php

if(isset($_GET['client_id'])){

    $the_client_id = $_GET['client_id'];

    $query = "SELECT * FROM clients WHERE client_id = '{$the_client_id}' ";
    $select_client = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_client)){

        $client_id = $row['client_id'];
        $client_nom = $row['nom'];
        $client_prenom = $row['prenom'];
        $client_adresse = $row['adresse'];
        $client_phone = $row['phone'];
        $client_email = $row['email'];
    }
}

if(isset($_POST["create_client_facture"])){
    $error_array = array();
    $success_array = array();

    $facture_cl_client_id       =  trim($_POST["facture_cl_client_id"]);
    $facture_cl_adresse         =  trim($_POST["facture_cl_adresse"]);
    $facture_cl_ref             =  trim($_POST["facture_cl_ref"]);
    $facture_cl_date_em         =  trim($_POST["facture_cl_date_em"]);
    $facture_cl_client_id       =  trim($_POST["facture_cl_client_id"]);
    $facture_cl_adresse         =  trim($_POST["facture_cl_adresse"]);
    $facture_cl_date_rec        =  trim($_POST["facture_cl_date_rec"]);
    $facture_cl_total_HT        =  trim($_POST["facture_cl_total_HTC"]);
    $facture_cl_mont_TVA        =  trim($_POST["facture_cl_total_TVA"]);
    $facture_cl_total_TTC       =  trim($_POST["facture_cl_total_TTC"]);

    $query =  "
      INSERT INTO factures_cl
        (
        facture_cl_client_id,
        facture_cl_adresse,
        facture_cl_ref,
        facture_cl_date_em,
        facture_cl_date_rec,
        facture_cl_total_HT,
        facture_cl_mont_TVA,
        facture_cl_total_TTC,
        facture_cl_payee)
        VALUES (

        '{$facture_cl_client_id}',
        '{$facture_cl_adresse}',
        '{$facture_cl_ref}',
        '{$facture_cl_date_em}',
        '{$facture_cl_date_rec}',
        '{$facture_cl_total_HT}',
        '{$facture_cl_mont_TVA}',
        '{$facture_cl_total_TTC}',
        '{$facture_cl_payee}')
    ";

    $create_client_facture_query = mysqli_query($connection, $query);
     confirmQuery(create_client_facture_query);

                array_push($success_array, "Vous avez bien ajouter la facture. <a href ='/compta/factures_client.php'> Retour </a>");

    $last_id = mysqli_insert_id($connection);

//      $statement = $connection->query("SELECT LAST_INSERT_ID()");
//      $facture_cl_id = $statement->fetchColumn();

      for($count=0; $count<$_POST["total_item"]; $count++)
      {
            $facture_cl_id                    =  $last_id;
            $produit_appellation              =  trim($_POST["produit_appellation"][$count]);
            $commande_produit_quantite        =  trim($_POST["commande_produit_quantite"][$count]);
            $commande_produit_prix            =  trim($_POST["commande_produit_prix"][$count]);
            $commande_produit_actual_montant  =  trim($_POST["commande_produit_actual_montant"][$count]);
            $commande_taxe_montant            =  trim($_POST["commande_taxe_montant"][$count]);
            $commande_produit_final_montant   =  trim($_POST["commande_produit_final_montant"][$count]);

        $query ="
          INSERT INTO commande_client
          (facture_cl_id, produit_appellation, commande_produit_quantite, commande_produit_prix, commande_produit_actual_montant, commande_taxe_montant, commande_produit_final_montant)

          VALUES ('{$facture_cl_id}', '{$produit_appellation}', '{$commande_produit_quantite}', '{$commande_produit_prix}', '{$commande_produit_actual_montant}', '{$commande_taxe_montant}', '{$commande_produit_final_montant}')
        ";

        $create_commande_query = mysqli_query($connection, $query);
        confirmQuery(create_commande_query);
      }

}


?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ajout Facture Client</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <ol class="breadcrumb">
        <li><a href="dashboard.php">Accueil</a></li>
        <li><a href="factures_client.php">Facture_client</a></li>
        <li class="active">Ajout Facture Client</li>
    </ol>
    <div class="messages">

        <!--display the errors -->
        <?php
                            if($error_array) {
								foreach ($error_array as $key => $value) {
									echo '<div class="alert alert-danger" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';
									}
								}
                            if($success_array){
                                foreach($success_array as $key => $val){
                                    echo '<div class="alert alert-success" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$val.'</div>';
                                }
                            }
                            ?>
    </div>
    <form method="post" id="invoice_form">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td colspan="2">
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                               <?php selectClient(); ?>
                                   <h4>Client:</h4>
                                   <div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i> <b>ID:</b> </span>
									 <input class="form-control" readonly name="facture_cl_client_id" type="text" value="<?php echo $client_id; ?>">
								</div>



                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i> <b>Nom:</b> </span>
                                    <input class="form-control" readonly type="text" value="<?php echo $client_nom .' '.$client_prenom ?>">
                                </div>


                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i> <b>Adresse: </b> </span>
                            <textarea name='facture_cl_adresse' id='facture_cl_adresse' readonly class='form-control' value='<?php echo $client_adresse; ?>'><?php echo $client_adresse; ?></textarea>
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h4>Facture: </h4>
                                <input type="text" name="facture_cl_ref" readonly value="HSWR - <?php echo lastIdPulsOne(); ?>" class="form-control input-sm">

                                <input type="text" data-date-format='yyyy-mm-dd' name="facture_cl_date_em" data-provide="datepicker" id="order_date" class="form-control" readonly placeholder="Date de creation">

                                <input type="text" data-date-format='yyyy-mm-dd' name="facture_cl_date_rec" data-provide="datepicker" id="order_date" class="form-control" readonly placeholder="Date de paiement">
                            </div>
                        </div>
                        <table id="invoice-item-table" class="table table-bordered">
                            <tr>
                                <th>No.</th>
                                <th>Produit Nom</th>
                                <th>Quantite</th>
                                <th>Prix</th>
                                <th>Actual Total HT</th>
                                <th>TVA (20%)</th>
                                <th>Total</th>
                                <th></th>
                            </tr>

                            <tr>
                                <td><span id="sr_no">1</span></td>


                                <td><select class="form-control input-sm" name="produit_appellation[]" id="produit_appellation1" onchange="showProduit(this.value)">
                                    <?php selectProduit(); ?>
                                </select></td>


<!--                                <td><input type="text" name="produit_appellation[]" id="produit_appellation1" class="form-control input-sm"></td>-->
                                <td><input type="text" name="commande_produit_quantite[]" id="commande_produit_quantite1" data-srno="1" class="form-control commande_produit_quantite"></td>

                                <td><input type="text" name="commande_produit_prix[]" id="commande_produit_prix1" data-srno="1" readonly class="form-control commande_produit_prix"></td>

                                <td><input type="text" name="commande_produit_actual_montant[]" id="commande_produit_actual_montant1" data-srno="1" class="form-control input-sm commande_produit_actual_montant" readonly></td>

                                <td><input type="text" name="commande_taxe_montant[]" id="commande_taxe_montant1" data-srno="1" readonly class="form-control commande_taxe_montant"></td>

                                <td><input type="text" name="commande_produit_final_montant[]" id="commande_produit_final_montant1" data-srno="1" readonly class="form-control commande_produit_final_montant"></td>
                            </tr>
                        </table>
                        <div align="center">
                            <button type="button" name="add_row" id="add_row" class="btn btn-success ">+</button>
                        </div>
                        <div>
                         <div class="input-group">
									<span class="input-group-addon"><i class="fa fa-eur fa" aria-hidden="true"></i> <b>Total HTC:</b> </span>
									 <input type="text" name="facture_cl_total_HTC" id="facture_cl_total_HTC" readonly class="form-control input-sm">
								</div>
                    <div class="input-group">
									<span class="input-group-addon"><i class="fa fa-eur fa" aria-hidden="true"></i> <b>Total TVA:</b> </span>
									 <input type="text" name="facture_cl_total_TVA" id="facture_cl_total_TVA" readonly class="form-control input-sm">
								</div>
                    <div class="input-group">
									<span class="input-group-addon"><i class="fa fa-eur fa" aria-hidden="true"></i> <b>Total TTC:</b> </span>
									 <input type="text" name="facture_cl_total_TTC" id="facture_cl_total_TTC" readonly class="form-control input-sm">
								</div>



                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="hidden" name="total_item" id="total_item" value="1">
                        <input type="submit" name="create_client_facture" id="create_client_facture" class="btn btn-info" value="Create Facture">
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <div id="test">


      <script>
function showProduit(str) {


   var i = document.getElementById('total_item').value;


            if (str == "") {
        document.getElementById("commande_produit_prix"+i).value = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safar
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("commande_produit_prix"+i).value = this.responseText;
            }
        };
        xmlhttp.open("GET","/compta/includes/factures/load_data.php?q="+str,true);
        xmlhttp.send();
    }

}
</script>


    </div>
