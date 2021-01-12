<?php
    session_start();
    $conn=mysqli_connect('localhost','root','','bugdb');
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

       $employee_mail = $_POST['employee_mail'];
       $employee_id = $_POST['employee_id'];
       $password  = $_POST['password'];
 
       $s="select * from auth where employee_id= '$employee_id'";
       $result=mysqli_query($conn, $s);
       $num= mysqli_num_rows($result);
       if ($num>0) {
          echo '<script>alert("Email already exist. Click <a href=`./login.php`>here</a> for login.")</script>';
       }
       else {
          $sql = "INSERT INTO auth VALUES ('".$employee_id."', '".$employee_mail."', '".$password."')";   
          if ($conn->query($sql) === TRUE) {
             header("location:bugs.php");
          }
          else{
            echo '<script>alert("Internal Error")</script>';
          }
       }
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
		body{
			width:100vw;
			height:100vh;
			overflow:hidden;
			background-image:url('assets/auth.jpg');
			display:flex;
			justify-content:center;
			align-items:center;
			font-size:20px;
		}
		form{
			width:200px;
			padding:20px;
			display:flex;
			flex-direction:column;
			background:rgba(0,0,0,.5);
			box-shadow:0 0 2px gray;
		}
		form > *{
			margin-top:10px;
			margin-bottom:10px;
		}
		label{
			letter-spacing:1px;
			color:white;
			font-weight:bold;
			text-align:center;
		}
      input{
			height:30px;
		}
	</style>
</head>
<body>
    <form action="" method="post">
        <label>R E G I S T E R</label>
		  <label>Employee ID</label>
        <input name='employee_id'>
		  <label>Employee Mail</label>
        <input name='employee_mail'>
		  <label>Password</label>
        <input name='password' type='password'><br>   
        <input type='submit'>
    </form>
</body>
</html>