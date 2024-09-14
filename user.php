<?php

session_start();
if (!isset($_SESSION['UserId'])) {
  header('Location: ./index.php');
  exit();
}
if ($_SESSION['UserType'] == 'Transporter') {
  header('Location: ./transporter.php');
  exit();
}

$UserId = $_SESSION['UserId'];
include("php_action/db_connect.php");
include("./includes/header.php");
?>
<div class="sidebar close">
  <div class="logo-details">
    <i class='bx bxl-c-plus-plus'></i>
    <span class="logo_name">Move-It</span>
  </div>
  <ul class="nav-links">
    <li>
      <a href="./user-dashboard.php" class="link-Dashboard" id="link-dashboard">
      <i class="fa-solid fa-house"></i>
        <span class="link_name">Dashboard</span>
      </a>
    </li>
    <li>
      <a href="./user-job.php" class="link-Myjob" id="link-my-jobs">
      <i class="fa-brands fa-creative-commons-nd"></i>
        <span class="link_name">My Jobs</span>
      </a>
    </li>
    <li>
      <a href="./addnewjob.php" class="link-Addnewjob" id="link-add-new-job">
      <i class="fa-solid fa-plus"></i>
        <span class="link_name">Add New Jobs</span>
      </a>
    </li>
    <li>
      <a href="user-completedjob.php" class="link-Completedjob" id="link-completed-job">
        <i class="fa-solid fa-check"></i>
        <span class="link_name">Completed Job</span>
      </a>
    </li>
    <li>
      <a href="user-canceledjob.php" class="link-Canceledjob" id="link-canceled-job">
        <i class="fa-solid fa-ban"></i>
        <span class="link_name">Canceled Job</span>
      </a>
    </li>
    <li>
      <a href="./logout.php">
      <i class="fa-solid fa-right-from-bracket"></i>
        <span class="link_name">Log Out</span>
      </a>
    </li>
    <!-- <li>
      <div class="iocn-link">
        <a href="#">
          <i class='bx bx-collection'></i>
          <span class="link_name">Category</span>
        </a>
        <i class='bx bxs-chevron-down arrow'></i>
      </div>
      <ul class="sub-menu">
        <li><a class="link_name" href="#">Category</a></li>
        <li><a href="#">HTML & CSS</a></li>
        <li><a href="#">JavaScript</a></li>
        <li><a href="#">PHP & MySQL</a></li>
      </ul>
    </li> -->
    <li>
      <div class="profile-details">
        <div class="profile-content">
          <img src="./assets/imgs/1.jpg" alt="profileImg">
        </div>
        <div class="name-job">
          <div class="profile_name">User_Name</div>
          <div class="job">User</div>
        </div>
        <a href="">
          <i class='bx bx-log-out'></i>
        </a>
      </div>
    </li>
  </ul>
</div>
<section class="home-section">
  <div class="home-content"  style="background-color: white;">
  <i class="fa-sharp fa-solid fa-bars"></i>
    <span class="text">User Dashboard</span>
  </div>


</section>

<?php
include('./includes/script.php');
include('./includes/footer.php');
?>