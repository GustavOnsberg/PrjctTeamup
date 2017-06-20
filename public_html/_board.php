<div class="cardDivLifted" id="liftedCard"></div>
<?php

include("_addBoardCard.php");
include("php_includes/header.php");

$boardid = 3;


$stmt = $conn->prepare("SELECT * FROM boardlists WHERE boardid=? ORDER BY ordernumber ASC");
$stmt->bind_param("s", $boardid);
$stmt->execute();
$result = $stmt->get_result();



while ($row = $result->fetch_assoc()) {
	echo("<div class='listDivContainer' listid='".$row['id']."' lastupdate='-1' title='".$row['title']."'></div>");
}