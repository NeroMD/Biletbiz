<?php
if(isset($_POST['email']))
{
    date_default_timezone_set('Etc/UTC');
    include "includes/dbh.inc.php";

    $emailId = $_POST['email'];

    $result = mysqli_query($conn,"SELECT * FROM logintype WHERE loginEmail='" . $emailId . "'");

    $row= mysqli_fetch_array($result);

    if($row)
    {

        //$token = md5($emailId).rand(10,9999);

        //$expFormat = mktime(
        //    date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
       // );

        //$expDate = date("Y-m-d H:i:s",$expFormat);

        $password = randomPassword();
        $hasspassword = password_hash($password,PASSWORD_DEFAULT);

        $update = mysqli_query($conn,"UPDATE logintype set  loginPassword='" . $hasspassword . "' WHERE loginEmail='" . $emailId . "'");

        $link = "<a href='http://localhost/biletbiz/index.php'>Click To Return Website</a>";

        require_once('phpmailer/PHPMailerAutoload.php');
        $mail = new PHPMailer();

        $mail->IsSMTP();
        //$mail->SMTPDebug = 3;

        $mail->Host = 'smtp.gmail.com';
        $mail->Port = "587";
        $mail->SMTPSecure = "tls";

        $mail->SMTPAuth = true;
        // GMAIL username
        $mail->Username = "biletbizz@gmail.com";
        // GMAIL password
        $mail->Password = "bilet1234biz";


        $mail->From='biletbizz@gmail.com';
        $mail->FromName='biletbiz';

        $mail->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );
        $mail->AddAddress($emailId, $emailId);
        $mail->Subject  =  'Reset Password';
        $mail->IsHTML(true);
        $mail->Body    = 'Your new password is '.$password.'. Click On This Link to Return Website '.$link.'';
        if($mail->Send())
        {
            echo "Check Your Email and Click on the link sent to your email";
            header("Location:./index.php");
        }
        else
        {
            echo "Mail Error - >".$mail->ErrorInfo;
        }
    }else{
        echo "Invalid Email Address. Go back";
    }
}
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}
?>