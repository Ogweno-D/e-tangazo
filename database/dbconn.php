
<?php
 $dbServer = "localhost";
 $dbUsername = "root";
 $dbPassword = "";
 $dbName = "cs_bulksms";

 $con = new PDO("mysql:host=$dbServer;dbname=$dbName",$dbUsername,$dbPassword);

 return $con;

?>