
<?php

 include ('Templates/DB.php');

 $target_dir = "../uploads/";
 $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 $uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 if(isset($_POST["submit"])) {
     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
     if($check !== false) {
         $uploadOk = 1;
     } else {
         $uploadOk = 0;
     }
 }

 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
   
$sql = "INSERT INTO accounts (username, password, email, fullName, idNum, gender, birthday, parentName1,
 phone1, parentName2, phone2, address, allergies, medicines, fileToUpload, status)
 VALUES ('".$_POST["username"]."', '".$_POST["password"]."',
  '".$_POST["email"]."', '".$_POST["fullName"]."',
   '".$_POST["idNum"]."', '".$_POST["gender"]."',
   '".$_POST["birthday"]."', '".$_POST["parentName1"]."',
    '".$_POST["phone1"]."', '".$_POST["parentName2"]."',
	'".$_POST["phone2"]."', '".$_POST["address"]."', '".$_POST["allergies"]."',
     '".$_POST["medicines"]."', '". basename($_FILES["fileToUpload"]["name"])."', '".$_POST["status"]."' )";
 }
else {
    $target_dir = "../uploads/profile.PNG";
    $target_file = $target_dir;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       
$sql = "INSERT INTO accounts (username, password, email, fullName, idNum, gender, birthday, parentName1,
phone1, parentName2, phone2, address, allergies, medicines, fileToUpload, status)
VALUES ('".$_POST["username"]."', '".$_POST["password"]."',
 '".$_POST["email"]."', '".$_POST["fullName"]."',
  '".$_POST["idNum"]."', '".$_POST["gender"]."',
  '".$_POST["birthday"]."', '".$_POST["parentName1"]."',
   '".$_POST["phone1"]."', '".$_POST["parentName2"]."',
   '".$_POST["phone2"]."', '".$_POST["address"]."', '".$_POST["allergies"]."',
    '".$_POST["medicines"]."', '".$target_file."', '".$_POST["status"]."' )";

}

if ($conn->query($sql)==false) {
    echo "Error ".
        $conn->error;
    exit();
}

$conn->close();       
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<?php
     include ('Templates/head.php');
     ?>

<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <!-- BEGIN: Content-->
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
                                 
                                </div>
                                <div class="card-content">
                                    
                                    <div class="card-body text-center">
                                        <h1> הרישום בוצע בהצלחה <br> יש להמתין לאישור הגננת</h1>

                                        </form>
                                    </div>
                                

                                    <p class="card-subtitle text-muted text-center font-small-6 mx-2 my-1"><span> <a href="index.php" class="card-link">לחץ כאן לחזרה</a></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <?php
     include ('Templates/JS.php');
     ?>

</body>
</html>


