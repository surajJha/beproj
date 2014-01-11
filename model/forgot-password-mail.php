<?php

// check if entered email id is present in the database
// if yes then send the mail to this email id
// the email id doesn't exist in the database ,
//then send an error message back to ajax.....
require_once 'database.php';
$user_email = $_POST['email'];

$query = "select * from user where email = '{$user_email}'";
if ($result = mysqli_query($connection, $query)) {
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];


// sending the mail to the user for changing password
        $to = $email;
        $subject = "Change Password - HEXAGRAPH";
//BODY COMES HERE
        $body = "<b> Hey {$fname} {$lname} </b><br>"
                . "It seems that you have lost your password."
                . "please click the link below which will redirect you to a page."
                . "Please set you new password and login to the system"
                . "<br>"
                . "Thank you<br>With best Regards - Hexagraph team <br>"
                . "Click the following link <br>"
                . "Click the following link <br>"
                . "<a href=\"http://localhost/beproj/view/change-forgotten-password.php\">CHANGE YOUR PASSWORD</a> <br>";


        $headers = "From: Hexagraph\r\n";
        $headers .= "X-Mailer: PHP5\n";
        $headers .= 'MIME-Version: 1.0' . "\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($to, $subject, $body, $headers);
        echo "A  Mail has been sent to you email id. please read the mail and follow further instructions.";
    } else {
        echo "Sorry this email id is not present in our database. It seems that you are not a registered user !!";
    }
} else {
    echo mysqli_error($connection);
}






