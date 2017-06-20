<?php

$conn = mysqli_connect("mysql61.unoeuro.com", "prjctgroup_com", "prjctpassq2w3", "prjctgroup_com_db");
mysqli_set_charset($conn, 'utf8');


if (!$conn) {
    die("Connection failed");
}

?>