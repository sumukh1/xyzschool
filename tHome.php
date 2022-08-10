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
    }
    
?>
<html>
    <head>
        <title>XYZ PUBLIC SCHOOL</title>
    </head>
    <body><font color ="green">
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
				<td align="center" colspan="2"><button type="submit" name="logout">Log Out</button></td>
			</tr>
		</table>
        </form>
    </body>
</html>
