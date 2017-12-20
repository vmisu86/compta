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
        <h1 class="page-header"> Tous les employes</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<ol class="breadcrumb">
		  <li><a href="dashboard.php">Accueil</a></li>
		  <li class="active">Employes</li>
		</ol>
<div style="margin: 0 0 20px 0 ;">
     <a class='btn btn-default' href='employees.php?source=add_employee'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Ajout Employe</a>
</div>
<div class="panel panel-default">
   <div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Tous les employés</div>



			</div> <!-- /panel-heading -->

    <div class="panel-body" style="padding-bottom: 20px;">
            <table class="table table-hover" id="data-table" >
                <thead>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Num phone</th>
                    <th>E-mail</th>
                    <th>Poste</th>
                    <th>Net</th>
                    <th>Brut</th>
                    <th>Options</th>
                </thead>
                <tbody>
                    <?php viewAllEmployees(); ?>

                </tbody>


            </table>


</div>

<script>
    $(document).ready(function() {
        $(".delete_link").on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "employees.php?delete=" + id + " ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#delete_employee").modal('show');
        });
    });

</script>
