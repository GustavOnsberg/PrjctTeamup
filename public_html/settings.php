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
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Settings - Project Team-Up</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet">
      <meta name="description" content="Project Team-Up is a teamup application for entrepenuers. Create teams, projects and start creating with people all around the world.">
      	<style>
          body{
            margin: 0;
            padding: 0;
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 300;
            width: 100%;
            height: 100vh;
            margin: auto;
            background-color: #ecf0f1;
          }
          div.wrapper{
            width: 95%;
            margin:auto;
          }
          /* Style the tab */
          div.leftmenu {
              overflow: hidden;
              float: left;
              width: 15%;
              margin-top: 20%;
          }

          /* Style the buttons inside the tab */
          div.leftmenu button{
              margin: 0;
              padding: 0;
              border: 0;
              background: transparent;
              font-size: 0.8em;
              cursor: pointer;
              display: block;
              font-weight: 300;
          }

          /* Change background color of buttons on hover */
          div.leftmenu button:hover {
              color: #666;
              text-decoration: underline;
          }

          /* Create an active/current tablink class */
          div.leftmenu button.active {
              color: #555;
          }
          /* Style the tab content */
          .tabcontent {
              display: none;
          }
          .tabcontent {
              -webkit-animation: fadeEffect 1s;
              animation: fadeEffect 1s; /* Fading effect takes 1 second */
          }

          @-webkit-keyframes fadeEffect {
              from {opacity: 0;}
              to {opacity: 1;}
          }

          @keyframes fadeEffect {
              from {opacity: 0;}
              to {opacity: 1;}
          }
          .middle{
            float: left;
            margin-top: 5%;
          }
      </style>
    </head>
    <body>
      <?php
        include("_header.php");
        ?>
      <div class="wrapper">
        <div class="leftmenu">
          <button class="tablinks" onclick="openTab(event, 'General')" id="defaultOpen">General</button>
          <button class="tablinks" onclick="openTab(event, 'Job')">Job & Education</button>
          <button class="tablinks" onclick="openTab(event, 'Friendsandcontacts')">Friends and contacts</button>
          <button class="tablinks"><strike>Payments</strike> <font style="color:red;">Coming soon</font></button>
        </div>
        <div class="middle">
          <div id="General" class="tabcontent">
            <h1>General settings</h1>
            <form action="saveUserSettings.php" method="POST" id="settingsForm">
              <h2>Firstname</h2>
              <input type="text" name="firstname" value="<?php echo $firstname; ?>">
              <h2>Lastname</h2>
              <input type="text" name="lastname" value="<?php echo $lastname; ?>">
              <h2>Country</h2>
              
              
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
              
              
              
              <h2>City</h2>
              <input type="text" name="city" value="<?php echo $city; ?>">
              <h2>Birthday</h2>
              <input type="date" name="birthday" value="<?php echo $birthday; ?>">
              <h2>Public profile</h2>
              <input type="checkbox" name="public" <?php if($public){echo "checked";}; ?>>
              <h2>Gender</h2>
              <select form="settingsForm" name="gender" value="<?php echo $gender; ?>">
                  <option value="notgiven" <?php if($gender=="notgiven"){echo "selected";}; ?>>Not given</option>
                  <option value="male" <?php if($gender=="male"){echo "selected";}; ?>>Male</option>
                  <option value="female" <?php if($gender=="female"){echo "selected";}; ?>>Female</option>
                  <option value="unicorn" <?php if($gender=="unicorn"){echo "selected";}; ?>>Unicorn</option>
                  <option value="serect" <?php if($gender=="secret"){echo "selected";}; ?>>It's a secret</option>
              </select>
              <input type="submit" value="Save changes" >
            </form>
          </div>
          <div id="Job" class="tabcontent">
            <h1>Job & Education</h1>
            <form action="saveUserSettings.php" method="POST" id="settingsForm">
              <h2>Job area</h2>
              <select form="settingsForm" name="jobarea" value="<?php echo $jobarea; ?>">
                  <option value="notgiven" <?php if($jobarea=="notgiven"){echo "selected";}; ?>>Not given</option>
                  <option value="design" <?php if($jobarea=="Design"){echo "selected";}; ?>>Design</option>
                  <option value="gamedevelopment" <?php if($jobarea=="GameDevelopment"){echo "selected";}; ?>>Game Development</option>
                  <option value="music" <?php if($jobarea=="Music"){echo "selected";}; ?>>Music</option>
                  <option value="filmandanimation" <?php if($jobarea=="FilmAndAnimation"){echo "selected";}; ?>>Film & Animation</option>
              </select>
              <h2>Job title</h2>
              <input type="text" name="job" value="<?php echo $job; ?>">
              <input type="submit" value="Save changes" >
            </form>
          </div>
          <div id="Friendsandcontacts" class="tabcontent">
            <h1>Friend and contacts</h1>
          </div>
          <div id="Payments" class="tabcontent">
            <h1>Payments</h1>
          </div>
        </div>
      </div>
      <?php
      include("_footer.php");
      ?>
    <script type="text/javascript">
      function openTab(evt, cityName) {
      // Declare all variables
      var i, tabcontent, tablinks;

      // Get all elements with class="tabcontent" and hide them
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
      }

      // Get all elements with class="tablinks" and remove the class "active"
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
      }

      // Show the current tab, and add an "active" class to the button that opened the tab
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
      }
      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
    </script>
    </body>
</html>
