<?php

session_start();
if (!isset($_SESSION['UserId'])) {
  header('Location: ./index.php');
  exit();
}
if ($_SESSION['UserType'] == 'User') {
  header('Location: ./user.php');
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
      <a href="./transporter-dashboard.php" class="link-Dashboard" id="link-dashboard">
      <i class="fa-solid fa-house"></i>
        <span class="link_name">Dashboard</span>
      </a>
    </li>
    <li>
      <a href="./transporter-job.php" class="link-Myjob" id="link-my-jobs">
      <i class="fa-brands fa-creative-commons-nd"></i>
        <span class="link_name">Bided Jobs</span>
      </a>
    </li>
    <li>
      <a href="transporter-completedjob.php" class="link-Completedjob" id="link-completed-job">
        <i class="fa-solid fa-check"></i>
        <span class="link_name">Completed Job</span>
      </a>
    </li>
    <li>
      <a href="transporter-canceledjob.php" class="link-Canceledjob" id="link-canceled-job">
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
<section class="home-section ">
  <div class="home-content" style="background-color: white;">
  <i class="fa-sharp fa-solid fa-bars"></i>
    <span class="text">Transporter Dashboard</span>
  </div>

  <div>
    <div>
      <h1>Selected Jobs</h1>

      <?php
      // $sql = "SELECT * FROM `bids` WHERE `UserId` = '$UserId' AND SELECT * FROM `Jobs` WHERE `Id` = '$JobId'";
      // $sql = "SELECT * FROM `jobs` INNER JOIN `bids` ON jobs.UserId = bids.UserId";
      // $sql = "SELECT * FROM bids INNER JOIN jobs ON jobs.Id = bids.JobId WHERE bids.UserId = '$UserId'";
      $sql = "SELECT * FROM bids INNER JOIN jobs ON jobs.Id = bids.JobId WHERE bids.UserId = '$UserId' AND IsAccepted != 'True'";

      $result = $connection->query($sql);
      $rows = $result->fetch_all(MYSQLI_NUM);
      ?>

      <div class="card">
        <div class="card-body">
          <div class="table-responsive m-t-40">
            <table style="text-align: center;" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>FromCity</th>
                  <th>FromAddress</th>
                  <th>ToCity</th>
                  <th>ToAddress</th>
                  <th>Description</th>
                  <th>Amount</th>
                  <th>Description</th>
                </tr>
              </thead>
              <?php
              foreach ($rows as $r) {
                // Id 	UserId 	JobId 	Amount 	IsAccepted 	Description 	Id 	UserId 	FromCityId 	FromAddress 	FromAddress 	ToAddress 	ImageName
                // 0 Id Of Job ,1 Id Of UserId ,2 Id of FromCityId ,3 From Address ,4 Id of ToCityId ,5 ToAddress ,6 ImageName ,7 Description ,
                // 8 Id Of Bids ,9 Id of UserId ,10 Id of JobId ,11 Amount ,12 IsAccepted ,13 Descroption 
                $sql = "SELECT Name FROM `cities` WHERE `Id` = '$r[8]'";
                $result = $connection->query($sql);
                $FromCity = $result->fetch_assoc()['Name'];

                $sql = "SELECT Name FROM `cities` WHERE `Id` = '$r[10]'";
                $result = $connection->query($sql);
                $ToCity = $result->fetch_assoc()['Name'];
              ?>
                <tbody>

                  <tr>
                    <td><img src="./assets/uploads/images/<?= $r['12'] ?>" style="max-width: 100px;"></td>
                    <td><?= $FromCity ?></td>
                    <td><?= $r[9] ?></td>
                    <td><?= $ToCity ?></td>
                    <td><?= $r[11] ?></td>
                    <td><?= $r[13] ?></td>
                    <td><?= $r[3] ?></td>
                    <td><?= $r[5] ?></td>
                  </tr>
                </tbody>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div>
      <h1>Accepted Bids</h1>

      <?php

      // $sql = "SELECT * FROM `bids` WHERE `UserId` = '$UserId' AND SELECT * FROM `Jobs` WHERE `Id` = '$JobId'";
      // $sql = "SELECT * FROM `jobs` INNER JOIN `bids` ON jobs.UserId = bids.UserId WHERE `IsAccepted` = 'True'";
      $sql = "SELECT * FROM bids INNER JOIN jobs ON jobs.Id = bids.JobId WHERE bids.UserId = '$UserId' AND IsAccepted = 'True'";
      // Id 	UserId 	JobId 	Amount 	IsAccepted 	Description 	Id 	UserId 	FromCityId 	FromAddress 	ToCityId 	ToAddress 	ImageName


      $result = $connection->query($sql);
      $rows = $result->fetch_all(MYSQLI_NUM);
      ?>

      <div class="card">
        <div class="card-body">
          <div class="table-responsive m-t-40">
            <table style="text-align: center;" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>FromCity</th>
                  <th>FromAddress</th>
                  <th>ToCity</th>
                  <th>ToAddress</th>
                  <th>Description</th>
                  <th>Amount</th>
                  <th>Description</th>
                </tr>
              </thead>
              <?php
              foreach ($rows as $r) {
                // Id 	UserId 	JobId 	Amount 	IsAccepted 	Description 	Id 	UserId 	FromCityId 	FromAddress 	ToCityId 	ToAddress 	ImageName
                // 0 Id Of Job ,1 Id Of UserId ,2 Id of FromCityId ,3 From Address ,4 Id of ToCityId ,5 ToAddress ,6 ImageName ,7 Description ,
                // 8 Id Of Bids ,9 Id of UserId ,10 Id of JobId ,11 Amount ,12 IsAccepted ,13 Descroption 
                $sql = "SELECT Name FROM `cities` WHERE `Id` = '$r[8]'";
                $result = $connection->query($sql);
                $FromCity = $result->fetch_assoc()['Name'];

                $sql = "SELECT Name FROM `cities` WHERE `Id` = '$r[10]'";
                $result = $connection->query($sql);
                $ToCity = $result->fetch_assoc()['Name'];
              ?>
                <tbody>
                  <tr>
                    <td><img src="./assets/uploads/images/<?= $r['12'] ?>" style="max-width: 100px;"></td>
                    <td><?= $FromCity ?></td>
                    <td><?= $r[9] ?></td>
                    <td><?= $ToCity ?></td>
                    <td><?= $r[11] ?></td>
                    <td><?= $r[13] ?></td>
                    <td><?= $r[3] ?></td>
                    <td><?= $r[5] ?></td>
                  </tr>
                </tbody>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php
include("./includes/script.php");

include("./includes/footer.php");

?>