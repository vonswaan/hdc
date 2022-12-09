<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "P@ssw0rd";
    $dbname = "hdc";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
    if(!$conn){
        die("Something went wrong!");
    }

?>