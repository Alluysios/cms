<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "cms";
    $connection = mysqli_connect($host, $username, $password, $database);

    if(!$connection) {
        echo "FAILED TO CONNECT";
    }

?>