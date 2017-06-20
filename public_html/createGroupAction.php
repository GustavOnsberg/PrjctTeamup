<?php
$onlyLoggedIn = true;
$onlyLoggedOff = false;
include('php_includes/header.php');


$name = NULL;
$public = NULL;
$description = NULL;


if (!(isset($_POST['name']) && isset($_POST['public']) && isset($_POST['description']))) {
    Header("Location: createGroup.php?e=1");
}

if (!isset($_SESSION['id'])) {
    Header("Location: index.php");
}



$name = $_POST['name'];
$public = 0;
if ($_POST['public']) {
    $public = 1;
}
$description = "%3Cp%3E%3Cspan%20class=%22ql-size-huge%22%3EThis%20group%20page%20is%20under%20construction%3C/span%3E%3C/p%3E%3Cp%3E%3Cspan%20class=%22ql-size-large%22%3EA%20description%20is%20yet%20to%20be%20writen%3C/span%3E%3C/p%3E";
$ownerid = $_SESSION['id'];




$stmt = $conn->prepare("INSERT INTO groups (name, ownerid, public, description) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $ownerid, $public, $description);
$stmt->execute();

$insertid = $stmt->insert_id;
$level = 3;

$stmt = $conn->prepare("INSERT INTO user_group_relations (groupid, userid, changedescription, posttoblog, uploadfiles, deletefiles, kickmembers, inviteusers, blockusers, unblockusers, createmilestones, changename, changeprofileimage, changeprofilecover) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssssss", $insertid, $ownerid, $level, $level, $level, $level, $level, $level, $level, $level, $level, $level, $level, $level);
$stmt->execute();

header("Location: group.php?id=".$insertid);
