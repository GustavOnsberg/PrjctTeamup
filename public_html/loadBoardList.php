<?php
$onlyLoggedIn = false;
$onlyLoggedOff = false;
include('php_includes/header.php');

$listId = $_POST['listId'];

$stmt_l = $conn->prepare("SELECT * FROM boardcards WHERE listid=? ORDER BY ordernumber ASC");
$stmt_l->bind_param("s", $listId);
$stmt_l->execute();
$result_l = $stmt_l->get_result();
?>




<h1><?php echo($_POST['title']); ?></h1><button class="addCardButton">Add card</button>
<div class="listDiv">


	<?php
	while ($row_l = $result_l->fetch_assoc()) {
		$cardid = $row_l['id'];
		include("_boardCard.php");
	}
	?>


</div>