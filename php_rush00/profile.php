<?php
include('session.php');
include('config.php');

$user = $_SESSION['login_user']; 

if (isset($_POST['update_user'])) {
  $username = "";
  $email    = "";
  $errors = array();


  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $email = $user;

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "Firstname is required"); }
  if (empty($lastname)) { array_push($errors, "Lastname is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
#       $password = md5($password_1);//encrypt the password before saving in the database

        $query = "UPDATE users SET fname = '$firstname',lname = '$lastname', email = '$email' where email = '$user'";
        mysqli_query($db, $query);
        $_SESSION['login_user'] = $email;
        header('location: index.php');
  }
}

$result = mysqli_query($db,"SELECT * FROM users WHERE email = '$user'");

 while($row = mysqli_fetch_array($result))
  {
     $fname = $row['fname'];
     $lname = $row['lname']; 
     $email = $row['email'];
  }
?>

<html>

<head>
  <title>Update Profile</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="index.css">
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>
<body>
<?php echo "<div class='content'>"; ?>
<?php echo "<div id='menu'>"; ?>

<?php include("menu.php"); ?>
<?php include("usermenu.php"); ?>
  <form method="post" action="profile.php">
    <table><tr>
          <td>Firstname</td>
          <td><input type="text" name="firstname" value="<?php echo $fname  ?>"></td>
        </tr>
        <tr> 
          <td>Lastname</td>
          <td><input type="text" name="lastname" value="<?php echo  $lname  ?>"></td>
        </tr>

        <tr> 
          <td>Email</td>
          <td><?php echo $email; ?></td>
        </tr>
        <tr> 
          <td><button type="submit" class="btn" name="update_user">update</button></td>
          <td><a href=index.php>cancel</td>
        </tr>
     </table>
  </form>
</div>
</div>
</body>
</html>

