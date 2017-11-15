        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> View all employees</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

<div class="panel-body">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Phone number</th>
                    <th>E-mail</th>
                    <th>Poste</th>
                    <th>Net</th>
                    <th>Brut</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php viewAllEmployees(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php deleteEmployees(); ?>
