<?php include "includes/header.php" ?>



<div id="wrapper">

    <?php include "includes/navigation.php" ?>

    <div id="page-wrapper">


       <?php

                        //for a reason security we use a switch statement
                        //thanks for this we call the pages throw a variable, not direct
                        //we switch between the forms what we can find in the specified php files

                        if(isset($_GET['source'])){

                            $source = $_GET['source'];
                        }
                        else{
                            $source = '';
                        }

                        switch($source){
                                case 'add_taxe';
                                    include"includes/taxes/add_taxe.php";
                                break;

                                case 'edit_taxe';
                                    include"includes/taxes/edit_taxe.php";
                                break;

                            default:

                                include"includes/taxes/view_all_taxes.php";

                                break;
                        }



                        ?>





    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>
