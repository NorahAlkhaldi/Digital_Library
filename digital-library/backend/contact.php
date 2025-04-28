<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once("./db.php");

if(isset($_POST['contact1']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "LTWBU1@gmail.com";
    // GMAIL password
    $mail->Password = "pawswhnvpvmwshox";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ]
    ];
    $mail->From='LTWBU1@gmail.com';
    $mail->FromName='Digital Library Contact';
    $mail->AddAddress('dalibi051@gmail.com', 'reciever_name');
    $mail->Subject  =  $subject;
    $mail->IsHTML(true);
    $mail->Body    = 'Hi, My name is '. $name .', '.$message.', Please contact me on my email address '.$email;
    if($mail->Send())
    {
    echo "Sent";
    }
    else
    {
    echo "Mail Error - >".$mail->ErrorInfo;
    }

    echo '<script type="text/javascript"> alert("Your Message Was Sent!"); window.location.href="../index.php";</script>';  // alert message
}

if(isset($_POST['contact2']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "LTWBU1@gmail.com";
    // GMAIL password
    $mail->Password = "pawswhnvpvmwshox";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ]
    ];
    $mail->From='LTWBU1@gmail.com';
    $mail->FromName='Digital Library Contact';
    $mail->AddAddress('dalibi051@gmail.com', 'reciever_name');
    $mail->Subject  =  $subject;
    $mail->IsHTML(true);
    $mail->Body    = 'Hi, My name is '. $name .', '.$message.', Please contact me on my email address '.$email;
    if($mail->Send())
    {
    echo "Sent";
    }
    else
    {
    echo "Mail Error - >".$mail->ErrorInfo;
    }

    echo '<script type="text/javascript"> alert("Your Message Was Sent!"); window.location.href="../student/index.php";</script>';  // alert message
}

if(isset($_POST['contact3']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "LTWBU1@gmail.com";
    // GMAIL password
    $mail->Password = "pawswhnvpvmwshox";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ]
    ];
    $mail->From='LTWBU1@gmail.com';
    $mail->FromName='Digital Library Contact';
    $mail->AddAddress('dalibi051@gmail.com', 'reciever_name');
    $mail->Subject  =  $subject;
    $mail->IsHTML(true);
    $mail->Body    = 'Hi, My name is '. $name .', '.$message.', Please contact me on my email address '.$email;
    if($mail->Send())
    {
    echo "Sent";
    }
    else
    {
    echo "Mail Error - >".$mail->ErrorInfo;
    }

    echo '<script type="text/javascript"> alert("Your Message Was Sent!"); window.location.href="../librarian/index.php";</script>';  // alert message
}


if(isset($_POST['contact4']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "LTWBU1@gmail.com";
    // GMAIL password
    $mail->Password = "pawswhnvpvmwshox";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ]
    ];
    $mail->From='LTWBU1@gmail.com';
    $mail->FromName='Digital Library Contact';
    $mail->AddAddress('dalibi051@gmail.com', 'reciever_name');
    $mail->Subject  =  $subject;
    $mail->IsHTML(true);
    $mail->Body    = 'Hi, My name is '. $name .', '.$message.', Please contact me on my email address '.$email;
    if($mail->Send())
    {
    echo "Sent";
    }
    else
    {
    echo "Mail Error - >".$mail->ErrorInfo;
    }

    echo '<script type="text/javascript"> alert("Your Message Was Sent!"); window.location.href="../admin/index.php";</script>';  // alert message
}


?>