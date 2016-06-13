<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        .navigationBar {
            width: 100%;
            height: 50px;
            background-color: #333333;
            color: whitesmoke;
            margin-top: 0px;
            position: fixed;
        }

        body {
            margin: 0;
        }

        .logoSection {
            height: 90%;
        }

        .logoSection img {
            height: 100%;
        }

        .menuSection {
            height: 90%;
            width: 70%;
        }

        .registerSection {
            position: fixed;
            width: 300px;
            height: 300px;
            margin-left: 60%;
            margin-top: 200px;
            border: 5px groove cadetblue;
        }

        .mainContent {
            width: 100%;
            text-align: center;
        }

        #bigLogo {
            position: fixed;
            width: 50%;
            height: 80%;
            margin-top: 200px;
        }

        #bigLogo img {
            width: 100%;
        }

        input[type="password"], input[type="text"], input[type="email"] {
            width: 80%;
            font-size: 20px;
            font-family: "Calisto MT";
            border: none;
            border: 1px solid lightgrey;
            border-bottom: 2px solid darkgrey;
        }

        input:hover, input:focus {
            border-bottom: 2px solid cadetblue;
        }

        .registerButton {
            width: 30%;
            height: 40px;
            background-color: #2e6da4;
            color: white;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 15px;
            font-family: "Calisto MT";
        }

        br {
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
    @if(count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
    <div class="registerSection">
        {!! Form::open(['id'=>'registerForm', 'method' => 'POST']) !!}
        <br>
        <input type="text" name="firstname" placeholder="First Name">
        </br></br>
        <input type="text" name="lastname" placeholder="Last Name">
        </br></br>
        <input type="email" name="email" placeholder="Email Address">
        </br></br>
        <input type="text" name="username" placeholder="UserName">
        </br></br>
        <input type="password" name="password" placeholder="Password">
        </br></br>
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        </br></br>
        <input type="button" value="Register" class="registerButton" onclick="document.getElementById('registerForm').submit();">
        {!! Form::close() !!}
    </div>
</div>
</body>
</html>