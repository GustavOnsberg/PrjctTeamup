<?php
session_start();
include 'connectToDB.php';
if (isset($onlyLoggedIn)) {
    if ($onlyLoggedIn) {
        if (!isset($_SESSION['id'])) {
            header("Location: index.php");
        }
    }
}
if (isset($onlyLoggedOff)) {
    if ($onlyLoggedOff) {
        if (isset($_SESSION['id'])) {
            header("Location: index.php");
        }
    }
}
?>