<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Compta - Accounting System v 1.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
     <!--Dropdown-user -->
               <li><h4><?php echo  $_SESSION['user_prenom']." ".$_SESSION['user_nom']; ?></h4></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/compta/profile.php"><i class="fa fa-user fa-fw"></i> Profile d'utilisateur</a>
                        </li>
                        <li><a href="/compta/profile.php?source=edit_profile"><i class="fa fa-gear fa-fw"></i> Configuration</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="includes/logout.php"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>

                        <!-- Dashboard-->
                        <li>
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <!-- customers -->
                        <li>
                            <a href="customers.php"><i class="fa fa-user fa-fw"></i> Clients</a>

                        </li>
                        <!-- ./customers -->

                        <!-- fournisseurs -->
                        <li>
                            <a href="fournisseurs.php"><i class="fa fa-user fa-fw"></i> Fournisseurs</a>

                        </li>
                        <!-- ./fournisseurs -->

                        <!-- products -->
                        <li>
                            <a href="products.php"><i class="fa fa-wrench fa-fw"></i> Produits</a>
                        </li>
                        <!-- customers -->
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Factures<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="factures_client.php">Clients</a>
                                </li>
                                <li>
                                    <a href="factures_fournisseurs.php">Fournisseurs</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="employees.php"><i class="fa fa-users fa-fw"></i> Employés</a>

                        </li>
                        <li>
                            <a href="taxes.php"><i class="fa fa-usd fa-fw"></i> Taxes</a>

                        </li>



                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
