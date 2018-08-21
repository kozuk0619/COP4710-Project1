<html>
<?php
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];


$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = ($_POST['password']);
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
$student = (int)isset($_POST['student']);


// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM User WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO User (first_name, last_name, email, password, hash, isStudent) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash', '$student')";
    

    // Add user to the database
    if ( $mysqli->query($sql) ){
        $id = $mysqli->query("SELECT * FROM User WHERE email='$email'");
        $id1 = $id->fetch_assoc();
        $id2=$id1['id'];
        if($student==1){
            $email1 = explode('@', $email);
            $sql1="INSERT INTO Student(fsuID,id)"
              .    "VALUES('$email1[0]','$id2')";
        }
        else{
            $sql1="INSERT INTO CompanyRep(id)"
            .    "VALUES('$id2')";
        }
        $date = date('Y-m-d H:i:s');
        $sql2="INSERT INTO UserLog(id, account_made)"
        .    "VALUES('$id2', '$date' )";
        $mysqli->query($sql1);
        $mysqli->query($sql2);


        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to  please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      =      $email;
        $subject = 'Account Verification';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

		http://ww2.cs.fsu.edu/~landerso/login/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}
