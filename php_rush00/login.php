<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
#      $password = md5($mypassword);//encrypt the password before saving in the database      
      $sql = "SELECT uid FROM users WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
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
<?php include("usermenu.php"); ?>
      <table> 
          <tr><td colspan=2><b>Login</b></td></tr>
               <form action = "" method = "post">
                  <tr><td>UserName  :</td><td><input type = "text" name = "username" class = "box"/></td></tr>
                  <tr><td>Password  :</td><td><input type = "password" name = "password" class = "box" /></td></tr>
                  <tr><td colspan=2><input type = "submit" value = " Submit "/></td></tr>
               </form>
               
               <tr><td><?php echo $error; ?></td></tr>
					
            </table>
</div>
</div>				
   </body>
</html>
