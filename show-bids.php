<?php
include("php_action\db_connect.php");

session_start();
if (!isset($_SESSION['UserId']) || $_SESSION['UserType'] != 'User') {
  header('Location: login.php');
  exit();
}
$JobId = $_REQUEST['JobId'];
$UserId = $_SESSION['UserId'];
$sql = "SELECT * FROM `bids`, `profiles` WHERE bids.`JobId` = '$JobId' AND `profiles`.`UserId` = `bids`.`UserId`";
$result = $connection->query($sql);
$rows = $result->fetch_all(MYSQLI_NUM);
$query = "SELECT * FROM `jobs` WHERE `Id` = '$JobId'";
$result2 = $connection->query($query);
$rows2 = $result2->fetch_all(MYSQLI_NUM);
// $r = 0->Id 	1->UserId 	2->JobId 	3->Amount 	4->IsAccepted 	5->Description 	6->Id 	7->UserId 	8->FullName 	9->Address 	10->MobileNumber 
//  $r2 = 0->Id 	1->UserId 	2->FromCityId 	3->FromAddress 	4->ToCityId 	5->ToAddress 	6->ImageName 	7->Description 	8->IsCanceled 	9->IsCompleted 	 

include("includes/header.php");
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

  <div class="card">
    <div class="card-body">
      <div class="table-responsive m-t-40">
        <table style="text-align: center;" id="myTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <td>Image</td>
              <td>Description</td>
              <td>FromCity</td>
              <td>FromAddress</td>
              <td>ToCity</td>
              <td>ToAddress</td>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($rows2 as $r2) {
              $sql = "SELECT Name FROM `cities` WHERE `Id` = '$r2[2]'";
              $result = $connection->query($sql);
              $FromCity = $result->fetch_assoc()['Name'];

              $sql = "SELECT Name FROM `cities` WHERE `Id` = '$r2[4]'";
              $result = $connection->query($sql);
              $ToCity = $result->fetch_assoc()['Name'];
            ?>
              <tr>
              <td><img src="./assets/uploads/images/<?= $r2['6'] ?>" style="max-width: 100px;"></td>
                <td><?= $r2['7'] ?></td>
                <td><?= $FromCity ?></td>
                <td><?= $r2['3'] ?></td>
                <td><?= $ToCity ?></td>
                <td><?= $r2['5'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive m-t-40">
        <table style="text-align: center;" id="myTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <!-- Id UserId Ascending 1 JobId Amount IsAccepted Description -->
              <!-- <th>#</th> -->
              <th colspan="3">transporter Details </th>
              <th>Amount</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($rows as $r) {
              // $r = 0->Id 	1->UserId 	2->JobId 	3->Amount 	4->IsAccepted 	5->Description 	6->Id 	7->UserId 	8->FullName 	9->Address 	10->MobileNumber 
            ?>
              <tr>
                <td><?php echo $r[8] ?></td>
                <td><?php echo $r[9] ?></td>
                <td><?php echo $r[10] ?></td>
                <td><?php echo $r[3] ?></td>
                <td><?php echo $r[5] ?></td>
                <td><a class="btn btn-success" href="php_action/accept-bid.php?id=<?= $r['0'] ?>">Accept</a> </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>


<?php
include('./includes/script.php');
include('./includes/footer.php');
?>