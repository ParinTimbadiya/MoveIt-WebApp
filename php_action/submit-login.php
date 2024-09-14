<?php
include("db_connect.php");

if (!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['type'])) {
    header('Location: ../index.php');
    exit();
}

$email = $_POST['email'];
$password = $_POST['password'];
$type = $_POST['type'];

$query = "SELECT * FROM `users` WHERE `Email` = '$email' AND `Password` = '$password' AND `Type` = '$type'";
$result = mysqli_query($connection, $query);
$rowCount = mysqli_num_rows($result);

if ($rowCount == 1) {
    $row = mysqli_fetch_assoc($result);
    $userId = $row['Id'];
    $userType = $row['Type'];

    session_start();
    $_SESSION['UserId'] = $userId;
    $_SESSION['UserType'] = $userType;

    $query2 = "SELECT * FROM `profiles` WHERE `UserId` =  '$userId'";
    $result2 = mysqli_query($connection, $query2);
    $rowCount2 = mysqli_num_rows($result2);
    if ($rowCount2 == 0) {
        header("Location: ../profile.php?Id=$userId");
    } else {

        if ($type == 'User')
            header('Location: ../user.php');
        else if ($type == 'Transporter')
            header('Location: ../transporter.php');
    }
} else {
    header('Location: ../login.php');
}

mysqli_close($connection);
