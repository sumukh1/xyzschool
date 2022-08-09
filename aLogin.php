<?php
    session_start();
    if(isset($_SESSION['alogin'])&& $_SESSION['alogin']==1){
        header("location:aHome.php");
    }else if(isset($_POST['B1'])){
        header("location:index.php");
    }else if(isset($_POST['B2'])){
        if((!isset($_POST['id']))||$_POST['id']==""){
            echo "<p align='center'><font color='red'>Please Enter student ID/email!</font></p>";
        }else if((!isset($_POST['password']))||$_POST['password']==false){
            echo "<p align='center'><font color='red'>Please Enter password!</font></p>";
        }else{
            $id=$_POST['id'];
            $pass=$_POST['password'];
            $con= mysqli_connect("remotemysql.com","zRbyLsplba","r2ggFh5VVC","zRbyLsplba");
            $data1=mysqli_query($con,"SELECT * FROM `a_login` WHERE `A_id` = '$id'");
            if(mysqli_num_rows($data1)){
                $row=mysqli_fetch_assoc($data1);
                if(password_verify($pass,$row['password_hash'])){
                    $_SESSION['alogin']=1;
                    $_SESSION['aid']=$row['A_id'];
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
        <h3 align="center">Admin Portal</h3><br></font>
        <b>
            <form align="center" method="post">
                Admin ID:<input type="text" name="id"><br>
                Password:<input type="password" name="password"><br>
                <button type="submit" name="B2"> Login </button><br><br>
                <button type="submit" name="B1"> Home </button> 
            </form>
        </b>
    </body>
</html>
