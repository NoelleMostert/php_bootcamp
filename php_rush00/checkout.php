<?php
include("config.php");
session_start();
  if (isset($_SESSION['login_user']))
    echo "";
  else {
     header("location: cart.php?login=false");
     exit;
  }

  $user = $_SESSION['login_user'];
  $sql = "SELECT uid FROM users WHERE email = '$user'";
  $result = mysqli_query($db,$sql);
  while($row = mysqli_fetch_array($result))  
  {
     $uid = $row['uid'];
  #   echo "uid" . $uid . "<br>";
  }
  $query = "INSERT INTO orders (uid,status)
                          VALUES('$uid',1)";
  mysqli_query($db, $query);
  $sql = "SELECT * FROM orders WHERE uid = $uid ORDER BY oid desc LIMIT 1";
  $result = mysqli_query($db,$sql);
  while($row = mysqli_fetch_array($result))
  {
    $oid =  $row['oid'];
 #    echo "oid" . $oid . "<br>";
  }
  foreach ($_POST as $name => $value)
  {
      if ($name != 'order')
      {
        $prodsql = "SELECT * FROM products where pid = $name";
        $prodresult = mysqli_query($db,$prodsql);
        while($row = mysqli_fetch_array($prodresult))
        {
          $total = $value * $row['price'];
#          echo "pid" . $pid . "<br>"; 

        }
        $query = "INSERT INTO order_details (oid,pid, qty,total)
                            VALUES('$oid','$name','$value','$total')";
        mysqli_query($db, $query);
      }
  }
  session_destroy();
  session_start();
  $_SESSION['login_user'] = $user;
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
Order placed.
</div>
</div>
</body>
</html>
