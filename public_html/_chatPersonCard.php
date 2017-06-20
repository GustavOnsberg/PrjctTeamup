<?php
$p_stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$p_stmt->bind_param("s", $otherId);
$p_stmt->execute();
$p_result = $p_stmt->get_result();
$p_row = $p_result->fetch_assoc();


?>
<a onclick="setOtherId(<?php echo($p_row['id']); ?>, 0)">
  <div class="profile">
    <div class="icon">
      <img src="0.png">
      <div class="status red">
      </div>
    </div>
    <div class="text">
      <p <?php if($row['seen'] == 0 && $row['sender'] == $otherId){echo("style='font-weight: 700;'");} ?>><?php echo($p_row['firstname']." ".$p_row['lastname']); ?></p>
      <p <?php if($row['seen'] == 0 && $row['sender'] == $otherId){echo("style='font-weight: 700;'");} ?>><?php echo($row['preview']); ?></p>
    </div>
  </div>
</a>