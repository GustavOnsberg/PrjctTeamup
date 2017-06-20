<?php include 'php_includes/header.php'; ?>
<?php


session_destroy();

header("Location: index.php");
exit();