<?php
    session_start();
    if(isset($_SESSION['ERROR_IN_SIGNUP'])){
        echo "<p align='center'><font color='red'>unwanted ERROR.</font></p><br>";
    }
    if(isset($_POST['Bt2'])){
        header("location:index.php");
    }elseif(isset($_POST['Bt3'])){
        header("location:tLogin.php");
    }elseif(isset($_POST['otp'])){
        if($_POST['otp']==$_SESSION['otp']){
            $_SESSION['temail']=$_SESSION['email'];
            header("location:tSignup.php");
        }else{
            echo "<p align='center'><font color='red'>Invalid OTP!</font></p>";
        }
    }
?>
<html>
<body>
<p align="center">
<b>
    <font color="green">
        <h1 align="center">XYZ PUBLIC SCHOOL</h1><br>
        <h3 align="center">REGISTER YOURSELF</h3><br>
	<form align = "center" method="post">
		Teacher email:<input type="email" name="email">
        <?php
            if(isset($_POST['email']) && $_POST['email']==true){
                session_start();
                $con=mysqli_connect("localhost","root","","xyzschool");
                $email=$_POST['email'];
                $data=mysqli_query($con,"SELECT * FROM `t_login` WHERE `email`='$email'");
                if(mysqli_num_rows($data)){
                    $row=mysqli_fetch_assoc($data);
                    echo "<p align='center'><font color='red'>Email is already register for teacher ID".$row['T_id'].".</font></p>";
                }else{
                    $otp=rand(10000,99999);
                    $body="OTP:".$otp."\nDon't Share it.";
                    if(mail($email,"OTP",$body,"phpotpmanager@gmail.com")){
                        $_SESSION['email']=$email;
                        echo "<p align='center'><font color='green'>OTP sended on your email.</font></p>";
                        echo "OTP:<input type='number' name='otp'><br>";
                        $_SESSION['otp']=$otp;
                    }else{
                    echo "<p align='center'><font color='red'>otp failled.. (check your internet connection!)</font></p>";
                    }
                }
            }
        ?>
		<button type="submit">Register</button>
        <br><br>
        <button type="submit" name="Bt2">Home</button>
        <button type="submit" name="Bt3">Sign In</button>
	</form>
</b>
</p>
</body>
</html>