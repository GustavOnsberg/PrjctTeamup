<?php
$cardId = 1;

$c_stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$c_stmt->bind_param("s", $cardId);
$c_stmt->execute();
$c_result = $c_stmt->get_result();
$c_row = $c_result->fetch_assoc();
?>


<div class="personCardDiv">
	<div class="personCardImageDiv">
		<a class="personCardImageLink" href='profile.php?id=<?php echo($c_row['id']); ?>'><img class="personCardImageImg"  src='<?php echo($c_row["profileimage"]); ?>'></a>
	</div>
	<div>
		<a class="personCardText" href='profile.php?id=<?php echo($c_row['id']); ?>'><?php echo($c_row['firstname']." ".$c_row['lastname']); ?></a>
		<a class="personCardText"  href='profile.php?id=<?php echo($c_row['id']); ?>'><?php echo("@".$c_row['username']); ?></a>
	</div>
</div>