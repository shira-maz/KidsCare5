<?php
include ('../DB/DB.php');
include ('../GeneralTemplates/head.php');
$date1 =date("Y-m-d");
ob_start();
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<title>KidsCare-Add Note</title>

<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click"
    data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="text-center mb-1">
                                        <img src="../app-assets/images/logo/logo.png" alt="branding logo">
                                    </div>
                                    <div class="font-large-1  text-center">
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <h1 class="text-center">
                                            <?php
                                   $sql = "INSERT INTO notes (title, text, date )
                                   VALUES ('".$_POST["title"]."', '".$_POST["text"]."', '$date1')";
                                   header("Location:NotesT.php");
                                   if ($conn->query($sql)==false) {
                                       echo "התרחשה תקלה. המודעה לא התווספה, אנא נסי שנית ";
                                       $conn->error;
                                    
                                   }
                                   $conn->close();
                                                                    
                            
                                    ?>
                                        </h1>
                                        <p class="card-subtitle text-muted text-center font-small-6 mx-2 my-1"><span><a
                                                href="BulletinBoard.php" class="card-link">לחזרה ללוח המודעות</a></span></p>
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
include ('../GeneralTemplates/JS.php');
?>
</body>
</html>


