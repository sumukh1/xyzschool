<?php
    session_start();
    if(!isset($_SESSION['slogin'])|| $_SESSION['slogin']!=1){
        header("location:sLogin.php");
    }else if(isset($_GET['B1'])){
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .fakeimg {
    height: 250px;
    background: #aaa;
  }
  </style>
    </head>
    <body><font color ="green">

    <div class="p-5 bg-primary text-white text-center">
  <h1>XYZ PUBLIC SCHOOL</h1>
  <p>Learn as much as you can while you are young, since life becomes too busy later.</p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tLogin.php">Teacher</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sLogin.php">Student</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <ul class="nav justify-content-end">
    <li class="nav-item">
        <a class="nav-link" href="sLogout.php" style="color:red">Logout</a>
      </li>
</ul>
  </div>
</nav>
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-4">
      <h2>Classroom</h2>
      <h5>in class view:</h5>
      <div class="fakeimg"><img src="classroom1.jpg" alt="Fake Image" width="100%" height ="100%0"></div>
      <p>“The man who does not read books has no advantage over the one who cannot read them.” —Mark Twain.</p>
      <h3 class="mt-4">Active Links</h3>
      <p>Join us now.</p>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tLogin.php">Teacher Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sLogin.php">Student Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <hr class="d-sm-none">
    </div> 
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
