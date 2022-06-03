<?php
    session_start();
    if(!isset($_SESSION['semail'])){
        header("location:sVerify.php");
    }else if(isset($_POST['B1'])){
        header("location:index.php");
    }else if(isset($_POST['B2'])){
        header("location:sLogin.php");
    }else if(isset($_POST['B3'])){
        if((!isset($_POST['id']))||$_POST['id']==""){
            echo "<p align='center'><font color='red'>Please Enter student ID/email!</font></p>";
        }else if((!isset($_POST['password']))||$_POST['password']==false){
            echo "<p align='center'><font color='red'>Please Enter password!</font></p>";
        }else{
            $id=$_POST['id'];
            $pass=$_POST['password'];
            $con=mysqli_connect("localhost","root","","xyzschool");
            $data1=mysqli_query($con,"SELECT * FROM `s_login` WHERE `S_id` = '$id'");
            $data2=mysqli_query($con,"SELECT * FROM `s_login` WHERE `email` = '$id'");
            if(mysqli_num_rows($data1)){
                $row=mysqli_fetch_assoc($data1);
                if(password_verify($pass,$row['password_hash'])){
                    $_SESSION['slogin']=1;
                    $_SESSION['sid']=$row['S_id'];
                }else{
                    echo "<p align='center'><font color='red'>Invalid password!</font></p>";
                }
            }else if(mysqli_num_rows($data2)){
                $row=mysqli_fetch_assoc($data2);
                if(password_verify($pass,$row['password_hash'])){
                    $_SESSION['slogin']=1;
                    $_SESSION['sid']=$row['S_id'];
                }else{
                    echo "<p align='center'><font color='red'>Invalid password!</font></p>";
                }
            }else{
                echo "<p align='center'><font color='red'>Invalid student id/email !</font></p>";
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
                    <option value="6">Science</option>
                    <option value="7">Social Science</option>
                    <option value="8">Mathematics</option>
                    <option value="9">Physics</option>
                    <option value="10">Chemistry</option>
                    <option value="11">Biology</option>
                </select>
                Password:<input type="password" name="password"><br>
                <button type="submit" name="B3"> Submit </button><br>
                <button type="submit" name="B2"> Login </button>
                <button type="submit" name="B1"> Home </button> 
            </form>
        </b>
    </body>
</html>
