<?php

$dsn = "mysql:host=sql300.infinityfree.com;dbname=if0_40211011_imanage";
$dbusername = "if0_40211011";
$dbpassword = "OBh6qZdg8VFf8";

try {
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
  echo "Connection failed: " . $err->getMessage();
} 