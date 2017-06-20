<?php

include('php_includes/header.php');

$documentId = $_POST['documentId'];
$sec0 = $_POST['sec0'];
$sec1 = $_POST['sec1'];
$sec2 = $_POST['sec2'];
$sec3 = $_POST['sec3'];
$sec4 = $_POST['sec4'];
$sec5 = $_POST['sec5'];
$sec6 = $_POST['sec6'];
$sec7 = $_POST['sec7'];
$sec8 = $_POST['sec8'];
$sec9 = $_POST['sec9'];
$sec10 = $_POST['sec10'];
$sec11 = $_POST['sec11'];
$sec12 = $_POST['sec12'];
$sec13 = $_POST['sec13'];
$sec14 = $_POST['sec14'];



$stmt = $conn->prepare("UPDATE documents SET sec0=?, sec1=?, sec2=?, sec3=?, sec4=?, sec5=?, sec6=?, sec7=?, sec8=?, sec9=?, sec10=?, sec11=?, sec12=?, sec13=?, sec14=? WHERE id=?");
$stmt->bind_param("ssssssssssssssss", $sec0, $sec1, $sec2, $sec3, $sec4, $sec5, $sec6, $sec7, $sec8, $sec9, $sec10, $sec11, $sec12, $sec13, $sec14, $documentId);
$stmt->execute();

echo($sec1);