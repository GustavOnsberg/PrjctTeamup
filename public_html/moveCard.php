<?php
$onlyLoggedIn = true;
$onlyLoggedOff = false;
include('php_includes/header.php');


$placeNextTo = $_POST['placeNextTo'];
$placeAboveHoveredCard = $_POST['placeAboveHoveredCard'];
$id = $_POST['liftedCardId'];

$stmt = $conn->prepare("SELECT * FROM boardcards WHERE id=?");
$stmt->bind_param("s", $placeNextTo);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$listId = $row['listid'];
$orderNumber = $row['ordernumber'];

if ($placeAboveHoveredCard != "true") {
	$orderNumber = $orderNumber + 1;
}

$stmt = $conn->prepare("UPDATE boardcards SET ordernumber=ordernumber+1 WHERE listid=? AND ordernumber>=?");
$stmt->bind_param("ss", $listId, $orderNumber);
$stmt->execute();

$stmt = $conn->prepare("UPDATE boardcards SET listid=?, ordernumber=? WHERE id=?");
$stmt->bind_param("sss", $listId, $orderNumber, $id);
$stmt->execute();


$stmt = $conn->prepare("UPDATE boardlists SET lastupdate=lastupdate+1 WHERE id=?");
$stmt->bind_param("s", $listId);
$stmt->execute();
?>