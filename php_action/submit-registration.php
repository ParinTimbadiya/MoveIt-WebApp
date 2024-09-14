<?php
include("db_connect.php");
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$Type = $_POST['Type'];

$query = "INSERT INTO `users` (`Email`,`Password`,`Type`) VALUES ('$Email','$Password','$Type')";

mysqli_query($connection, $query);
mysqli_close($connection);

header('Location: ../login.php');
?>