<?php
//This is output, we are going to need this when wee are redirecting users, code or application
//when we done with the script it send everything at thee same time
ob_start();

// here start the SESSION
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Compta - Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="assests/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assests/metisMenu/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">

    <!-- Custom CSS -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assests/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <!-- jQuery -->
    <link rel="stylesheet" href="date_picker/css/bootstrap-datepicker.css">

        <!-- custom css -->
    <link rel="stylesheet" href="css/custom_compta.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="assests/plugins/moment/moment.min.js"></script>
    <script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="assests/metisMenu/metisMenu.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assests/bootstrap/js/bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/dashboard.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="assests/date_picker/js/bootstrap-datepicker.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php include "db_connect.php"; ?>

    <?php include "includes/functions/functions_general.php";
        include "includes/functions/functions_employe.php";
    include "includes/functions/functions_produit.php";
    include "includes/functions/functions_client.php";
    include "includes/functions/functions_facture.php";
    include "includes/functions/functions_fournisseur.php";
    include "includes/functions/functions_taxe.php";


    if(!isset($_SESSION['user_id'])){
    redirect("index.php");
}
    ?>
