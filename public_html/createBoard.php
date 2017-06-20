<?php
include("php_includes/header.php");

$projectid = 9;
$title = "Testboard";



$stmt = $conn->prepare("INSERT INTO boards (projectid, title) VALUES (?, ?)");
$stmt->bind_param("ss", $projectid, $title);	
$stmt->execute();

$boardid = $stmt->insert_id;

$title = "Planned";
$stmt = $conn->prepare("INSERT INTO boardlists (boardid, title) VALUES (?, ?)");
$stmt->bind_param("ss", $boardid, $title);
$stmt->execute();

$title = "In progress";
$stmt = $conn->prepare("INSERT INTO boardlists (boardid, title) VALUES (?, ?)");
$stmt->bind_param("ss", $boardid, $title);
$stmt->execute();

$title = "Completed";
$stmt = $conn->prepare("INSERT INTO boardlists (boardid, title) VALUES (?, ?)");
$stmt->bind_param("ss", $boardid, $title);
$stmt->execute();