<?php include("delete_fournisseur_facture_modal.php");?>
<?php


if(isset($_GET['delete'])){
    $the_facture_fr_id = $_GET['delete'];
    $query = "DELETE FROM factures_fr WHERE facture_fr_id = {$the_facture_fr_id}";
    $delete_query = mysqli_query($connection, $query);

    redirect("/compta/factures_fournisseurs.php");
    }

?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Tous les Factures Fournisseurs</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<ol class="breadcrumb">
		  <li><a href="dashboard.php">Accueil</a></li>
		  <li class="active">Factures Fournisseurs</li>
		</ol>
<div style="margin: 0 0 20px 0 ;">
     <a class='btn btn-default' href='factures_fournisseurs.php?source=add_fournisseur_facture'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Ajout Facture</a>
</div>
<div class="panel panel-default">
   <div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Tous les produits</div>

			</div> <!-- /panel-heading -->

    <div class="panel-body" style="padding-bottom: 20px;">
            <table class="table table-hover" id="data-table" >
                <thead>
                    <th>ID</th>
                    <th>ID fournisseur</th>
                    <th>Referance facture</th>
                    <th>Description</th>
                    <th>Date recu</th>
                    <th>Date payee</th>
                    <th>Prix HT</th>
                    <th>TVA</th>
                    <th>Prix TTC</th>
                    <th>Regler</th>
                    <th>Options</th>
                </thead>
                <tbody>
                    <?php viewAllFournisseurFacture(); ?>
                </tbody>
            </table>
        </div>
    </div>

<script>
    $(document).ready(function() {
        $(".delete_fournisseur_facture_link").on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "factures_fournisseurs.php?delete=" + id + " ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#delete_fournisseur_facture").modal('show');
        });
    });

</script>

