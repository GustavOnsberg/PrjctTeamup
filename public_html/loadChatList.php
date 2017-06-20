<?php
include("php_includes/header.php");
$id = $_SESSION['id'];
if (isset($_GET['limit'])) {
	$limit = $_GET['limit'];
}
else{
	$limit = 12;
}
$type = "chat";

$true = 1;
$false = 0;

$stmt = $conn->prepare("SELECT * FROM notifications WHERE (((sender=? OR reciver=?) AND isgroupchat=?) OR (reciver=? AND isgroupchat=?)) AND type=? ORDER BY id DESC limit ?");
$stmt->bind_param("sssssss", $id, $id, $false, $id, $true, $type, $limit);
$stmt->execute();
$result = $stmt->get_result();






$html = array();

while ($row = $result->fetch_assoc()) {
	if ($row['sender'] == $id) {
		$otherId = $row['reciver'];
	}
	else{
		$otherId = $row['sender'];
	}

	if ($row['isgroupchat'] == 0) {
		include("_chatPersonCard.php");
	}
	else{
		include("_chatGroupCard.php");
	}
}
