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
        <div id="app-lists" class="view-wrapper is-webapp" data-page-title="HIT Exams" data-naver-offset="214" data-menu-item="#layouts-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative tabs-wrapper is-slider is-squared is-inverted">

                    <div class="page-title has-text-centered is-webapp">

                        <div class="title-wrap">
                            <h1 class="title is-4">HIT Exams</h1>
                        </div>
                    </div>

                    <div class="list-view-toolbar is-reversed">
                        <div class="control has-icon">
                            <input class="input custom-text-filter" placeholder="Search Modules..." data-filter-target=".list-view-item">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>

                        <div class="tabs-inner">
                            <div class="tabs">
                                <ul>
                                    <li data-tab="active-items-tab" class="is-active"><a><span>Pending</span></a></li>
                                    <li data-tab="inactive-items-tab"><a><span>Allocated</span></a></li>
                                    <li class="tab-naver"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-inner">

                        <!--List-->
                        <div class="list-view list-view-v3">


                            <div class="page-placeholder custom-text-filter-placeholder is-hidden">
                                <div class="placeholder-content">

                                    <h3>We couldn't find any matching results.</h3>
                                    <p class="is-larger">
                                        We could not find any matching modules in the HIT records
                                    </p>
                                </div>
                            </div>

                            <!--Active Tab-->
                            <div id="active-items-tab" class="tab-content is-active">
                                <div class="list-view-inner">
                                    <?php
                                    $find_modules = $connect->prepare("SELECT * FROM modules WHERE module_code NOT IN (SELECT module FROM calendar WHERE semester=?) ORDER by module_name ASC ");
                                    $find_modules->execute([$sem_code]);
                                    while($row=$find_modules->fetch(PDO::FETCH_ASSOC)){
                                        $module_name = $row["module_name"];
                                        $module_code = $row["module_code"];
                                        $id = $row["id"];
                                        
                                    ?>
                                    <!--Module Start-->
                                    <div class="list-view-item">
                                        <div class="list-view-item-inner">
                                            <img class="avatar" src="../images/dashboard.png" alt="HIT subject">
                                            <div class="meta-left">
                                                <h3 data-filter-match=""><?php echo $module_name;?></h3>
                                                <span>
                                                    <i data-feather="book"></i>
                                                    <span data-filter-match=""><?php echo $module_code;?></span>
                                                </span>
                                            </div>
                                            <div class="meta-right">
                                                <div class="buttons">
                                                    <a class="button h-button is-primary is-outlined is-raised h-modal-trigger" data-modal="allocate_date_modal<?php echo $id;?>">Allocate Module</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Modals Start-->
                                    <div id="allocate_date_modal<?php echo $id;?>" class="modal h-modal is-large">
                                        <div class="modal-background h-modal-close"></div>
                                        <div class="modal-content">
                                            <div class="modal-card">
                                                <header class="modal-card-head">
                                                    <h3>Allocate Date for <?php echo $module_name." ".$module_code;?></h3><br>
                                                    <button class="h-modal-close ml-auto" aria-label="close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </header>
                                                <?php
                                                if(isset($_POST["add_to_calendar"])){
                                                    $message = "";
                                                    $alert = "";
                                                    $span = "";
                                                    
                                                    $module_date = $_POST["module_date"];
                                                    $module_time = $_POST["module_time"];
                                                    $module_venue = htmlspecialchars($_POST["module_venue"]);
                                                    $tino = $_POST["tino"];
                                                    
                                                    if($module_time == ""){
                                                        //Error
                                                        echo "<script type='text/javascript'>window.location.href='exams'</script>"; 
                                                    }else{
                                                        //Add to Database
                                                        $check_modules = $connect->prepare("SELECT * FROM calendar WHERE semester=? AND module=?");
                                                        $check_modules->execute([$sem_code,$tino]);
                                                        $count_modules = $check_modules->rowCount();
                                                        if($count_modules == 0){
                                                            //Add Module
                                                            $add_to_calendar_query = $connect->prepare("INSERT INTO calendar (module,exam_date,exam_time,semester,venue,date) VALUES (?,?,?,?,?,NOW())");
                                                            $add_to_calendar_query->execute([$tino,$module_date,$module_time,$sem_code,$module_venue]);
                                                            echo "<script type='text/javascript'>window.location.href='exams'</script>"; 
                                                        }else{
                                                            //Error
                                                            echo "<script type='text/javascript'>window.location.href='exams'</script>"; 
                                                        }
                                                        
                                                        
                                                    }
                                                    
                                                    try{
                                                        
                                                    }catch(PDOException $error){
                                                        $message = $error->getMessage();
                                                    }
                                                }
                                                ?>
                                             
                                                <form method="POST">
                                                    <div class="modal-card-body">
                                                        <div class="inner-content">
                                                            <div class="modal-form">
                                                                <div class="columns is-multiline">
                                                                    <div class="column is-12">
                                                                        
                                                                        <div class="field">
                                                                            <input hidden type="text" value="<?php echo $module_code;?>" name="tino">
                                                                            <label>Module Date*</label>
                                                                            <div class="control">
                                                                                <input id="deon-2" class="input" type="date" required name="module_date"> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="column is-12">
                                                                        <div class="field">
                                                                            <label>Module Time*</label>
                                                                            <div class="control">
                                                                                <select class="input" name="module_time" required>
                                                                                    <option value="">Choose Time</option>
                                                                                    <option value="morning">Morning 0900hrs</option>
                                                                                    <option value="afternoon">Afternoon 1400hrs</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="column is-12">
                                                                        <div class="field">
                                                                            <label>Module Venue</label>
                                                                            <div class="control">
                                                                                <input type="text" class="input" required name="module_venue" placeholder="Enter the module venue">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-card-foot is-end">
                                                        <a class="button h-button is-rounded h-modal-close">Cancel</a>
                                                        <button class="button h-button is-primary is-raised is-rounded" type="submit" name="add_to_calendar">Allocate Module</button> 
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Modals End-->
                                    <!--End Module-->
                                    <?php
                                    }
                                    ?>



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

                            <!--Inactive Tab-->
                            <div id="inactive-items-tab" class="tab-content">
                                <div class="list-view-inner">
                                    <?php
                                    $find_modules = $connect->prepare("SELECT * FROM modules WHERE module_code IN (SELECT module FROM calendar WHERE semester=?) ORDER by module_name ASC ");
                                    $find_modules->execute([$sem_code]);
                                    while($row=$find_modules->fetch(PDO::FETCH_ASSOC)){
                                        $module_name = $row["module_name"];
                                        $module_code = $row["module_code"];
                                        $id = $row["id"];
                                        
                                        $get_time_details = $connect->prepare("SELECT * FROM calendar WHERE semester=? AND module=?");
                                        $get_time_details->execute([$sem_code,$module_code]);
                                        while($row=$get_time_details->fetch(PDO::FETCH_ASSOC)){
                                            $exam_time = $row["exam_time"];
                                            $exam_date = $row["exam_date"];
                                        }
                                        
                                    ?>
                                    <!--Module Start-->
                                    <div class="list-view-item">
                                        <div class="list-view-item-inner">
                                            <img class="avatar" src="../images/dashboard.png" alt="HIT subject">
                                            <div class="meta-left">
                                                <h3 data-filter-match=""><?php echo $module_name;?></h3>
                                                <span>
                                                    <i data-feather="book"></i>
                                                    <span data-filter-match=""><?php echo $module_code;?></span>
                                                    <i class="fas fa-circle icon-separator"></i>
                                                    <i data-feather="clock"></i>
                                                    <span data-filter-match=""><?php echo date("d  M  Y", strtotime($exam_date));?></span>
                                                    <i class="fas fa-circle icon-separator"></i>
                                                    <i data-feather="clock"></i>
                                                    <span data-filter-match=""><?php echo $exam_time;?></span>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    <!--End Module-->
                                    <?php
                                    }
                                    ?>



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
        <script src="../assets/js/list-view.js"></script>
        <script src="../assets/js/syntax.js"></script>
       <script>
            bulmaCalendar.attach('#deon-2', {
                displayMode: 'dialog',
                startDate: new Date('<?php echo date("m/d/Y");?>'),
                minDate: '<?php echo date("m/d/Y");?>',
                maxDate: '03/28/2051',
                color: themeColors.primary,
                lang: 'en'
            });
        </script>
    </div>
</body>

</html>