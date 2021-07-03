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
        <div id="edit-profile" class="view-wrapper is-webapp" data-page-title="Edit Profile" data-naver-offset="214" data-menu-item="#layouts-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">
                    <div class="page-title has-text-centered is-webapp">
                        <div class="title-wrap">
                            <h1 class="title is-4">Account Settings</h1>
                        </div>
                    </div>

                    <div class="page-content-inner">

                        <!--Edit Profile-->
                        <div class="account-wrapper">
                            <div class="columns">

                                <!--Navigation-->
                                <div class="column is-4">
                                    <div class="account-box is-navigation">
                                       <div class="media-flex-center">
                                            <div class="h-avatar is-large">
                                                <img class="avatar" src="images/<?php echo $avatar;?>" alt="">
                                            </div>
                                            <div class="flex-meta">
                                                <span><?php echo $name." ".$surname;?></span>
                                                <span>Student</span>
                                            </div>
                                        </div>
                                        <div class="account-menu">
                                            <a href="profile" class="account-menu-item">
                                                <i class="lnil lnil-user-alt"></i>
                                                <span>General Profile</span>
                                                <span class="end">
                                                        <i class="fas fa-arrow-right"></i>
                                                    </span>
                                            </a>
                                            
                                            <a href="settings" class="account-menu-item is-active">
                                                <i class="lnil lnil-cog"></i>
                                                <span>Account Settings</span>
                                                <span class="end">
                                                        <i class="fas fa-arrow-right"></i>
                                                    </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if(isset($_POST["update_account"])){
                                    $message = "";
                                    $alert = "";
                                    $span = "";
                                    
                                    $old_password = htmlspecialchars($_POST["old_password"]);
                                    $new_password = htmlspecialchars($_POST["new_password"]);
                                    $repeat_password = htmlspecialchars($_POST["repeat_password"]);
                                    
                                    try{
                                        $check_user_password = $connect->prepare("SELECT * FROM students WHERE username=? AND password=?");
                                        $check_user_password->execute([$user,md5($old_password)]);
                                        $count_cybers = $check_user_password->rowCount();
                                        if($count_cybers == 1){
                                            //Change Password
                                            $update_password_query = $connect->prepare("UPDATE students SET password=? WHERE username=?");
                                            $update_password_query->execute([md5($new_password),$user]);
                                            $message = "<center>Password successfully changed😎</center>";
                                            $alert = "message is-success is-small";
                                            $span = "message-body";
                                        }else{
                                            //Error Password
                                            $message = "<center>You have used a wrong password😛</center>";
                                            $alert = "message is-danger is-small";
                                            $span = "message-body";
                                        }
                                    }catch(PDOException $error){
                                       $message = $error->getMessage(); 
                                    }
                                }
                                ?>
                                <!--Form-->
                                 <form class="column is-8" method="POST">
                                    <div class="account-box is-form is-footerless">
                                        <div class="form-head stuck-header">
                                            <div class="form-head-inner">
                                                <div class="left">
                                                    <h3>Account Settings</h3>
                                                    <p>Update your Account Security</p>
                                                </div>
                                                <div class="right">
                                                    <div class="buttons">
                                                        <a href="dashboard" class="button h-button is-light is-dark-outlined">
                                                            <span class="icon">
                                                                    <i class="lnir lnir-arrow-left rem-100"></i>
                                                                </span>
                                                            <span>Go Back</span>
                                                        </a>
                                                        <button type="submit" name="update_account" id="save-button" class="button h-button is-primary is-raised">Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <?php
                                if(isset($message))
                                {
                                    ?>
                                    <article class="<?php echo $alert;?>">
                                        <div class="<?php echo $span;?>">
                                            <?php echo $message;?>
                                        </div>
                                    </article>
                                <?php
                                    
                                }
                                ?>
                                            <div class="fieldset">
                                                <div class="fieldset-heading">
                                                    <h4>Change Password</h4>
                                                    <p>Update your Password</p>
                                                </div>

                                                <div class="columns is-multiline">
                                                    
                                                    <div class="column is-12">
                                                        <div class="field">
                                                            <div class="control has-icon">
                                                                <input type="password" required name="old_password" class="input" placeholder="Old Password">
                                                                <div class="form-icon">
                                                                    <i data-feather="unlock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="column is-12">
                                                        <div class="field">
                                                            <div class="control has-icon">
                                                                <input type="text" required name="new_password" class="input" placeholder="New Password">
                                                                <div class="form-icon">
                                                                    <i data-feather="lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="column is-12">
                                                        <div class="field">
                                                            <div class="control has-icon">
                                                                <input type="text" required name="repeat_password" class="input" placeholder="Repeat New Password">
                                                                <div class="form-icon">
                                                                    <i data-feather="lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>

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
        <script src="assets/js/profile.js"></script>
        <script src="assets/js/syntax.js"></script>
    </div>
</body>

</html>