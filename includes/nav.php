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
                                    <img class="avatar" src="images/<?php echo $avatar;?>" alt="Student Avatar">
                                </div>
                            </div>
                            <div class="dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                    <div class="dropdown-head">
                                        <div class="h-avatar is-large">
                                            <img class="avatar" src="images/<?php echo $avatar;?>" alt="Student Avatar">
                                        </div>
                                        <div class="meta">
                                            <span><?php echo $name." ".$surname;?></span>
                                            <span>Student</span>
                                        </div>
                                    </div>
                                    <a href="profile" class="dropdown-item is-media">
                                        <div class="icon">
                                            <i class="lnil lnil-user-alt"></i>
                                        </div>
                                        
                                        <a href="profile" class="meta">
                                            <span>Profile</span>
                                            <span>Update your details</span>
                                        </a>
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a href="settings" class="dropdown-item is-media">
                                        <div class="icon">
                                            <i class="lnil lnil-cog"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Settings</span>
                                            <span>Update Account settings</span>
                                        </div>
                                    </a>
                                    <hr class="dropdown-divider">
                                    <div class="dropdown-item is-button">
                                        <a href="logout" class="button h-button is-primary is-raised is-fullwidth logout-button">
                                            <span class="icon is-small">
                                                <i data-feather="log-out"></i>
                                            </span>
                                            <span>Logout</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
        <div class="mobile-main-sidebar">
            <div class="inner">
                <ul class="icon-side-menu">
                    <li>
                        <a href="dashboard">
                            <i data-feather="home"></i>
                        </a>
                    </li>
                    <li>
                        <a href="registration">
                            <i data-feather="grid"></i>
                        </a>
                    </li>
                    <li>
                        <a href="exams">
                            <i data-feather="calendar"></i>
                        </a>
                    </li>
                    <li>
                        <a href="results">
                            <i data-feather="book"></i>
                        </a>
                    </li>
                    <li>
                        <a href="profile">
                            <i data-feather="user"></i>
                        </a>
                    </li>
                </ul>

                <ul class="bottom-icon-side-menu">
                    <li>
                        <a href="settings">
                            <i data-feather="settings"></i>
                        </a>
                    </li>
                </ul>
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
                        <?php
                        if($currentPage == "dashboard.php"){
                            $active = "is-active";
                        }else{
                            $active = "";
                        }
                        ?>
                        <a href="dashboard" class="centered-link <?php echo $active;?>">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </a>
                        <?php
                        if($currentPage == "registration.php"){
                            $active = "is-active";
                        }else{
                            $active = "";
                        }
                        ?>
                        <a href="registration" class="centered-link <?php echo $active;?>">
                            <i data-feather="grid"></i>
                            <span>Registration</span>
                        </a>
                        <?php
                        if($currentPage == "exams.php"){
                            $active = "is-active";
                        }else{
                            $active = "";
                        }
                        ?>
                        <a href="exams" class="centered-link <?php echo $active;?>">
                            <i data-feather="calendar"></i>
                            <span>Exams Calendar</span>
                        </a>
                        <?php
                        if($currentPage == "results.php"){
                            $active = "is-active";
                        }else{
                            $active = "";
                        }
                        ?>
                        <a href="results" class="centered-link <?php echo $active;?>">
                            <i data-feather="book"></i>
                            <span>Results</span>
                        </a>
                        <?php
                        if($currentPage == "profile.php"){
                            $active = "is-active";
                        }else{
                            $active = "";
                        }
                        ?>
                        <a href="profile" class="centered-link <?php echo $active;?>">
                            <i data-feather="user"></i>
                            <span>Profile</span>
                        </a>
                        <?php
                        if($currentPage == "settings.php"){
                            $active = "is-active";
                        }else{
                            $active = "";
                        }
                        ?>
                        <a href="settings" class="centered-link <?php echo $active;?>">
                            <i data-feather="settings"></i>
                            <span>Settings</span>
                        </a>
                    </div>
                </div>
                <div class="right">

                    <div class="dropdown profile-dropdown dropdown-trigger is-spaced is-right">

                        <img src="images/<?php echo $avatar;?>" alt="Student Avatar">
                        <span class="status-indicator"></span>

                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <div class="dropdown-head">
                                    <div class="h-avatar is-large">
                                        <img class="avatar" src="images/<?php echo $avatar;?>" alt="Student Avatar">
                                    </div>
                                    <div class="meta">
                                        <span><?php echo $name." ".$surname;?></span>
                                        <span>Student</span>
                                    </div>
                                </div>
                                <a href="profile" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-user-alt"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Profile</span>
                                        <span>Update your Profile</span>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="settings" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-cog"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Settings</span>
                                        <span>Update Account settings</span>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <div class="dropdown-item is-button">
                                    <a href="logout" class="button h-button is-primary is-raised is-fullwidth logout-button">
                                        <span class="icon is-small">
                                            <i data-feather="log-out"></i>
                                        </span>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-subsidebar">
            <div class="inner">
                <div class="sidebar-title">
                    <h3>Dashboard</h3>
                </div>

                <ul class="submenu" data-simplebar="">
                    <li>
                        <a href="dashboard">Dashboard</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="registration">Registration</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="exams">Exams Calendar</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="results">Results</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="profile">Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="settings">Settings</a>
                    </li>

                </ul>
            </div>
        </div>