<?php 
include ('../DB/DB.php');
include ('../GeneralTemplates/head.php');
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<title>KidsCare-Register</title>
<script src="../app-assets/js/registrationFormValidation.js"></script>

<style>
  .required:after {
    content:" *";
    color: red;
  }
</style>


<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image " data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <div class="app-content content"  >
        <div class="content-wrapper">
            <div class="content-body" >
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-5 col-md-9 col-11 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="text-center mb-1">
                                        <img style = " margin-bottom:5%" src="../app-assets/images/logo/logo.png" alt="branding logo">
                                    </div>
                                    <div class="font-large-1  text-center">
                                       הרשמה לגן
                                    </div>
                                </div>
                                <div class="card-content" style="margin-top:7%;">
                                <div class="row justify-content-md-center">
                        <div class=" col-xl-12 col-lg-11 col-md-11">
                            <div class="card">
                                <form method="post" action="register.php" name="accounts" onsubmit="return registrationFormValidation();" autocomplete="on" enctype="multipart/form-data">
                                <div class=form-group row>
                                <label class="col-xl-3 required">שם משתמש</label><input type="text"  class="form-control round col-md-8" style ="display: inline-block" name="username" required >
                                <P class="text-center" style = "margin-right:10%; margin-top:3%; font-size: 1rem "> אנא הזן אותיות באנגלית בלבד</P></div>
                                <div class=form-group row>
                                    <label class="col-xl-3 required">סיסמה</label><input type="password" name="password" class="form-control round col-md-8" style ="display: inline-block" required >	</div>
                                    <div class=form-group row>
                                    <label class="col-xl-3 required">אימות סיסמה</label><input type="password" name="confirmationPassword" class="form-control round col-md-8" style ="display: inline-block" required >	</div>
                                <div class=form-group row>
                                <label class="col-xl-3 required">אימייל</label><input type="email"  class="form-control round col-md-8" style ="display: inline-block" name="email" required></div>
                                <div class=form-group row>
                                <label class="col-xl-3 required">שם מלא</label><input type="text"  class="form-control round col-md-8" style ="display: inline-block" name="fullName" required ></div>	
                                <div class=form-group row>				
                                <label class="col-xl-3 required">ת.ז</label><input type="text" class="form-control round col-md-8" style ="display: inline-block" name="idNum" minlength="9" maxlength="9" required ></div>
                                <div class=form-group row>
                                    <label class="col-xl-3 required">מין</label>
                                <input type="radio"  style ="display: inline-block" name="gender" value="זכר" required ><label > זכר</label>
                                <input type="radio"  style ="display: inline-block" name="gender" value="נקבה" required ><label> נקבה</label>
                                </div>
                                <div class=form-group row>
                                <label class="col-xl-3 required">תאריך לידה</label><input type="date" class="form-control round col-md-8" style ="display: inline-block" name="birthday" required ></div>
                                <div class=form-group row>	
                                <label class="col-xl-3 required">שם ההורה</label><input type="text"  class="form-control round col-md-8" style ="display: inline-block" name="parentName1" required ></div>
                                <div class=form-group row>
                                <label class="col-xl-3 required">מספר טלפון</label><input type="numbers"  class="form-control round col-md-8" style ="display: inline-block" name="phone1" minlength="10" maxlength="10">	</div>
                                <div class=form-group row>
                                <label class="col-xl-3">שם ההורה</label><input type="text" class="form-control round col-md-8" style ="display: inline-block" name="parentName2"  ></div>
                                <div class=form-group row>
                                 <label class="col-xl-3">מספר טלפון</label><input type="numbers" class="form-control round col-md-8" style ="display: inline-block" name="phone2" minlength="10" maxlength="10" ></div>
                                 <div class=form-group row>	
                                    <label class="col-xl-3 required">כתובת</label><input type="text"  class="form-control round col-md-8" style ="display: inline-block" name="address" required ></div>
                                 <div class=form-group row>
                                <label class="col-xl-3">אלרגיות</label><textarea  class="form-control round col-md-8" style ="display: inline-block" name="allergies"  ></textarea></div>
                                <div class=form-group row>
                                <label class="col-xl-3">תרופות</label><textarea  class="form-control round col-md-8" style ="display: inline-block" name="medicines"  ></textarea></div>
                                <div></div>
                                <label class="col-xl-3" style = "margin-bottom:3%">העלה תמונה</label>
                                <input  type="file"  name="fileToUpload" id="fileToUpload"/> <br>
                                <P class="text-center" style = "margin-left:10%; margin-top:3%; font-size: 1rem "> מומלץ להעלות תמונה מרובעת</P>
                                <input type="hidden" name="status" value="3" hide >
                                <div class="form-actions center">
                                <button type="reset" class="btn round btn-min-width mr-1 mb-1">נקה שדות</button>
                                <div class="form-group text-center">
                                     <button type="submit"  class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">הירשם</button>
                                  </div>
                                </div>                         		
                            </form>
                        </div>
                    </div>
    <!-- END: Content-->

    <?php 
include ('../GeneralTemplates/JS.php');
?>
</body>
</html>