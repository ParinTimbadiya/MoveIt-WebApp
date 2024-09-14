<?php
include("db_connect.php");
session_start();
if (!isset($_SESSION['UserId']))
{
    header('Location: ../login.php');
    exit();
}

echo $UserId = $_SESSION['UserId'];
echo $JobId = $_REQUEST['JobId'];
echo $Amount = $_REQUEST['Amount'];
echo $Description = $_REQUEST['Description'];
echo $IsAccepted = 'False';

$query = "INSERT INTO `bids` (`UserId`, `JobId`, `Amount`, `IsAccepted`, `Description`) VALUES ('$UserId','$JobId','$Amount','$IsAccepted','$Description')";
echo $query;

mysqli_query($connection, $query);
mysqli_close($connection);

header('location: ../transporter.php');
?>
