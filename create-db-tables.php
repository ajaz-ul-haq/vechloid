<?php

$conn = mysqli_connect("localhost", "root","","vechloid");

if(!$conn){
    die("ERROR: Could not connect to databse. "
        . mysqli_connect_error());
}

    $sqlc = "CREATE TABLE creds(
             id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
             name VARCHAR(30) NOT NULL,
             email VARCHAR(30) NOT NULL,
             username VARCHAR(50) NOT NULL,
             dob VARCHAR(50) NOT NULL,
             password VARCHAR(50) NOT NULL
             type VARCHAR(50) NOT NULL
             )";

    if ($conn->query($sqlc) === TRUE) {
        echo "Table creds created successfully<br>";


    $sqlv = "CREATE TABLE vehicles(
             id INT(10) UNSIGNED PRIMARY KEY,
             Brand VARCHAR(255) NOT NULL,
             Type VARCHAR(255) NOT NULL,
             Name VARCHAR(255) NOT NULL,
             Model VARCHAR(255) NOT NULL,
             Milage INT(5) NOT NULL,
             Price INT(5) NOT NULL
             )";
        if ($conn->query($sqlv) === TRUE) {
            echo "Table Vehicles created successfully<br>";
        }
    }
    else {
        echo "Error creating table: <br>" . $conn->error;
    }


?>
