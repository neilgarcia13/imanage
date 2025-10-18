<?php

if (isset($_POST["add"])) {

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

}


if (isset($_POST["edit"])) {

  $id = $_POST["id"];
  $firstName = $_POST["first_name"];
  $lastName = $_POST["last_name"];
  $jobPosition = $_POST["position"];
  $grossSalary = $_POST["salary"];

  try {

    require_once "dbh.php";

    $query = "UPDATE employee_tbl SET first_name = :firstName, last_name = :lastName, position = :jobPosition, salary = :grossSalary WHERE id = :id";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":firstName", $firstName);
    $stmt->bindParam(":lastName", $lastName);
    $stmt->bindParam(":jobPosition", $jobPosition);
    $stmt->bindParam(":grossSalary", $grossSalary);
    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $pdo = null;
    $stmt = null;
    header("Location: ../homepage.php");

    die();

  } catch (PDOException $err) {
    die("Query failed: " . $err->getMessage());
  }

}