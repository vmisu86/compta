<?php include("delete_product_modal.php");?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Tous les Produits</h1>
        <?php include"add_products_modal.php"; ?>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="panel-body">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <th>ID</th>
                    <th>Appellation</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Prix</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php viewAllProducts(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".delete_produits_link").on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "produits.php?delete=" + id + " ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#delete_product").modal('show');
        });
    });

</script>
<?php deleteProducts(); ?>
