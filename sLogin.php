<?php
    session_start();
    if(isset($_SESSION['slogin'])&& $_SESSION['slogin']==1){
        header("location:sHome.php");
    }else if(isset($_POST['B1'])){
        header("location:index.php");
    }else if(isset($_POST['B3'])){
        header("location:sVerify.php");
    }else if(isset($_POST['B2'])){
        if((!isset($_POST['id']))||$_POST['id']==""){
            echo "<p align='center'><font color='red'>Please Enter student ID/email!</font></p>";
        }else if((!isset($_POST['password']))||$_POST['password']==false){
            echo "<p align='center'><font color='red'>Please Enter password!</font></p>";
        }else{
            include 'sqlConnection.php';
            $id=$_POST['id'];
            $pass=$_POST['password'];
            
            $data1=mysqli_query($con,"SELECT * FROM `s_login` WHERE `S_id` = '$id'");
            $data2=mysqli_query($con,"SELECT * FROM `s_login` WHERE `email` = '$id'");
            if(mysqli_num_rows($data1)){
                $row=mysqli_fetch_assoc($data1);
                if(password_verify($pass,$row['password_hash'])){
                    $_SESSION['slogin']=1;
                    $_SESSION['sid']=$row['S_id'];
                    header("location:sHome.php");
                }else{
                    echo "<p align='center'><font color='red'>Invalid password!</font></p>";
                }
            }else if(mysqli_num_rows($data2)){
                $row=mysqli_fetch_assoc($data2);
                if(password_verify($pass,$row['password_hash'])){
                    $_SESSION['slogin']=1;
                    $_SESSION['sid']=$row['S_id'];
                    header("location:sHome.php");
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body><font color="green">
        <br>
    <div class="container">
  <h1 align="center"><span class="badge bg-secondary">XYZ PUBLIC SCHOOL</span></h1>
</div>
    <div class="container mt-3">
  <h2>Student Login</h2>
  <form method="POST">
    <div class="mb-3 mt-3">
      <label for="email">Student ID/Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="id">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary" name="B2"> Login </button><br><br>
    <button type="submit" class="badge bg-secondary" name="B1"> Home </button> 
    <button type="submit" class="badge bg-secondary" name="B3"> New user? </button>
  </form>
</div>

                
</body>
</html>
