<?php
include('php_includes/header.php');

$firstname = NULL;
$lastname = NULL;
$country = NULL;
$city = NULL;
$birthday = NULL;
$description = NULL;
$public = NULL;
$gender = NULL;
$job = NULL;
        
if (isset($_SESSION['id'])) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
    $stmt->bind_param("s", $id);
    $id = mysqli_real_escape_string($conn, $_SESSION['id']);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $country = $row['country'];
        $city = $row['city'];
        $birthday = $row['birthday'];
        $public = $row['public'];
        $gender = $row['gender'];
        $job = $row['job'];
    }
    else{
        header("Location: profileNotFound.php");
    }
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
      <style type="text/css">
        form{
             width: 85vw;
            margin: auto;
            padding-top: calc(5vh + 4em);
            margin-bottom: 5vh;
        }
        h1{
        font-weight:300;
        }
        </style>
    </head>
    <body>
        <?php
        include("_header.php");
        ?>
        
        <form action="saveUserSettings.php" method="POST" id="settingsForm">
            <h1>Firstname</h1>
            <input type="text" name="firstname" value="<?php echo $firstname; ?>">
            <h1>Lastname</h1>
            <input type="text" name="lastname" value="<?php echo $lastname; ?>">
            <h1>Country</h1>
            
            
            <select form="settingsForm" name="country">
                <?php
                $path = "country_list.txt";
                $file = fopen($path, 'r');
                $data = fread($file, filesize($path));
                fclose($file);
                
                //$lines =  explode(PHP_EOL,$data);
                $lines = preg_split("/\\r\\n|\\r|\\n/", $data);
                foreach($lines as $line) {
                    if ($line == $country) {
                        echo '<option value="'. urlencode($line).'" selected>'.$line.'</option>';
                    }
                    else{
                        echo '<option value="'. urlencode($line).'">'.$line.'</option>';
                    }
                }
                ?>
            </select>
            
            
            
            <h1>City</h1>
            <input type="text" name="city" value="<?php echo $city; ?>">
            <h1>Birthday</h1>
            <input type="date" name="birthday" value="<?php echo $birthday; ?>">
            <h1>Public profile</h1>
            <input type="checkbox" name="public" <?php if($public){echo "checked";}; ?>>
            <h1>Gender</h1>
            <select form="settingsForm" name="gender" value="<?php echo $gender; ?>">
                <option value="notgiven" <?php if($gender=="notgiven"){echo "selected";}; ?>>Not given</option>
                <option value="male" <?php if($gender=="male"){echo "selected";}; ?>>Male</option>
                <option value="female" <?php if($gender=="female"){echo "selected";}; ?>>Female</option>
                <option value="unicorn" <?php if($gender=="unicorn"){echo "selected";}; ?>>Unicorn</option>
                <option value="serect" <?php if($gender=="secret"){echo "selected";}; ?>>It's a secret</option>
            </select>
            <h1>Job</h1>
            <input type="text" name="job" value="<?php echo $job; ?>">
            <input type="submit" value="Save changes" >
        </form>
        
        <?php
        include("_footer.php");
        ?>
    </body>
</html>
