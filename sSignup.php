<?php
    session_start();
    if(!isset($_SESSION['semail'])){
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
                $con=mysqli_connect("localhost","root","","xyzschool");
                $id=rand(1000,9999);
                $data=mysqli_query($con,"SELECT * FROM `s_login` WHERE `S_id`='$id'");
                while(mysqli_num_rows($data)){
                    $id=rand(1000,9999);
                    $data=mysqli_query($con,"SELECT * FROM `s_login` WHERE `S_id`='$id'");
                }
                $body="Dear ".$name.".\nWelcome in smart system of xyz public school.\nYou successfully created an account on our system with Student ID: ".$id.".\nYou can login 24/7 by using Student id and your password.\nhttp://localhost/myphp/school/sLogin.php\nThank you.";
                $email=$_SESSION['semail']
                if(mail($email,"XYZ PUBLIC SCHOOL",$body,"phpotpmanager@gmail.com")){
                    $password_hash=password_hash($pass);
                    $name=$_POST['name'];
                    $rollno=$_POST['rollno'];
                    $dob=$_POST['dob'];
                    $phone=$_POST['phone'];
                    $class=$_POST['class'];
                    $subject1=$_POST['subject1'];
                    $subject2=$_POST['subject2'];
                    $subject3=$_POST['subject3'];
                    $data1=mysqli_query($con,"INSERT INTO `s_login`(`S_id`, `email`, `password_hash`) VALUES ('$id','$email','$password_hash')");
                    $data1=mysqli_query($con,"INSERT INTO `s_details`(`S_id`, `phone`, `name`, `rollno`, `dob`, `class`, `subject1`, `subject2`, `subject3`) VALUES ('$id','$phone','$name','$rollno','$dob','$class','$subject1','$subject2','$subject3')"); 
                }else{
                    $_SESSION['ERROR_IN_SIGNUP']=1;
                    header("location:sVerify.php");
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
        <h3 align="center">Student Details</h3><br></font>
        <b>
            <form align="center" method="post">
                Note.(Enter every details very carefully and correct as per given by school.)<br>
                Student Name:<input type="text" name="name"><br>
                Roll Number:<input type="number" name="rollno"><br>
                Date of Birth:<input type="date" name="dob"><br>
                Phone:<input type="number" name="phone"><br>
                Class:<select name="class">
                    <option value="6">6th</option>
                    <option value="7">7th</option>
                    <option value="8">8th</option>
                    <option value="9">9th</option>
                    <option value="10">10th</option>
                    <option value="11">11th</option>
                    <option value="12">12th</option>
                </select>
                Note.(Select only three important subjects)<br>
                Subject1:<select name="subject1">
                    <option value="Science">Science</option>
                    <option value="Social Science">Social Science</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Physics">Physics</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                </select>
                Subject2:<select name="subject1">
                    <option value="Science">Science</option>
                    <option value="Social Science">Social Science</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Physics">Physics</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                </select>
                Subject3:<select name="subject1">
                    <option value="Science">Science</option>
                    <option value="Social Science">Social Science</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Physics">Physics</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                </select>
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
