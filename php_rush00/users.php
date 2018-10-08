<?php
include('session.php');
include("config.php");

session_start();
  if (isset($_SESSION['login_user']))
    echo "";
  else {
     header("location: index.php");
     exit;
  }

$user = $_SESSION['login_user']; 

$adm_sql = mysqli_query($db,"select admin from users where email = '$user' ");
while($row = mysqli_fetch_array($adm_sql))
{
$admin = $row['admin'];
}

if ($admin != 1)
{
header("location: index.php");
exit;
}




session_start();
  if (isset($_SESSION['login_user']))
    echo "";
  else {
     header("location: cart.php?login=false");
     exit;
  }



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

$userresult = mysqli_query($db,"SELECT * FROM users");
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
<table>
<th>email</th>
<th>first name</th>
<th>last name</th>
<th>password</th>
<th>admin</th>
<th>enabled</th>
<?php while($row = mysqli_fetch_array($userresult))
  {
  echo "<form method='post' action='users.php'>";
  echo "<tr>";
          echo "<td><input type='text' name='email' value='" . $row['email']  . "'></td>";
          echo "<td><input type='text' name='firstname' value='" . $row['fname']  . "'></td>";
          echo "<td><input type='text' name='lastname' value='" . $row['lname']  . "'></td>";
          echo "<td><input type='password' name='password' value='" . $row['password']   . "'></td>";
          echo "<td><input type='text' name='admin' value='" .  $row['admin']  . "'></td>";
          echo "<td><input type='text' name='enabled' value='" . $row['admin']   . "'></td>";
          echo "<td><button type='submit' class='btn' name='update_user'>update</button></td>";
  echo "</tr>";
  echo "</form>";
 }
?>
</table>
</div>
</div>
</body>
</html>

