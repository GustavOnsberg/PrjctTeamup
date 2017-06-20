<?php
$onlyLoggedIn = true;
$onlyLoggedOff = false;
include('php_includes/header.php');

$description = $_POST['text'];
$textId = $_POST['textId'];
$id = $_SESSION['id'];


if ($id != $textId) {
	header("Location: accessDenied.php");
}


$stmt = $conn->prepare("UPDATE users SET description=? WHERE id=?");
$stmt->bind_param("ss", $description, $id);
$stmt->execute();


header("Location: profile.php?tab=about");


?>
