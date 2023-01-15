<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
        
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if(!isset($_SESSION['semail'])||$_SESSION['semail']==0){
        header("location:sVerify.php");
    }else if(isset($_POST['B1'])){
        header("location:index.php");
    }else if(isset($_POST['B2'])){
        header("location:sLogin.php");
    }else if(isset($_POST['B3'])){
        if(!(isset($_POST['name']))||$_POST['name']==""){
            echo "<p align='center'><font color='red'>Enter Name!</font></p>";
        }else if(!(isset($_POST['rollno']))||$_POST['rollno']==""){
            echo "<p align='center'><font color='red'>Enter Roll Number!</font></p>";
        }else if(!(isset($_POST['dob']))||$_POST['dob']==""){
            echo "<p align='center'><font color='red'>Enter date of birth!</font></p>";
        }else if(!(isset($_POST['phone']))||$_POST['phone']==""){
            echo "<p align='center'><font color='red'>Enter phone!</font></p>";
        }else if(!(isset($_POST['class']))||$_POST['class']==""){
            echo "<p align='center'><font color='red'>Enter class!</font></p>";
        }else if(!(isset($_POST['subject1']))||$_POST['subject1']==""){
            echo "<p align='center'><font color='red'>Enter subject1!</font></p>";
        }else if(!(isset($_POST['subject2']))||$_POST['subject2']==""){
            echo "<p align='center'><font color='red'>Enter subject2!</font></p>";
        }else if(!(isset($_POST['subject3']))||$_POST['subject3']==""){
            echo "<p align='center'><font color='red'>Enter subject3!</font></p>";
        }else if(!(isset($_POST['password']))||$_POST['password']==""){
            echo "<p align='center'><font color='red'>Enter password!</font></p>";
        }else{
            $pass=$_POST['password'];
            if(!(strlen($pass)>=8 && $pass==$_POST['cpassword'])){
                echo "<p align='center'><font color='red'>Enter valid password!</font></p>";
            }else{
                include 'sqlConnection.php';
                $id=rand(1000,9999);
                $data=mysqli_query($con,"SELECT * FROM `s_login` WHERE `S_id`='$id'");
                while(mysqli_num_rows($data)){
                    $id=rand(1000,9999);
                    $data=mysqli_query($con,"SELECT * FROM `s_login` WHERE `S_id`='$id'");
                }
                $name=$_POST['name'];
                $strid=(string)$id;
                $body1="<span class='badge bg-secondary'>XYZ PUBLIC SCHOOL</span><br>Dear ".$name.".<br>Welcome in smart system of xyz public school.<br>You successfully created an account on our system with Student ID: ".$strid.".<br>You can login 24/7 by using Student id and your password."."<br>Thank you.";
                $body="Dear ".$name.".\nWelcome in smart system of xyz public school.\nYou successfully created an account on our system with Student ID: ".$id.".\nYou can login 24/7 by using Student id and your password."."\nThank you.";
                $email=$_SESSION['semail'];

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
                    $mail->Body    = $body1;
                    $mail->AltBody = $body;

                    if($mail->send()){
                        $password_hash=password_hash($pass,PASSWORD_DEFAULT);
                        $rollno=$_POST['rollno'];
                        $dob=$_POST['dob'];
                        $phone=$_POST['phone'];
                        $class=$_POST['class'];
                        $subject1=$_POST['subject1'];
                        $subject2=$_POST['subject2'];
                        $subject3=$_POST['subject3'];
                        $data1=mysqli_query($con,"INSERT INTO `s_login`(`S_id`, `email`, `password_hash`) VALUES ('$id','$email','$password_hash')");
                        $data1=mysqli_query($con,"INSERT INTO `s_details`(`S_id`, `phone`, `name`, `rollno`, `dob`, `class`, `subject1`, `subject2`, `subject3`) VALUES ('$id','$phone','$name','$rollno','$dob','$class','$subject1','$subject2','$subject3')"); 
                        
                        $_SESSION['slogin']=1;
                        $_SESSION['sid']=$id;
                        header("location:sHome.php");
                    }else{
                        $_SESSION['ERROR_IN_SIGNUP']=1;
                        header("location:sVerify.php");
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body><font color="green">

    <br>
    <div class="container">
  <h1 align="center"><span class="badge bg-secondary">XYZ PUBLIC SCHOOL</span></h1>
</div>
    <div class="container mt-3">
  <h2>Enter your details</h2>
  <form method="POST">
    <div class="alert alert-info">
            <strong>Note.</strong> Enter every details very carefully and correct as per given by school.
    </div>
    <div class="mb-3 mt-3"> 
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="mb-3 mt-3"> 
      <label for="rollno">Roll Number:</label>
      <input type="number" name="rollno" class="form-control" id="rollno" placeholder="Enter RollNo" >
    </div>
    <div class="mb-3 mt-3"> 
      <label for="dob">Date of Birth:</label>
      <input type="date" class="form-control" id="dob" placeholder="Enter dob" name="dob">
    </div>
    <div class="mb-3 mt-3"> 
      <label for="phone">Phone:</label>
      <input type="number" class="form-control" id="phone" placeholder="Enter phone number" name="phone">
    </div>
    <div class="mb-3 mt-3"> 
      <label for="class">Class:</label>
    <select class="form-select mt-3" name="class">
                <option value="6">6th</option>
                <option value="7">7th</option>
                <option value="8">8th</option>
                <option value="9">9th</option>
                <option value="10">10th</option>
                <option value="11">11th</option>
                <option value="12">12th</option>
   </select>
    </div>
    <div class="alert alert-info">
            <strong>Note.</strong> Select only three important subjects.
    </div>
    <div class="mb-3 mt-3"> 
      <label for="subject">Subject1:</label>
    <select class="form-select mt-3" name="subject1">
                <option value="Science">Science</option>
                <option value="Social Science">Social Science</option>
                <option value="Mathematics">Mathematics</option>
                <option value="Physics">Physics</option>
                <option value="Chemistry">Chemistry</option>
                <option value="Biology">Biology</option>
    </select>
    </div>
    <div class="mb-3 mt-3"> 
        <label for="subject">Subject2:</label>
        <select class="form-select mt-3" name="subject2">
                <option value="Science">Science</option>
                <option value="Social Science">Social Science</option>
                <option value="Mathematics">Mathematics</option>
                <option value="Physics">Physics</option>
                <option value="Chemistry">Chemistry</option>
                <option value="Biology">Biology</option>
        </select>
    </div>
    <div class="mb-3 mt-3"> 
        <label for="subject">Subject3:</label>
        <select class="form-select mt-3" name="subject3">
                <option value="Science">Science</option>
                <option value="Social Science">Social Science</option>
                <option value="Mathematics">Mathematics</option>
                <option value="Physics">Physics</option>
                <option value="Chemistry">Chemistry</option>
                <option value="Biology">Biology</option>
        </select>
    </div>
    <div class="alert alert-info">
            <strong>Note.</strong> password lenght is between 8 to 16 character.
    </div>
    <div class="mb-3 mt-3"> 
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <div class="mb-3 mt-3"> 
      <label for="password">Confirm password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="cpassword">
    </div>
    <button type="submit" class="btn btn-primary" name="B3"> Submit </button><br><br>
    <button type="submit" class="badge bg-secondary" name="B2"> Login </button> 
    <button type="submit" class="badge bg-secondary" name="B1"> Home </button>

    </body>
</html>
