<?php 
include ('../DB/DB.php');
include ('../GeneralTemplates/head.php');
include ('menu.php');
?>
   

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<title>KidsCare-Notes</title>
<body class="vertical-layout vertical-menu 2-columns  fixed-navbar" data-open="click" data-menu="vertical-menu"
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
                                <button onclick="document.getElementById('newN').style.display='block'"  class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-8 mr-1 mb-1" style ="margin:2% 15% 0 0;" >להוספת מודעה לחצי כאן</button>
                                <div id="newN" class="modal">
                                        <form class="modal-content animate" action="addNote.php" method="post">
                                        <div class="imgcontainer">
                                        <span onclick="document.getElementById('newN').style.display='none'" class="close" title="Close Modal">&times;</span>
                                        </div>
                                         <div class="container">
                                         <h4 class="card-title text-center" id="h4-new" >הוספת מודעה חדשה</h4>
                                         <div class=form-group row>				
                                          <label class="col-xl-3">כותרת המודעה</label><input type="text" class="form-control round " style ="display: inline-block" name="title" required ></div>
                                          <div class=form-group row>				
                                          <label class="col-xl-3" style ="vertical-align:top; margin-top:3%;">מלל המודעה</label><textarea type="textarea" class="form-control round " style ="display: inline-block" name="text" required > </textarea></div>
                                          <button type="submit"  name="note"   onclick="document.getElementById('newN').style.display='none'" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-7 mr-1 mb-1" style ="margin-right:25%;" >  הוסף מודעה </button>
                                          </form>
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
                                                      <div class=" col-sm-7 col-xs-5 col-md-6 col-xl-4 mt-3">
                                                            <ul class="ul-notes">
                                                            <li class="li-notes">
                                                                <a class="a-notes" class="text-center">
                                                                <h2 class="h2-notes text-center"> <?= $row['title'] ?></h2>
                                                                <h6 class="date-notes text-center"><?= $newDate ?></h6>
                                                                <h6 class="h6-notes text-center"><?= $row['text'] ?></h6>
                                                            </a>
                                                            </li>
                                                        </ul>
                                                        <form method="post" action="deleteNote.php" onSubmit="return confirm('האם את/ה בטוח/ה שאת/ה רוצה למחוק את המודעה?')">
                                                    <input name=title value= "<?= $row['title'] ?>" hidden>
                                                            <input name=date value= "<?= $row['date'] ?>" hidden>
                                                            <input name=text value= "<?= $row['text'] ?>" hidden>
                                                            <input name=id value= "<?= $row['id'] ?>" hidden>
                                                            <button type="submit" class="close" style="margin: 2% 15% 0 0;">x</button>
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