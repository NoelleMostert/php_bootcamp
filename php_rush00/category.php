<?php
include("config.php");

$result = mysqli_query($db,"SELECT * FROM categories");

echo "<table border='0'>";
echo "<tr>";
while($row = mysqli_fetch_array($result))
{
echo "<td><ul><li><a href=products.php?cid=" . $row['cid'] . ">" . $row['cname'] . "</li></ul></a></td>";
}
echo "</tr>";
echo "</table>";
?>
