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

                                case 'add_fournisseur_facture';
                                    include"includes/factures_fournisseur/add_fournisseur_facture.php";
                                break;
                                case 'edit_fournisseur_facture';
                                    include"includes/factures_fournisseur/edit_fournisseur_facture.php";
                                break;

                            default:

                                include"includes/factures_fournisseur/view_all_fournisseur_factures.php";

                                break;
                        }



                        ?>





    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>
