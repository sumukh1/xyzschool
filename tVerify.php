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
<head>
        <title>XYZ PUBLIC SCHOOL</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
<body>


<br>
    <div class="container">
  <h1 align="center"><span class="badge bg-secondary">XYZ PUBLIC SCHOOL</span></h1>
</div>
    <div class="container mt-3">
  <h2>REGISTER YOURSELF AS TEACHER</h2>
  <form method="POST">
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;
        
            require 'PHPMailer/src/Exception.php';
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';

            if(isset($_POST['email']) && $_POST['email']==true){
                include 'sqlConnection.php';
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
                        $mail->Username   = 'phpsumukh@gmail.com';                     //SMTP username
                        $mail->Password   = 'qhojibdkqlheocav';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    
                        //Recipients
                        $mail->setFrom('phpsumukh@gmail.com', 'XYZ PUBLIC SCHOOL');
                        $mail->addAddress($email);       
                    
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'School verifying you.';
                        $mail->Body    = '<span class="badge bg-secondary">XYZ PUBLIC SCHOOL</span>Dear Apllicant <br>Please verify you by OTP <b><span class="badge bg-secondary">'.$otpstr.'</span></b><br> Do not share it.';
                        $mail->AltBody = 'Dear Apllicant Please verify you by OTP'.$otpstr.' Do not share it.';
                    
                        $mail->send();
                        $_SESSION['email']=$email;
                        $_SESSION['otp']=$otp;
                        echo "<p align='center'><font color='green'>OTP is sent on your email.</font></p>";
                        echo "<div class='mb-3'><label for='pwd'>OTP:</label><input type='number' class='form-control' id='pwd' placeholder='Enter otp' name='otp'></div>";
                    } catch (Exception $e) {
                        echo "<p align='center'><font color='red'>Something went wrong (check internet connection).{$mail->ErrorInfo}</font></p>";
                    }
                }
            }
        ?>
    <!-- <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div> -->
    <!-- <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div> -->
    <button type="submit" class="btn btn-primary"> Register </button><br><br>
    <button type="submit" class="badge bg-secondary" name="Bt2"> Home </button> 
    <button type="submit" class="badge bg-secondary" name="Bt3"> Sign In </button>
  </form>
</div>
</body>
</html>
