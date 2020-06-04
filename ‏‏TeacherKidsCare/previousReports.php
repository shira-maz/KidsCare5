<?php
include ('../DB/DB.php');
include ('../GeneralTemplates/head.php');
include ('menu.php');
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<title>KidsCare-Previous Reports</title>

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">צפייה בדוחות התפתחות </h3>
                </div>
            </div>

            <div class="content-body">
                <section id="line-awesome-icons">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <section>
                                            <div class="container">
                                                <div class="row">
                                                    <!--Profile Card-->
                                                    <?php
                                                 $sql = "SELECT fullName, fileToUpload, username FROM accounts where status='1'";
                                                 $result = $conn->query($sql);
                                                 
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) { ?>
                                                    <div class="col-md-4 mt-4">
                                                        <div class="card profile-card-4">
                                                            <div class="card-body pt-5">
                                                             <a
                                                                        href="previousDevelopmentalReport.php?username=<?= $row['username'] ?>">   <img alt="profile-image" class="profile"
                                                                    src="../uploads/<?= $row['fileToUpload'] ?>" />
                                                                <h5 class="card-title text-center"> <a
                                                                        href="previousDevelopmentalReport.php?username=<?= $row['username'] ?>">
                                                                        <?= $row['fullName'] ?> </a></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php }
                                                }
                                                 ?>
                                                 

                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                    </div>
            </div>
            </section>

        </div>
    </div>
    </div>



<?php 
include ('../GeneralTemplates/footer.php');
include ('../GeneralTemplates/JS.php');
?>

</body>
</html>