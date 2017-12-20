<?php

if(isset($_GET['edit_user'])){

  $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $select_users_query = mysqli_query($connection,$query);

      while($row = mysqli_fetch_assoc($select_users_query)) {

          $user_id        = $row['user_id'];
          $username       = $row['username'];
          $password       = $row['password'];
          $user_nom       = $row['user_nom'];
          $user_prenom    = $row['user_prenom'];
          $user_email     = $row['user_email'];
      }
}
if(isset($_POST['edit_user'])){

            $user_nom         = $_POST['user_nom'];
            $user_prenom      = $_POST['user_prenom'];
            $username         = $_POST['username'];
            $user_email       = $_POST['user_email'];
            $password         = $_POST['password'];

            $password = md5($password);

            $query = "UPDATE users SET ";
            $query .="user_nom  = '{$user_nom}', ";
            $query .="user_prenom = '{$user_prenom}', ";
            $query .="username = '{$username}', ";
            $query .="user_email = '{$user_email}', ";
            $query .="password   = '{$password}' ";
            $query .= "WHERE user_id = {$the_user_id} ";

            $edit_user_query = mysqli_query($connection,$query);

            confirmQuery($edit_user_query);

    echo "<p class='bg-success' >Profil a ete mis à jour -> " . " <a href='profile.php'>Votre Profile</a></p>";
    }

?>


<form class="form-horizontal" action="" method="post">
<div class="container">
  <div class="row">
    <!-- edit form column -->
    <div class="col-md-4 col-sm-6 col-xs-8 personal-info">
      <h3>Personal info</h3>
        <div class="form-group">
          <label class="col-lg-3 control-label">Prénom:</label>
          <div class="col-lg-8">
            <input type="text" value="<?php echo $user_prenom; ?>" class="form-control" name="user_prenom">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Nom: </label>
          <div class="col-lg-8">
            <input type="text" value="<?php echo $user_nom; ?>" class="form-control" name="user_nom">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">E-mail: </label>
          <div class="col-lg-8">
            <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Nom d'utilisateur: </label>
          <div class="col-lg-8">
            <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Mot de passe: </label>
          <div class="col-lg-8">
            <input type="password" value="<?php echo $password; ?>" class="form-control" name="user_password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" type="submit" name="edit_user" value="Mettre à jour le profil">
          </div>
        </div>

    </div>
  </div>
</div>
 </form>
