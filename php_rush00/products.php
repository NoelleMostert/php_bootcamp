<?php
include("config.php");

$cid = htmlspecialchars($_GET["cid"]) . '!';
# $sql = "SELECT uid FROM users WHERE email = '$myusername' and password = '$mypassword'";

$prodresult = mysqli_query($db,"SELECT * FROM products INNER JOIN prodcat ON products.pid = prodcat.pid WHERE prodcat.cid = '$cid'");
?>

<html>
<head>
<title>Products</title>
	<link rel="stylesheet" href="product.css">
	<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>
<body>
<?php echo "<div class='content'>"; ?>
<?php echo "<div id='menu'>"; ?>
<?php include("menu.php"); ?>
<?php include("category.php"); ?>
<?php echo "<table border='0'>";
while($row = mysqli_fetch_array($prodresult))
{
echo "<form method='post' action='add_to_cart.php?cid=" . $cid . "'>";
echo "<td style='background: transparent'>";
echo "<ul><li id=menu><img src=" . $row['img'] . "></li>";
echo "<li id=menu>" . $row['pname'] . " </li>";
echo "<li id=menu>qty: <input type ='text' name ='pqty'/><input type ='hidden' name='pname' value='" .  $row['pname'] . "'/></li>";
echo "<li id=menu>price: R" . $row['price'] . " per item</li>"; 
echo "<li id=menu><input type = 'submit' value = 'add'/></li></ul>";
echo "</td>";
echo "</form>";
}
echo "</tr>";
echo "</table>";
echo "</div>";
echo "</div>";
?>
</body>
</html>
