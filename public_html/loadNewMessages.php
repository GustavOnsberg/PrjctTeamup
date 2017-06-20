<?php
include("php_includes/header.php");

$thisid = $_SESSION['id'];
$otherid = $_GET['id'];
$isgroupchat = $_GET['isgroupchat'];
$type = "chat";

$seen = 1;

$stmt = $conn->prepare("UPDATE notifications SET seen=? WHERE sender=? AND reciver=? AND type=? AND isgroupchat=?");
$stmt->bind_param("sssss", $seen, $otherid, $thisid, $type, $isgroupchat);
$stmt->execute();


if ($isgroupchat) {
	$stmt = $conn->prepare("SELECT * FROM chatmessages WHERE reciver=? AND isgroupchat=? AND id>? ORDER BY id DESC LIMIT 15");
	$newestid = $_SESSION['newestid'];
	$stmt->bind_param("sss", $otherid, $isgroupchat, $newestid);
}
else{
	$stmt = $conn->prepare("SELECT * FROM chatmessages WHERE ((sender=? AND reciver=?) OR (sender=? AND reciver=?)) AND isgroupchat=? AND id>? ORDER BY id DESC LIMIT 15");
	$newestid = $_SESSION['newestid'];
	$stmt->bind_param("ssssss", $thisid, $otherid, $otherid, $thisid, $isgroupchat, $newestid);
}


$stmt->execute();



$result = $stmt->get_result();
$html = "";
while($row = $result->fetch_assoc()){
	if ($row['contenttype'] == text) {
		if ($row['sender'] == $thisid) {
			$class = "two";
		}
		else{
			$class = "one";
		}
		$html = "<div class='messagecontainer'>
              	<div class='".$class."'>"
              		.$row['content']."
              	</div>
            </div>".$html;
	}
	$_SESSION['oldestid'] = $row['id'];
	if (isset($_SESSION['newestid'])) {
		if ($row['id'] > $_SESSION['newestid']) {
			$_SESSION['newestid'] = $row['id'];
		}
	}
	else{
		$_SESSION['newestid'] = $row['id'];
	}
}
echo $html;