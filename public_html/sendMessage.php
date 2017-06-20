<?php
include("php_includes/header.php");


$sender = $_SESSION['id'];
$reciver = $_POST['id'];
$isgroupchat = $_POST['isgroupchat'];
$content = $_POST['content'];
$contenttype = $_POST['contenttype'];
$type = "chat";

$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("s", $sender);
$stmt->execute();
$result = $stmt->get_result();
$row  = $result->fetch_assoc();
$previewcontent = $row['firstname'].": ".$content;




$stmt = $conn->prepare("INSERT INTO chatmessages (sender, reciver, isgroupchat, content, contenttype) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $sender, $reciver, $isgroupchat, $content, $contenttype);
$stmt->execute();
$_SESSION['newestid'] = $stmt->insert_id;


if ($isgroupchat) {
	$n_stmt = $conn->prepare("SELECT * FROM groupchatmembers WHERE groupid=?");
	$n_stmt->bind_param("s", $reciver);
	$n_stmt->execute();
	$result = $n_stmt->get_result();

	$stmt = $conn->prepare("DELETE FROM notifications WHERE sender=? AND isgroupchat=? AND type=?");
	$stmt->bind_param("sss", $reciver, $isgroupchat, $type);
	$stmt->execute();
	
	while ($row = $result->fetch_assoc()) {
		

		$notificationTo = $row['userid'];
		$stmt = $conn->prepare("INSERT INTO notifications (sender, reciver, isgroupchat, preview, type) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $reciver, $notificationTo, $isgroupchat, $previewcontent, $type);
		$stmt->execute();
	}
}
else{
	$stmt = $conn->prepare("DELETE FROM notifications WHERE ((sender=? AND reciver=?) OR (sender=? AND reciver=?)) AND isgroupchat=? AND type=?");
	$stmt->bind_param("ssssss", $sender, $reciver, $reciver, $sender, $isgroupchat, $type);
	$stmt->execute();

	$stmt = $conn->prepare("INSERT INTO notifications (sender, reciver, isgroupchat, preview, type) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("sssss", $sender, $reciver, $isgroupchat, $previewcontent, $type);
	$stmt->execute();
}








echo("<div class='messagecontainer'>
              <div class='two'>".$content."</div>
            </div>");