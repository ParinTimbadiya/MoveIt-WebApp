<?php
// $connection = mysqli_connect('localhost', 'root', '', 'testdb');
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "moveit";
$store_url = "http://localhost/php-inventory/";
// db connection
$connection = new mysqli($localhost, $username, $password, $dbname);
// check connection
if ($connection->connect_error) {
    die("Connection Failed : " . $connection->connect_error);
} else {
    // echo "Successfully connected";
}
?>