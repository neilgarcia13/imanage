<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $firstName = $_POST["first_name"];
  $lastName = $_POST["last_name"];
  $jobPosition = $_POST["position"];
  $grossSalary = $_POST["salary"];


  try {

    require_once "dbh.php";

    $query = "INSERT INTO employee_tbl (first_name, last_name, position, salary) VALUES (:firstName, :lastName, :jobPosition, :grossSalary);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":firstName", $firstName);
    $stmt->bindParam(":lastName", $lastName);
    $stmt->bindParam(":jobPosition", $jobPosition);
    $stmt->bindParam(":grossSalary", $grossSalary);

    $stmt->execute();

    $pdo = null;
    $stmt = null;

    header("Location: ../homepage.php");

    die();

  } catch (PDOException $err) {
    die("Query failed: " . $err->getMessage());
  }


} else header("Location: ../add_employee.php");