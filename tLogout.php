<?php
    session_start();
    $_SESSION['tlogin']=0;
    $_SESSION['temail']=0;
    $_SESSION['tid']=0;
    header("location:tLogin.php");
?>