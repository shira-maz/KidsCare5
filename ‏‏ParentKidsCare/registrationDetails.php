
<?php
include ('../DB/DB.php');
include ('../GeneralTemplates/head.php');
include ('menu.php');

$username1 = $_SESSION["name"];
$query ="SELECT * FROM accounts WHERE username = '$username1'";
mysqli_query($conn, $query) or die('Error querying database.');
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
 <title>KidsCare-Details</title>
 
<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

  <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">פרטי הילד</h3>
                </div>
            </div>

     
            <div class="card">
              <div class="card profile-card-4">
               <div class="card-body pt-5">
                 <img alt="profile-image" class="profile" src="../uploads/<?= $row['fileToUpload'] ?>" />
                  <h5 class="card-title text-center"> <?= $row['fullName'] ?> </h5>
                  </div>

                                <div class="content-wrapper">
                                    <div class="content-body">
                                        <section class="flexbox-container">
                                            <div class="col-12 d-flex align-items-center justify-content-center">
                                                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                                    <div class="card-content" style="margin-top:7%;">
                                                        <div class="row justify-content-md-center">
                                                                    <form method="post" action="EditingRegister.php" name="accounts"
                                                                        onsubmit="return registrationFormValidation();"
                                                                        autocomplete="on" enctype="multipart/form-data">
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-5">שם
                                                                                משתמש</label><input type="text"
                                                                                class="form-control round col-md-7"
                                                                                style="display: inline-block; border: solid 1px black;"
                                                                                name="username"
                                                                                value="<?php echo $row['username'] ?>"
                                                                                required readonly> </div>
                                                             
                                                                                                                                                <div class=form-group row>
                                                                            <label class="col-lg-5">אימייל</label><input
                                                                                type="email"
                                                                                class="form-control round col-md-7"
                                                                                style="display: inline-block"
                                                                                name="email"
                                                                                value="<?php echo $row['email'] ?>"
                                                                                required ></div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-5">שם מלא</label><input
                                                                                type="text"
                                                                                class="form-control round col-md-7"
                                                                                style="display: inline-block"
                                                                                name="fullName"
                                                                                value="<?php echo $row['fullName'] ?>"
                                                                                required ></div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-5">ת.ז</label><input
                                                                                type="text"
                                                                                class="form-control round col-md-7"
                                                                                style="display: inline-block"
                                                                                name="idNum"
                                                                                value="<?php echo $row['idNum'] ?>"
                                                                                required ></div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-5">מין</label>
                                                                            <label > <input type="radio"  style ="display: inline-block" name="gender" value="זכר" required <?php if (isset ($row['gender']) && $row['gender'] == "זכר" ) { echo 'checked';}?>> זכר</label>
                                                                            <label > <input type="radio"  style ="display: inline-block" name="gender" value="נקבה" required <?php if (isset ($row['gender']) && $row['gender'] == "נקבה" ) { echo 'checked';}?>> נקבה</label>
                                                                        </div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-5">תאריך
                                                                                לידה</label><input type="date"
                                                                                class="form-control round col-md-7"
                                                                                style="display: inline-block"
                                                                                min="2017-01-01" max="2020-01-01" name="birthday"
                                                                                value="<?php echo $row['birthday'] ?>"
                                                                                required ></div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-5"> שם ההורה</label><input
                                                                                type="text"
                                                                                class="form-control round col-md-7"
                                                                                style="display: inline-block"
                                                                                name="parentName1"
                                                                                value="<?php echo $row['parentName1'] ?>"
                                                                                required ></div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-5">מספר
                                                                                טלפון</label><input type="numbers"
                                                                                class="form-control round col-md-7"
                                                                                style="display: inline-block"
                                                                                name="phone1"
                                                                                value="<?php echo $row['phone1'] ?>"
                                                                                required > </div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-5">שם ההורה</label><input
                                                                                type="text"
                                                                                class="form-control round col-md-7"
                                                                                style="display: inline-block"
                                                                                name="parentName2"
                                                                                value="<?php echo $row['parentName2'] ?>"
                                                                                required ></div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-5">מספר
                                                                                טלפון</label><input type="numbers"
                                                                                class="form-control round col-md-7"
                                                                                style="display: inline-block"
                                                                                name="phone2"
                                                                                value="<?php echo $row['phone2'] ?>"
                                                                                required ></div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-5">כתובת</label><input
                                                                                type="text"
                                                                                class="form-control round col-md-7"
                                                                                style="display: inline-block"
                                                                                name="address"
                                                                                value="<?php echo $row['address'] ?>"
                                                                                required ></div>
                                                                        <div class=form-group row>
                                                                            <label
                                                                                class="col-lg-5" >אלרגיות</label><textarea
                                                                                class="form-control round col-md-7"
                                                                                 style="display: inline-block;vertical-align: text-top;"
"
                                                                                name="allergies"><?php echo $row['allergies'] ?></textarea>
                                                                        </div>
                                                                        <div class=form-group row>
                                                                            <label
                                                                                class="col-lg-5">תרופות</label><textarea
                                                                                class="form-control round col-md-7"
                                                                                 style="display: inline-block;vertical-align: text-top;""
                                                                                name="medicines"><?php echo $row['medicines'] ?> </textarea>
                                                                        </div>
                                                                        <div class="form-actions center">
                                      <div class="form-group text-center">
                                     <button type="submit"  class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">שמור פרטים</button> </div>
                                     </div>
                                     
                                     </div>

                                                                </div>
                                                                </form>

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