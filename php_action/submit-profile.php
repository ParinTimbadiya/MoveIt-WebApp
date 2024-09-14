<?php
include("db_connect.php");
session_start();

$Id = $_SESSION['UserId'];
$FullName = $_REQUEST['FullName'];
$Address = $_REQUEST['Address'];
$MobileNumber = $_REQUEST['MobileNumber'];


$query2 = "INSERT INTO `profiles` (`UserId`,`FullName`,`Address`,`MobileNumber`) VALUES ('$Id','$FullName','$Address','$MobileNumber')";
mysqli_query($connection, $query2);
mysqli_close($connection);
header('Location: ../login.php');
?>