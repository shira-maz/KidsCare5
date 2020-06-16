<?php
include ('../DB/DB.php');
include ('../GeneralTemplates/head.php');
include ('menu.php');

$date1 =date("Y-m-d");
$newDate = date("d-m-Y", strtotime($date1));

if (isset($_POST['search'])) {
    $date1 = $_POST['dates1'];
    $newDate = date("d-m-Y", strtotime($date1));
}
?>

<style>
td, th {
   text-align: center;
}
</style>



<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<title>KidsCare-Daily Update</title>

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">עדכוני שינה וארוחות</h3>
                </div>
            </div>

            <div class="content-body">
                <section id="line-awesome-icons">
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
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <section>
                                            <div class="container">
                                                <div class="row">
                    
                                       <div class="col-lg-12 col-xl-12 text-center" style="margin-bottom:4%" >
                                           <h3> אנא בחר תאריך </h3>
                                        <form method="post" >
                                            <input type="date" name = "dates1" class="col-xs-4">
                                            <button type = "submit" name="search"   style = "display:inline; line-height: 7.5px; padding:11px 15px 11px 15px; " class="btn btn-glow btn-bg-gradient-x-purple-blue col-xs-4"> בחר </button>
                                        </form>
                                   </div>
                                   <div class="col-lg-8 col-xl-8 text-center round" style =" padding: 4% 0 4% 0;margin:auto; background-color:rgb(19, 178, 209, 0.20);   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  ">

                                        <?php     
                                           $qD= "SELECT * from attendance WHERE date = '$date1' and username = '$username1'";
                                           $resD= $conn->query($qD);
                                           $countD = $resD->num_rows;
                                        if ($countD > 0) {?>

                                       <h4 style ="margin-bottom:3%; color:black;  font-weight: bold;" > נכון לתאריך  <?=  $newDate ?> </h4>
                                      
                                           
                                        <?php 
                                            while ($row3D = $resD->fetch_assoc()) { ?>
                                           
                                            <?php if($row3D['attendanceStatus'] == 'present') {?>
                                                <div style ="margin:5% 0% 1% 2%">  <img style ="display: inline; width:1.8em; height:2em; margin-right:2%" src="..\app-assets\images\icons\bed2.png"> <h4  style ="display: inline"> <b> מצב שינה יומי </b></h4> </div>
                                            <br>
                                              
                                                <?php if($row3D['SleepStatus'] == 'good') {?>
                                               <h4 style = "display:inline" class="text-bold-700">  <?php echo $row3D['fullName'] ?> </h4>    <h4 style = "display:inline"  >ישנ/ה מצויין </h4>
                                                <?php } 
                                                else if ($row3D['SleepStatus'] == 'ok') {?>
                                                <h4 style = "display:inline" class="text-bold-700">  <?php echo $row3D['fullName'] ?> </h4>    <h4 style = "display:inline"  >ישנ/ה חלקית</h4>
                                                 <?php } 
                                                else if ($row3D['SleepStatus'] == 'little') {?>
                                                <h4 style = "display:inline" class="text-bold-700">  <?php echo $row3D['fullName'] ?> </h4>    <h4 style = "display:inline"  >ישנ/ה מעט</h4>
                                                 <?php } 
                                                else if ($row3D['SleepStatus'] == 'not sleep') {?>
                                              <h4 style = "display:inline" class="text-bold-700">  <?php echo $row3D['fullName'] ?> </h4>      <h4 style = "display:inline"  >לא ישנ/ה בכלל</h4>

                                                <?php } else { ?>
                                                    <h4 style = "display:inline"  >אין נתונים</h4>
                                                <?php } ?>           
                                              
                                                 
                                            <div style ="margin:5% 0% 1% 2%"> <img style ="display: inline; width:1.1em; height:1.6em; margin-right:2%" src="..\app-assets\images\icons\food.png"/> <h4 style ="display: inline"> <b> מצב ארוחות יומי </b></h4></div>
                                            
                                          

                                                <?php if($row3D['FoodStatus'] == 'good') {?>
                                                   <h4 class="text-bold-700" style = "display:inline" >  <?php echo $row3D['fullName'] ?> </h4>   <h4 style = "display:inline"  >אכל/ה מצויין </h4>
                                                
                                                <?php } 
                                                else if ($row3D['FoodStatus'] == 'ok') {?>
                                                   <h4 class="text-bold-700" style = "display:inline" >  <?php echo $row3D['fullName'] ?> </h4>    <h4 style = "display:inline"  >אכל/ה חלקית</h4>
                                                 <?php } 
                                                else if ($row3D['FoodStatus'] == 'little') {?>
                                                    <h4 class="text-bold-700" style = "display:inline" >  <?php echo $row3D['fullName'] ?> </h4>   <h4 style = "display:inline"  >אכל/ה מעט</h4>
                                                 <?php } 
                                                else if ($row3D['FoodStatus'] == 'not sleep') {?>
                                                     <h4 class="text-bold-700" style = "display:inline" >  <?php echo $row3D['fullName'] ?> </h4>  <h4 style = "display:inline" >לא אכל/ה בכלל</h4>

                                                <?php } else { ?>
                                                    <h4 style = "display:inline">אין נתונים</h4>
                                                <?php }          
                                         
                                        }
                                        else { ?>
                                            <h4 style = "display:inline">הילד לא נכח בגן</h4>
                                       <?php }
                                    
                                       }
                                        }

                                        else {  ?>
                                  
                                        <h2 style ="text-align:center;">אין רישום עבור יום זה</h2>
                                             
                                            <?php  }
                                        ?>
                                        </div>
                                        </div>
                                                </div>
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