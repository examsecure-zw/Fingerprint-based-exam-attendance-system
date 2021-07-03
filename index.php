<?php
include("includes/db.php");
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

    <link href="css2.css" rel="stylesheet">
    <link href="css.css" rel="stylesheet">
    
</head>

<body>
    <div id="huro-app" class="app-wrapper">

        <!-- Pageloader -->
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <div class="auth-wrapper">

            <div class="modern-login">

                <div class="underlay h-hidden-mobile"></div>

                <div class="columns is-gapless is-vcentered">
                    <div class="column is-relative is-8 h-hidden-mobile">
                        <div class="hero is-fullheight is-image">
                            <div class="hero-body">
                                <div class="container">
                                    <div class="columns">
                                        <div class="column">
                                           
                                            <img class="hero-image" src="images/hit.png" alt="HIT Exams">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-4 is-relative">
                        <a class="top-logo" href="index.htm">
                            <img class="light-image" src="images/logo.svg" alt="HIT Exam Management">
                        </a>
                        <div class="is-form">
                            <div class="hero-body">
                                <div class="form-text">
                                    <h2 style="color:#23286B">Sign In</h2>
                                    <p>Welcome back to your account.</p>
                                </div>
                                <div class="form-text is-hidden">
                                    <h2>Recover Account</h2>
                                    <p>Reset your account password.</p>
                                </div>
                                <?php
                                if(isset($_POST["login"])){
                                    $message = "";
                                    $alert = "";
                                    $span = "";
                                    
                                    $username = htmlspecialchars($_POST["username"]);
                                    $password = htmlspecialchars($_POST["password"]);
                                    try{
                                        $student_login_query = $connect->prepare("SELECT * FROM students WHERE username=? AND password=?");
                                        $student_login_query->execute([$username,md5($password)]);
                                        $count_students = $student_login_query->rowCount();
                                        
                                        if($count_students == 1){
                                            //Logged In
                                            setcookie("student",$username, time() + (86400 * 30), "/");
                                            header("location:dashboard");
                                        }else{
                                            //Failed Login
                                            $message = "<center>Username And Or Password is Incorrect😛</center>";
                                            $alert = "message is-danger is-small";
                                            $span = "message-body";
                                        }
                                       
                                    }catch(PDOException $error){
                                        $message = $error->getMessage();
                                    }
                                }
                                ?>
                                <form method="POST" class="login-wrapper">
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
                                    <div class="control has-validation">
                                       
                                        <input type="text" class="input" placeholder="Enter your reg number" name="username" required>
                                        <small class="error-text">This is a required field</small>
                                        <div class="auth-label">Registration Number</div>
                                        <div class="auth-icon">
                                            <i class="lnil lnil-user"></i>
                                        </div>
                                        <div class="validation-icon is-success">
                                            <div class="icon-wrapper">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                        <div class="validation-icon is-error">
                                            <div class="icon-wrapper">
                                                <i data-feather="x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control has-validation">
                                        <input type="password" class="input" name="password" placeholder="Enter your password" required>
                                        <div class="auth-label">Password</div>
                                        <div class="auth-icon">
                                            <i class="lnil lnil-lock-alt"></i>
                                        </div>
                                    </div>

                                    <div class="control is-flex">
                                        <a id="forgot-link">Forgot Password?</a>
                                    </div>
                                    <div class="button-wrap has-help">
                                       
                                        
                                        <button type="submit" name="login" class="button h-button is-big is-rounded is-primary is-bold is-raised">Login Now</button>
                                        <span>Or <a href="#">Create</a> an account.</span>
                                    </div>
                                </form>

                                <form id="recover-form" class="login-wrapper is-hidden" method="POST">
                                    <p class="recover-text">Enter your registration number and click on the confirm button, We'll send you a text message detailing the steps to complete the procedure</p>
                                    <div class="control has-validation">
                                        <input type="text" class="input" name="rec_reg" required placeholder="Enter your Registration Number">
                                        <small class="error-text">This is a required field</small>
                                        <div class="auth-label">Registration Number</div>
                                        <div class="auth-icon">
                                            <i class="lnil lnil-user"></i>
                                        </div>
                                        <div class="validation-icon is-success">
                                            <div class="icon-wrapper">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                        <div class="validation-icon is-error">
                                            <div class="icon-wrapper">
                                                <i data-feather="x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button-wrap">
                                        <button id="cancel-recover" type="button" class="button h-button is-white is-big is-rounded is-lower">Cancel</button>
                                        <button type="submit" class="button h-button is-solid is-big is-rounded is-lower is-raised is-colored" name="recover_now">Confirm</button>
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
        <script src="assets/js/auth.js"></script>
    </div>
</body>

</html>