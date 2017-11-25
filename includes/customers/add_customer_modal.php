
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_customer">Ajouter Client</button>
<!-- Modal -->
<div class="modal fade" id="add_customer" tabindex="-1" role="dialog" aria-labelledby="Create Client">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Client</h4>
            </div>
            <div class="modal-body">
                <form action="includes/customers/create_customer.php" method="post">

                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" name="prenom">
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom">
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" name="adresse">
                    </div>

                    <div class="form-group">
                        <label for="phone">Numero de phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <input class="btn btn-primary" type="submit" name="create_customer" value="Ajout Client">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
