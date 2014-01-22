<?php

$t = $_POST['au_type'];

if ($t === "student")
{
    insertStudent();
}
else
{
    insertFaculty();
}

function insertStudent()
{

    include '../encryption.php';
    require_once '../database.php';

    $user_id = $_POST['au_user_id'];
    $fname = $_POST['au_fname'];
    $lname = $_POST['au_lname'];
    $email = $_POST['au_email'];
    $dob = $_POST['au_dob'];
    $phone = $_POST['au_phone'];
    $mt = $_POST['au_mothertongue'];

    $password = rand(1000, 9999);
    $hashed_password = password_encrypt($password);

    //later change $temp_email -> $email
    $temp_email = "skj48817@gmail.com";




    $query = "INSERT into USER (`user_id`, `password`, `fname`, `lname`, `email`, `phone`, `dob`, `type`) 
        values('{$user_id}','{$hashed_password}','{$fname}','{$lname}','{$email}','{$phone}','{$dob}','0')";
    if (mysqli_query($connection, $query))
    {

        //**********************************************************************
        // sending the mail to the user for changing password
        $to = $user_email;
        $subject = "Change Password - HEXAGRAPH";

        $message = " Hey <b>{$fname} {$lname},</b><br>"
                . "Your account has been created!"
                . "Please login with the username and password provided and set a new password."
                . "<br>"
                . "Username : {$user_id}<br>"
                . "Password : {$password}<br>"
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

        $mail->AddAddress($user_email, $fname);

        $mail->IsHTML(true); // send as HTML

        $mail->Send();

        //**********************************************************************


        $query = "INSERT into STUDENT (`mother_tongue`, `user_id`) values ('{$mt}','{$user_id}')";
        if (mysqli_query($connection, $query))
        {
            echo 'The user has been added succesfully!';
        }
        else
        {
            echo "THE ERROR IS" . mysqli_error($connection);
        }
    }
    else
    {
        echo "THE ERROR IS" . mysqli_error($connection);
    }
}

function insertFaculty()
{
    require_once '../database.php';

    $user_id = $_POST['au_user_id'];
    $fname = $_POST['au_fname'];
    $lname = $_POST['au_lname'];
    $email = $_POST['au_email'];
    $dob = $_POST['au_dob'];
    $phone = $_POST['au_phone'];
    $access = $_POST['au_access'];

    $type = $_POST['au_type'];
    if ($type === "teacher")
    {
        $type = 1;
    }
    else
    {
        $type = 9;
        $access = 9;
    }

    $password = rand(1000, 9999);
    $hashed_password = password_encrypt($password);

    $query = "INSERT into USER (`user_id`, `password`, `fname`, `lname`, `email`, `phone`, `dob`, `type`) 
        values('{$user_id}','{$hashed_password}','{$fname}','{$lname}','{$email}','{$phone}','{$dob}','{$type}')";
    if (mysqli_query($connection, $query))
    {
        $query = "INSERT into FACULTY (`access_level`, `user_id`) values ('{$access}','{$user_id}')";
        if (mysqli_query($connection, $query))
        {
            echo 'The user has been added succesfully!';
        }
        else
        {
            echo "THE ERROR IS" . mysqli_error($connection);
        }
    }
    else
    {
        echo "THE ERROR IS" . mysqli_error($connection);
    }
}
