<?php
    session_start();
    $conn=mysqli_connect('localhost','root','','bugdb');
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$employee_id=$_POST['employee_id'];
		$password=$_POST['password'];
		$sql = "SELECT * from auth where employee_id='".$employee_id."' and password='".$password."'"; 
        $res = $conn->query($sql);
		$count=mysqli_num_rows($res);
		if($count>0){
			header('location:bugs.php');
			die();	
		}
		else{
			echo '<script>alert("wrong credentials")</script>';
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
    <form action="" method="POST">
		<label>L O G I N</label>
		<label>Employee Id</label>
        <input name='employee_id'>
		<label>Password</label>
        <input name='password' type='password'>
        <br>
		<input type='submit'>
    </form>
</body>
</html>