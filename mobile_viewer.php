<?php
include("includes/db.php");
//Find Semester
$find_semester = $connect->prepare("SELECT * FROM admin");
$find_semester->execute();
while($row=$find_semester->fetch(PDO::FETCH_ASSOC)){
    $sem_code = $row["semester"];
    $sem_code = date("Y")."".$sem_code;
}
$real_exam_date = date("m/d/Y");
$current_time = date("H");
if($current_time < 12){
    $real_time = "morning";
}elseif($current_time >= 12 && $current_time <= 17){
   $real_time = "afternoon"; 
}else{
    $real_time = "evening";
}

$find_student_details = $connect->prepare("SELECT * FROM bio_data  ORDER BY id DESC LIMIT 1");
$find_student_details->execute();
while($row = $find_student_details->fetch(PDO::FETCH_ASSOC)){
    $code = $row["session"];
  
   $new_code = str_replace(' ', '', $code);
    
    if($new_code != 0){
        //Get student details if the student is in the system
        $details_query = $connect->prepare("SELECT * FROM students WHERE biometric = $new_code");
        $details_query->execute([$new_code]);
        while($row=$details_query->fetch(PDO::FETCH_ASSOC)){
            $name = $row["name"];
            $surname = $row["surname"];
            $program = $row["program"];
            $avatar = $row["avatar"];
            $reg_number = $row["username"];
            
            if($avatar == ""){
                $avatar = "avatar.svg";
            }
        }
    }
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
    $currentPage = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
?>
        <nav class="navbar mobile-navbar no-shadow is-hidden-desktop is-hidden-tablet" aria-label="main navigation">
            <div class="container">

                <div class="navbar-brand">

                    <div class="brand-start">
                        <div class="navbar-burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <a class="navbar-item is-brand" href="dashboard">
                        <img class="light-image" src="images/logo.svg" alt="HIT Exams">

                    </a>

                    <div class="brand-end">
                        <div class="dropdown is-right is-spaced dropdown-trigger user-dropdown">
                            <div class="is-trigger" aria-haspopup="true">
                                <div class="profile-avatar">
                                    <img class="avatar" src="images/avatar.svg" alt="Student Avatar">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </nav>
        <div class="mobile-main-sidebar">
            <div class="inner">

            </div>
        </div>
        <div class="webapp-navbar">
            <div class="webapp-navbar-inner">
                <div class="left">
                    <a href="dashboard" class="brand">
                        <img class="light-image" src="images/logo.svg" alt="HIT">
                    </a>
                    <div class="separator"></div>

                    <h1 id="webapp-page-title" class="title is-5">Welcome</h1>
                </div>
                <div class="center">
                    <div id="webapp-navbar-menu" class="centered-links">

                        <a href="dashboard" class="centered-link is-active">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </a>

                    </div>
                </div>
                <div class="right">

                    <div class="dropdown profile-dropdown dropdown-trigger is-spaced is-right">

                        <img src="images/avatar.svg" alt="Student Avatar">
                        <span class="status-indicator"></span>


                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-subsidebar">
            <div class="inner">
                <div class="sidebar-title">
                    <h3>HIT Secure</h3>
                </div>

                <ul class="submenu" data-simplebar="">


                </ul>
            </div>
        </div>
        <!-- Content Wrapper -->
        <div id="user-profile" class="view-wrapper is-webapp" data-page-title="Exam Attendance" data-naver-offset="214" data-menu-item="#layouts-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">
            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered is-webapp">

                        <div class="title-wrap">
                            <h1 class="title is-4">HIT Secure</h1>
                        </div>

                        <div class="toolbar ml-auto">
                        </div>
                    </div>
                    <div class="page-content-inner">
                        <?php
                        if($new_code != 0){
                        ?>
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
                                            <span>Name</span>
                                            <span>Code</span>
                                            <span>Venue</span>
                                            <span>Time</span>

                                        </div>
                                        <div class="flex-table-item">
                                            <div class="flex-table-cell is-bold" data-th="">
                                                <span class="dark-text">
                                                    <center>
                                                        <?php
                                                echo "{$name} {$surname} : Reg Number : {$reg_number} : Program {$program}";
                                                ?>
                                                    </center>
                                                </span>

                                            </div>
                                        </div>
                                        <?php
                                    
                                    $find_modules = $connect->prepare("SELECT * FROM calendar WHERE semester=? AND exam_date=? AND exam_time=? AND module IN (SELECT module FROM registration WHERE sem_code=? AND reg_number=?)");
                                    $find_modules->execute([$sem_code,$real_exam_date,$real_time,$sem_code,$reg_number]);
                                    $count_modules = $find_modules->rowCount();
                                    if($count_modules != 0){
                                    while($row=$find_modules->fetch(PDO::FETCH_ASSOC)){
                                        $module = $row["module"];
                                        $exam_time = $row["exam_time"];
                                        $venue = $row["venue"];
                                        $id = $row["id"];
                                        
                                       
                                        
                                        $find_module_details = $connect->prepare("SELECT * FROM modules WHERE module_code=?");
                                        $find_module_details->execute([$module]);
                                        while($row=$find_module_details->fetch(PDO::FETCH_ASSOC)){
                                            $module_name = $row["module_name"];
                                            $module_code = $row["module_code"];
                                                                            
                                        }
                                    ?>
                                        <!--Module Here-->
                                        <div class="flex-table-item">
                                            <div class="flex-table-cell is-bold" data-th="Name">
                                                <span class="dark-text"><?php echo $module_name;?></span>
                                            </div>
                                            <div class="flex-table-cell" data-th="Code">
                                                <span class="light-text"><?php echo $module_code;?></span>
                                            </div>
                                            <div class="flex-table-cell" data-th="Venue">
                                                <span class="light-text"><?php echo $venue;?></span>
                                            </div>
                                            <div class="flex-table-cell" data-th="Time">
                                                <span class="light-text"><?php echo $exam_time;?></span>
                                            </div>

                                        </div>
                                        <br>
                                        <?php
                                        $find_attended = $connect->prepare("SELECT * FROM exam_attendance WHERE module=? AND semester=? AND reg_number=?");
                                        $find_attended->execute([$module_code,$sem_code,$reg_number]);
                                        $count_attended = $find_attended->rowCount();
                                        if($count_attended == 0){
                                            
                                      
                                        if(isset($_POST["senda"])){
                                            $the_module = $_POST["the_module"];
                                            $exam_query = $connect->prepare("INSERT INTO exam_attendance (semester,module,reg_number,date) VALUES (?,?,?,NOW())");
                                            $exam_query->execute([$sem_code,$the_module,$reg_number]);
                                            echo "<script type='text/javascript'>window.location.href='mobile_viewer'</script>";
                                        }
                                        ?>
                                        <form method="POST">
                                            <input type="text" hidden name="the_module" value="<?php echo $module_code;?>">
                                            <center>
                                                <button type="submit" id="save-button" class="button h-button is-primary is-raised" name="senda">Student has Attended the Exam</button>
                                            </center>
                                        </form>

                                        <!--Module Here-->
                                        <?php
                                        }else{
                                            //Show nothing
                                            ?>
                                        <script language="javascript">
                                            setInterval(function() {
                                                window.location.reload(1);
                                            }, 5000);
                                        </script>
                                        <?php
                                        }
                                    }
                                    }else{
                                        $find_others = $connect->prepare("SELECT * FROM calendar WHERE semester=? AND exam_date=? AND exam_time=? AND module IN (SELECT module FROM registration WHERE sem_code=? AND reg_number IN (SELECT reg_number FROM students WHERE program=?))");
                                        $find_others->execute([$sem_code,$real_exam_date,$real_time,$sem_code,$program]);
                                        $count_others = $find_others->rowCount();
                                        if($count_others == 1){
                                            while($row=$find_others->fetch(PDO::FETCH_ASSOC)){
                                                $module_code = $row["module"];
                                                $venue = $row["venue"];
                                                $exam_time = $row["exam_time"];
                                                
                                                $find_module_details = $connect->prepare("SELECT * FROM modules WHERE module_code=?");
                                                $find_module_details->execute([$module_code]);
                                                while($row=$find_module_details->fetch(PDO::FETCH_ASSOC)){
                                                    $module_name = $row["module_name"];
                                                }
                                            }
                                        ?>
                                        <div class="flex-table-item tag is-primary is-light">
                                            <center>
                                                <h3>Register Module</h3>
                                            </center>
                                        </div>
                                        <!--Module Here-->
                                        <div class="flex-table-item">
                                            <div class="flex-table-cell is-bold" data-th="Name">
                                                <span class="dark-text"><?php echo $module_name;?></span>
                                            </div>
                                            <div class="flex-table-cell" data-th="Code">
                                                <span class="light-text"><?php echo $module_code;?></span>
                                            </div>
                                            <div class="flex-table-cell" data-th="Venue">
                                                <span class="light-text"><?php echo $venue;?></span>
                                            </div>
                                            <div class="flex-table-cell" data-th="Time">
                                                <span class="light-text"><?php echo $exam_time;?></span>
                                            </div>

                                        </div>
                                        <br>
                                        <?php
                                             $find_attended = $connect->prepare("SELECT * FROM exam_attendance WHERE module=? AND semester=? AND reg_number=?");
                                            $find_attended->execute([$module_code,$sem_code,$reg_number]);
                                            $count_attended = $find_attended->rowCount();
                                            if($count_attended == 0){
                                             if(isset($_POST["register_the_student"])){
                                                 $super_module = $_POST["super_module"];
                                                 $exam_query = $connect->prepare("INSERT INTO exam_attendance (semester,module,reg_number,date) VALUES (?,?,?,NOW())");
                                                 $exam_query->execute([$sem_code,$super_module,$reg_number]);
                                                 
                                                 //Registration
                                                 $register_query = $connect->prepare("INSERT INTO registration (sem_code,reg_number,module,date) VALUES (?,?,?,NOW())");
                                                 $register_query->execute([$sem_code,$reg_number,$super_module]);
                                                 echo "<script type='text/javascript'>window.location.href='mobile_viewer'</script>";
                                             }
                                            
                                        ?>
                                        <form method="POST">
                                            <input type="text" hidden name="super_module" value="<?php echo $module_code;?>">
                                            <center>
                                                <button type="submit" id="save-button" class="button h-button is-primary is-raised" name="register_the_student">Register for module and Attendance</button>
                                            </center>
                                        </form>


                                        <?php
                                            }else{
                                                //Already Submitted
                                                ?>
                                        <script language="javascript">
                                            setInterval(function() {
                                                window.location.reload(1);
                                            }, 5000);
                                        </script>
                                        <?php
                                            }
                                        }else{
                                          //No modules to register, there is something wrong with your Account
                                          ?>
                                        <script language="javascript">
                                            setInterval(function() {
                                                window.location.reload(1);
                                            }, 5000);
                                        </script>
                                        <div class="flex-table-item">
                                            <div class="flex-table-cell is-bold" data-th="">
                                                <span class="dark-text" style="text-align:center">Hi there <?php echo "{$name} {$surname}";?> does not have an exam today in the <?php echo $real_time;?></span>
                                            </div>

                                        </div>
                                        <?php
                                        }
                                    }
                                    ?>



                                    </div>

                                </div>
                            </div>


                        </div>
                        <?php
                        }else{
                            //Failed to get real data
                            ?>
                        <div class="profile-wrapper">
                            <div class="profile-header has-text-centered">
                                <div class="h-avatar is-xl">

                                    <img class="avatar" src="images/failed.png" alt="Failed to get student" data-user-popover="3">

                                </div>
                                <h3 class="title is-4 is-narrow">Failed to get student details</h3>
                                <p class="light-text">
                                    We have failed to locate the student, maybe the student is not enrolled at the Harare Institute Of Technology or there is something wrong with the student 's fingerprint, try again.<b>Page will reload in a sec</b>
                                </p>

                            </div>
                        </div>
                        <script language="javascript">
                            setInterval(function() {
                                window.location.reload(1);
                            }, 5000);
                        </script>
                        <?php
                        }
                        ?>
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