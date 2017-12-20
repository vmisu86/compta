<?php


if(isset($_POST['create_fournisseur_facture'])){
         $error_array = array();
         $success_array = array();
         $upload_check = 1;
         $FileType = pathinfo($facture_fr_pdf_with_path,PATHINFO_EXTENSION);

        $facture_fr_fournisseur_id  = $_POST['facture_fr_fournisseur_id'];
        $facture_fr_ref             = $_POST['facture_fr_ref'];
        $facture_fr_desc            = $_POST['facture_fr_desc'];
        $facture_fr_date_em         = $_POST['facture_fr_date_em'];
        $facture_fr_date_rec        = $_POST['facture_fr_date_rec'];
        $facture_fr_total_HT        = $_POST['facture_fr_total_HT'];
        $facture_fr_mont_TVA        = $_POST['facture_fr_mont_TVA'];
        $facture_fr_total_TTC       = $_POST['facture_fr_total_TTC'];
        $facture_fr_payee           = $_POST['factures_fr_payee'];



         $facture_fr_pdf             = $_FILES['facture_fr_pdf']['name'];
         $facture_fr_pdf_temp        = $_FILES['facture_fr_pdf']['tmp_name'];


       //PDF verification
         $facture_fr_pdf_with_path = "./fournisseur_facture_pdf/$facture_fr_pdf";
         $FileType = pathinfo($facture_fr_pdf_with_path,PATHINFO_EXTENSION);
            // Check file size max 2Mbyte
        if ($_FILES["facture_fr_pdf"]["size"] >= 2000000) {
            array_push($error_array, "Désolé, votre fichier est trop volumineux. Max: 2 mégaoctets.");
            $upload_check = 0;
        }
        // Allow certain file formats
        if($FileType != "pdf" && $FileType != "PDF") {
            array_push($error_array, "Désolé, seulement les fichiers PDF est autorisés.");
            $upload_check = 0;
        }

        if($upload_check == 0){
            array_push($error_array, "Désolé, votre PDF n'a pas été téléchargée.");
        // if everything is ok, try to upload file
        }else{
            if( move_uploaded_file($facture_fr_pdf_temp, $facture_fr_pdf_with_path)){
                array_push($success_array, "PDF a été téléchargée avec succès");
            }
            else{
                array_push($error_array, "Désolé, une erreur s'est produite lors du chargement de votre PDF.");
            }
        }
        if(empty($facture_fr_ref)||empty($facture_fr_desc)||empty($facture_fr_date_em)||empty($facture_fr_date_rec)||empty($facture_fr_total_HT)||empty($facture_fr_mont_TVA)||empty($facture_fr_total_TTC)){
                array_push($error_array, "Les champs ne peuvent pas être vides");
            }
            else if(strlen($facture_fr_ref)<=1 || strlen($facture_fr_ref)>=25){
                array_push($error_array,"La référence du la facture entre 2 et 25 caractères" );
            }
            else if(strlen($facture_fr_desc)<=1 || strlen($facture_fr_desc)>=25){
                array_push($error_array,"L'description' entre 2 et 25 caractères" );
            }
            else if(strlen($facture_fr_total_HT)<=1 || strlen($facture_fr_total_HT)>=12){
                array_push($error_array,"Le total HT entre 2 et 12 chiffres" );
            }
            else{

        $query = "INSERT INTO factures_fr(facture_fr_fournisseur_id,facture_fr_ref, facture_fr_desc, facture_fr_date_em, facture_fr_date_rec, facture_fr_total_HT, facture_fr_mont_TVA, facture_fr_total_TTC, factures_fr_payee, facture_fr_pdf) ";

        $query .= "VALUES('{$facture_fr_fournisseur_id}','{$facture_fr_ref}','{$facture_fr_desc}','{$facture_fr_date_em}','{$facture_fr_date_rec}','{$facture_fr_total_HT}','{$facture_fr_mont_TVA}','{$facture_fr_total_TTC}','{$facture_fr_payee}','{$facture_fr_pdf}') ";

        $create_produit_query = mysqli_query($connection, $query);

        confirmQuery($create_produit_query);

                array_push($success_array, "Vous avez bien ajouter la facture. <a href ='/compta/factures_fournisseurs.php'> Retour </a>");

            }
    }


?>

    <script>
        $(document).ready(function(){


                        function cal_final_total() {
                            var total_ht = 0;
                            var mont_tva = 0;
                            var total_ttc = 0;

                                total_ht = $('#facture_fr_total_HT').val();
                                mont_tva = parseFloat(total_ht) * 0.2;
                                $('#facture_fr_mont_TVA').val(mont_tva);
                                total_ttc = parseFloat(total_ht) + parseFloat(mont_tva);
                                $('#facture_fr_total_TTC').val(total_ttc);
                        }




                        //Display the conted values in the cases
                        $(document).on('blur', '.facture_fr_total_HT', function() {
                            cal_final_total();
                        });


        });

    </script>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ajoute Facture Fournisseur</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <ol class="breadcrumb">
        <li><a href="dashboard.php">Accueil</a></li>
        <li><a href="factures_fournisseurs.php">Factures Fournisseur</a></li>
        <li class="active">Ajout Facture</li>
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


    <form action="" method="post" enctype="multipart/form-data">
       <div class="row">
        <div class="form-group col-md-6 col-xs-6">
           <label for="">Fournisseurs</label>
            <select class="form-control" name="facture_fr_fournisseur_id" id="">
                <?php
                selectFournisseur();
                ?>
            </select>
        </div>
        <div class="form-group col-md-6 col-xs-6">
            <label for="nom">Reference facture</label>
            <input type="text" id="facture_fr_ref" class="form-control facture_fr_ref" name="facture_fr_ref">
        </div>
        </div>
        <div class="row">
        <div class="form-group col-md-4">
            <label for="prenom">Date Recu</label>
            <input type="text" data-date-format='yyyy-mm-dd' name="facture_fr_date_em" data-provide="datepicker" id="facture_fr_date_em" class="form-control" readonly placeholder="Selectionez la date">
        </div>
        <div class="form-group col-md-4">
            <label for="prenom">Date de recouvrement</label>
           <input type="text" data-date-format='yyyy-mm-dd' name="facture_fr_date_rec" data-provide="datepicker" id="facture_fr_date_rec" class="form-control" readonly placeholder="Selectionez la date">
        </div>
        </div>
        <div class="form-group">
            <label for="prenom">Description</label>
            <input type="text" class="form-control" name="facture_fr_desc">
        </div>
        <div class="row">
        <div class="form-group col-md-4">
            <label for="nom">Total HT</label>
            <input type="text" id="facture_fr_total_HT" class="form-control facture_fr_total_HT" name="facture_fr_total_HT">
        </div>
        <div class="form-group col-md-4">
            <label for="nom">Montant TVA</label>
            <input type="text" id="facture_fr_mont_TVA" readonly class="form-control facture_fr_mont_TVA" name="facture_fr_mont_TVA">
        </div>
        <div class="form-group col-md-4">
            <label for="nom">Total TTC</label>
            <input type="text" id="facture_fr_total_TTC" readonly  class="form-control facture_fr_total_TTC" name="facture_fr_total_TTC">
        </div>
        </div>
        <div class="form-group">
        <label for="">Telecharger votre facture en PDF</label>
        <input type="file" name="facture_fr_pdf" class="well well-sm">
        </div>
        <div class="row">
        <div class="form-group col-xs-6">
              <label for="factures_fr_payee">Selectez la situation payee de la facture</label>
               <select class="form-control" name="factures_fr_payee" id="factures_fr_payee">
                <option value="0">Non payee</option>
                <option value="1">Payee</option>
            </select>
            </div>
</div>
        <input class="btn btn-primary" type="submit" name="create_fournisseur_facture" value="Ajout Facture">
    </form>
