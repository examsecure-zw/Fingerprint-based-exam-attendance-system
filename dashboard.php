<?php
include("includes/db.php");
include("includes/account_details.php");
include("includes/session_check.php");
if(!isset($_COOKIE["student"])){
    header("location:index");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("includes/meta.php");
    ?>
    <link rel="icon" type="image/png" href="images/favicon.svg">


    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/main.css">


    <link href="css2.css?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">

</head>

<body>
    <div id="huro-app" class="app-wrapper">

        <div class="app-overlay"></div>


        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <?php
        include("includes/nav.php");
        ?>
        <!-- Content Wrapper -->
        <div class="view-wrapper is-webapp" data-page-title="HIT Exams Portal" data-naver-offset="150" data-menu-item="#dashboards-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered is-webapp">

                        <center>
                            <div class="title-wrap">
                                <center>
                                    <h1 class="title is-4">HIT Exams Portal</h1>
                                </center>
                            </div>
                        </center>
                    </div>

                    <div class="page-content-inner">

                        <div class="lifestyle-dashboard lifestyle-dashboard-v3">

                            <div class="illustration-header">
                                <div class="header-image">
                                    <img src="images/dashboard.png" alt="">
                                </div>
                                <div class="header-meta">
                                    <h3>Welcome back <?php echo $name." ".$surname;?></h3>
                                    <p>Get access to all your Examination details including your examination timetable</p>
                                    <div class="summary-stats">
                                        <div class="summary-stat">
                                            <span>Current Program</span>
                                            <span><?php echo $program;?></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="columns is-multiline card-grid card-grid-v3">

                                <div class="column is-12">

                                    <div class="columns is-multiline">

                                        <div class="column is-3">
                                            <a href="registration">
                                                <div class="widget illustration-widget illustration-widget-v1">
                                                    <div class="img-container">
                                                        <img class="main" src="images/registration.svg" alt="">
                                                        <img class="badge badge-1" src="images/2.svg" alt="">
                                                        <img class="badge badge-2" src="images/3.svg" alt="">
                                                    </div>
                                                    <h3>Module Registration</h3>
                                                    <br>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="column is-3">
                                            <a href="exams">
                                                <div class="widget illustration-widget illustration-widget-v1">
                                                    <div class="img-container">
                                                        <img class="main" src="images/exams.svg" alt="">
                                                        <img class="badge badge-1" src="images/2.svg" alt="">
                                                        <img class="badge badge-2" src="images/3.svg" alt="">
                                                    </div>
                                                    <h3>Examination Calendar</h3>
                                                    <br>
                                                </div>
                                            </a>

                                        </div>
                                        <div class="column is-3">
                                            <a href="results">
                                                <div class="widget illustration-widget illustration-widget-v1">
                                                    <div class="img-container">
                                                        <img class="main" src="images/results.svg" alt="">
                                                        <img class="badge badge-1" src="images/2.svg" alt="">
                                                        <img class="badge badge-2" src="images/3.svg" alt="">
                                                    </div>
                                                    <h3>Results Transcipt</h3>
                                                    <br>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="column is-3">
                                            <a href="notifications">
                                                <div class="widget illustration-widget illustration-widget-v1">
                                                    <div class="img-container">
                                                        <img class="main" src="images/announcement.svg" alt="">
                                                        <img class="badge badge-1" src="images/2.svg" alt="">
                                                        <img class="badge badge-2" src="images/3.svg" alt="">
                                                    </div>
                                                    <h3>Important Notifications</h3>
                                                    <br>
                                                </div>
                                            </a>
                                        </div>


                                    </div>
                                </div>

                            </div>



                        </div>

                    </div>

                </div>
            </div>
        </div>
        <script src="assets/js/app.js"></script>
        <script src="assets/js/functions.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/components.js"></script>
        <script src="assets/js/popover.js"></script>
        <script src="assets/js/widgets.js"></script>
        <script src="assets/js/touch.js"></script>
        <script src="assets/js/lifestyle-3.js"></script>
        <script src="assets/js/syntax.js"></script>
    </div>
</body>

</html>