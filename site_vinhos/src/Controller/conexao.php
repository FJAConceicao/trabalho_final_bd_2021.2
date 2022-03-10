<?php

$hostname = "localhost";
$banco = "cake_cms";
$username = "cakephp";
$password = "Cake#123";

$mysqli = new mysqli($hostname, $username, $password, $banco);

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}