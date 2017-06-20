<?php
include("php_includes/header.php");

$id = $_SESSION['id'];
$limit = 12;

$stmt = $conn->prepare("SELECT * FROM notifications WHERE reciver=? ORDER BY id DESC limit 12");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();



while ($row = $result->fetch_assoc()) {
	$otherId = $row['sender'];
	if ($row['type'] == "chat") {
		if ($row['isgroupchat'] == 0) {
			include("_chatPersonCard.php");
		}
	}
}
