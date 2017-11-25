
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_product">Ajouter Produit</button>
<!-- Modal -->
<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="Create Produit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ajout Produit</h4>
            </div>
            <div class="modal-body">
                <form action="includes/products/create_product.php" method="post">

                    <div class="form-group">
                        <label for="prenom">Appellation</label>
                        <input type="text" class="form-control" name="produit_appellation">
                    </div>

                    <div class="form-group">
                        <label for="nom">Description</label>
                        <input type="text" class="form-control" name="produit_description">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="produit_image">
                    </div>

                    <div class="form-group">
                        <label for="phone">Prix</label>
                        <input type="number" class="form-control" name="produit_prix">
                    </div>

                    <input class="btn btn-primary" type="submit" name="create_product" value="Ajout Produit">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
