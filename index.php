<?php
    if(isset($_GET['B1'])){
        header("location:tLogin.php");
    }else if(isset($_GET['B2'])){
        header("location:sLogin.php");
    }else if(isset($_GET['B3'])){
        header("location:aLogin.php");
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
        <a class="nav-link" href="sLogin.php" style="color:white">Login</a>
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
    <div class="col-sm-8">
      <h2>Admission Open</h2>
      <h5>closes soon.</h5>
      <div class="fakeimg"><img src="school.jpg" alt="Fake Image" width="100%" height ="100%"></div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

      <h2 class="mt-5">TITLE HEADING</h2>
      <h5>Title description, Sep 2, 2020</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
  </div>
</div>

<div class="mt-5 p-4 bg-dark text-white text-center">
  <p>Footer</p>
</div>
        <!-- <h1 align="center">XYZ PUBLIC SCHOOL</h1><br></font>
        <form align="center" method="get">
            <button type="submit" name="B1"> Teacher Portal </button><br><br>
            <button type="submit" name="B2"> Student Portal </button><br><br>
            <button type="submit" name="B3"> Admin Portal </button><br>
        </form> -->
    </body>
</html>
