<?php
include("config.php");
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "Firstname is required"); }
  if (empty($firstname)) { array_push($errors, "Lastname is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
#  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (fname,lname, email, password,admin) 
  			  VALUES('$firstname','$lastname', '$email', '$password_1',0)";
  	mysqli_query($db, $query);
  	$_SESSION['login_user'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}
?>


<html>
<head>
  <meta charset="utf-8">
  <title>Sakura</title>
  <link rel="stylesheet" href="index.css">
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>
<body>
<?php echo "<div class='content'>"; ?>
<?php echo "<div id='menu'>"; ?>

<?php include("menu.php"); ?>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Firstname</label>
  	  <input type="text" name="firstname" value="<?php echo $firstname; ?>">
  	</div>
        <div class="input-group">
          <label>Lastname</label>
          <input type="text" name="lastname" value="<?php echo $lastname; ?>">
        </div>

  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</div>
</div>
</body>
</html>

