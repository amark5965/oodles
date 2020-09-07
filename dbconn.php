<?php
session_start();
$host = "localhost"; 
$user = "phpmyadminuser";
$password = "escl1.0";
$dbname = "oodles"; 

$con = mysqli_connect($host, $user, $password,$dbname);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}