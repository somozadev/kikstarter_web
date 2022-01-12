<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "SomCas_Proyect";
$mysql_table = "";

$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

/*
CREATE TABLE users(
    usersId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    usersUsername varchar(12) NOT NULL,
    usersEmail varchar(128) NOT NULL,
    usersPwd varchar(128) NOT NULL 
);
*/
