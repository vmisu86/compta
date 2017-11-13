<?php 
include_once 'includes/db_connect.php';


//This is output, we are going to need this when wee are redirecting users, code or application
//when we done with the script it send everything at thee same time
ob_start();


session_start();

if(isset($_POST['login'])){
   $error_array = array();
   $username = $_POST['username'];
   $password = $_POST['password'];
    /*mysqli_real_escape_string : This function is used to create a legal SQL string,
    that you can use in an SQL statement.
    Avoid to sending parameters over the login form*/
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    
    
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);
     while ($row = mysqli_fetch_assoc($select_user_query)) {

         $db_user_id            = $row['user_id'];
         $db_username           = $row['username'];
         $db_user_password      = $row['password'];

         
     }
    
    //this is for decripting the password, simple we just put as a second parameters
    //from the datebase the encrypted password
    //$password = crypt($password, $db_user_password);
    //here we check the typed username/password and the database username/password
    if(empty($username) || empty($password)) {
		if($username == "") {
			array_push($error_array,"Nom d'utilisateur est necessaire
");
		} 

		if($password == "") {
			array_push($error_array, "Mot de passe est necessaire
");
		}}
    elseif($db_user_password != md5($password) || $db_username != $username){
        
        if($db_username != $username){
        array_push($error_array, "Nom d'utilisateur n'extiste pas.");
        }
        if($db_user_password != md5($password)){
        array_push($error_array, "Votre mot de passe n'est pas bon.");
        }
        
    }
         else {
            $_SESSION['user_id']       = $db_user_id;
            $_SESSION['username']      = $db_username;

             echo "LOGGEDIN" .$_SESSION['username'] ;
         }
 }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Stock Management System</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">	

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row vertical">
			<div class="col-md-5 col-md-offset-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Please Sign in</h3>
					</div>
					<div class="panel-body">

						<div class="messages">
							<?php if($error_array) {
								foreach ($error_array as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
						</div>

						<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
							<fieldset>
							  <div class="form-group">
									<label for="username" class="col-sm-2 control-label">Username</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
									  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" />
									</div>
								</div>								
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									  <button type="submit" name="login" class="btn btn-default"> <i class="glyphicon glyphicon-log-in"></i> Sign in</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<!-- panel-body -->
				</div>
				<!-- /panel -->
			</div>
			<!-- /col-md-4 -->
		</div>
		<!-- /row -->
	</div>
	<!-- container -->	
</body>
</html>