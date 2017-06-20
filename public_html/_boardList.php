<?php

$stmt_l = $conn->prepare("SELECT * FROM boardcards WHERE listid=? ORDER BY ordernumber ASC");
$stmt_l->bind_param("s", $listid);
$stmt_l->execute();
$result_l = $stmt_l->get_result();
?>


<div class="listDivContainer">
    <h1><?php echo($row['title']); ?></h1><button class="addCardButton">Add card</button>
    <div class="listDiv">


		<?php
		while ($row_l = $result_l->fetch_assoc()) {
			$cardid = $row_l['id'];
			include("_boardCard.php");
		}
		?>


	</div>
</div>