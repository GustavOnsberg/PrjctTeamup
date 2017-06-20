<?php
$onlyLoggedIn = true;
$onlyLoggedOff = false;
include('php_includes/header.php');

$id = $_POST['listId'];


$stmt = $conn->prepare("SELECT lastupdate FROM boardlists WHERE id=?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();


echo $row['lastupdate'];