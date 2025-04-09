<?php
    $servername = "localhost";
    $username = "projec34";
    $password = "4Hx.jTY5fzX87#";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=projec34_p3db;charset=utf8", $username, $password);
        // set the PDO error mode to exception

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        } catch(PDOException $e) {
        //echo "Connection failed: " . $e->getMessage();
    }
?>