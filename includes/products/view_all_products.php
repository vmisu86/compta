<?php include("delete_product_modal.php");?>
<?php


if(isset($_GET['delete'])){
    $the_produit_id = $_GET['delete'];
    $query = "DELETE FROM produits WHERE produit_id = {$the_produit_id}";
    $delete_query = mysqli_query($connection, $query);

    redirect("/compta/employees.php");
    }

?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Tous les Produits</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<ol class="breadcrumb">
		  <li><a href="dashboard.php">Accueil</a></li>
		  <li class="active">Employes</li>
		</ol>
<div style="margin: 0 0 20px 0 ;">
     <a class='btn btn-default' href='products.php?source=add_product'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Ajout Produit</a>
</div>
<div class="panel panel-default">
   <div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Tous les produits</div>

			</div> <!-- /panel-heading -->

    <div class="panel-body" style="padding-bottom: 20px;">
            <table class="table table-hover" >
                <thead>
                    <th>ID</th>
                    <th>Appellation</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Prix</th>
                    <th>Options</th>
                </thead>
                <tbody>
                    <?php viewAllProducts(); ?>
                </tbody>
            </table>
        </div>
    </div>

<script>
    $(document).ready(function() {
        $(".delete_product_link").on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "products.php?delete=" + id + " ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#delete_product").modal('show');
        });
    });

</script>

