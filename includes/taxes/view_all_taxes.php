<?php include("delete_modal.php");?>

<?php

if(isset($_GET['delete'])){
    $the_taxe_id = $_GET['delete'];
    $query = "DELETE FROM taxes WHERE taxe_id = {$the_taxe_id}";
    $delete_query = mysqli_query($connection, $query);

    redirect("/compta/taxes.php");


    }



?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Tous les Taxes</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<ol class="breadcrumb">
		  <li><a href="dashboard.php">Accueil</a></li>
		  <li class="active">Taxes</li>
		</ol>
<div style="margin: 0 0 20px 0 ;">
     <a class='btn btn-default' href='taxes.php?source=add_taxe'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Ajout Taxe</a>
</div>
<div class="panel panel-default">
   <div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Tous les Taxes</div>



			</div> <!-- /panel-heading -->

    <div class="panel-body" style="padding-bottom: 20px;">
            <table class="table table-hover" id="data-table" >
                <thead>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Montant</th>
                    <th>Date recu</th>
                    <th>Date</th>
                    <th>Options</th>
                </thead>
                <tbody>
                    <?php viewAllTaxes(); ?>
                </tbody>
            </table>
        </div>


<script>
    $(document).ready(function() {
        $(".delete_taxe_link").on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "taxes.php?delete=" + id + " ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#delete_taxe").modal('show');
        });
    });
</script>

