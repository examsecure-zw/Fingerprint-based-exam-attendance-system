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
        <div id="app-project" class="view-wrapper is-webapp" data-page-title="HIT Students" data-naver-offset="214" data-menu-item="#layouts-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered is-webapp">

                        <div class="title-wrap">
                            <h1 class="title is-4">HIT Students</h1>
                        </div>

                        <div class="toolbar ml-auto">


                        </div>
                    </div>

                    <div class="list-flex-toolbar flex-list-v1">
                        <div class="control has-icon">
                            <input class="input custom-text-filter" placeholder="Search..." data-filter-target=".flex-table-item">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>

                        <div class="buttons">
                            <a class="button h-button is-primary is-elevated h-modal-trigger" data-modal="enroll_student_modal">
                                <span class="icon">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span>Enroll New Student</span>
                            </a>
                        </div>
                    </div>

                    <div class="page-content-inner">

                        <div class="flex-list-wrapper flex-list-v1">
                            <div class="page-placeholder custom-text-filter-placeholder is-hidden">
                                <div class="placeholder-content">

                                    <h3>We couldn't find any matching results.</h3>
                                    <p class="is-larger">
                                        Hi there Administrator, we couldn't find a person with the details you have searched, l think you should add that person
                                    </p>
                                </div>
                            </div>

                            <div class="flex-table">

                                <!--Table header-->
                                <div class="flex-table-header" data-filter-hide="">
                                    <span class="is-grow">Student</span>
                                    <span>Reg Number</span>
                                    <span>Gender</span>
                                    <span>Program</span>
                                    <span class="cell-end">Options</span>
                                </div>

                                <div class="flex-list-inner">
                                    <!--Table Student item-->
                                    <?php
                                    $find_all_students = $connect->prepare("SELECT * FROM students ORDER BY name ASC");
                                    $find_all_students->execute();
                                    while($row=$find_all_students->fetch(PDO::FETCH_ASSOC)){
        
                                        $my_username = $row["username"];
                                        $my_name = $row["name"];
                                        $my_surname = $row["surname"];
                                        $my_biometric = $row["biometric"];
                                        $my_phone = $row["phone"];
                                        $my_email = $row["email"];
                                        $my_reg_status = $row["status"];
                                        $my_id = $row["id"];
                                        $my_gender = $row["gender"];
                                        $my_program = $row["program"];
                                        $my_avatar = $row["avatar"];
                                        
                                        if($my_avatar == ""){
                                            $my_avatar = "avatar.svg";
                                        }
                                    
                                    ?>
                                    <div class="flex-table-item">
                                        <div class="flex-table-cell is-media is-grow">
                                            <div class="h-avatar is-medium">
                                                <img class="avatar" src="../images/<?php echo $my_avatar;?>" alt="<?php echo $my_name." ".$my_surname;?>" data-user-popover="3">
                                            </div>
                                            <div>
                                                <span class="item-name dark-inverted" data-filter-match=""><?php echo $my_name." ".$my_surname;?></span>
                                                <span class="item-meta">
                                                    <span data-filter-match="">Student</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-table-cell" data-th="Reg Number">
                                            <span class="light-text" data-filter-match=""><?php echo strtoupper($my_username);?></span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Gender">
                                            <span class="light-text" data-filter-match=""><?php echo $my_gender;?></span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Status">
                                            <span class="light-text" data-filter-match=""><?php echo $my_program;?></span>
                                        </div>

                                        <div class="flex-table-cell cell-end" data-th="Actions">
                                            <div class="dropdown is-spaced is-dots is-right dropdown-trigger is-pushed-mobile">
                                                <div class="is-trigger" aria-haspopup="true">
                                                    <i data-feather="more-vertical"></i>
                                                </div>
                                                <div class="dropdown-menu" role="menu">
                                                    <div class="dropdown-content">

                                                        <a href="#" class="dropdown-item is-media h-modal-trigger" data-modal="update_student_modal<?php echo $my_id;?>">
                                                            <div class="icon">
                                                                <i class="lnil lnil-user"></i>
                                                            </div>
                                                            <div class="meta">
                                                                <span>Update Student</span>
                                                                <span>Update Student Details</span>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="dropdown-item is-media h-modal-trigger" data-modal="register_student_modal<?php echo $my_id;?>">
                                                            <div class="icon">
                                                                <i class="lnil lnil-calendar"></i>
                                                            </div>
                                                            <div class="meta">
                                                                <span>Register Student</span>
                                                                <span>Register this student for this Semester</span>
                                                            </div>
                                                        </a>
                                                        <hr class="dropdown-divider">
                                                        <a href="#" class="dropdown-item is-media h-modal-trigger" data-modal="exam_modal<?php echo $my_id;?>">
                                                            <div class="icon">
                                                                <i class="lnil lnil-calender-alt-4"></i>
                                                            </div>
                                                            <div class="meta">
                                                                <span>Exam Attendance</span>
                                                                <span>View all the exam attended by the student</span>
                                                            </div>
                                                        </a>
                                                        <hr class="dropdown-divider">
                                                        <a href="#" class="dropdown-item is-media">
                                                            <div class="icon">
                                                                <i class="lnil lnil-trash-can-alt"></i>
                                                            </div>
                                                            <div class="meta">
                                                                <span>Delete Student</span>
                                                                <span>Delete Student from HIT records</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--My Modals-->
                                        <div id="update_student_modal<?php echo $my_id;?>" class="modal h-modal is-big">
                                            <div class="modal-background h-modal-close"></div>
                                            <div class="modal-content">
                                                <div class="modal-card">
                                                    <header class="modal-card-head">
                                                        <h3>Update <?php echo $my_name." ".$my_surname." Program : ".$my_program." ";?> Details (HIT Exams records)</h3>
                                                        <button class="h-modal-close ml-auto" aria-label="close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </header>
                                                    
                                                    <?php
                                                    if(isset($_POST["update_student"])){
                                                        $message = "";
                                                        $alert = "";
                                                        $span = "";
                                                        
                                                        $update_name = htmlspecialchars($_POST["update_name"]);
                                                        $update_surname = htmlspecialchars($_POST["update_surname"]);
                                                        $update_program = htmlspecialchars($_POST["update_program"]);
                                                        $update_phone = htmlspecialchars($_POST["update_phone"]);
                                                        $cybercoder = htmlspecialchars($_POST["cybercoder"]);
                                                        try{
                                                                
                                                            $update_user_query = $connect->prepare("UPDATE students SET name=?,surname=?,program=?,phone=? WHERE username=?");
                                                            $update_user_query->execute([$update_name,$update_surname,$update_program,$update_phone,$cybercoder]);
                                                            echo "<script type='text/javascript'>window.location.href='students'</script>";
                                                        }catch(PDOException $error){
                                                            
                                                        }
                                                    }
                                                    ?>
                                                    <form method="POST">
                                                        <div class="modal-card-body">
                                                            <div class="inner-content">
                                                                <div class="modal-form">
                                                                    <div class="columns is-multiline">
                                                                        <div class="column is-6">
                                                                            <div class="field">
                                                                                <input type="text" hidden name="cybercoder" value="<?php echo $my_username?>">
                                                                                <label>Student Name*</label>
                                                                                <div class="control">
                                                                                    <input type="text" class="input" name="update_name" required placeholder="Enter the student 's name" value="<?php echo $my_name;?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="column is-6">
                                                                            <div class="field">
                                                                                <label>Student Surname*</label>
                                                                                <div class="control">
                                                                                    <input type="text" class="input" name="update_surname" required placeholder="Enter the student 's surname" value="<?php echo $my_surname;?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="column is-12">
                                                                            <label>Program*</label>
                                                                            <select class="input" name="update_program" required>
                                                                                <option value="<?php echo $my_program;?>"><?php echo $my_program;?></option>
                                                                                <option value="ISA">Infromation Security And Assurance</option>
                                                                                <option value="IT">Infromation Technology</option>
                                                                                <option value="Comp Science">Computer Science</option>
                                                                                <option value="Software Eng">Software Engineering</option>
                                                                            </select>
                                                                        </div>
                                            
                                                                        <div class="column is-12">
                                                                            <div class="field">
                                                                                <label>Phone Number*</label>
                                                                                <div class="control">
                                                                                    <input type="text" class="input" name="update_phone" placeholder="Enter the student 's Phone Number with country code (+263 777 777 777)" value="<?php echo $my_phone;?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="modal-card-foot is-end">
                                                            <a class="button h-button is-rounded h-modal-close">Cancel</a>
                                                            <button class="button h-button is-primary is-raised is-rounded" type="submit" name="update_student">Update Student</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="register_student_modal<?php echo $my_id;?>" class="modal h-modal is-big">
                                            <div class="modal-background h-modal-close"></div>
                                            <div class="modal-content">
                                                <div class="modal-card">
                                                    <header class="modal-card-head">
                                                        <h3>Register <?php echo $my_name." ".$my_surname." Program : ".$my_program;?> (HIT Exams records)</h3>
                                                        <button class="h-modal-close ml-auto" aria-label="close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </header>
                                                   
                                                    <?php
                                                        if(isset($_POST["register_student"])){
                                                            $message = "";
                                                            $alert = "";
                                                            $span = "";
                                                            $panashe_code = $_POST["panashe_code"];
                                                            try{
                                                                if(isset($_POST["modules"])){
                                                                    foreach($_POST["modules"] as $i){
                                                                        $module = $i;
                                                                        $check_for_modules = $connect->prepare("SELECT * FROM registration WHERE sem_code=? AND reg_number=? AND module=?");
                                                                        $check_for_modules->execute([$sem_code,$panashe_code,$module]);
                                                                        $count_my_modules = $check_for_modules->rowCount();
                                                                        if($count_my_modules == 0){
                                                                            //Insert into Database
                                                                            $register_query = $connect->prepare("INSERT INTO registration (sem_code, reg_number, module, date) VALUES (?,?,?,NOW())");
                                                                            $register_query->execute([$sem_code,$panashe_code,$module]);
                                                                            echo "<script type='text/javascript'>window.location.href='students'</script>"; 
                                                                        }else{
                                                                            //Error
                                                                            echo "<script type='text/javascript'>window.location.href='students'</script>"; 
                                                                        }
                                                                    }
                                                                }
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
                                                                        <input type="text" hidden value="<?php echo $my_username;?>" name="panashe_code">
                                                                        <div class="column is-6">
                                                                            <div class="field">
                                                                                <label>Student Name*</label>
                                                                                <div class="control">
                                                                                    <input type="text" readonly class="input" name="stu_name" required placeholder="Enter the student 's name" value="<?php echo $my_name;?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="column is-6">
                                                                            <div class="field">
                                                                                <label>Student Surname*</label>
                                                                                <div class="control">
                                                                                    <input type="text" readonly class="input" name="stu_surname" required placeholder="Enter the student 's surname" value="<?php echo $my_surname;?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="column is-12">
                                                                            <div class="field">
                                                                                <label>Registration Number*</label>
                                                                                <div class="control">
                                                                                    <input type="text" readonly class="input" name="stu_surname" required placeholder="Enter the student 's surname" value="<?php echo strtoupper($my_username);?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="column is-12">
                                                                            <label>Modules or Courses*</label>
                                                                            <div class="control">
                                                                                <select required class="form-control" name="modules[]" id="choices-multiple-remove-button<?php echo $my_id;?>" multiple="">
                                                                                    <?php
                                                                                    $find_modules = $connect->prepare("SELECT * FROM modules WHERE module_code NOT IN (SELECT module FROM registration WHERE sem_code=? AND reg_number=?)");
                                                                                    $find_modules->execute([$sem_code,$my_username]);
                                                                                    while($row=$find_modules->fetch(PDO::FETCH_ASSOC)){
                                                                                        $cool_module_name = $row["module_name"];
                                                                                        $cool_module_code = $row["module_code"];
                                                                                    ?>
                                                                                    <option value="<?php echo $cool_module_code;?>"><?php echo $cool_module_name." ".$cool_module_code;?></option>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-card-foot is-end">
                                                            <a class="button h-button is-rounded h-modal-close">Cancel</a>
                                                            <button class="button h-button is-primary is-raised is-rounded" type="submit" name="register_student">Register Student</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="exam_modal<?php echo $my_id;?>" class="modal h-modal is-big">
                                            <div class="modal-background h-modal-close"></div>
                                            <div class="modal-content">
                                                <div class="modal-card">
                                                    <header class="modal-card-head">
                                                        <h3>Examination Attendance for <?php echo $my_name." ".$my_surname;?> (HIT Exams records)</h3>
                                                        <button class="h-modal-close ml-auto" aria-label="close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </header>
                                                  
                                                    
                                                        <div class="modal-card-body">
                                                            <div class="inner-content">
                                                                <div class="modal-form">
                                                                    <div class="columns is-multiline">
                                                                        <div>
                                                                            <table class="table column">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Module Name</th>
                                                                                        <th>Module Code</th>
                                                                                        <th>Date</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                        $find_the_modules= $connect->prepare("SELECT * FROM exam_attendance WHERE semester=? AND reg_number=?");
                                        $find_the_modules->execute([$sem_code,$my_username]);
                                        while($row=$find_the_modules->fetch(PDO::FETCH_ASSOC)){
                                            $the_module_code = $row["module"];
                                            $the_date = $row["date"];
                                            $find_module_data = $connect->prepare("SELECT * FROM modules WHERE module_code=?");
                                            $find_module_data->execute([$the_module_code]);
                                            while($row=$find_module_data->fetch(PDO::FETCH_ASSOC)){
                                                $the_module_name = $row["module_name"];
                                            }
                                                                                    ?>
                                                                                   <tr>
                                                                                    <td><?php echo $the_module_name;?></td>
                                                                                    <td><?php echo $the_module_code;?></td>
                                                                                    <td><?php echo $the_date;?></td>
                                                                                    </tr>
                                                                                    <?php
                                        }
                                                                                    ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        
                                                                        
                                                                       
                                                                      

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-card-foot is-end">
                                                            <a class="button h-button is-rounded h-modal-close">Close</a>
                                                        </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!--End of MyModals-->
                                    </div>
                                    <!--End of Student Item-->
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

                    </div>

                </div>
            </div>
        </div>
        <!--Modals-->
        <div id="enroll_student_modal" class="modal h-modal is-big">
            <div class="modal-background h-modal-close"></div>
            <div class="modal-content">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <h3>Enroll New Student (HIT Exams records)</h3>
                        <button class="h-modal-close ml-auto" aria-label="close">
                            <i data-feather="x"></i>
                        </button>
                    </header>
                    <?php
                    if(isset($_POST["enroll_student"])){
                        $message = "";
                        $alert = "";
                        $span = "";
                        
                        $stu_name = htmlspecialchars($_POST["stu_name"]);
                        $stu_surname = htmlspecialchars($_POST["stu_surname"]);
                        $stu_phone = htmlspecialchars($_POST["stu_phone"]);
                        $stu_biometric = htmlspecialchars($_POST["stu_biometric"]);
                        $stu_reg = strtolower(htmlspecialchars($_POST["stu_reg"]));
                        $stu_program = htmlspecialchars($_POST["stu_program"]);
                        $stu_password = "hitpassword";
                        $stu_email = strtolower($stu_reg)."@hit.ac.zw";
                        
                        try{
                            
                            $check_id = $connect->prepare("SELECT * FROM students WHERE username=?");
                            $check_id->execute([$stu_reg]);
                            $count_students = $check_id->rowCount();
                            if($count_students == 0){
                                $check_biometric = $connect->prepare("SELECT * FROM students WHERE biometric=?");
                                $check_biometric->execute([$stu_biometric]);
                                $count_biometric = $check_biometric->rowCount();
                                if($count_biometric == 0){
                                   $add_student_query = $connect->prepare("INSERT INTO students (username,password,name,surname,biometric,phone,email,program,date) VALUES (?,?,?,?,?,?,?,?,NOW())");
                                    $add_student_query->execute([$stu_reg,md5($stu_password),$stu_name,$stu_surname,$stu_biometric,$stu_phone,$stu_email,$stu_program]);
                                    echo "<script type='text/javascript'>window.location.href='students'</script>"; 
                                }else{
                                   echo "<script type='text/javascript'>window.location.href='students'</script>";  
                                }
                                
                            }else{
                              echo "<script type='text/javascript'>window.location.href='students'</script>";  
                            }
                           
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
                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Student Name*</label>
                                                <div class="control">
                                                    <input type="text" class="input" name="stu_name" required placeholder="Enter the student 's name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Student Surname*</label>
                                                <div class="control">
                                                    <input type="text" class="input" name="stu_surname" required placeholder="Enter the student 's surname" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="column is-12">
                                            <label>Program*</label>
                                            <select class="input" name="stu_program" required>
                                                <option value="">Choose Program</option>
                                                <option value="ISA">Infromation Security And Assurance</option>
                                                <option value="IT">Infromation Technology</option>
                                                <option value="Comp Science">Computer Science</option>
                                                <option value="Software Eng">Software Engineering</option>
                                            </select>
                                        </div>
                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Registration Number*</label>
                                                <div class="control">
                                                    <input type="text" class="input" name="stu_reg" required placeholder="Enter the student 's regestration number" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Biometric Fingerprint Code*</label>
                                                <div class="control">
                                                    <input type="number" class="input" name="stu_biometric" required placeholder="Enter the student 's Biometric code" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Phone Number*</label>
                                                <div class="control">
                                                    <input type="text" class="input" name="stu_phone" required placeholder="Enter the student 's Phone Number with country code (+263 777 777 777)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-card-foot is-end">
                            <a class="button h-button is-rounded h-modal-close">Cancel</a>
                            <button class="button h-button is-primary is-raised is-rounded" type="submit" name="enroll_student">Enroll Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--End Modals-->
        <script src="../assets/js/app.js"></script>
        <script src="../assets/js/functions.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="../assets/js/components.js"></script>
        <script src="../assets/js/popover.js"></script>
        <script src="../assets/js/widgets.js"></script>
        <script src="../assets/js/touch.js"></script>
        <script src="../assets/js/flex-list.js"></script>
        <script src="../assets/js/syntax.js"></script>
         <?php
            $find_all_students = $connect->prepare("SELECT * FROM students ORDER BY name ASC");
            $find_all_students->execute();
            while($row=$find_all_students->fetch(PDO::FETCH_ASSOC)){
                $my_id = $row["id"];                                        
                ?>
        <script>
            if ($('#choices-multiple-remove-button<?php echo $my_id;?>').length) {
                var multipleCancelButton = new Choices('#choices-multiple-remove-button<?php echo $my_id;?>', {
                    removeItemButton: true
                });
            }
        </script>
        <?php
            }
        ?>
    </div>
</body>

</html>