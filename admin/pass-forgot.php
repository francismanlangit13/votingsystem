<?php
	session_start();
	include 'includes/conn.php';
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../dist/PHPMailer/src/Exception.php';
    require '../dist/PHPMailer/src/PHPMailer.php';
    require '../dist/PHPMailer/src/SMTP.php';
	
	if(isset($_POST['forgot_btn'])){
        $email = mysqli_real_escape_string($conn, $_POST['username']);
        $check_mail = "SELECT `email` FROM admin WHERE email = '$email' AND status = 'Active'";
        $check_mail_run = mysqli_query($conn, $check_mail);

        if(mysqli_num_rows($check_mail_run) > 0){
            $row = mysqli_fetch_array($check_mail_run);
            $get_email = $row['email'];
            $new_password = substr(md5(microtime()),rand(0,26),8);
            $hashed_password = md5($new_password);
            $sql = "UPDATE admin SET password='$hashed_password' WHERE email='$email'";
            if (mysqli_query($conn, $sql)) {

                $email = htmlentities($get_email);
                $subject = htmlentities('Forgot Password');
                $message =  nl2br("Good day! \r\n This is your NEW PASSWORD \r\nPassword: $new_password \r\n Please change your password immediately!");
            
                require("../dist/PHPMailer/PHPMailerAutoload.php");
                require ("../dist/PHPMailer/class.phpmailer.php");
                require ("../dist/PHPMailer/class.smtp.php");
                $mail = new PHPMailer();
                $mail->IsSMTP();
                //$mail->SMTPDebug = 2; // Debug if the gmail doesn't send email when forgetting password.
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'TLS/STARTTLS';
                $mail->Host = 'smtp.gmail.com'; // Enter your host here
                $mail->Port = '587';
                $mail->IsHTML();
                $mail->Username = 'contactmaojimenez@gmail.com'; // Enter your email here
                $mail->Password = 'kcexdtybjptxgizm'; //Enter your passwrod here
                $mail->setFrom($email);
                $mail->addAddress($_POST['username']);
                $mail->Subject = ("$email ($subject)");
                $mail->Body = $message;
                $mail->send();

                $_SESSION['error'] = "Your new password is now sent in e-mail.";
            }
            else{
                $_SESSION['error'] = "Something went wrong!";
            }
        }
        else{
			$_SESSION['error'] = 'No Email Found';
        }
    }
	header("Location: index");
?>