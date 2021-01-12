<?php
    session_start();
    $conn=mysqli_connect('localhost','root','','bugdb');
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

       $issue = $_POST['issue'];
       $project = $_POST['project'];
       $assigned  = $_POST['assigned'];
       $description  = $_POST['description'];
       $status  = $_POST['status'];
       
       
       $s="select * from bug where issue= '$issue'";
       $result=mysqli_query($conn, $s);
       $num= mysqli_num_rows($result);
       if ($num<0) {
        echo "<script type='text/javascript'>
                alert('Issue doesn't exist, Redirecting to bugs page');
                location = 'bugs.php';
            </script>";
       }
       else {
            $sql = "UPDATE bug SET project='".$project."', assigned='".$assigned."',status='".$status."',description='".$description."' 
                where issue='".$issue."'";   
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
    <title>bug</title>
    <style>
		body{
			width:100vw;
			height:100vh;
			overflow:hidden;
			background-image:url('assets/bug.jpg');
            background-size:cover;
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
		input{
            font-size:30px;
            height: 40px;
            width:180px;
        }
        label{
            background:#795548;
            padding: 0 3px;
            text-align:right;
        	color:white;
			font-weight:bold;
			text-align:center;
            text-transform:uppercase;
		}
        form > *{
            margin-top:10px;
            text-align:right;
        }
        input[type='submit']{
            width: 180px;
            text-align: center;
            position:relative;
            left:15px;
            top:5px;
        }
        p{
            color:white;
            text-decoration:underline;
            padding-left:10px;
            text-align:left;
            font-size:25px;
        }
	</style>
</head>
<body>
    <?php   
        $issue = $_GET['q'];
        $sql = "SELECT * from bug where issue='".$issue."'"; 
        $res = $conn->query($sql);
		if($r=$res->fetch_assoc()){
            echo "<form action='' method='POST'>
                <input name='issue' value=".$r['issue']." style='display:none'>
                <p>Issue : ".$r['issue']."</p>

                <div>
                    <label>project</label>
                    <input name='project' value=".$r['project'].">
                </div>

                <div>
                    <label>assigned</label>
                    <input name='assigned' value=".$r['assigned'].">
                </div>

                <div>
                    <label>status</label>
                    <input name='status' value=".$r['status'].">
                </div>

                <div>
                    <label>description</label>
                    <input name='description' value=".$r['description'].">
                </div>

                <input type='submit'>

            </form>";
        }
    
    
    
    ?>
</body>
</html>