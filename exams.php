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
        <div id="app-project" class="view-wrapper is-webapp" data-page-title="Examination Calendar" data-naver-offset="214" data-menu-item="#layouts-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative tabs-wrapper is-slider is-squared is-inverted">

                    <div class=" page-title has-text-centered is-webapp">

                        <div class="title-wrap">
                            <h1 class="title is-4">Examination Calendar</h1>
                        </div>

                        <div class="toolbar ml-auto">

                        </div>
                    </div>

                    <div class="list-flex-toolbar is-reversed flex-list-v2">
                        <div class="control has-icon">
                            <input class="input custom-text-filter" placeholder="Search Module..." data-filter-target=".flex-table-item">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>

                        <div class="tabs-inner">
                            <div class="tabs">
                                <ul>
                                    <li data-tab="active-items-tab" class="is-active"><a><span>Pending</span></a></li>
                                    <li data-tab="inactive-items-tab"><a><span>Done</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-inner">

                        <div class="flex-list-wrapper flex-list-v2">

                            <!--List Empty Search Placeholder -->
                            <div class="page-placeholder custom-text-filter-placeholder is-hidden">
                                <div class="placeholder-content">
                                    <img class="light-image" src="assets/img/illustrations/placeholders/search-4.svg" alt="">
                                    <h3>We couldn't find any matching modules.</h3>
                                    <p class="is-larger">
                                        Ok its either the examination timetable for this Semester has not been activated yet, or the module you are looking for is not available
                                    </p>
                                </div>
                            </div>
                            
                            <!--Active Tab-->
                            <div id="active-items-tab" class="tab-content is-active">

                                <div class="flex-table">

                                    <!--Table header-->
                                    <div class="flex-table-header" data-filter-hide="">
                                        <span class="is-grow-lg">Module</span>
                                        <span>Date</span>
                                        <span>Time</span>
                                        <span>Venue</span>
                                       
                                    </div>

                                    <div class="flex-list-inner">
                                        <?php
                                        $find_your_exams = $connect->prepare("SELECT * FROM calendar WHERE semester=? AND module IN (SELECT module FROM registration WHERE sem_code=? AND reg_number=?) AND module NOT IN (SELECT module FROM exam_attendance WHERE semester=?)");
                                        $find_your_exams->execute([$sem_code,$sem_code,$user,$sem_code]);
                                        while($row=$find_your_exams->fetch(PDO::FETCH_ASSOC)){
                                            $module = $row["module"];
                                            $exam_time = $row["exam_time"];
                                            $exam_date = $row["exam_date"];
                                            $venue = $row["venue"];
                                            
                                            $find_module = $connect->prepare("SELECT * FROM modules WHERE module_code=?");
                                            $find_module->execute([$module]);
                                            while($row=$find_module->fetch(PDO::FETCH_ASSOC)){
                                                $module_name = $row["module_name"];
                                            }
                                    
                                        ?>
                                        <!--Table Module item-->
                                        <div class="flex-table-item">
                                            <div class="flex-table-cell is-media is-grow-lg">
                                                <img class="media" src="images/hit_exam.png" alt="">
                                                <div>
                                                    <span class="item-name dark-inverted" data-filter-match=""><?php echo $module_name;?></span>
                                                    <div class="item-meta">
                                                        <div class="flex-media">
                                                            <div class="meta">
                                                                <span data-filter-match=""><?php echo $module;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-table-cell" data-th="Date">
                                                <span class="light-text" data-filter-match=""><?php echo date("d  M  Y", strtotime($exam_date));?></span>
                                            </div>
                                            <div class="flex-table-cell" data-th="Time">
                                                <i class="lnil lnil-alarm-clock-alt cell-icon is-pushed-mobile"></i>
                                                <span class="light-text no-push" data-filter-match=""><?php echo $exam_time;?></span>
                                            </div>

                                            <div class="flex-table-cell cell-end" data-th="Venue">
                                                <button class="button h-button dark-outlined is-pushed-mobile"><?php echo $venue;?></button>
                                            </div>
                                        </div>
                                        <!--Table Module End Item-->
                                        <?php
                                        }
                                        ?>
                                    </div>

                                </div>

                                <!--Infinite Loader-->
                                <div class="infinite-scroll-loader" data-filter-hide="">
                                    <div class="infinite-scroll-loader-inner">
                                        <div class="loader is-loading"></div>
                                        <div class="loader-end is-hidden">
                                            <span>No more items to load</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--Active Tab-->
                            <div id="inactive-items-tab" class="tab-content">

                                <div class="flex-table">

                                    <!--Table header-->
                                    <div class="flex-table-header" data-filter-hide="">
                                        <span class="is-grow-lg">Module</span>
                                        <span>Date</span>
                                        <span>Time</span>
                                        <span>Venue</span>
                                       
                                    </div>

                                    <div class="flex-list-inner">

                                        <?php
                                        $find_your_exams = $connect->prepare("SELECT * FROM calendar WHERE semester=? AND module IN (SELECT module FROM registration WHERE sem_code=? AND reg_number=?) AND module IN (SELECT module FROM exam_attendance WHERE semester=? AND reg_number=?)");
                                        $find_your_exams->execute([$sem_code,$sem_code,$user,$sem_code,$user]);
                                        while($row=$find_your_exams->fetch(PDO::FETCH_ASSOC)){
                                            $module = $row["module"];
                                            $exam_time = $row["exam_time"];
                                            $exam_date = $row["exam_date"];
                                            $venue = $row["venue"];
                                            
                                            $find_module = $connect->prepare("SELECT * FROM modules WHERE module_code=?");
                                            $find_module->execute([$module]);
                                            while($row=$find_module->fetch(PDO::FETCH_ASSOC)){
                                                $module_name = $row["module_name"];
                                            }
                                    
                                        ?>
                                        <!--Table Module item-->
                                        <div class="flex-table-item">
                                            <div class="flex-table-cell is-media is-grow-lg">
                                                <img class="media" src="images/hit_exam.png" alt="">
                                                <div>
                                                    <span class="item-name dark-inverted" data-filter-match=""><?php echo $module_name;?></span>
                                                    <div class="item-meta">
                                                        <div class="flex-media">
                                                            <div class="meta">
                                                                <span data-filter-match=""><?php echo $module;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-table-cell" data-th="Date">
                                                <span class="light-text" data-filter-match=""><?php echo date("d  M  Y", strtotime($exam_date));?></span>
                                            </div>
                                            <div class="flex-table-cell" data-th="Time">
                                                <i class="lnil lnil-alarm-clock-alt cell-icon is-pushed-mobile"></i>
                                                <span class="light-text no-push" data-filter-match=""><?php echo $exam_time;?></span>
                                            </div>

                                            <div class="flex-table-cell cell-end" data-th="Venue">
                                                <button class="button h-button dark-outlined is-pushed-mobile"><?php echo $venue;?></button>
                                            </div>
                                        </div>
                                        <!--Table Module End Item-->
                                        <?php
                                        }
                                        ?>
                                    </div>

                                </div>

                               
                                <div class="infinite-scroll-loader" data-filter-hide="">
                                    <div class="infinite-scroll-loader-inner">
                                        <div class="loader is-loading"></div>
                                        <div class="loader-end is-hidden">
                                            <span>No more items to load</span>
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
        <script src="assets/js/flex-list.js"></script>
        <script src="assets/js/syntax.js"></script>
    </div>
</body>

</html>