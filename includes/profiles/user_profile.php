 <?php

        if(isset($_SESSION['user_id'])){

        $the_user_id  = $_SESSION['user_id'];

        $query = "SELECT * FROM users WHERE user_id = '{$the_user_id}' ";
        $select_user_profile_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_user_profile_query)){

        $user_id             = $row['user_id'];
        $username            = $row['username'];
        $user_password       = $row['user_password'];
        $user_nom            = $row['user_nom'];
        $user_prenom         = $row['user_prenom'];
        $user_email       = $row['user_email'];
        }
    }




?>




  <h2 class="page-header">Profile <?php echo $user_prenom." ".$user_nom;?></h2>
  <div class="row">

    <!-- edit form column -->
    <div class="col-md-4 col-sm-4 col-xs-6 personal-info">
      <h3>Personal info</h3>

       <table class="table table-hover">
  <tr>
    <th>Prénom: </th>
    <td><?php echo $user_prenom; ?></td>
  </tr>
  <tr>
    <th>Nom: </th>
    <td><?php echo $user_nom; ?></td>
  </tr>
  <tr>
    <th>E-mail: </th>
    <td><?php echo $user_email; ?></td>
  </tr>
</table>
    <a class='btn btn-warning' href='profile.php?source=edit_user&edit_user=<?php echo $user_id ?>'>Edit</a>
    </div>

    </div>
