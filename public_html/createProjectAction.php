<?php
$onlyLoggedIn = true;
$onlyLoggedOff = false;
include('php_includes/header.php'); ?>
<?php


$ownertype = 1;
$ownerid = NULL;

$name = NULL;
$public = NULL;
$description = NULL;

if (!(isset($_POST['name']) && isset($_POST['public']) && isset($_POST['description']))) {
    Header("Location: createProject.php?e=1");
    exit();
}

if (!isset($_SESSION['id'])) {
    Header("Location: index.php");
    exit();
}
$ownerid = $_SESSION['id'];



$name = $_POST['name'];
if ($_POST['public']) {
    $public = 1;
}
$description = $_POST['description'];





$stmt = $conn->prepare("INSERT INTO projects (ownertype, ownerid, name, public, description) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $ownertype, $ownerid, $name, $public, $description);
$stmt->execute();

$header = "Location: project.php?id=".($stmt->insert_id);
header("Location: project.php?id=".($stmt->insert_id));
exit();