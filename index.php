<?php
include("includes/header.php")
// include("includes/header%20copy.php");
// include("includes/header%20copy2.php");
?>
<!---------------------- navbar------------------------->
<div class="bgimg">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- for fix navbar in top use :-> fixed-top -->
        <div class="container-fluid">
            <a href="" class="navbar-brand text-warning font-weight-bold">MoveIt</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsenavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="collapsenavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a href="#services" class="nav-link text-white">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link text-white">CONTACT</a>
                    </li>
                </ul>
            </div>

            <!-- <div class="row"> -->

            <!-- </div> -->

        </div>

    </nav>
    <!--------------------img-content------------------------------->
    <div class="container text-center text-white hearderset">
        <h1>#1 INDIAN WEBSITE FOR LISTING LOCAL TRANSPORTERS</h1>
        <p>Get in touch with the best transporters with the best bid price,<br>
            Aimed at making any realocation procedure a hassel free and secure.</p>
        <form action="login.php" method="post">
            <button class="btn btn-warning text-white btn-lg">LOGIN</button>
        </form>
    </div>

</div>
<!---------------------------services----------------------------->
<div class="container text-center ourservices" id="services">
    <div class="row">
        <div class="col">
            <h1>SERVICES OF OUR TRANSPORTERS</h1>
            <p>Guarantee of Safe and Secure services.</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row rowsetting text">
                <div class="col-lg-4 col-md-4 col-sm-4 col-10 d-block m-auto lis">
                    <div class="imgsetting d-block m-auto">
                        <img src="./assets/imgs/home-relocation-icon.jpg" alt="House services">
                    </div>
                    <h2>House Realocation</h2>
                    <p>Plan a hassle-free and safe household move anywhere in the gujarat with MoveIt.</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-10 d-block m-auto lis">
                    <div class="imgsetting d-block m-auto">
                        <img src="./assets/imgs/office-relocation-icon.jpg" alt="Office services">
                    </div>
                    <h2>Office Relocation</h2>
                    <p>Our MoveIt companies will safely pack and move your expensive office items within time.</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-10 d-block m-auto lis">
                    <div class="imgsetting d-block m-auto">
                        <img src="./assets/imgs/car-transport-icon.jpg" alt="Car Transport">
                    </div>
                    <h2>Car Transport</h2>
                    <p>Safely relocate your four-wheeler in specialized car carriers of our transporter.</p>
                </div>
            </div>
            <div class="row rowsetting2 text">
                <div class="col-lg-4 col-md-4 col-sm-4 col-10 d-block m-auto lis">
                    <div class="imgsetting d-block m-auto">
                        <img src="./assets/imgs/bike-transport-icon.jpg" alt="Bike Transport">
                    </div>
                    <h2>Bike Transport</h2>
                    <p>Let our reliable transporters handle your two-wheeler relocation in a hassle-free manner.</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-10 d-block m-auto lis">
                    <div class="imgsetting d-block m-auto">
                        <img src="./assets/imgs/warehousing-services-icon.jpg" alt="Warhousing Services">
                    </div>
                    <h2>Warhousing Services</h2>
                    <p>Our top MoveIt transporters team offer safe warehousing services to store your goods with
                        insurance cover.</p>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------how it WORKS?------------------------- -->
    <div class="row howworks">
        <div class="col">
            <h1>HOW IT WORKS?</h1>
            <p>The working structure for user and transporter is different.</p>
        </div>
        <div class="row m-auto ">
            <div class="col text-left text-center userwork">
                <h3>Users</h3>
                <ul>
                    <li>
                        This website is designed to save the time and money of users with minimum efforts.
                    </li>
                    <li>
                        The user will firstly register or login.
                    </li>
                    <li>
                       User will have to add new job by giving his details.  
                    </li>
                    <li>
                        Then after he will wait for transporters to bid his job.Once the trasporters had started biding job,the user may accept bid for any one transporter.
                    </li>
                    <li>
                       After accepting bid from transporter the user can either complete or cancel the job.
                    </li>
                    <li>
                        The user can contact the transporter after completing job and can complete further procedures in person.
                    </li>

                </ul>
            </div>

            <div class="col text-right text-center transpwork">
                <h3>Transporters</h3>
                <ul>
                    <li>
                        With this website all the details of user's goods will be reached to transporter.
                    </li>
                    <li>
                        The transporters had to bid the jobs of user by giving bid price and description.
                    </li>
                    <li>
                       If the user has accepted transporter's bid,it will be showed in accepted bids.
                    </li>
                    <li>
                        Once the user complete the job,user will contact transporter.From then they can be able to do further processes in person or in call.
                    </li>
                    <li>
                        This website is best for transporters who want to expand their business. 
                    </li>
                </ul>
            </div>



        </div>
    </div>
    <div class="row footer">
        <div class="col">
            <footer class="text-center text-lg-start bg-dark text-light footer">
                <section class="">
                    <div class="container text-center text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row mt-3">
                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-12">
                                <!-- Content -->
                                <h6 class="text-uppercase fw-bold mb-4 text-warning">
                                    <i class="fas fa-gem me-3"></i>MoveIt
                                </h6>
                                <p>
                                    A website which will save your time and money.

                                </p>
                            </div>

                            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-12">
                                <!-- Links -->
                                <h6 class="text-warning text-uppercase fw-bold mb-4">
                                    Useful links
                                </h6>
                                <p>
                                    <a href="login.php" class="text-reset">Login</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Register</a>
                                </p>
                                <p>
                                    <a href="index.php" class="text-reset">Home</a>
                                </p>

                            </div>

                            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-md-0 mb-12">
                                <!-- Links -->
                                <h6 class="text-warning text-uppercase fw-bold mb-4 " id="contact">
                                    Contact
                                </h6>
                                <p><i class="fas"></i> Jamnagar,Gujarat</p>
                                <p>
                                    <i class="fas fa-envelope me-3"></i>
                                    info@example.com
                                </p>
                                <p><i class="fas "></i> +9156785678</p>
                                <p><i class="fas "></i> +9145678456</p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </section>

                <!-- Copyright -->
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                    © 2021 Copyright:
                    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                </div>
                <!-- Copyright -->

            </footer>
        </div>
    </div>
</div>

<?php

include("./includes/script.php");

include("./includes/footer.php");

?>