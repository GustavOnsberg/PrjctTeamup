<?php
$onlyLoggedIn = true;
$onlyLoggedOff = false;
include('php_includes/header.php');


$listId = $_POST['listId'];
$id = $_POST['liftedCardId'];

$orderNumber = 1;

$stmt = $conn->prepare("SELECT ordernumber FROM boardcards WHERE listid=? ORDER BY ordernumber DESC limit 1");
$stmt->bind_param("s", $listId);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$orderNumber = $row['ordernumber'] + 1;
}



$stmt = $conn->prepare("UPDATE boardcards SET listid=?, ordernumber=? WHERE id=?");
$stmt->bind_param("sss", $listId, $orderNumber, $id);
$stmt->execute();



$stmt = $conn->prepare("UPDATE boardlists SET lastupdate=lastupdate+1 WHERE id=?");
$stmt->bind_param("s", $listId);
$stmt->execute();
?>