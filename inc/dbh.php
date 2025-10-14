<?php

$dsn = "mysql:host=localhost;dbname=php_dev";
$dbusername = "neilg";
$dbpassword = "neilg";

try {
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
  echo "Connection failed: " . $err->getMessage();
} 