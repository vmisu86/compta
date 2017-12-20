
<?php ob_start();?>
<?php session_start();?>
<?php include "/compta/includes/functions/functions_general.php";?>

<?php
// chaque fois que quelqu'un vient sur cette page, nous allons
// annule leur session par une valeur 'null'
    $_SESSION['username'] = null;
    $_SESSION['user_nom'] = null;
    $_SESSION['user_prenom'] = null;

    redirect("/compta/index.php");
?>

