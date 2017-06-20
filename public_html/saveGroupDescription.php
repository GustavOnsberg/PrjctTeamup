<?php
$onlyLoggedIn = true;
$onlyLoggedOff = false;
include('php_includes/header.php');

$description = $_POST['text'];
$textId = $_POST['textId'];


if (false) {
	header("Location: accessDenied.php");
}


$stmt = $conn->prepare("UPDATE groups SET description=? WHERE id=?");
$stmt->bind_param("ss", $description, $textId);
$stmt->execute();


header("Location: group.php?id=".$textId."&tab=about");


?>
