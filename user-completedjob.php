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

  <div>
    <h5>completed Jobs</h5>
    <!-- ============completed jobs============ -->
    <?php
    $completedjobquery = "SELECT * FROM jobs WHERE userid = '$UserId' AND IsCompleted = '1' AND EXISTS (SELECT JobId FROM bids WHERE bids.JobId = jobs.Id AND IsAccepted = 'True');";
    $completedJobResult = $connection->query($completedjobquery);
    $completedjobrows = $completedJobResult->fetch_all(MYSQLI_NUM);
    ?>

    <div class="card">
      <div class="card-body">
        <div class="table-responsive m-t-40">
          <table style="text-align: center;" id="myTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Image</th>
                <th>FromCity</th>
                <th>FromAddress</th>
                <th>ToCity</th>
                <th>Toaddress</th>
                <th>Description</th>
                <th>Bid Amount</th>
                <th>Description By Transporter</th>
              </tr>
            </thead>
            <?php
            foreach ($completedjobrows as $r3) {
              // 0 Id Of Job ,1 Id Of UserId ,2 Id of FromCityId ,3 From Address ,4 Id of ToCityId ,5 ToAddress ,6 ImageName ,7 Description ,
              // 8 Id Of Bids ,9 Id of UserId ,10 Id of JobId ,11 Amount ,12 IsAccepted ,13 Descroption 
              $sql = "SELECT Name FROM `cities` WHERE `Id` = '$r3[2]'";
              $result = $connection->query($sql);
              $FromCity = $result->fetch_assoc()['Name'];

              $sql = "SELECT Name FROM `cities` WHERE `Id` = '$r3[4]'";
              $result = $connection->query($sql);
              $ToCity = $result->fetch_assoc()['Name'];

              $queryForBids = "SELECT * FROM bids WHERE jobid = '$r3[0]' AND isAccepted = 'True'";
              $BidsRecord = $connection->query($queryForBids);
              $rowsOfBids = $BidsRecord->fetch_all((MYSQLI_NUM));
            ?>
              <tbody>
                <tr>
                  <td><img src="./assets/uploads/images/<?= $r3['6'] ?>" style="max-width: 100px;"></td>
                  <td><?= $FromCity ?></td>
                  <td><?= $r3[3] ?></td>
                  <td><?= $ToCity ?></td>
                  <td><?= $r3[5] ?></td>
                  <td><?= $r3[7] ?></td>
                  <?php
                  foreach ($rowsOfBids as $b) {
                  ?>
                    <td><?= $b['3'] ?></td>
                    <td><?= $b['5'] ?></td>
                  <?php } ?>
                </tr>
              </tbody>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>

    <!-- ============completed jobs============ -->
  </div>
</section>

<?php
include('./includes/script.php');
include('./includes/footer.php');
?>