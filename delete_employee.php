<?php

if (isset($_GET["id"])) {

  try {

    require_once "inc/dbh.php";

    $id = $_GET["id"];
    $query = "DELETE FROM employee_tbl WHERE id = :id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);

    $stmt->execute(); 
    
    $pdo = null;
    $stmt = null;

    header("Location: homepage.php");

  } catch (PDOException $err) {
    die("Query failed: " . $err->getMessage());
  }
  
}