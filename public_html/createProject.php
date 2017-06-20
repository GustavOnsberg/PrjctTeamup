<?php 
$onlyLoggedIn = true;
$onlyLoggedOff = false;
include('php_includes/header.php');

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
    </head>
    <body>
        <?php
        include("_header.php");
        ?>
        
        
        <form id="projectForm" action="createProjectAction.php" method="POST">
            <h1>Create project as:</h1>
            <select name="owner" form="projectForm">
                <option value="user" selected>Me (<?php echo($_SESSION['username']); ?>)</option>
            </select>
            <h1>Name</h1>
            <input type="text" name="name">
            <h1>Make project public</h1>
            <input type="checkbox" name="public">
            <h1>Description</h1>
            <textarea form="projectForm" name="description"></textarea>
            <input type="submit" value="Create project">
        </form>
        
        
        <?php
        include("_footer.php");
        ?>
    </body>
</html>
