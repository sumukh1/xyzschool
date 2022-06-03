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
                Password:<input type="password" name="password"><br>
                Confirm password:<input type="password" name="cpassword"><br>
                <button type="submit" name="B3"> Submit </button><br>
                <button type="submit" name="B2"> Login </button>
                <button type="submit" name="B1"> Home </button> 
            </form>
        </b>
    </body>
</html>
