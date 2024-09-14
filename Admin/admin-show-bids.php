<?php

session_start();
if (!isset($_SESSION['UserId'])) {
    header('Location: ./login.php');
    exit();
}
$connection = mysqli_connect('localhost', 'root', '', 'moveit');

$sql = "SELECT * FROM bids";
$result = $connection->query($sql);

include('./includes/header.php');

?>
<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo_name">Move-It</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="./admin-dashboard.php" class="link-Dashboard" id="link-dashboard">
                <i class="fa-sharp fa-solid fa-user-tie"></i>
                <span class="link_name">Manage Users</span>
            </a>
        </li>
        <li>
            <a href="./admin-show-job.php" class="link-Myjob" id="link-my-jobs">
                <i class="fa-solid fa-briefcase"></i>
                <span class="link_name">Jobs</span>
            </a>
        </li>
        <li>
            <a href="./admin-show-bids.php" class="link-Myjob" id="link-my-jobs">
                <i class="fa-solid fa-money-bills"></i>
                <span class="link_name">Bids</span>
            </a>
        </li>
        <li>
            <a href="../logout.php">
                <i class="fa-solid fa-outdent"></i>
                <span class="link_name">Log Out</span>
            </a>
        </li>
    </ul>
</div>
<section class="home-section">
    <div class="home-content" style="background-color: white;">
        <i class="fa-sharp fa-solid fa-bars"></i>
        <span class="text">Admin Dashboard</span>
    </div>
    <div>
        <h1>admin-show-bids</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>UserId</th>
                            <th>JobId</th>
                            <th>Amount</th>
                            <th>IsAccepted</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($result as $r) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $r['Id'] ?></td>
                                <td><?= $r['UserId'] ?></td>
                                <td><?= $r['JobId'] ?></td>
                                <td><?= $r['Amount'] ?></td>
                                <td><?= $r['IsAccepted'] ?></td>
                                <td><?= $r['Description'] ?></td>
                            </tr>
                        </tbody>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

</section>

<?php
include('./includes/footer.php');

?>