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

        <div id="edit-profile" class="view-wrapper is-webapp" data-page-title="Edit Profile" data-naver-offset="214" data-menu-item="#layouts-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered is-webapp">

                        <div class="title-wrap">
                            <h1 class="title is-4">Profile Settings</h1>
                        </div>
                    </div>

                    <div class="page-content-inner">


                        <div class="account-wrapper">
                            <div class="columns">


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
                                            <a href="profile" class="account-menu-item is-active">
                                                <i class="lnil lnil-user-alt"></i>
                                                <span>General Profile</span>
                                                <span class="end">
                                                    <i class="fas fa-arrow-right"></i>
                                                </span>
                                            </a>

                                            <a href="settings" class="account-menu-item">
                                                <i class="lnil lnil-cog"></i>
                                                <span>Settings</span>
                                                <span class="end">
                                                    <i class="fas fa-arrow-right"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!--Form-->
                                <?php
                                if(isset($_POST["update_profile"])){
                                    $message = "";
                                    $alert = "";
                                    $span = "";
                                    
                                    $fname = htmlspecialchars($_POST["fname"]);
                                    $sname = htmlspecialchars($_POST["sname"]);
                                    $stu_phone = htmlspecialchars($_POST["stu_phone"]);
                                    $stu_email = htmlspecialchars($_POST["stu_email"]);
                                    $stu_home_address = htmlspecialchars($_POST["stu_home_address"]);
                                    $stu_gender = htmlspecialchars($_POST["stu_gender"]);
                                    
                                    try{
                                        $update_profile_query = $connect->prepare("UPDATE students SET name=?,surname=?,gender=?,phone=?,email=?,home_address=? WHERE username=?");
                                        $update_profile_query->execute([$fname,$sname,$stu_gender,$stu_phone,$stu_email,$stu_home_address,$user]);
                                        $message = "<center>Profile successfully changed, all changes will appear next time you come back to this page😎</center>";
                                        $alert = "message is-success is-small";
                                        $span = "message-body";
                                        
                                    }catch(PDOException $error){
                                        $message = $error->getMessage();
                                    }
                                }
                                ?>
                                <form class="column is-8" method="POST">
                                    <div class="account-box is-form is-footerless">
                                        <div class="form-head stuck-header">
                                            <div class="form-head-inner">
                                                <div class="left">
                                                    <h3>General Profile Info</h3>
                                                    <p>Update your profile details</p>
                                                </div>
                                                <div class="right">
                                                    <div class="buttons">
                                                        <a href="dashboard" class="button h-button is-light is-dark-outlined">
                                                            <span class="icon">
                                                                <i class="lnir lnir-arrow-left rem-100"></i>
                                                            </span>
                                                            <span>Go Back</span>
                                                        </a>
                                                        <button type="submit" id="save-button" class="button h-button is-primary is-raised" name="update_profile">Save Changes</button>
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
                                                    <h4>Personal Info</h4>
                                                    <p>Keep your details upto date, this will help us a lot</p>
                                                </div>

                                                <div class="columns is-multiline">
                                                    <div class="column is-12">
                                                        <center>
                                                            <div class="field">
                                                            <div class="filepond-profile-wrap is-small">
                                                                <input type="file" class="profile-filepond" name="profile_image" accept="image/png, image/jpeg">
                                                            </div>
                                                            <p>
                                                                <span>Update your profile image</span><br>
                                                                <span>Make sure that you upload a quality picture of yourself</span>
                                                            </p>
                                                        </div>
                                                        </center>
                                                    </div>

                                                    <div class="column is-6">
                                                        <div class="field">
                                                            <label>Name</label>
                                                            <div class="control has-icon">
                                                                <input type="text" name="fname" required class="input" placeholder="Enter your first name" value="<?php echo $name;?>">
                                                                <div class="form-icon">
                                                                    <i data-feather="user"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="column is-6">
                                                        <div class="field">
                                                            <label>Surname</label>
                                                            <div class="control has-icon">
                                                                <input type="text" class="input" placeholder="Enter your surname" value="<?php echo $surname;?>" name="sname" required>
                                                                <div class="form-icon">
                                                                    <i data-feather="user"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="column is-12">
                                                        <div class="field">
                                                            <label>Phone Number</label>
                                                            <div class="control has-icon">
                                                                <input type="text" class="input" placeholder="Enter your phone number including country code +263 xxx xxx xxx" value="<?php echo $phone;?>" name="stu_phone" required>
                                                                <div class="form-icon">
                                                                    <i data-feather="smartphone"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="column is-12">
                                                        <div class="field">
                                                            <label>Email Address</label>
                                                            <div class="control has-icon">
                                                                <input type="email" class="input" placeholder="Enter your email address" value="<?php echo $email;?>" name="stu_email" required>
                                                                <div class="form-icon">
                                                                    <i data-feather="mail"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="column is-12">
                                                        <div class="field">
                                                            <label>Gender</label>
                                                            <div class="control has-icon">
                                                                <select class="input" name="stu_gender" required>
                                                                    <?php
                                                                    if($gender == ""){
                                                                        ?>
                                                                    <option value="">Choose Gender</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <?php
                                                                    }elseif($gender == "Male"){
                                                                        ?>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <?php
                                                                    }elseif($gender == "Female"){
                                                                        ?>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Male">Male</option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <div class="form-icon">
                                                                    <i data-feather="user"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="column is-12">
                                                        <div class="field">
                                                            <label>Home Address</label>
                                                            <div class="control">
                                                                <textarea class="textarea" required rows="4" placeholder="Home Address" name="stu_home_address" required><?php echo $home_address;?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--Form-->
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

        <script src="assets/js/wizard-dropzone.js"></script>
    </div>
</body>

</html>