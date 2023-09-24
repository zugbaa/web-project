<?php

$ime = $_POST["ime"];
$prezime = $_POST["prezime"];
$adresa = $_POST["adresa"];
$poruka = $_POST["poruka"];
$priority = filter_input(INPUT_POST, "priority", FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, "type", FILTER_VALIDATE_INT);
$terms = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL);

if ( ! $terms) {
    die("Terms must be accepted");
}   
     
$mysqli = require __DIR__ . "/database.php";
        
$sql = "INSERT INTO upis (ime, prezime, adresa, poruka, priority, type)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssssii",
                $ime,
                $prezime,
                $adresa,
                $poruka,
                $priority,
                $type);

mysqli_stmt_execute($stmt);

header("Location: ../html/kid-signup-success.html");