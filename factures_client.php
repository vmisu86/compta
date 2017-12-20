<?php include "includes/header.php" ?>



<div id="wrapper">

    <?php include "includes/navigation.php" ?>

    <div id="page-wrapper">


       <?php

// pour une raison de sécurité et de transparence nous utilisons une déclaration de commutateur
// nous basculons entre les formes ce que nous pouvons trouver dans les fichiers php spécifiés

                        if(isset($_GET['source'])){

                            $source = $_GET['source'];
                        }
                        else{
                            $source = '';
                        }

                        switch($source){

                                case 'add_facture_client';
                                    include"includes/factures/add_facture_client.php";
                                break;

                                case 'edit_client_facture';
                                 include"includes/factures/edit_client_factures.php";
                                break;
                                case 'envoyer_email';
                                 include"includes/factures/envoyer_email.php";
                                break;

                            default:

                                include"includes/factures/view_all_client_factures.php";

                                break;
                        }



                        ?>





    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>
