<?php include('php_includes/header.php'); ?>
<?php



if (!(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['country']) && isset($_POST['city']) && isset($_POST['birthday']) && isset($_POST['public']) && isset($_POST['gender']) && isset($_POST['job']))) {
    header("Location: userSettings.php?error=1");
    exit();
}
if (!isset($_SESSION['id'])) {
    header("Location: userSettings.php?error=2");
    exit();
}

if (isset($_POST['firstname'])) {
	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
}
else{
	$firstname = "";
}

if (isset($_POST['lastname'])) {
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
}
else{
	$lastname = "";
}

if (isset($_POST['country'])) {
	$country = urldecode($_POST['country']);
}
else{
	$country = "Unknown";
}

if (isset($_POST['city'])) {
	$city = mysqli_real_escape_string($conn, $_POST['city']);
}
else{
	$city = "";
}

if (isset($_POST['birthday'])) {
	$birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
}
else{
	$birthday = 0000-00-00;
}


$public = 0;


if (isset($_POST['firstname'])) {
	if ($_POST['public']) {
		$public = 1;
	}
}


if (isset($_POST['gender'])) {
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
}
else{
	$gender = "Not given";
}

if (isset($_POST['job'])) {
	$job = mysqli_real_escape_string($conn, $_POST['job']);
}
else{
	$job = "";
}

$id = $_SESSION['id'];




$stmt = $conn->prepare("UPDATE users SET firstname=?, lastname=?, country=?, city=?, birthday=?, public=?, gender=?, job=? WHERE id=?");
$stmt->bind_param("sssssssss", $firstname, $lastname, $country, $city, $birthday, $public, $gender, $job, $id);
$stmt->execute();

header("Location: profile.php");
exit();