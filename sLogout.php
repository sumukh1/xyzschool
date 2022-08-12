<?php
    session_start();
    $_SESSION['slogin']=0;
    $_SESSION['semail']=0;
    $_SESSION['sid']=0;
    header("location:sLogin.php");
?>