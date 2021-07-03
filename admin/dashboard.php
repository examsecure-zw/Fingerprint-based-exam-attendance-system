<?php
include("../includes/db.php");
include("includes/account_details.php");
include("includes/session_check.php");
if(!isset($_COOKIE["admin"])){
    header("location:index");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("../includes/meta.php");
    ?>
    <link rel="icon" type="image/png" href="../images/favicon.svg">


    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="stylesheet" href="../assets/css/main.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
                                    <img src="../images/dashboard.png" alt="">
                                </div>
                                <div class="header-meta">
                                    <h3>Good <span class="day-message"></span> Administrator<?php echo " ".$surname;?></h3>
                                    
                                    <p>
                                        Manage all the examination records and enrollment records for all the students at HIT
                                    </p>
                                </div>
                            </div>
                            
                            <div class="columns is-multiline tile-grid tile-grid-v2">
                           <div class="column is-12">
                                <div class="columns is-multiline">

                                <!--Grid item-->
                                <div class="column is-4">
                                    <div class="tile-grid-item">
                                        <div class="tile-grid-item-inner">
                                            <img src="../images/dashboard.png" alt="">
                                            <div class="meta">
                                                <span class="dark-inverted">Students</span>
                                                <?php
                                                $find_all_students = $connect->prepare("SELECT * FROM students");
                                                $find_all_students->execute();
                                                $count_all_students = $find_all_students->rowCount();
                                                ?>
                                                <span>
                                                        <span><?php echo $count_all_students;?> Students</span>
                                                </span>
                                            </div>
                                            <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                                <div class="is-trigger" aria-haspopup="true">
                                                    <i data-feather="more-vertical"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Grid item-->
                                <div class="column is-4">
                                    <div class="tile-grid-item">
                                        <div class="tile-grid-item-inner">
                                            <img src="../images/dashboard.png" alt="">
                                            <div class="meta">
                                                <span class="dark-inverted">Subjects / Modules</span>
                                                <?php
                                                $find_all_modules = $connect->prepare("SELECT * FROM modules");
                                                $find_all_modules->execute();
                                                $count_all_modules = $find_all_modules->rowCount();
                                                ?>
                                                <span>
                                                        <span><?php echo $count_all_modules;?> Modules</span>
                                                </span>
                                            </div>
                                            <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                                <div class="is-trigger" aria-haspopup="true">
                                                    <i data-feather="more-vertical"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Grid item-->
                                <div class="column is-4">
                                    <div class="tile-grid-item">
                                        <div class="tile-grid-item-inner">
                                            <img src="../images/dashboard.png" alt="">
                                            <div class="meta">
                                                <span class="dark-inverted">Registered Students</span>
                                                <?php
                                                $find_registered = $connect->prepare("SELECT DISTINCT reg_number FROM registration WHERE sem_code=?");
                                                $find_registered->execute([$sem_code]);
                                                $count_registered = $find_registered->rowCount();
                                                ?>
                                                <span>
                                                        <span><?php echo $count_registered;?> Students</span>
                                                </span>
                                            </div>
                                            <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                                <div class="is-trigger" aria-haspopup="true">
                                                    <i data-feather="more-vertical"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                               
                          

                               
                            </div>
                            </div>

                            </div>
                             <div class="columns is-multiline card-grid card-grid-v3">
                                

                                <div class="column is-12">

                                    <div class="columns is-multiline">

                                        <div class="column is-3">
                                            <a href="students">
                                                <div class="widget illustration-widget illustration-widget-v1">
                                                    <div class="img-container">
                                                        <img class="main" src="../images/registration.svg" alt="">
                                                        <img class="badge badge-1" src="../images/2.svg" alt="">
                                                        <img class="badge badge-2" src="../images/3.svg" alt="">
                                                    </div>
                                                    <h3>Manage Students</h3>
                                                    <br>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="column is-3">
                                            <a href="modules">
                                                <div class="widget illustration-widget illustration-widget-v1">
                                                    <div class="img-container">
                                                        <img class="main" src="../images/exams.svg" alt="">
                                                        <img class="badge badge-1" src="../images/2.svg" alt="">
                                                        <img class="badge badge-2" src="../images/3.svg" alt="">
                                                    </div>
                                                    <h3>Manage Courses/Modules</h3>
                                                    <br>
                                                </div>
                                            </a>

                                        </div>
                                        <div class="column is-3">
                                            <a href="exams">
                                                <div class="widget illustration-widget illustration-widget-v1">
                                                    <div class="img-container">
                                                        <img class="main" src="../images/results.svg" alt="">
                                                        <img class="badge badge-1" src="../images/2.svg" alt="">
                                                        <img class="badge badge-2" src="../images/3.svg" alt="">
                                                    </div>
                                                    <h3>Examination Calendar</h3>
                                                    <br>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="column is-3">
                                            <a href="notifications">
                                                <div class="widget illustration-widget illustration-widget-v1">
                                                    <div class="img-container">
                                                        <img class="main" src="../images/announcement.svg" alt="">
                                                        <img class="badge badge-1" src="../images/2.svg" alt="">
                                                        <img class="badge badge-2" src="../images/3.svg" alt="">
                                                    </div>
                                                    <h3>Send Important Notifications</h3>
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
        <script src="../assets/js/app.js"></script>
        <script src="../assets/js/functions.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="../assets/js/components.js"></script>
        <script src="../assets/js/popover.js"></script>
        <script src="../assets/js/widgets.js"></script>
        <script src="../assets/js/touch.js"></script>
        <script src="../assets/js/lifestyle-3.js"></script>
        <script src="../assets/js/syntax.js"></script>
        <script>
    $(document).ready(function() {
        function dateTime() {
            var format = "";
            var ndate = new Date();
            var hr = ndate.getHours();
            var h = hr % 12;

            if (hr < 12) {
                greet = 'Morning';
                format = 'AM';
            } else if (hr >= 12 && hr <= 17) {
                greet = 'Afternoon';
                format = 'PM';
            } else if (hr >= 17 && hr <= 24)
                greet = 'Evening';

            var m = ndate.getMinutes().toString();
            var s = ndate.getSeconds().toString();

            if (h < 12) {
                h = "0" + h;
                $(".day-message").html(greet);
            } else if (h < 18) {
                $(".day-message").html(greet);
            } else {
                $(".day-message").html(greet);
            }

            if (s < 10) {
                s = "0" + s;
            }

            if (m < 10) {
                m = "0" + m;
            }
            $('.date').html(h + ":" + m + ":" + s + format);
        }

        setInterval(dateTime, 1000);
    });
</script>
    </div>
</body>

</html>