<?php  
include ('../DB/DB.php');
include ('../GeneralTemplates/head.php');
include ('menu.php');
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<title>KidsCare-Home</title>
<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">דף הבית</h3>
                </div>
            </div>

            <div class="content-body">
                <section id="line-awesome-icons">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ילדי הגן</h4>
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

                                                    <?php
                                                    $sql = "SELECT fullName, fileToUpload, username FROM accounts WHERE status='1'";

                                                    $result1 = $conn->query($sql);
                                                    $conn->close();
                                                if ($result1->num_rows > 0) {
                                                    while ($row = $result1->fetch_assoc()) { ?>

                                                    <div class="col-md-4 mt-4">
                                                        <div class="card profile-card-4">
                                                            <div class="card-body pt-5">
                                                             <a
                                                                        href="KidDetails.php?username=<?= $row['username'] ?>">  
                                                                <img alt="profile-image" class="profile"
                                                                    src="../uploads/<?= $row['fileToUpload'] ?>" />
                                                                    </a>
                                                                <h5 class="card-title text-center"> <a
                                                                        href="KidDetails.php?username=<?= $row['username'] ?>">
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