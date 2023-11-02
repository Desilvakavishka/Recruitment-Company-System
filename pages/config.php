<?php
    $servername ="localhost";
    $username = "root";
    $pw = "";
    $db = "jobmarket";
    $conn = new mysqli($servername, $username, $pw, $db);

    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    

?>