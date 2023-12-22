<?php
    $servername ="localhost";
    $username = "root";
    $password = "";
    $databaseName = "hr_fidelity";
    
    $conn = mysqli_connect($servername, $username, $password, $databaseName);

    if (mysqli_connect_errno()) {
        die("". mysqli_connect_error());
    }

?>