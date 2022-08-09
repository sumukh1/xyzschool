<?php
    if(isset($_GET['B1'])){
        header("location:tLogin.php");
    }else if(isset($_GET['B2'])){
        header("location:sLogin.php");
    }else if(isset($_GET['B3'])){
        header("location:aLogin.php");
    }else if(isset($_GET['B4'])){
        header("location:checkMail.php");
    }
?>
<html>
    <head>
        <title>XYZ PUBLIC SCHOOL</title>
    </head>
    <body><font color ="green">
        <h1 align="center">XYZ PUBLIC SCHOOL</h1><br></font>
        <form align="center" method="get">
            <button type="submit" name="B1"> Teacher Portal </button><br><br>
            <button type="submit" name="B2"> Student Portal </button><br><br>
            <button type="submit" name="B3"> Admin Portal </button><br>
            <button type="submit" name="B4"> Check Mail </button><br>
        </form>
    </body>
</html>
