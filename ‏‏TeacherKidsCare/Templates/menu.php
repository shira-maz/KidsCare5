
<?php
     include 'Templates\DB.php';
$username1 = $_SESSION["name"]; 
$query ="SELECT * FROM accountsstaff WHERE username = '$username1'";
mysqli_query($conn, $query) or die('Error querying database.');
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>

    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="collapse navbar-collapse show" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item mobile-menu d-md-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ft-menu font-large-1"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                    class="ficon ft-maximize"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav float-right">

                        <!-- User -->
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"> <span class="avatar avatar-online"><img  src="../uploads/<?= $row['fileToUpload'] ?>" alt="avatar"></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img  src="../uploads/<?= $row['fileToUpload'] ?>" alt="avatar"><span class="user-name text-bold-700 ml-1"><?= $row['fullName'] ?></span></span></a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i
                                            class="ft-power"></i> התנתק</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
 
    <!-- BEGIN: menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="home.php"><img class="brand-logo"
                            src="../app-assets/images/logo/logo.png" />
                        <h3 class="brand-text">KidsCare</h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
            </ul>
        </div>
        <div class="navigation-background"></div>
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="registration.php"><i class="ft-home"></i><span class="menu-title"
                            data-i18n="">רישומים לגן</span></a>
                </li>
               

                <li class=" nav-item"><a href="#"><i class="ft-user-check"></i><span class="menu-title" data-i18n="">סדר יום
                           </span></a>
                    <ul class="menu-content">
                        <li class="navigation-divider"></li>
                        <li><a class="menu-item" href="attendanceList.php">רשימת נוכחות</a>
                        </li>
                        <li><a class="menu-item" href="DailyUpdate.php">שינה וארוחות</a>
                        </li>
                        <li><a class="menu-item" href="PreviousDailyUp.php">צפייה בדיווחים קודמים</a>
                        </li>
                    </ul>
                </li>
           

                <li class=" nav-item"><a href="Payments.php"><i class="ft-file-text"></i><span class="menu-title"
                            data-i18n="">תשלומים</span></a>
                </li>
                <li class=" nav-item"><a href="BulletinBoard.php"><i class="ft-message-circle"></i><span class="menu-title"
                            data-i18n="">לוח מודעות</span></a>
                </li>
                
                <li class=" nav-item"><a href="#"><i class="ft-edit"></i><span class="menu-title" data-i18n="">דוח
                            התפתחות</span></a>
                    <ul class="menu-content">
                        <li class="navigation-divider"></li>
                        <li><a class="menu-item" href="kidsForReports.php">מילוי דוח</a>
                        </li>
                        <li><a class="menu-item" href="previousReports.php">צפייה בדוחות קודמים</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
   