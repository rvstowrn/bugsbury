<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            padding-top:75px;
        }
        a{
            border:2px solid rgba(0,0,0,0.5);
            margin:10px;
            padding:10px;
            width:200px;
            display: inline-block;
            text-decoration:none;
            position:relative;
        }
        h3{
            background:#424242;
            color:white;
            padding:5px;
            position:relative;
        }
        a>label{
            font-size:20px;
            left:10px;
            padding:0 10px;
            right:unset;
        }
        label{
            position:absolute;
            background:#6D4C41;
            right:0;
            font-size:15px;
            top:-15px;
            color:white;
            letter-spacing:1px;
            text-transform: uppercase;
        }
        .report{
            border:unset;
            position:absolute;
            top:0;
            right:0;
            text-decoration:underline;
            color:gray;
            font-weight:bold;
            font-size:20px;
        }
    
    
    </style>
</head>
<body>
    <a href="report.php" class="report">Report a bug</a>
    <?php
        function card($issue,$project,$assigned,$status,$description){
            return "<a href='bug.php?q=".$issue."'>
                <label>BUG</label>
                <h3><label>issue</label>".$issue."</h3>
                <h3><label>project</label>".$project."</h3>
                <h3><label>assigned</label>".$assigned."</h3>
                <h3><label>status</label>".$status."</h3>
                <h3><label>description</label>".$description."</h3>
            </a>";   
        }
        $conn=mysqli_connect('localhost','root','','bugdb');
        $sql = "SELECT * from bug"; 
        $res = $conn->query($sql);
		while($r=$res->fetch_assoc()){
            echo card($r['issue'],$r['project'],$r['assigned'],$r['status'],$r['description']);
        }

        
    ?> 
</body>
</html>