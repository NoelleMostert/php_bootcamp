<?php
include("config.php");
session_start();
#echo "<h3>php sees</h3>";
#foreach ($_SESSION as $key=>$val)
#echo $key . " " . $val . "<br/>";
#print_r($_SESSION);
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
<table border=1>
<tr>
<td>
user
</td>
<td>
<?php 
  if (isset($_SESSION['login_user']))
    echo $_SESSION['login_user'];
  else
    echo "Mr Nobody";
?>
</td>
</tr>
</table>
<form method='post' action='checkout.php'>
<table border=1>
<th>
item
</th>
<th>
quantity
</th>
<th>
price
</th>
<?php
$cartresult = mysqli_query($db,"SELECT * FROM products");
$gtotal=0;
while($row = mysqli_fetch_array($cartresult))
{
foreach ($_SESSION as $key=>$val)
{
if ($key === $row['pname'])
  {
  $total = $row['price'] * $val;
  $gtotal = $gtotal + $total; 
  echo "<tr><td>" . $key . "</td><td><input type='text' name='" . $row['pid'] . "' value='" . $val . "'/></td><td>Price: R " . $total . "</td></tr>";
} 
}
}
echo "<tr><td colspan=2 align=center>Total</td><td>R " . $gtotal . "</td></tr>";
?>
<tr><td colspan=3 align=center><button type='submit' class='btn' name='order'>order</button></td></tr>
<?php
$login = htmlspecialchars($_GET["login"]);
if ($login === 'false')
  echo "<tr><td colspan=2>You need to login to place your order!</td></tr>";
?>
</form> 
</div>
</div>
</table>
</body>
</html>
