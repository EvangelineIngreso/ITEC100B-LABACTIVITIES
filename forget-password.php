<!-- https://myaccount.google.com/security 
    disable two face auth and and on less security
-->
<!-- input email
    forget password
    sending code to email address
 -->

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'configg.php';


if (isset($_POST['submit'])) {
    $emailto    = $_POST['email'];

    $code = uniqid(true);
    $query = mysqli_query($con, "INSERT INTO forgetpass(code, email) VALUES('$code', '$emailto')");
    mysqli_query($con, "INSERT INTO eventlog(username, transaction_type) VALUES('$emailto', 'Forget Password(Request)')");
    if (!$query) {
        exit("error");
    }

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'evangeline.ingreso06@gmail.com';                     //SMTP username
        $mail->Password   = 'evangelineingreso12345678910';                               //SMTP password
        $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('evangeline.ingreso06@gmail.com', 'ADMIN');
        $mail->addAddress($emailto);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('no-reply@nicholguasa.com', 'No Reply');

        //Content
        $url = "https://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/update-password.php?code=$code";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'YOUR FORGET PASSWORD LINK';
        $mail->Body    = "<h1>You requested a password reset</h1>
                            click<a href='$url'> this link </a> to reset password";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        
        echo "<h1>Forget password link has been sent to your email <a href='login.php'>Go home</a></h1>";

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>

    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div style="margin-top: 100px;" class="col-md-4">
                <form action="" method="post">
                    <h1>Forget Password?</h1>
                    <label>Email:</label>
                    <input style="width: 300px;" class="form-control" type="tex" name="email" id="" autocomplete="off" required>
                    <input style="width: 150px;" class="btn btn-primary" type="submit" name="submit" value="Submit">
                    <a style="width: 150px;" class="btn btn-secondary" href="login.php">Back</a>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

</body>

</html>