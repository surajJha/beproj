<?php

// check if entered email id is present in the database
// if yes then send the mail to this email id
// the email id doesn't exist in the database ,
//then send an error message back to ajax.....
require_once 'database.php';
include 'encryption.php';

$user_email = $_POST['email'];

$query = "select * from user where `email` = '{$user_email}'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

if ($row !== NULL) {

    $user_id = $row['user_id'];
    $fname = $row['fname'];
    $lname = $row['lname'];

    $new_password = rand(1000, 9999);
    $hashed_password = password_encrypt($new_password);

    $query = "update user set password='{$hashed_password}' where user_id='{$user_id}'";
    if (mysqli_query($connection, $query)) {

        // sending the mail to the user for changing password
        $to = $user_email;
        $subject = "Change Password - HEXAGRAPH";

        $message = " Hey <b>{$fname} {$lname},</b><br>"
                . "It seems that you have forgotten your password."
                . "Please login with the password provided and set a new password."
                . "<br>"
                . "Username : {$user_id}<br>"
                . "Password : {$new_password}<br>"
                . "Thank you<br>With best Regards - Hexagraph team <br>"
                . "<a href=\"http://localhost/beproj/view/index.php\">Login !</a> <br>";

        include("class.phpmailer.php");
        include("class.smtp.php"); // note, this is optional - gets called from main class if not already loaded

        $mail = new PHPMailer();

        $body = $message;

        $mail->IsSMTP();
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port = 465;                   // set the SMTP port

        $mail->Username = "hexagraph69@gmail.com";  // GMAIL username
        $mail->Password = "shaktiman";            // GMAIL password

        $mail->From = "hexagraph69@gmail.com";
        $mail->FromName = "Webmaster Hexagraph";
        $mail->Subject = $subject;
        $mail->AltBody = "This is the body when user views in plain text format"; //Text Body
        $mail->WordWrap = 50; // set word wrap

        $mail->MsgHTML($body);

        $mail->AddReplyTo("hexagraph69@gmail.com", "Webmaster");

//$mail->AddAttachment("/path/to/file.zip");             // attachment
//$mail->AddAttachment("/path/to/image.jpg", "new.jpg"); // attachment

        $mail->AddAddress($user_email, $fname);

        $mail->IsHTML(true); // send as HTML

        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            // echo to the user that mail has been sent and proceed to the next step
            echo "Please check your email for the new password!";
        }
    } else {
        mysqli_error($connection);
    }
} else {
    echo "Invalid email-id!";
}


