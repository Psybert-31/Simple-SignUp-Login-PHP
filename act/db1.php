<?php
    $dbhost = "localhost";
    $dbuser = "Carbonara";
    $dbpass = "";
    $dbname = "teamcarbonara";

    //Create Connection
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$conn) {
        die("Connection Failed".mysqli_connect_error());
    }
?>