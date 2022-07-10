<?php
    session_start();
    if(isset($_SESSION['tlogin'])&& $_SESSION['tlogin']==1){
        header("location:tHome.php");
    }else if(isset($_POST['B1'])){
        header("location:index.php");
    }else if(isset($_POST['B3'])){
        header("location:tVerify.php");
    }else if(isset($_POST['B2'])){
        if((!isset($_POST['id']))||$_POST['id']==""){
            echo "<p align='center'><font color='red'>Please Enter teacher ID/email!</font></p>";
        }else if((!isset($_POST['password']))||$_POST['password']==false){
            echo "<p align='center'><font color='red'>Please Enter password!</font></p>";
        }else{
            $id=$_POST['id'];
            $pass=$_POST['password'];
            $con= mysqli_connect("sql5.freemysqlhosting.net","sql5505450","5VKf3aElZ4","sql5505450");
            $data1=mysqli_query($con,"SELECT * FROM `t_login` WHERE `T_id` = '$id'");
            $data2=mysqli_query($con,"SELECT * FROM `t_login` WHERE `email` = '$id'");
            if(mysqli_num_rows($data1)){
                $row=mysqli_fetch_assoc($data1);
                if(password_verify($pass,$row['password_hash'])){
                    $_SESSION['tlogin']=1;
                    $_SESSION['tid']=$row['T_id'];
                }else{
                    echo "<p align='center'><font color='red'>Invalid password!</font></p>";
                }
            }else if(mysqli_num_rows($data2)){
                $row=mysqli_fetch_assoc($data2);
                if(password_verify($pass,$row['password_hash'])){
                    $_SESSION['tlogin']=1;
                    $_SESSION['tid']=$row['T_id'];
                }else{
                    echo "<p align='center'><font color='red'>Invalid password!</font></p>";
                }
            }else{
                echo "<p align='center'><font color='red'>Invalid teacher id/email !</font></p>";
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
        <h3 align="center">Teacher Portal</h3><br></font>
        <b>
            <form align="center" method="post">
                Teacher ID/Email:<input type="text" name="id"><br>
                Password:<input type="password" name="password"><br>
                <button type="submit" name="B2"> Login </button><br><br>
                <button type="submit" name="B1"> Home </button>
                <button type="submit" name="B3"> New user? </button>
            </form>
        </b>
    </body>
</html>
