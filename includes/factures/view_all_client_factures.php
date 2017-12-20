<?php include("delete_modal.php");?>
<?php

if(isset($_GET['delete'])){
    $the_employee_id = $_GET['delete'];
    $query = "DELETE FROM salaires WHERE salarie_id = {$the_employee_id}";
    $delete_query = mysqli_query($connection, $query);

    redirect("/compta/employees.php");
    }

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Tous les Factures Client</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<ol class="breadcrumb">
		  <li><a href="dashboard.php">Accueil</a></li>
		  <li class="active">Facture Client</li>
		</ol>
<div style="margin: 0 0 20px 0 ;">

<a class='btn btn-default' href='factures_client.php?source=add_facture_client'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Ajout Facture</a>
</div>
<div class="panel panel-default">
   <div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Tous les Factures Client</div>



			</div> <!-- /panel-heading -->

    <div class="panel-body" style="padding-bottom: 20px;">
            <table class="table table-hover" id="data-table" >
                <thead>
                    <th>Ref Facture</th>
                    <th>Date recu</th>
                    <th>Date payee</th>
                    <th>Client</th>
                    <th>TTC</th>
                    <th>Payee</th>
                    <th>Options</th>
                </thead>
                <tbody>
                    <?php viewAllFactureClient(); ?>

                </tbody>


            </table>


</div>

<script>
    $(document).ready(function() {
        $(".delete_link").on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "employees.php?delete=" + id + " ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#delete_facture_client").modal('show');
        });
    });

</script>
