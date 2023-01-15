<?php
    session_start();
    if(!isset($_SESSION['tlogin'])|| $_SESSION['tlogin']!=1){
        header("location:tLogin.php");
    }elseif(isset($_GET['updateprofile'])){
        header("location:tUpdateProfile.php");
    }elseif(isset($_GET['showtt'])){
        header("location:tShowtt.php");
    }elseif(isset($_GET['request'])){
        header("location:tRequest.php");
    }elseif(isset($_GET['feedback'])){
        header("location:tFeedback.php");
    }elseif(isset($_GET['logout'])){
        header("location:tLogout.php");
    }elseif(isset($_GET['cpassword'])){
        header("location:tCpassword.php");
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

        <form align = "center">
		<table align="center" border="1">
			<tr>
				<td align="center"><button type="submit" name="updateprofile">Update Profile</button></td>
				<td align="center"><button type="submit" name="showtt">Show Time Table</button></td>
			</tr>
			<tr>
				<td align="center"><button type="submit" name="request">Request to change Time</button></td>
				<td align="center"><button type="submit" name="feedback">Feedback</button></td>
			</tr>
			<tr>
                <td align="center"><button type="submit" name="cpassword">Change Password</button></td>
				<td align="center"><button type="submit" name="logout">Log Out</button></td>
			</tr>
		</table>
        </form>
    </body>
</html>
