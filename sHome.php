<?php
    session_start();
    if(isset($_GET['B1'])){
        header("location:sUpdate.php");
    }else if(isset($_GET['B2'])){
        header("location:sTimeTable.php");
    }else if(isset($_GET['B3'])){
        header("location:sClass.php");
    }else if(isset($_GET['B4'])){
        header("location:sFeedback.php");
    }else if(isset($_GET['B5'])){
        header("location:sChangePassword.php");
    }else if(isset($_GET['B6'])){
        header("location:sLogout.php");
    }else{
        
    }
?>
<html>
    <head>
        <title>XYZ PUBLIC SCHOOL</title>
    </head>
    <body><font color ="green">
        <h1 align="center">XYZ PUBLIC SCHOOL</h1><br></font>
        <form align="center" method="get">
            <table border="2" align="center">
                <tr>
                    <td align="center"><button type="submit" name="B1"> Update profile </button></td>
                    <td align="center"><button type="submit" name="B2"> Show time table </button></td>
                <tr>
                <tr>
                    <td align="center"><button type="submit" name="B3"> Class details </button></td>
                    <td align="center"><button type="submit" name="B4"> Feedback </button></td>
                <tr>
                <tr>
                    <td align="center"><button type="submit" name="B5"> Change password </button></td>
                    <td align="center"><button type="submit" name="B6"> Logout </button></td>
                <tr>
        </form>
    </body>
</html>
