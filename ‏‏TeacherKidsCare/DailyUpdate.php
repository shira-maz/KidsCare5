<?php
include ('../DB/DB.php');
include ('../GeneralTemplates/head.php');
include ('menu.php');
$date1 =date("Y-m-d");
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<style>
  .hide { 
    position:absolute; 
    top:-1px; 
    left:-1px; 
    width:0px; 
    height:0px; 
    }

  select {
      width:10em;
      height: 1.8em;
      background-color: #d8ebea;
  }

  h5 {
    display: inline;
     margin-left:2%;
  }

  img {
      margin-right:2%; 
      margin-left: 1%; 
      margin-bottom:3%
      vertical-align: sub;
  }

  .container {
    display: inline;
    margin-top:1%;
  }
  
  @media screen and (max-width: 992px) {
  .container {
    display: block;}
  }
</style>

<title>KidsCare-Daily Update</title>

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">עדכון יומי</h3>
                </div>
            </div>

            <div class="content-body">
                <section id="line-awesome-icons">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">עדכון שינה וארוחות</h4>
                                    <h3 class="card-title text-center" style ="margin-top:2%;"> 
                                     גננת יקרה, בעמוד זה יופיעו ילדים עבורם סימנת נוכחות חיובית להיום בעמוד רשימת הנוכחות.
                 </h3> 
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
                                                       $sql = "SELECT username, fullName, fileToUpload FROM accounts where status='1'";
                                                       $result = $conn->query($sql);
                                                       $i==0;
                                                         if ($result->num_rows > 0) {
                                                          while ($row = $result->fetch_assoc()) { 
                                                              
                                                              $username1 = $row['username'];
                                                              $q= "SELECT * from attendance WHERE date = '$date1' AND username = '$username1'";
                                                              $res= $conn->query($q);
                                                              $row1 = $res->fetch_assoc();
                                                            if ($row1['attendanceStatus'] == 'present') {
                                                                $i++;
                                                            ?>

                         <div class="col-lg-12 col-xl-10" style ="margin:auto;">
                            <div id="accordion3" class="card-accordion">
                                <div class="card collapse-icon accordion-icon-rotate">
                                    <div class="card">
                                        <div class="card-header" id="headingGOne">
                                            <h4 class="mb-0">
                                                <button class="btn btn-link" style="font-size:16px" data-toggle="collapse" data-target=" <?php echo '#accordionC'.$i; ?>" aria-expanded="true" aria-controls="<?php echo 'accordionC'.$i; ?>">
                                               <span class="avatar avatar-online"><img  src="../uploads/<?= $row['fileToUpload'] ?>" alt="avatar">
                                               <?= $row['fullName'] ?>
                                                </button>
                                            </h4>
                                        </div>

                                        <div id="<?php echo 'accordionC'.$i; ?>" class="collapse" aria-labelledby="headingGOne" data-parent= <?php echo '#accordionC'.$i; ?>>
                                            <div class="card-body">
                                            <div class="row skin skin-flat">
                                            <div class="col-md-11 col-sm-12">
                                            <iframe name="hiddenFrame" class="hide"></iframe>
                                            <form method="post" action="DailyUpDB.php" name="attendance" autocomplete="on" target="hiddenFrame" id="myform">
                                            <input type="hidden" name="username" value="<?= $row['username'] ?>">

                                                    <div class="container" style="margin-bottom: 3%;" >
                                                    <img style ="display: inline; width:1.8em; height:2em;" src="..\app-assets\images\icons\bed2.png"> <h5> <b> מצב שינה יומי </b></h5>
                                                    <select name="sleep"  onchange='if(this.value != 0) { this.form.submit(); }'>
                                                    <option disabled selected value> בחר/י אפשרות</option>
                                                     <option  value="1" <?php if ($row1['SleepStatus'] && $row1['SleepStatus'] == "good" ) { echo 'selected';}?>>מצויין</option>
                                                     <option value="2" <?php if ($row1['SleepStatus'] && $row1['SleepStatus'] == "ok" ) { echo 'selected';}?> >בינוני</option>
                                                     <option value="3"  <?php if ($row1['SleepStatus'] && $row1['SleepStatus'] == "little" ) { echo 'selected';}?>>ישנ/ה מעט</option>
                                                     <option value="4" <?php if ($row1['SleepStatus'] && $row1['SleepStatus'] == "not sleep" ) { echo 'selected';}?>>לא ישנ/ה </option>
                                                     </select>
                                                    </div>

                                                    <div class="container">
                                                    <img style ="display: inline; width:1.1em; height:1.6em;" src="..\app-assets\images\icons\food.png"/> <h5 > <b> מצב ארוחות יומי </b></h5>
                                                    <select  name="food" onchange='if(this.value != 0) { this.form.submit(); }'>
                                                    <option disabled selected value> בחר/י אפשרות</option>
                                                     <option value="1" <?php if ($row1['FoodStatus'] && $row1['FoodStatus'] == "good" )  { echo 'selected';}?>>מצויין</option>
                                                     <option value="2" <?php if  ($row1['FoodStatus'] && $row1['FoodStatus'] == "ok" ) { echo 'selected';}?> >בינוני</option>
                                                     <option value="3"  <?php if ($row1['FoodStatus'] && $row1['FoodStatus'] == "little" ) { echo 'selected';}?>>אכל/ה מעט</option>
                                                     <option value="4" <?php if ($row1['FoodStatus'] && $row1['FoodStatus'] == "not eat" ) { echo 'selected';}?>>לא אכל/ה </option>
                                                     </select>
                                                    </div>
                                                
                                                </form>
                                            </div>
                                        </div>
                                                                   

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                        </div>
                        <?php
                             }    
                             }
                               }
                               if ($i==0) { ?>

                                 <h3 style = "margin: auto;" >  אין רישומי נוכחות לתאריך זה </h3>

                            <?php } ?>
                           
                                                </div>
                                                <input type="button" onclick="location.href = 'home.php';" value = "חזרה לדף הבית" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-6 mr-1 mb-1" style ="margin-right:25%; margin-top:3%;"> 
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