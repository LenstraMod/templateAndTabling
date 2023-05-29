<?php

$localhost = "localhost";
$root = "root";
$password = "";
$database = "db_sekolah";

$conn = mysqli_connect($localhost,$root,$password,$database);

if(mysqli_connect_errno()){
    echo "Failed to connect to database";
}