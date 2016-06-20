<!DOCTYPE html>
<html lang="en">
<head>
    <script src="jscolor.js"></script>
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
            color:lightgrey;
        }
        .logoSection{
            width:85%;
            height:90%;
            float:left;
        }
        img{
            height:100%;
        }
        .menuSection{
            height:90%;
            width:15%;
            float:left;
            text-align:right;
        }
        .menuImages{
            height:30px;
        }

        .removeQuestion img{
            height:100%;
        }
        br{
            display:block;
            margin: 5px 0;
        }

        ul{
            list-style-type: none;
            margin:0;
            padding:0;
            overflow: hidden;
        }

        li{
            float:left;
            width:50px;
            text-align: center;
        }

        #menuBar{
            display:block;
        }

        .langImages{
            heigth:50%;
            width:50%;
        }



    </style>
    <script>
        function changeLanguage(lang){

        }
    </script>
<body>
<nav class="navigationBar">
    <div class="logoSection">
        <img src="/images/logo.png">
    </div>
    <div class="menuSection">
        <ul id="menuBar">
            <li><img src="/images/english.png" class="langImages" onclick='changeLanguage("en")'></li>
             <li><img src="/images/romana.png" class="langImages" onclick='changeLanguage("ro")'></li>
            <li><img src="/images/login.png" class="menuImages"></li>
        </ul>
    </div>
</nav>
@yield('allcontent')
</body>
</html>