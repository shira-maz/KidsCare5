<?php 
include ('../DB/DB.php');
include ('../GeneralTemplates/head.php');
include ('menu.php');
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<title>KidsCare-Notes</title>

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">לוח מודעות</h3>
                </div>
            </div>

   
            <div class="content-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                                    <?php
                                                  
                                                    $sql = "SELECT * FROM notes ORDER BY date  DESC";
                                                    $result1 = $conn->query($sql);
                                                    $conn->close();
                                                if ($result1->num_rows > 0) {
                                                    while ($row = $result1->fetch_assoc()) { 
                                                        
                                                    $newDate = date("d-m-Y", strtotime($row['date']));
                                                    ?>

                                                      <div class="col-sm-7 col-xs-5 col-md-6 col-xl-4 mt-3">
                                                        <ul class="ul-notes">
                                                            <li class="li-notes">
                                                        
                                                            <a class="a-notes">
                                                                <h2 class="h2-notes text-center"> <?= $row['title'] ?></h2>
                                                                <h6 class="date-notes text-center"><?= $newDate ?></h6>
                                                                <h6 class="h6-notes text-center"><?= $row['text'] ?></h6>
                                                            </a>
                                                            </li>
                                                        </ul>
                                                        </form>
                                                    </div>
                                                    <?php }
                                                }
                                                 ?>

                                                </div>
                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<?php 
include ('../GeneralTemplates/footer.php');
include ('../GeneralTemplates/JS.php');
?>

</body>

</html>