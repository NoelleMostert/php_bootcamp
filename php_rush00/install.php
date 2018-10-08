<?php
  if (isset($_POST['submit']) && $_POST['submit'] == 'OK')
  {
    if (isset($_POST['dbserver']) && isset($_POST['dbusername']) && isset($_POST['dbpassword']) && isset($_POST['dbname']))
    {
      $dbserver = $_POST['dbserver'];
      $dbusername = $_POST['dbusername'];
      $dbpassword = $_POST['dbpassword'];
      $dbname = $_POST['dbname'];
      $db = @new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
      if ($db->connect_errno) 
      {
        echo "Error: Incorrect database details.";
      }
      else 
      {
        $templine = '';
        $lines = file("db.sql");
        foreach ($lines as $line)
        {
          if (substr($line, 0, 2) == '--' || $line == '')
            continue;
          $templine .= $line;
          if (substr(trim($line), -1, 1) == ';')
          {
            mysqli_query($db, $templine);
            $templine = '';
          }
        }
        header('location: index.php');
        die;
      }
    }
  }
?>
<html>
  <head>
    <title>Database setup</title>
  </head>
  <body>
    <center>
      <form method="POST" action="install.php">
        <table> 
          <tr><td>Database Server:</td><td><input type="text" name="dbserver"></td></tr>
          <tr><td>Database user:</td><td> <input type="text" name="dbusername"></td></tr>
          <tr><td>Database password:</td><td> <input type="password" name="dbpassword"></td></tr>
          <tr><td>Database name:</td><td> <input type="text" name="dbname"></td></tr>
          <tr><td colspan=2><input type="submit" name="submit" value="OK"></td></tr>
        </table>
      </form>
    </center>
  </body>
</html>
