<?php

    $table = isset($GET['table']) ? $GET['table'] : 'vechloid' ;
    $conn = mysqli_connect("localhost", "root","",$table);

    if(!$conn){
        die("ERROR : Could not connect to database " . mysqli_connect_error());
    }

    $queryToCreateCredentialsTable = "CREATE TABLE creds(
             id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
             name VARCHAR(30) NOT NULL,
             email VARCHAR(30) NOT NULL,
             username VARCHAR(50) NOT NULL,
             dob VARCHAR(50) NOT NULL,
             password VARCHAR(50) NOT NULL,
             type VARCHAR(50) NOT NULL
             )";

    if ($conn->query($queryToCreateCredentialsTable )) {
        echo " Table creds created successfully <br>";

        $queryToCreateVehiclesTable  = "CREATE TABLE vehicles(
             id INT(10) UNSIGNED PRIMARY KEY,
             Brand VARCHAR(255) NOT NULL,
             Type VARCHAR(255) NOT NULL,
             Name VARCHAR(255) NOT NULL,
             Model VARCHAR(255) NOT NULL,
             Milage INT(5) NOT NULL,
             Price INT(5) NOT NULL
             )";

        echo $conn->query($queryToCreateCredentialsTable)?: "Table Vehicles created successfully<br>" ;

    }
    else{
        echo "Connected To database but failed to create table because $conn->error";
    }

?>
