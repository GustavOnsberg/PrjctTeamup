
<div class="addCardDiv">
<div style="width: 45%; float: left; margin-left: 5%;">
	<h2>List</h2>
	<select>
		<?php
		$stmt = $conn->prepare("SELECT * FROM boardlists WHERE boardid=?");
		$stmt->bind_param("s", $boardid);
		$stmt->execute();
		$result = $stmt->get_result();

		while ($row = $result->fetch_assoc()) {
			echo ("<option value='".$row['title']."'>".$row['title']."</option>");
		}
		?>
	</select>
	<h2>Title</h2>
	<input type="text" placeholder="title">
	<h2>Importance</h2>
	<select>
		<option>Urgent</option>
		<option>High</option>
		<option>Kinda</option>
		<option>Just a bit</option>
		<option>Nope</option>
	</select>
	<h2>Category</h2>
	<select>
		<option>Category 1</option>
		<option>Category 2</option>
		<option>Category 3</option>
		<option>Category 4</option>
		<option>New Category</option>
	</select>
</div>


	<div class="assignUserDiv">
		
	</div>
</div>