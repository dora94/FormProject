<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .content img{
                width:90%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <img src="/images/logo.png">
            </div>
            <a href="{{ URL::to("/auth/login") }}">Login</a>
        </div>
    </body>
</html>
