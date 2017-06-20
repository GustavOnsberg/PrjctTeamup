<?php
$onlyLoggedIn = false;
$onlyLoggedOff = true;
include 'php_includes/header.php'; ?>
<?php

$loginname = $_POST['loginname'];
$password = $_POST['password'];


$stmt = $conn->prepare("SELECT * FROM users WHERE email=? OR usernameLower=?");
$stmt->bind_param("ss", $loginname, strtolower($loginname));
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($result->num_rows > 0) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        header("Location: profile.php");
        exit();
    }
    else{
        header("Location: login.php?error=bad_password");
        exit();
    }
}
else {
    header("Location: login.php?error=bad_email_username");
    exit();
}
?>