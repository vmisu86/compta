<?php include "includes/header.php" ?>



<div id="wrapper">

    <?php include "includes/navigation.php" ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard - <?php echo $_SESSION['username']; ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">

            <!-- CUSTOMERS-->
            <div class="col-lg-2 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php echo recordCount("clients");?>
                                </div>
                                <div>Clients</div>
                            </div>
                        </div>
                    </div>
                    <a href="customers.php">
                        <div class="panel-footer">
                            <span class="pull-left">Voir les détails</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- PRUDUCTS-->
            <div class="col-lg-2 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php echo recordCount("produits");?>
                                </div>
                                <div>Produits</div>
                            </div>
                        </div>
                    </div>
                    <a href="products.php">
                        <div class="panel-footer">
                            <span class="pull-left">Voir les détails</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

                <!-- WORKERS -->
            <div class="col-lg-2 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php echo recordCount("salaires") ?>
                                </div>
                                <div>Employes</div>
                            </div>
                        </div>
                    </div>
                    <a href="employees.php">
                        <div class="panel-footer">
                            <span class="pull-left">Voir les détails</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- FACTURE FOURNISSEURS-->
            <div class="col-lg-2 col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php echo recordCount("factures_fr");?>
                                </div>
                                <div>Facture Fournisseurs</div>
                            </div>
                        </div>
                    </div>
                    <a href="factures_fournisseurs.php">
                        <div class="panel-footer">
                            <span class="pull-left">Voir les détails</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- FACTURES CLIENTS -->
            <div class="col-lg-2 col-md-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php echo recordCount("factures_cl");?>
                                </div>
                                <div>Factures Clients</div>
                            </div>
                        </div>
                    </div>
                    <a href="factures_client.php">
                        <div class="panel-footer">
                            <span class="pull-left">Voir les détails</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- TAXES -->
            <div class="col-lg-2 col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-usd fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php echo recordCount("taxes");?>
                                </div>
                                <div>Taxes</div>
                            </div>
                        </div>
                    </div>
                    <a href="taxes.php">
                        <div class="panel-footer">
                            <span class="pull-left">Voir les détails</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa fa-calendar fa-fw"></i> Calender
                    </div>
                    <!-- /.panel-heading -->
                    <script>
                        $(document).ready(function() {

                            // page is now ready, initialize the calendar...

                            $('#calendar').fullCalendar({
                                // put your options and callbacks here
                            })

                        });

                    </script>
                    <div class="panel-body">
                        <div id="calendar"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

            </div>
                     <!-- /.col-lg-8 -->

<!-------------------------- Somme client payee ---------------------------------------------->
            <div class="col-sm-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     Somme Client Payee
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                           <?php
                        sommeFactureClient("1");
                            ?>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- Somme client payee -->

<!-------------------------- Somme client Non payee ---------------------------------------------->
            <div class="col-sm-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Somme Client Non Payee
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                           <?php
                        sommeFactureClient("0");
                            ?>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- Somme client payee -->

<!-------------------------- Fournisseur  payee ---------------------------------------------->
            <div class="col-sm-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Somme Fournisseur payee
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">

                          <?php
                        sommeFactureFournisseur("1");
                            ?>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- Fournisseur  payee -->
<!-------------------------- Fournisseur non payee ---------------------------------------------->
            <div class="col-sm-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                         Somme Fournisseur non payee
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">

                          <?php
                        sommeFactureFournisseur("0");
                            ?>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- Fournisseur  payee -->
            <!-------------------------- Comptabilité mois par mois ---------------------------------------------->
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                         Comptabilité mois par mois
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                           <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                 <?php
                                  recetteFactureParMois();
                                  ?>
                                </table>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- Fournisseur  payee -->
            <!--------------------------  Comptabilité prévisionnelle sur les mois à venir ---------------------------------------------->
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                          Comptabilité prévisionnelle sur les mois à venir
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                           <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                 <?php
                                  comptaPrevisionnelle();
                                  ?>
                                </table>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- Fournisseur  payee -->

            <!-- Fournisseur  payee -->
         <div class="col-lg-4">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <i class="fa fa-shopping-cart fa-fw"></i> Envoyer e-mail pour les clients en retard
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>Referance facture</th>
                                            <th>Client</th>
                                            <th>Date recouvrement</th>
                                            <th>Prix TTC</th>
                                            <th>E-mail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php selectFactureClientEmailRappelle("1"); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
<div class="row">
                <!------------------ LIST FACTURE PAIEMENTS -------------------------->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-shopping-cart fa-fw"></i> Factures Fournisseur non payee
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID fournisseur</th>
                                            <th>Referance facture</th>
                                            <th>Date payee</th>
                                            <th>Prix TTC</th>
                                            <th>Regler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php selectFactureFournisseurPayeeOuNon("0"); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
<!-- Fournisseur  payee -->
            <!-- /.col-lg-8 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-shopping-cart fa-fw"></i> Factures Fournisseur Payee
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID fournisseur</th>
                                            <th>Referance facture</th>
                                            <th>Date payee</th>
                                            <th>Prix TTC</th>
                                            <th>Regler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php selectFactureFournisseurPayeeOuNon("1"); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
</div><!-- /.row LISTS -->
   <div class="row">
                <!------------------ LIST FACTURE PAIEMENTS -------------------------->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-shopping-cart fa-fw"></i> Factures Client non payee
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID client</th>
                                            <th>Referance facture</th>
                                            <th>Date payee</th>
                                            <th>Prix TTC</th>
                                            <th>Regler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php selectFactureClientPayeeOuNon("0"); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
<!-- Fournisseur  payee -->
            <!-- /.col-lg-8 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-shopping-cart fa-fw"></i> Factures Client Payee
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID client</th>
                                            <th>Referance facture</th>
                                            <th>Date payee</th>
                                            <th>Prix TTC</th>
                                            <th>Regler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php selectFactureClientPayeeOuNon("1"); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
</div><!-- /.row LISTS -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>
