<?php include("delete_modal.php");?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Tous les Clientss</h1>
        <?php include"add_customer_modal.php"; ?>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="panel-body">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <th>ID</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Phone</th>
                    <th>E-mail</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php viewAllCustomers(); ?>
                </tbody>
            </table>
        </div>
    </div>
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
<?php deleteCustomers(); ?>
