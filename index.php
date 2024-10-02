<?php
    require_once 'include/config.php';
    require_once 'include/session.php';
    require_once 'Login/login_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            font-family: "Times New Roman", Times, serif;
            /* background: linear-gradient(to bottom, #48A14D, #99FF9C); */
            background-color: #48A14D;
            margin: 0;
            display: flex;
            justify-content: center;
            text-align: center;
            height: 100vh;
        }
        .outer-container{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
        }
        .inner-container {
            width: 600px;
            height: 450px; 
            background: linear-gradient(to bottom, #000000, #F5F5F5);
            text-align: center;
            padding: 10px;
            font-size: 30px;
            border-radius: 20px;
            box-shadow: 10px 10px 10px 0px #000000;
            display: flex;  
            flex-direction: column; 
            justify-content: center;  
            align-items: center; 
        }

        .inner-container form {
            display: flex;
            flex-direction: column;
            justify-content: center;  
            align-items: center;
            gap: 15px;
        }

        .inner-container form li {
            list-style-type: none;
        }

        .inner-container form li input {
            height: 60px;
            width: 300px;
            border-radius: 20px;
            border-width: 2px;
            border-style: solid;
            border-color: rgb(0, 0, 0);
            background-color: #F5F5F5;
            font-size: 20px;
            font-weight: bold;
            color: rgb(180, 180, 180);
            padding: 0 10px;
            margin: auto;
            color:black;
            transition: 0.5s;
        }
        .inner-container form li input::placeholder{
            color: rgb(180, 180, 180);
            padding: 0 10px;
            color: black;
        }

        .login-button {
            height: 70px;
            width: 230px;
            cursor: pointer;
            border-radius: 10px;
            border-style: none;
            background-color: #48A24D;
            color: black;
            font-weight: bold;
            font-size: 20px;
            margin-top: 10px; 
            margin: auto;
            transition: 0.5s;
        }
        .inner-container form li input:hover{
            box-shadow: 0 0 5px 5px #000000;
        }
        button:hover {
            box-shadow: 5px 5px 5px 0px #000000;
        }
        button:active {
            opacity: 0.5;
        }

        a{
            display: block;  
            margin-top: 20px;  
            color: white;
            text-decoration: none;
            font-size: 30px;
            transition: 0.5s;
        }
        a:hover{
            font-size: 40px;
            font-weight: bold;
            box-shadow: 5px 5px 10px 0px rgba(200, 200, 200, 100);
        }
        .error {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            color: red;
            font-size: 20px;
            text-align: center;
            width: 100%; 
            padding: 10px;
            transform: translateY(10rem);
            font-weight: 700;
        }
        .icon {
            position: absolute; 
            top: -90px; 
            left: 50%;  
            transform: translateX(-50%); 
        }
        .icon img {
            width: 200px;  
            height: auto; 
        }
    </style>
    <link rel="manifest" href="manifest.json">
</head>
<body>
    <div class="outer-container">
        <div class="inner-container" style="position: relative;">
            <div class="icon">
                <img src="image/logo.png" alt="">
            </div>
            <?php
            if(!isset($_SESSION["user_id"])){ ?>
            <form action="Login/login.php" method="post">
                <li><input type="text" name="username" placeholder="Username:"></li>
                <li><input type="password" name="password" placeholder="Password:"></li>
                <button class="login-button">Login</button>
            </form>
            <?php } ?>
                <div class="error"><?php
                    login_errors();
                ?></div>
        </div>
    </div>
        <script src="main.js"></script>
</body>
</html>