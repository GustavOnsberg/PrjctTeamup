<?php
$onlyLoggedIn = false;
$onlyLoggedOff = true;

include 'php_includes/header.php'; ?>
<?php
$email = $_POST['email'];
$username = $_POST['username'];
$usernameLower = strtolower($username);
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];



if (empty($email) || empty($username) || empty($firstname) || empty($lastname) || empty($password) || empty($repassword)) {
    header("Location: signup.php?e=1");
    exit();
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: signup.php?e=2");
    exit();
}

if ($password != $repassword) {
    header("Location: signup.php?e=3");
    exit();
}

if (strpos($username, ' ')) {
    header("Location: signup.php?e=4");
    exit();
}

$stmt = $conn->prepare("SELECT email FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();


if($result->num_rows > 0){
    header("Location: signup.php?e=5");
    exit();
}





$stmt = $conn->prepare("SELECT username FROM users WHERE usernameLower=?");
$stmt->bind_param("s", $usernameLower);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){
    header("Location: signup.php?e=6");
    exit();
}






$description = "%3Cp%3E%3Cspan%20class=%22ql-size-huge%22%3EThis%20profile%20is%20under%20construction%3C/span%3E%3C/p%3E%3Cp%3E%3Cspan%20class=%22ql-size-large%22%3EThe%20user%20is%20yet%20to%20write%20a%20description%3C/span%3E%3C/p%3E";



$encry_pwd = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, username, usernameLower, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $email, $encry_pwd, $firstname, $lastname, $username, $usernameLower, $description);
$stmt->execute();

header("Location: index.php");
?>