<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
        
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if(!isset($_SESSION['temail'])||$_SESSION['temail']==0){
        header("location:tVerify.php");
    }else if(isset($_POST['B1'])){
        header("location:index.php");
    }else if(isset($_POST['B2'])){
        header("location:tLogin.php");
    }else if(isset($_POST['B3'])){
        if(!(isset($_POST['name']))||$_POST['name']==""){
            echo "<p align='center'><font color='red'>Enter Name!</font></p>";
        }else if(!(isset($_POST['dob']))||$_POST['dob']==""){
            echo "<p align='center'><font color='red'>Enter date of birth!</font></p>";
        }else if(!(isset($_POST['phone']))||$_POST['phone']==""){
            echo "<p align='center'><font color='red'>Enter phone!</font></p>";
        }else if(!(isset($_POST['qualification']))||$_POST['qualification']==""){
            echo "<p align='center'><font color='red'>Enter Qualification!</font></p>";
        }else if(!(isset($_POST['dept']))||$_POST['dept']==""){
            echo "<p align='center'><font color='red'>Enter department!</font></p>";
        }else if(!(isset($_POST['post']))||$_POST['post']==""){
            echo "<p align='center'><font color='red'>Enter post!</font></p>";
        }else if(!(isset($_POST['password']))||$_POST['password']==""){
            echo "<p align='center'><font color='red'>Enter password!</font></p>";
        }else{
            $pass=$_POST['password'];
            if(!(strlen($pass)>=8 && $pass==$_POST['cpassword'])){
                echo "<p align='center'><font color='red'>Enter valid password!</font></p>";
            }else{
                $con= mysqli_connect("remotemysql.com","zRbyLsplba","r2ggFh5VVC","zRbyLsplba");
                $id=rand(1000,9999);
                $data=mysqli_query($con,"SELECT * FROM `t_login` WHERE `T_id`='$id'");
                while(mysqli_num_rows($data)){
                    $id=rand(1000,9999);
                    $data=mysqli_query($con,"SELECT * FROM `t_login` WHERE `T_id`='$id'");
                }
                $name=$_POST['name'];
                $strid=(string)$id;
                $body1="Dear ".$name.".<br>Welcome in smart system of xyz public school.<br>You successfully created an account on our system with Teacher <b>ID: ".$strid.".</b><br>You can login 24/7 by using Student id and your password."."<br>https://xyzschool.herokuapp.com/tLogin.php<br>Thank you.";
                $body="Dear ".$name.".\nWelcome in smart system of xyz public school.\nYou successfully created an account on our system with Teacher ID: ".$id.".\nYou can login 24/7 by using Student id and your password."."\nhttps://xyzschool.herokuapp.com/tLogin.php\nThank you.";
                $email=$_SESSION['temail'];

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
                    $mail->Body    = $body1;
                    $mail->AltBody = $body;

                    if($mail->send()){
                        $password_hash=password_hash($pass,PASSWORD_DEFAULT);
                        $dob=$_POST['dob'];
                        $phone=$_POST['phone'];
                        $qualification=$_POST['qualification'];
                        $dept=$_POST['dept'];
                        $post=$_POST['post'];
                        $data1=mysqli_query($con,"INSERT INTO `t_login`(`T_id`, `email`, `password_hash`) VALUES ('$id','$email','$password_hash')");
                        $data1=mysqli_query($con,"INSERT INTO `t_details`(`T_id`, `phone`, `name`, `dob`, `qualification`, `department`, `post`) VALUES ('$id','$phone','$name','$dob','$qualification','$dept','$post')"); 
                        
                        $_SESSION['tlogin']=1;
                        $_SESSION['tid']=$id;
                        header("location:tHome.php");
                    }else{
                        $_SESSION['ERROR_IN_SIGNUP']=1;
                        header("location:tVerify.php");
                    }  
                }catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        }
    }
?>
<html>
    <head>
        <title>XYZ PUBLIC SCHOOL</title>
    </head>
    <body><font color="green">
        <h1 align="center">XYZ PUBLIC SCHOOL</h1><br>
        <h3 align="center">Teacher Details</h3><br></font>
        <b>
            <form align="center" method="post">
                Note.(Enter every details very carefully and correct as per given by school.)<br>
                Teacher Name:<input type="text" name="name"><br>
                Date of Birth:<input type="date" name="dob"><br>
                Phone:<input type="number" name="phone"><br>
                Qualification:<select name="qualification">
                    <option value="intermediate">Intermediate(10+2)</option>
                    <option value="graduation">Graduation(3 years)</option>
                    <option value="post graduation">Post graduation(2 years)</option>
                    <option value="btech">B-tech</option>
                    <option value="mtech">M-tech</option>
                    <option value="phd">PHD</option>
                    <option value="mbbs">MBBS</option>
                </select><br>
                Department:<select name="dept">
                    <option value="Social Science">Social Science</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Physics">Physics</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Commerce">Commerce</option>
                    <option value="Computer">Computer</option>
                    <option value="Managment">Managment</option>
                </select><br>
                Post:<select name="post">
                    <option value="Senior Teacher">Senior Teacher</option>
                    <option value="Junior Teacher">Junior Teacher</option>
                    <option value="Asistant">Asistant</option>
                    <option value="Intern">Intern</option>
                </select><br>
                Note.(password lenght is between 8 to 16 character)<br>
                Password:<input type="password" name="password"><br>
                Confirm password:<input type="password" name="cpassword"><br>
                <button type="submit" name="B3"> Submit </button><br>
                <button type="submit" name="B2"> Login </button>
                <button type="submit" name="B1"> Home </button> 
            </form>
        </b>
    </body>
</html>
