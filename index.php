<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding:0;
            overflow:hidden;
        }
        nav{
            width:100vw;
            background:#BF360C;
            height:50px;
        }
        a{
            position:relative;
            top:-35px;
            float:right;
            text-decoration:none;
            color:white;
            margin:10px;
            border:1px solid white;
            padding:3px 5px;
        }
        a:hover{
            background:#FF5722;
            border:1px solid #FFAB91;
        }
        h1{
            color:white;
            letter-spacing:4px;
            padding-top:10px;
            padding-left:50px;
        }
        main{
            display:flex;
            height:80vh;
        }
        main > *{
            width:50%;
            height:100%;
        }
        article{
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
        }
        h2{
            font-size:40px;
            margin-bottom:40px;
        }
        h3{
            text-align:center;
            font-size:30px;
        }
        img{
            margin-top:10vh;
            margin-right:10vh;
            margin-left:10vh;
            height:60vh;
            width:40vw;
        }

    </style>
</head>
<body>
    <nav>
        <h1>BugsBury</h1>
        <a href="register.php">REGISTER</a>
        <a href="login.php">LOGIN</a>
    </nav>
    
    <main>
        <img src="./assets/home.jpg" alt="home pic">
        <article>
            <h2>The simplest bug tracker</h2>
            <h3>Report,manage,kill... <br> and eventually bury your<br> project bugs with ease.</h3>
        </article>
    </main>

</body>
</html>