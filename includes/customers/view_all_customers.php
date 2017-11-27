<?php include("delete_modal.php");?>

<?php

if(isset($_GET['delete'])){
    $the_clien_id = $_GET['delete'];
    $query = "DELETE FROM clients WHERE client_id = {$the_clien_id}";
    $delete_query = mysqli_query($connection, $query);

    redirect("/compta/customers.php");


    }



?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Tous les clients</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<ol class="breadcrumb">
		  <li><a href="dashboard.php">Accueil</a></li>
		  <li class="active">Clients</li>
		</ol>
<div style="margin: 0 0 20px 0 ;">
     <a class='btn btn-default' href='customers.php?source=add_customer'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Ajout Client</a>
</div>
<div class="panel panel-default">
   <div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Tous les clients</div>



			</div> <!-- /panel-heading -->

    <div class="panel-body" style="padding-bottom: 20px;">
            <table class="table table-hover" >
                <thead>
                    <th>ID</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Phone</th>
                    <th>E-mail</th>
                    <th>Options</th>
                </thead>
                <tbody>
                    <?php viewAllCustomers(); ?>
                </tbody>
            </table>
        </div>


<script>
    $(document).ready(function() {
        $(".delete_customer_link").on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "customers.php?delete=" + id + " ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#delete_customer").modal('show');
        });
    });
</script>

