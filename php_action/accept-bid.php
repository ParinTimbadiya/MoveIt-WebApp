<?php
include("db_connect.php");

session_start();
if (!isset($_SESSION['UserId']) || $_SESSION['UserType'] != 'User') {
    header('Location: ../login.php');
    exit();
}
$UserId = $_SESSION['UserId'];
// $JobId = $_REQUEST['JobId'];
$Id = $_REQUEST['id'];

$sql = "UPDATE `bids` SET `IsAccepted` = 'True' WHERE `bids`.`ID` = '$Id'";
$result = $connection->query($sql);
mysqli_close($connection);

print_r($result);
header("Location: ../user-dashboard.php");
?>