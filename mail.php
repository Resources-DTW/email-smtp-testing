<?php
    require 'class.phpmailer.php';
    require 'class.smtp.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer;
    
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.office365.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    
    $mail->Username = "info@digitaltechworks.com";
    $mail->Password = "CDolm264";
    $mail->setFrom('info@digitaltechworks.com', 'digitaltechworks');
    
    
    //$mail->addAddress($email, $name);
    $mail->addAddress('ashrafwpdev@gmail.com', 'ashrafwpdev');

    $message = ' 
    <html> 
    <head> 
        <title>Contact Form</title> 
    </head> 
    <body> 
        <h1>Contact Form</h1> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr> 
                <th>Name:</th><td>'. $_POST['name'].'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>'. $_POST['email'].'</td> 
            </tr> 
            <tr> 
                <th>Subject:</th><td>'. $_POST['subject'].'</td> 
            </tr> 
            <tr> 
                <th>Message:</th><td>'. $_POST['message'].'</td> 
            </tr> 
        </table> 
    </body> 
    </html>'; 
    $mail->Subject = 'Form';
    $mail->Body = $message;
    $mail->IsHTML(true); 

    if (!$mail->send()) {
        header("Location: error.php");
    	//echo json_encode(array('status' => false, 'message' => 'Mail not sent successfully'));
    } else {
        header("Location: success.php");
    	//echo json_encode(array('status' => true, 'message' => 'Mail sent successfully'));
    }
    die;

