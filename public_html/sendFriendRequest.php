<?php
include("php_includes/header.php");


$userid = $_SESSION['id'];
$profileid = $_GET['id'];

if ($userid == $profileid) {
	header("Location: profile.php");
	exit();
}

$stmt = $conn->prepare("SELECT * FROM friends WHERE userid=? AND friendid=?");
$stmt->bind_param("ss", $userid, $profileid);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();
if ($result->num_rows > 0) {
    header("Location: profile.php?id=".$profileid);
    exit();
}

$stmt = $conn->prepare("SELECT * FROM friendrequests WHERE sender=? AND reciver=?");
$stmt->bind_param("ss", $userid, $profileid);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();
if ($result->num_rows > 0) {
    header("Location: profile.php?id=".$profileid);
    exit();
}

$stmt = $conn->prepare("INSERT INTO friendrequests (sender, reciver) VALUES (?, ?)");
$stmt->bind_param("ss", $userid, $profileid);
$stmt->execute();

$type = "friendrequest";

$stmt = $conn->prepare("INSERT INTO notifications (sender, reciver, type) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $userid, $profileid, $type);
$stmt->execute();


header("Location: profile.php?id=".$profileid);
exit();