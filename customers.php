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
                                case 'add_customer';
                                    include"includes/customers/add_customer.php";
                                break;

                                case 'edit_customer';
                                    include"includes/customers/edit_customer.php";
                                break;

                            default:

                                include"includes/customers/view_all_customers.php";

                                break;
                        }



                        ?>





    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>
