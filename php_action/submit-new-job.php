<?php
include("db_connect.php");

session_start();
if (!isset($_SESSION['UserId']))
{
    header('Location: ../login.php');
    exit();
}

$UserId = $_SESSION['UserId'];
$FromCityId = $_POST['FromCityId'];
$FromAddress = $_POST['FromAddress'];
$ToCityId = $_POST['ToCityId'];
$ToAddress = $_POST['ToAddress'];
$Description = $_POST['Description'];

$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$timeStamp = $dateTime->getTimestamp();

$ImageName = "$timeStamp-" . $_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'], "../assets/uploads/images/$ImageName");

// $query = " INSERT INTO `jobs` (`UserId`,`FromCityId`,`FromAddress`,`ToCityId`,`ToAddress`,`ImageName`,`Description`) VALUES ($UserId,$FromCityId,`$FromAddress`,$ToCityId,`$ToAddress`,`$ImageName`,`$Description`)";
$query = "INSERT INTO `jobs` (`UserId`, `FromCityId`, `FromAddress`, `ToCityId`, `ToAddress`, `ImageName`, `Description`) VALUES ('$UserId','$FromCityId','$FromAddress','$ToCityId','$ToAddress','$ImageName','$Description')";
echo $query;

mysqli_query($connection, $query);
mysqli_close($connection);

header('Location: ../user-dashboard.php');

?>