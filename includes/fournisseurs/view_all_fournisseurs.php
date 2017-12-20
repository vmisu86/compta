<?php include("delete_modal.php");?>

<?php

if(isset($_GET['delete'])){
    $the_fournisseur_id = $_GET['delete'];
    $query = "DELETE FROM fournisseurs WHERE fournisseur_id = {$the_fournisseur_id}";
    $delete_query = mysqli_query($connection, $query);

    redirect("/compta/fournisseurs.php");


    }



?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Tous les fournisseurs</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<ol class="breadcrumb">
		  <li><a href="dashboard.php">Accueil</a></li>
		  <li class="active">Fournisseurs</li>
		</ol>
<div style="margin: 0 0 20px 0 ;">
     <a class='btn btn-default' href='fournisseurs.php?source=add_fournisseur'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Ajout Fournisseur</a>
</div>
<div class="panel panel-default">
   <div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Tous les Fournisseurs</div>



			</div> <!-- /panel-heading -->

    <div class="panel-body" style="padding-bottom: 20px;">
            <table class="table table-hover" id="data-table" >
                <thead>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Phone</th>
                    <th>E-mail</th>
                    <th>Options</th>
                </thead>
                <tbody>
                    <?php viewAllFournisseurs(); ?>
                </tbody>
            </table>
        </div>


<script>
    $(document).ready(function() {
        $(".delete_fournisseur_link").on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "fournisseurs.php?delete=" + id + " ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#delete_fournisseur").modal('show');
        });
    });
</script>

