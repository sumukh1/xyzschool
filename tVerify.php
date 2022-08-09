<?php
    session_start();
    if(isset($_SESSION['ERROR_IN_SIGNUP'])){
        echo "<p align='center'><font color='red'>unwanted ERROR.</font></p><br>";
    }
    if(isset($_POST['Bt2'])){
        header("location:index.php");
    }elseif(isset($_POST['Bt3'])){
        header("location:tLogin.php");
    }elseif(isset($_POST['otp'])){
        if($_POST['otp']==$_SESSION['otp']){
            $_SESSION['temail']=$_SESSION['email'];
            header("location:tSignup.php");
        }else{
            echo "<p align='center'><font color='red'>Invalid OTP!</font></p>";
        }
    }
?>
<html>
<body>
<p align="center">
<b>
    <font color="green">
        <h1 align="center">XYZ PUBLIC SCHOOL</h1><br>
        <h3 align="center">REGISTER YOURSELF</h3><br>
	<form align = "center" method="post">
		Teacher email:<input type="email" name="email">
        <?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;
        
            require 'PHPMailer/src/Exception.php';
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';

            if(isset($_POST['email']) && $_POST['email']==true){
                $con= mysqli_connect("remotemysql.com","zRbyLsplba","r2ggFh5VVC","zRbyLsplba");
                $email=$_POST['email'];
                $data=mysqli_query($con,"SELECT * FROM `t_login` WHERE `email`='$email'");
                if(mysqli_num_rows($data)){
                    $row=mysqli_fetch_assoc($data);
                    echo "<p align='center'><font color='red'>Email is already register for teacher ID".$row['T_id'].".</font></p>";
                }else{
                    $otp=rand(10000,99999);
                    $otpstr=(string)$otp;
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings               
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'phpotpmanager@gmail.com';                     //SMTP username
                        $mail->Password   = 'ropwcoyhcmiqsywf';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    
                        //Recipients
                        $mail->setFrom('phpotpmanager@gmail.com', 'XYZ PUBLIC SCHOOL');
                        $mail->addAddress($email);       
                    
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'School verifying you.';
                        $mail->Body    = 'Dear Apllicant <br>Please verify you by OTP <b>'.$otpstr.'</b><br> Do not share it.';
                        $mail->AltBody = 'Dear Apllicant Please verify you by OTP'.$otpstr.' Do not share it.';
                    
                        $mail->send();
                        $_SESSION['email']=$email;
                        $_SESSION['otp']=$otp;
                        echo "<p align='center'><font color='green'>OTP is sent on your email.</font></p>";
                        echo "OTP:<input type='number' name='otp'><br>";
                    } catch (Exception $e) {
                        echo "<p align='center'><font color='red'>Something went wrong (check internet connection).</font></p>";
                    }
                }
            }
        ?>
		<button type="submit">Register</button>
        <br><br>
        <button type="submit" name="Bt2">Home</button>
        <button type="submit" name="Bt3">Sign In</button>
	</form>
</b>
</p>
</body>
</html>