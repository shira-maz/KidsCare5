<?php
include ('../DB/DB.php');

if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}

if ($stmt = $conn->prepare('SELECT id, password FROM accountsstaff WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        if ($_POST['password'] === $password) {
            
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location:home.php');
        } else {
           
            $error1 = "סיסמה שגויה";
           $_SESSION["error"] = $error1;
            header("Location: index.php");
            
        }
    } else {
        $error2 = "שם משתמש שגוי";
        $_SESSION["error"] = $error2;
         header("Location: index.php");
    }


	$stmt->close();
}
?>
