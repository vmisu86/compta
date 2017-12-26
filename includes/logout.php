
<?php ob_start();?>
<?php session_start();?>

<?php
// chaque fois que quelqu'un vient sur cette page, nous allons
// annule leur session par une valeur 'null'
    $_SESSION['user_id'] = null;
    $_SESSION['username'] = null;
    $_SESSION['user_nom'] = null;
    $_SESSION['user_prenom'] = null;

    header("Location: ../index.php");
?>

