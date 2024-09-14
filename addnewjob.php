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
include("php_action\db_connect.php");
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
        <i class="fa-solid fa-right-from-bracket"></i>
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

  <div class="row">
    <div class="col-lg-8" style="    margin-left: 10%;">
      <div class="card">
        <div class="card-title">
          <h1>Add New Job </h1>
        </div>
        <div class="card-body">
          <div class="input-states">
            <!-- <form class="form-horizontal" method="POST" id="submitBrandForm" action="php_action/createBrand.php" enctype="multipart/form-data"> -->
            <form class="from-horizontal" action="./php_action/submit-new-job.php" method="post" enctype="multipart/form-data">

              <input type="hidden" name="currnt_date" class="form-control">

              <div class="form-group">
                <div class="row">
                  <label class="col-sm-3 control-label">Select From City</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="brandStatus" name="FromCityId">
                      <option>~~SELECT CITY~~</option>
                      <option value="1">Jamnagar</option>
                      <option value="2">Rajkot</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-sm-3 control-label">From Address</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="From Address" name="FromAddress" required="" />
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-sm-3 control-label">Select To City</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="ToCityId">
                      <option>~~SELECT CITY~~</option>
                      <option value="1">Jamnagar</option>
                      <option value="2">Rajkot</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-sm-3 control-label">To Address</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="To Address" name="ToAddress" required="" />
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Description About ..." name="Description" required="" />
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-sm-3 control-label">Upload Image</label>
                  <div class="col-sm-9">

                    <!-- <form method="post" enctype="multipart/form-data"> -->
                      <input type="file" name="image"  required=""  />
                      <!-- <button class="btn btn-secondary" type="submit">Upload</button> -->
                    <!-- </form> -->
                  </div>
                </div>
              </div>
              <button type="submit" name="create" id="createBrandBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- ====================-->
</section>

<?php
include('./includes/script.php');
include('./includes/footer.php');
?>