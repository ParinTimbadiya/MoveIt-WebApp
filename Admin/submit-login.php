<?php

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    header('Location: index.php');
    exit();
}

$email = $_POST['email'];
$password = $_POST['password'];
$type = "Admin";

$query = "SELECT * FROM `users` WHERE `Email` = '$email' AND `Password` = '$password' AND `Type` = '$type'";

$connection = mysqli_connect('localhost', 'root', '', 'moveit');

$result = mysqli_query($connection, $query);
$rowCount = mysqli_num_rows($result);

if ($rowCount == 1) {
    $row = mysqli_fetch_assoc($result);
    $userId = $row['Id'];
    $userType = $row['Type'];

    session_start();
    $_SESSION['UserId'] = $userId;
    $_SESSION['UserType'] = $userType;
    
    if ($type == 'Admin')
        header('Location: index.php');
    if ($type == 'User')
        header('Location: ./user.php');
    if ($type == 'Transporter')
        header('Location: ./transporter.php');
} else {
    header('Location: login.php');
}

mysqli_close($connection);
