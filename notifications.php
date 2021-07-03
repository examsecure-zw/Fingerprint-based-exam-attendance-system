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

        <!-- Pageloader -->
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
       <?php
        include("includes/nav.php");
        ?>
        <!-- Content Wrapper -->
        <div id="app-apex-charts" class="view-wrapper is-webapp" data-page-title="HIT Notifications" data-naver-offset="150" data-menu-item="#dashboards-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered is-webapp">

                        <div class="title-wrap">
                            <h1 class="title is-4">HIT Notifications</h1>
                        </div>

                    </div>

                    <div class="page-content-inner">

                        <!--Food Delivery Dashboard-->
                        <div class="food-delivery-dashboard">
                            <?php
                            $find_notifications = $connect->prepare("SELECT * FROM notifcations ORDER BY date DESC LIMIT 10");
                            $find_notifications->execute();
                            while($row=$find_notifications->fetch(PDO::FETCH_ASSOC)){
                                $notification = $row["notification"];
                            
                            ?>
                            <!--Notification Start-->
                            <div class="left">
                                <div class="left-header">
                                    <div class="header-image">
                                        <br><br><br>
                                        <center><b>HIT Notifcation</b></center>
                                    </div>
                                    <div class="header-meta">
                                        <h3>Admin Notificaction 🎉</h3>
                                        <p><?php echo htmlspecialchars($notification);?></p>
                                        
                                    </div>
                                </div>
                                <br>
                                <!--Notification End-->
                                <?php
                                 }
                                ?>
                            
                            </div>

                            <div class="right fixed-parent">
                                <div class="sticky-panel fixed-child">
                                    <div class="widget icon-toolbar-widget">
                                        <div class="icon-toolbar">
                                            <div class="toolbar-icon">
                                                <a class="inner-icon is-active" data-section="activity-section">
                                                    <i data-feather="activity"></i>
                                                </a>
                                            </div>
                                            
                                            <div class="toolbar-icon">
                                                <a class="inner-icon" data-section="settings-section">
                                                    <i data-feather="settings"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="activity-section" class="side-section is-active">
                                        <div class="widget icon-list-widget">
                                            <div class="widget-toolbar">
                                                <div class="left">
                                                    <h3 class="is-bigger">HIT Examinations</h3>
                                                </div>
                                                
                                            </div>
                                            <div class="icon-list">
                                                
                                                <a href="dashboard" class="icon-list-item">
                                                    <div class="icon-wrap">
                                                        <i data-feather="home"></i>
                                                    </div>
                                                    <div class="item-meta">
                                                        <span>Dashboard</span>
                                                    </div>
                                                </a>
                                                 <a href="registration" class="icon-list-item">
                                                    <div class="icon-wrap">
                                                        <i data-feather="grid"></i>
                                                    </div>
                                                    <div class="item-meta">
                                                        <span>Registration</span>
                                                    </div>
                                                </a>
                                                <a href="exams" class="icon-list-item">
                                                    <div class="icon-wrap">
                                                        <i data-feather="calendar"></i>
                                                    </div>
                                                    <div class="item-meta">
                                                        <span>Exams Calendar</span>
                                                    </div>
                                                </a>
                                                <a href="results" class="icon-list-item">
                                                    <div class="icon-wrap">
                                                        <i data-feather="book"></i>
                                                    </div>
                                                    <div class="item-meta">
                                                        <span>Results Profile</span>
                                                    </div>
                                                </a>
                                        
                                                
                                            </div>
                                        </div>

                                       
                                    </div>

    
                                    <div id="settings-section" class="side-section">
                                        <div class="widget icon-list-widget">
                                            <div class="widget-toolbar">
                                                <div class="left">
                                                    <h3 class="is-bigger">Settings</h3>
                                                </div>
                                                
                                            </div>
                                            <div class="icon-list">
                                                <a href="profile" class="icon-list-item">
                                                    <div class="icon-wrap">
                                                        <i data-feather="user"></i>
                                                    </div>
                                                    <div class="item-meta">
                                                        <span>Profile Settings</span>
                                                    </div>
                                                </a>
                                                <a href="settings" class="icon-list-item">
                                                    <div class="icon-wrap">
                                                        <i data-feather="settings"></i>
                                                    </div>
                                                    <div class="item-meta">
                                                        <span>Account Settings</span>
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

        </div>
        <script src="assets/js/app.js"></script>
        <script src="assets/js/functions.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/components.js"></script>
        <script src="assets/js/popover.js"></script>
        <script src="assets/js/widgets.js"></script>
        <script src="assets/js/touch.js"></script>
        <script src="assets/js/apps-1.js"></script>
        <script src="assets/js/syntax.js"></script>
    </div>
</body>

</html>