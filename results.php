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
        <div id="user-profile" class="view-wrapper is-webapp" data-page-title="Results Profile" data-naver-offset="214" data-menu-item="#layouts-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered is-webapp">

                        <div class="title-wrap">
                            <h1 class="title is-4">Results Profile</h1>
                        </div>

                        <div class="toolbar ml-auto">
                        </div>
                    </div>

                    <div class="page-content-inner">

                        <!--Profile Settings-->
                        <div class="profile-wrapper">
                            <div class="profile-header has-text-centered">
                                <div class="h-avatar is-xl">
                                
                                    <img class="avatar" src="images/<?php echo $avatar;?>" alt="Cyber the Great" data-user-popover="3">
                                   
                                </div>
                                <h3 class="title is-4 is-narrow"><?php echo $name." ".$surname;?></h3>
                                <p class="light-text">
                                    <?php echo $program;?>
                                </p>
                                
                            </div>
                            <br><br>
                             <div class="columns">
                            <div class="column is-12">

                                <div class="flex-table is-compact">

                                    <!--Table header-->
                                    <div class="flex-table-header">
                                        <span>Course/Module</span>
                                        <span>Name</span>
                                        <span>Result</span>
        
                                    </div>
                                     <div class="flex-table-item">
                                        <div class="flex-table-cell is-bold" data-th="">
                                            <span class="dark-text">Period: August 2019 - November 2019 Part 1 Semester 1</span>
                                           
                                        </div>
                                    </div>
                                    <!--Module Here-->
                                    <div class="flex-table-item">
                                        <div class="flex-table-cell is-bold" data-th="Course/Module">
                                            <span class="dark-text">HIT110</span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Name">
                                            <span class="light-text">Technopreneurship I</span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Result">
                                            <span class="light-text">2.1</span>
                                        </div>
                
                                    </div>
                                    <!--Module Here-->
                                    <div class="flex-table-item">
                                        <div class="flex-table-cell is-bold" data-th="Course/Module">
                                            <span class="dark-text">HIT110</span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Name">
                                            <span class="light-text">Technopreneurship I</span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Result">
                                            <span class="light-text">2.1</span>
                                        </div>
                
                                    </div>
                                    <!--Module Here-->
                                    <div class="flex-table-item">
                                        <div class="flex-table-cell is-bold" data-th="Course/Module">
                                            <span class="dark-text">HIT110</span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Name">
                                            <span class="light-text">Technopreneurship I</span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Result">
                                            <span class="light-text">2.1</span>
                                        </div>
                
                                    </div>
                                    <div class="flex-table-item">
                                        <div class="flex-table-cell is-bold" data-th="">
                                            <span class="dark-text">Period: February 2020 - June 2020 Part 1 Semester 2</span>
                                           
                                        </div>
                                    </div>
                                    <!--Module Here-->
                                    <div class="flex-table-item">
                                        <div class="flex-table-cell is-bold" data-th="Course/Module">
                                            <span class="dark-text">HIT110</span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Name">
                                            <span class="light-text">Technopreneurship I</span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Result">
                                            <span class="light-text">2.1</span>
                                        </div>
                
                                    </div>
                                    <!--Module Here-->
                                    <div class="flex-table-item">
                                        <div class="flex-table-cell is-bold" data-th="Course/Module">
                                            <span class="dark-text">HIT110</span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Name">
                                            <span class="light-text">Technopreneurship I</span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Result">
                                            <span class="light-text">2.1</span>
                                        </div>
                
                                    </div>
                                    <!--Module Here-->
                                    <div class="flex-table-item">
                                        <div class="flex-table-cell is-bold" data-th="Course/Module">
                                            <span class="dark-text">HIT110</span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Name">
                                            <span class="light-text">Technopreneurship I</span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Result">
                                            <span class="light-text">2.1</span>
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
        <script src="assets/js/syntax.js"></script>
    </div>
</body>

</html>