<?php
include ('../DB/DB.php');
include ('../GeneralTemplates/head.php');
include ('menu.php');
$date1 =date("Y-m-d");
$newDate = date("d-m-Y", strtotime($date1));
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<title>KidsCare-Home</title>

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

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
                            <div class="card-header" style="background-color:Lavender">
                            <h4 class="card-title">אודות</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
	                                    <section>
										<div class="container">
									           <div class=" text-center">
                                                   <h3 class=> הורה יקר, <br>
                                                אנו שמחות שבחרת בנו להיות האחראיות על טיפול וצמיחת ילדך.
                                                <br> <br>
                                            הרגש חופשי לפנות אלינו בכל שאלה! 
                                            <br>ליצירת קשר:<br> 08-9502524<br>
                                  <br>  חנה וגלי<br>
                                  
                                    </h3>
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
    
        <div class="content-wrapper">
               <div class="content-body">
                <section id="line-awesome-icons">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" style="background-color:LavenderBlush">
                                <h4 class="card-title">איך התנהג ילדך היום?</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <section>
                                            <div class="container">
                                                <div class="row">
                                        <div class="col-lg-8 col-xl-8 text-center round" style =" padding: 4% 0 4% 0;margin:auto; background-color:LavenderBlush;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  ">

                                                    <?php     
                                           $qD= "SELECT * from attendance WHERE date = '$date1' and username = '$username1'";
                                           $resD= $conn->query($qD);
                                           $countD = $resD->num_rows;
                                        if ($countD > 0) {?>

                                       <h4 style ="margin-bottom:3%; color:black;  font-weight: bold;" > נכון לתאריך  <?= $newDate ?> </h4>
                                      
                                           
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
                                           
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                    </div>
                    </div> 
        <div class="content-wrapper">
            <div class="content-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" style="background-color:LightCyan">
                                <h4 class="card-title">מודעות אחרונות</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                
                                                <div class="row">
                                                    <?php
                                                  
                                                    $sql = "SELECT * FROM notes ORDER BY date  DESC LIMIT 3";
                                                    $result1 = $conn->query($sql);
                                                    $conn->close();
                                                if ($result1->num_rows > 0) {
                                                    while ($row = $result1->fetch_assoc()) { ?>

                                                      <div class="col-sm-7 col-xs-5 col-xl-4 mt-3">
                                                        <ul class="ul-notes">
                                                            <li class="li-notes">
                                                        
                                                            <a class="a-notes" style="background-color:LightCyan" >
                                                                <h2 class="h2-notes text-center"> <?= $row['title'] ?></h2>
                                                                <h6 class="date-notes text-center"><?= date("d-m-Y", strtotime($row['date'])) ?></h6>
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
                                    </section>
                                </div>
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