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
        <div id="grid-cards" class="view-wrapper is-webapp" data-page-title="Registered Modules" data-naver-offset="214" data-menu-item="#layouts-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered is-webapp">

                        <div class="title-wrap">
                            <h1 class="title is-4">Registration</h1>
                        </div>

                        <div class="toolbar ml-auto">

        
                        </div>
                    </div>

                    <div class="tile-grid-toolbar">
                        <div class="control has-icon">
                            <input class="input custom-text-filter" placeholder="Search..." data-filter-target=".column">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>

                        <div class="buttons">
                            
                            <button class="button h-button is-primary is-raised">
                                <span class="icon">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                <span>Request Module</span>
                            </button>
                        </div>
                    </div>

                    <div class="page-content-inner is-webapp">

                        <div class="tile-grid tile-grid-v1">

                            <!--List Empty Search Placeholder -->
                            <div class="page-placeholder custom-text-filter-placeholder is-hidden">
                                <div class="placeholder-content">
                                  
                                    <h3>We couldn't find any matching results.</h3>
                                    <p class="is-larger">We could not find te module you are looking for, we are very sorry.</p>
                                </div>
                            </div>

                            <!--Tile Grid v1-->
                            <div class="columns is-multiline">
                                <?php
                                $find_my_modules = $connect->prepare("SELECT * FROM modules WHERE module_code IN (SELECT module FROM registration WHERE sem_code=? AND reg_number=?) ORDER By module_name ASC");
                                $find_my_modules->execute([$sem_code,$user]);
                                while($row=$find_my_modules->fetch(PDO::FETCH_ASSOC)){
                                    $module_name = $row["module_name"];
                                    $module_code = $row["module_code"];
                                
                                ?>
                                <!--Module Start-->
                                <div class="column is-4">
                                    <div class="tile-grid-item">
                                        <div class="tile-grid-item-inner">
                                            <div class="h-avatar is-medium">
                                                <img class="avatar" src="images/hit_exam.png" alt="" data-user-popover="25">
                                            </div>
                                            <div class="meta">
                                                <span class="dark-inverted"><?php echo $module_name;?></span>
                                                <span><?php echo $module_code;?></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--Module End-->
                                <?php
                                }
                                ?>
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
        <script src="assets/js/tile-grid.js"></script>







        <script src="assets/js/syntax.js"></script>
    </div>
</body>

</html>