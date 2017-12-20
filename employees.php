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

                                case 'add_employee';
                                    include"includes/employees/add_employee.php";
                                break;

                                case 'edit_employee';
                                    include"includes/employees/edit_employee.php";
                                break;

                            default:

                                include"includes/employees/view_all_employee.php";

                                break;
                        }



                        ?>





    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>
