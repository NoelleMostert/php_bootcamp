<?php
include("config.php");
   session_start();

   $cid = htmlspecialchars($_GET["cid"]);
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $pname = mysqli_real_escape_string($db,$_POST['pname']);
      $pqty = mysqli_real_escape_string($db,$_POST['pqty']); 
		
      if($pqty > 0) {
         $_SESSION[$pname] = $pqty;
         
      }
      header("location: products.php?cid=$cid");
   }

echo "post = " . mysqli_real_escape_string($db,$_POST['pname']) . "<br>";
echo "var = " . $pname  . "<br>";
?>
