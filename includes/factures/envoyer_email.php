<?php
include "db_connect.php";
//if "email" variable is filled out, send email
  if (isset($_GET['reference']))  {
      $error_array = array();
      $success_array = array();
      $facture_ref      = $_GET['reference'];
      $client_nom       = $_GET['nom'];
      $client_prenom    = $_GET['prenom'];
      $client_email     = $_GET['email'];
      $facture_date_rec = $_GET['date_rec'];
      $facture_total    = $_GET['total'];

$to      = $client_email; // Send email to our user
$subject = 'Paiement en retard'; // Give the email a subject
$message = "

Madame, Monsieur,
<br>
Sauf erreur ou omission de notre part, nous constatons à ce jour que votre compte client présente un solde débiteur de ".$facture_total." euros.
<br>
Ce montant correspond aux factures suivantes restées impayées :
<br>
- [".$facture_ref." ] [".$facture_date_rec."] [".$facture_total."]
<br>
L’échéance étant dépassée, nous vous demandons de bien vouloir régulariser votre situation par retour de courrier.
<br>
En vous remerciant par avance, je vous prie d’agréer, Madame, Monsieur, l’expression de mes salutations distinguées.

"; // Our message above including the link

$headers = 'notreemail@exemple.fr' . "\r\n"; // Set from headers
mail ($to, $subject, $message, $headers); // Send our email

      if(!mail){
          array_push($error_array,"L'email n'a pas été envoyé");
      }
      else{
          array_push($success_array, "L'e-mail a été envoyé avec succès
");
      }
  }
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Verification d'e-mail</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <ol class="breadcrumb">
        <li><a href="dashboard.php">Accueil</a></li>
        <li><a href="factures_client.php">Factures Client</a></li>
        <li class="active">E-mail</li>
    </ol>
    <!--display the errors -->
        <?php
                            if($error_array) {
								foreach ($error_array as $key => $value) {
									echo '<div class="alert alert-danger" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';
									}
								}
                            if($success_array){
                                foreach($success_array as $key => $val){
                                    echo '<div class="alert alert-success" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$val.'</div>';
                                }
                            }
                            ?>
<h2>Voici votre e-mail</h2>
<div>
   <p><strong>De: </strong><?php echo $headers; ?></p>
</div>
<div>
    <p><strong>A: </strong><?php echo $to; ?></p>
</div>
<div>
    <p><strong>Sujet: </strong><?php echo $subject; ?></p>
</div>
<div>
   <p><strong>Message: </strong></p>
    <p><?php echo $message; ?></p>
</div>
