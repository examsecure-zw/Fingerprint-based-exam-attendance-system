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
        <div id="app-onboarding" class="view-wrapper is-webapp" data-page-title="HIT Notifications" data-naver-offset="214" data-menu-item="#layouts-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered is-webapp">

                        <div class="title-wrap">
                            <h1 class="title is-4">HIT Notifications</h1>
                        </div>
                    </div>

                    <div class="page-content-inner">

                        <!--Action Page-->
                        <div class="action-page-wrapper action-page-v1">
                            <div class="wrapper-inner">
                                <div class="action-box">
                                    <?php
                                    if(isset($_POST["send_notification"])){
                                        $message = "";
                                        $alert = "";
                                        $span = "";
                                        
                                        $notification = htmlspecialchars($_POST["notification"]);
                                        
                                        try{
                                            $send_query = $connect->prepare("INSERT INTO notifcations (semester,notification,date) VALUES (?,?,NOW())");
                                            $send_query->execute([$sem_code,$notification]);
                                            $message = "<center>You have succesffuly send a notification😎</center>";
                                            $alert = "message is-success is-small";
                                            $span = "message-body";
                                            
                                        }catch(PDOException $error){
                                            $message = $error->getMessage();
                                        }
                                    }
                                    ?>
                                    <form method="POST">
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
                                        <div class="box-content">
                                            <div class="h-avatar is-big">
                                                <img class="avatar" src="../images/dashboard.png" alt="HIT" data-user-popover="16">
                                            </div>
                                            <h3 class="dark-inverted">
                                                Send important notifications to HIT students
                                            </h3>
                                            <div class="sender-message is-dark-card-bordered is-dark-bg-4">
                                                <textarea class="input" rows="5" name="notification" placeholder="Message"></textarea>
                                            </div>
                                            <div class="people-wrap">
                                                <div class="people">
                                                    <br><br><br>
                                                </div>

                                            </div>
                                            <div class="buttons">

                                                <button class="button h-button is-primary is-raised" type="submit" name="send_notification">Send Notification</button>
                                            </div>
                                        </div>
                                    </form>
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
        <script src="../assets/js/syntax.js"></script>
    </div>
</body>

</html>