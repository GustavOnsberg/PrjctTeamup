<?php include('php_includes/header.php'); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Main page - Project Team-Up</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Project Team-Up is a teamup application for entrepenuers. Create teams, projects and start creating with people all around the world.">
    </head>
    <body>
        <?php
        include("_header.php");
        ?>
      	<?php
        if (isset($_SESSION['id'])) {
            include ('_index_user.php');
        }
        else {
            include ('_index_guest.php');
        }

        ?>
      	<?php
        include("_footer.php");
        ?>
    </body>
</html>
