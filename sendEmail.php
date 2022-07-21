<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = "Form submission";

    require_once "PHPMailer/src/PHPMailer.php";
    require_once "PHPMailer/src/SMTP.php";
    require_once "PHPMailer/src/Exception.php";
    $mail = new PHPMailer();

    $mail->isSMTP();
//    $mail->Host = getenv('GMAIL_HOST');

//    $mail->Username = getenv('GMAIL_EMAIL');
//    $mail->Password = getenv('GMAIL_PASSWORD');
//    $mail->Port = getenv('GMAIL_PORT');
//    $mail->SMTPSecure = getenv('GMAIL_SMTPSECURE');

    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'php.integrative.course.Project@gmail.com';
    $mail->Password = 'eensiyfrmjwlchuh';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("php.integrative.course.Project@gmail.com");
    $mail->addAddress("johnmoallim@gmail.com");
    $mail->addAddress("shakedspector121233@gmail.com");
    $mail->addAddress("ororior208@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $message;

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
        header("location: index.php?info=email_sending_failed");
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}

?>
