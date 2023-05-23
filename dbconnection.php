<?php

$servername = "localhost";
$database = "firstdb";
$username = "frmst";
$password = "frmst";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect($servername, $username, $password, $database);
