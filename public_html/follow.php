<?php
include("php_includes/header.php");


$userid = $_SESSION['id'];
$profileid = $_GET['id'];

if ($userid == $profileid) {
	header("Location: profile.php");
	exit();
}



$stmt = $conn->prepare("SELECT * FROM followings WHERE follower=? AND followed=?");
$stmt->bind_param("ss", $userid, $profileid);
$stmt->execute();




$result = $stmt->get_result();
$row = $result->fetch_assoc();
if ($result->num_rows > 0) {
	$stmt = $conn->prepare("DELETE FROM followings WHERE follower=? AND followed=?");
	$stmt->bind_param("ss", $userid, $profileid);
	$stmt->execute();

    header("Location: profile.php?id=".$profileid);
    exit();
}


$stmt = $conn->prepare("INSERT INTO followings (follower, followed) VALUES (?, ?)");
$stmt->bind_param("ss", $userid, $profileid);
$stmt->execute();
header("Location: profile.php?id=".$profileid);
exit();