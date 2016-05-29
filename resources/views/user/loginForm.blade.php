<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        .navigationBar{
            width:100%;
            height:50px;
            background-color:#333333;
            color:whitesmoke;
            margin-top:0px;
            position:fixed;
        }
        body{
            margin:0;
        }
        .logoSection{
            height:90%;
        }
        .logoSection img{
            height:100%;
        }
        .menuSection{
            height:90%;
            width:70%;
        }

        .loginSection{
            position: fixed;
            width:300px;
            height:300px;
            margin-left:60%;
            margin-top:200px;
            border: 5px groove cadetblue;
        }
        .mainContent{
            width:100%;
            text-align: center;
        }

        #bigLogo{
            position:fixed;
            width:50%;
            height:80%;
            margin-top:200px;
        }
        #bigLogo img{
            width:100%;
        }
        input[type="password"],input[type="text"]{
            width:80%;
            font-size:20px;
            font-family: "Calisto MT";
            border:none;
            border: 1px solid lightgrey;
            border-bottom: 2px solid darkgrey;
        }
        input:hover, input:focus{
            border-bottom:2px solid cadetblue;
        }
        .loginButton{
            width:30%;
            height:90%;
            background-color: #2e6da4;
            color:white;
            border-radius:5px;
            border:none;
            text-align: center;
            font-size:15px;
            font-family: "Calisto MT";
        }
        br{
            margin: 0 0;
        }

    </style>
</head>
<body>
<nav class="navigationBar">
    <div class="logoSection">
        <img src="/images/logo.png">
    </div>
    <div class="menuSection">
    </div>
</nav>

<div class="mainContent">
    <div id="bigLogo">
        <img src="/images/logo.png">
    </div>
    <div class="loginSection">
        <form>
            <h4>Username</h4></br>
            <input type="text" name="username">
            <h4>Password</h4></br>
            <input type="password" name="password"></br></br>
            <input type="button" value="Login" class="loginButton" onclick="">
        </form>
    </div>
</div>
</body>
</html>