<?
$onlyLoggedIn = true;
$onlyLoggedOff = false;
include('php_includes/header.php'); ?>
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
        
        <form id="groupForm" action="createGroupAction.php" method="POST">
            <h1>Name</h1>
            <input type="text" name="name">
            <h1>Make group public</h1>
            <input type="checkbox" name="public">
            <h1>Description</h1>
            <textarea form="groupForm" name="description"></textarea>
            <input type="submit" value="Create group">
        </form>
        
        <?php
        include("_footer.php");
        ?>
    </body>
</html>
