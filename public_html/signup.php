<?php include 'php_includes/header.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet">
        <title>Signup</title>
        <style type="text/css">
        body.bodylogin{
            height:100vh;
          max-width:100%;
            background: url(bg.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 300;
            text-align: center;
        }
        div.backarrow{
            position: absolute;
            top: 2%;
            left: 2%;
            font-size: 2em;
            border-radius: 1em;
            width: 1.5em;
            line-height: 1.5em;
            border: 1px solid black;
        }
        div.backarrow:hover{
            border-color: rgba(255,255,255,0.8);
        }
        div.backarrow:hover a{
            color: rgba(255,255,255,0.8);
        }
        div.backarrow a{
            text-decoration: none;
            color: #000;
        }
        div.backarrow a:hover{
            color: rgba(255,255,255,0.8);
        }
        span{
            font-size: 2.3em;
        }
        span.bold{
            font-weight: 400;
            font-size: inherit;
        }
        input{
            width: 30vw;
            padding: 0;
            margin: 0;
            display: block;
            margin-top: 5%;
            font-size: 1.3em;
            border: 1px solid #000;
            padding: 1%;
            background-color: rgba(255,255,255,0.0);
        }
        .loginform{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .submitbutton{
            width: 100%;
            background-color: #0070c9;
            border: 0;
            color: #fff;
            margin-top: 5%;
            padding-top: 3%;
            padding-bottom: 3%;
        }
        p{
            margin: 0;
            margin-top: 2%;
            padding: 0;
        }
        p a{
            color: #000;
        }
        p a:hover{
            color: rgba(255,255,255,0.8);
        }
        @media screen and (max-width: 320px) {
        }
        @media screen and (max-width: 480px) {
        }
        @media screen and (max-width: 768px) {
            input{
                width: 80vw;
            }
        }
        @media screen and (max-width: 1028px) {
        }
        </style>
    </head>
    <body class="bodylogin">
        <form class="loginform" action="signupAction.php" method="post">
            <span><span class="bold">Project</span> Team-Up</span>
            <input type='text' name='email' id='email' placeholder='Email'>
            <input type='text' name='username' placeholder='Username' id='username'>
            <input type='text' name='firstname' placeholder='Firstname' id='firstname'>
            <input type='text' name='lastname' placeholder='Lastname' id='lastname'>
            <input type="password" name="password" placeholder='Password'>
            <input type="password" name="repassword" placeholder='Repeat Password'>
            <input class="submitbutton" type="submit" value="Sign up">
            
            <p>Or <a href="login.php">Login now</a></p>
        </form>
    </body>
</html>
