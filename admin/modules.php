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
        <div id="grid-users" class="view-wrapper is-webapp" data-page-title="HIT Modules" data-naver-offset="214" data-menu-item="#layouts-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered is-webapp">

                        <div class="title-wrap">
                            <h1 class="title is-4">HIT Modules</h1>
                        </div>
                    </div>

                    <div class="user-grid-toolbar">
                        <div class="control has-icon">
                            <input class="input custom-text-filter" placeholder="Search..." data-filter-target=".column">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>

                        <div class="buttons">
                            <a class="button h-button is-primary is-raised h-modal-trigger" data-modal="add_new_modules_modal">
                                <span class="icon">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span>Add new Module</span>
                            </a>
                        </div>
                    </div>

                    <div class="page-content-inner is-webapp">

                        <div class="user-grid user-grid-v2">

                            <div class="page-placeholder custom-text-filter-placeholder is-hidden">
                                <div class="placeholder-content">
                                    <h3>We couldn't find any matching results.</h3>
                                    <p class="is-larger">
                                        We could not find any matching modules in the HIT records. Please add any new modules to the system
                                    </p>
                                </div>
                            </div>

                            <div class="columns is-multiline">
                                <?php
                                $find_hit_modules = $connect->prepare("SELECT * FROM modules");
                                $find_hit_modules->execute();
                                while($row=$find_hit_modules->fetch(PDO::FETCH_ASSOC)){
                                    $my_module_name = $row["module_name"];
                                    $my_module_code = $row["module_code"];
                                    $my_id = $row["id"];
                                ?>
                                <!--Module Start Grid item-->
                                <div class="column is-3">
                                    <div class="grid-item-wrap">
                                        <div class="grid-item-head">
                                            <div class="flex-head">
                                                <div class="meta">
                                                    <span class="dark-inverted">HIT Module</span>
                                                </div>
                                                <div class="status-icon is-success">
                                                    <i class="fas fa-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="h-avatar is-big">
                                                <img class="avatar" src="../images/dashboard.png" alt="HIT Module" data-user-popover="6">
                                            </div>
                                            <h3 class="dark-inverted" data-filter-match=""><?php echo $my_module_name;?></h3>
                                            <p data-filter-match=""><?php echo $my_module_code;?></p>
                                            <div class="people">


                                            </div>
                                            <div class="buttons">
                                                <button class="button h-button is-dark-outlined h-modal-trigger" data-modal="update_module_modal<?php echo $my_id;?>">
                                                    <span class="icon">
                                                        <i data-feather="cloud"></i>
                                                    </span>
                                                    <span>Update</span>
                                                </button>
                                                <!--Modals Start-->
                                                <div id="update_module_modal<?php echo $my_id;?>" class="modal h-modal is-small">
                                                    <div class="modal-background h-modal-close"></div>
                                                    <div class="modal-content">
                                                        <div class="modal-card">
                                                            <header class="modal-card-head">
                                                                <h3>Update Module (<?php echo $my_module_code;?>)</h3><br>
                                                                <button class="h-modal-close ml-auto" aria-label="close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </header>
                                                            <?php
                                                            if(isset($_POST["update_module"])){
                                                                $message = "";
                                                                $alert = "";
                                                                $span = "";
                                                                $update_module_name = htmlspecialchars($_POST["update_module_name"]);
                                                                $update_module_code = htmlspecialchars($_POST["update_module_code"]);
                                                                $givella = htmlspecialchars($_POST["givella"]);
                                                                try{
                                                                   $update_module_query = $connect->prepare("UPDATE modules SET module_name=?, module_code=? WHERE id=?");
                                                                    $update_module_query->execute([$update_module_name,$update_module_code,$givella]);
                                                                    echo "<script type='text/javascript'>window.location.href='modules'</script>"; 
                                                                    
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
                                                                                        <input type="text" hidden name="givella" value="<?php echo $my_id;?>">
                                                                                        <label>Module Name*</label>
                                                                                        <div class="control">
                                                                                            <input type="text" class="input" name="update_module_name" required placeholder="Enter the module name" value="<?php echo $my_module_name;?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="column is-12">
                                                                                    <div class="field">
                                                                                        <label>Module Code*</label>
                                                                                        <div class="control">
                                                                                            <input type="text" class="input" name="update_module_code" required placeholder="Enter the module code e.g. ISS211" value="<?php echo $my_module_code;?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-card-foot is-end">
                                                                    <a class="button h-button is-rounded h-modal-close">Cancel</a>
                                                                    <button class="button h-button is-primary is-raised is-rounded" type="submit" name="update_module">Update Module</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Modals End-->
                                                <?php
                                                    if(isset($_POST["delete_module"])){
                                                        $del_code = $_POST["del_code"];
                                                        $delete_query = $connect->prepare("DELETE FROM modules WHERE module_code=?");
                                                        $delete_query->execute([$del_code]);
                                                        echo "<script type='text/javascript'>window.location.href='modules'</script>";  
                                                        
                                                    }
                                                ?>
                                                <form method="POST">
                                                    <input type="text" name="del_code" hidden value="<?php echo $my_module_code;?>">
                                                    <button class="button h-button is-dark-outlined" type="submit" name="delete_module">
                                                        <span class="icon">
                                                            <i data-feather="delete"></i>
                                                        </span>
                                                        <span>Delete</span>
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Module End Grid Item-->
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

                    </div>

                </div>
            </div>
        </div>
        <!--Modals Start-->
        <div id="add_new_modules_modal" class="modal h-modal is-large">
            <div class="modal-background h-modal-close"></div>
            <div class="modal-content">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <h3>Add New Module (HIT Exams records)</h3><br>
                        <small>Please check if the module exist first before you add a module</small>
                        <button class="h-modal-close ml-auto" aria-label="close">
                            <i data-feather="x"></i>
                        </button>
                    </header>
                    <?php
                    if(isset($_POST["add_module"])){
                        $message = "";
                        $alert = "";
                        $span = "";
                        
                        $module_name = htmlspecialchars($_POST["module_name"]);
                        $module_code = htmlspecialchars($_POST["module_code"]);
                        
                        try{
                            $check_module = $connect->prepare("SELECT * FROM modules WHERE module_code=?");
                            $check_module->execute([$module_code]);
                            $count_modules = $check_module->rowCount();
                            if($count_modules == 0){
                                //Submit to DB
                                $add_module_query = $connect->prepare("INSERT INTO modules (module_name,module_code,date) VALUES (?,?,NOW())");
                                $add_module_query->execute([$module_name,$module_code]);
                                echo "<script type='text/javascript'>window.location.href='modules'</script>"; 
                            }else{
                                echo "<script type='text/javascript'>window.location.href='modules'</script>"; 
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
                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Module Name*</label>
                                                <div class="control">
                                                    <input type="text" class="input" name="module_name" required placeholder="Enter the module name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Module Code*</label>
                                                <div class="control">
                                                    <input type="text" class="input" name="module_code" required placeholder="Enter the module code e.g. ISS211">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-card-foot is-end">
                            <a class="button h-button is-rounded h-modal-close">Cancel</a>
                            <button class="button h-button is-primary is-raised is-rounded" type="submit" name="add_module">Add New Module</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Modals End-->
        <script src="../assets/js/app.js"></script>
        <script src="../assets/js/functions.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="../assets/js/components.js"></script>
        <script src="../assets/js/popover.js"></script>
        <script src="../assets/js/widgets.js"></script>
        <script src="../assets/js/touch.js"></script>
        <script src="../assets/js/user-grid.js"></script>
        <script src="../assets/js/syntax.js"></script>
    </div>
</body>

</html>