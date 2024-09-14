<?php
include("db_connect.php");

session_start();
if (!isset($_SESSION['UserId'])) {
  header('Location: ../index.php');
  exit();
}
if ($_SESSION['UserType'] == 'Transporter') {
  header('Location: ../transporter.php');
  exit();
}

$UserId = $_SESSION['UserId'];
echo $jobId = $_REQUEST['jobId'];
$query = "UPDATE `jobs` SET `IsCompleted` = 1 WHERE `jobs`.`Id` = '+$jobId+';";
$result = mysqli_query($connection,$query);
mysqli_close($connection);

if($result > 0)
{
  header('Location: ../user-job.php');
}
else{
    echo "error";
    echo $result;
}
