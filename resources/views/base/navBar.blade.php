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
            color:lightgrey;
        }
        .logoSection{
            width:75%;
            height:90%;
            float:left;
        }
        img{
            height:100%;
        }
        .menuSection{
            height:90%;
            width:25%;
            float:left;
            text-align:right;
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
            width:60px;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script>
        function changeLanguage(lang){
            data = JSON.parse('{"locale":"' + lang + '"}');
            $.ajax({
                url: '/language',
                type: 'POST',
                data: { data: data , _token: '{{app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token())}}'},
                success: function(info){
                    console.log(info);
                    $('#title').attr('placeholder',info['title']);
                    $('#description').attr('placeholder',info['description']);
                    $('#quiz').text(info['quiz']);
                    $('#maxsub').attr('placeholder',info['max']);
                    $('#fileUpload').attr('placeholder',info['fileUpload']);
                    $('.questionText').each(function(){
                        $(this).attr('placeholder',info['questiontext']);
                    });
                    $('.addQuestionButton').each(function(){
                        $(this).attr('value',info['addquestion']);
                    });
                    $('.addOptionButton').each(function(){
                        $(this).attr('value',info['addoption']);
                    });
                    $('#saveForm').attr('value',info['saveform']);
                    $('.op1').each(function() {
                        $(this).text(info['textanswer']);
                    });
                    $('.op2').each(function() {
                        $(this).text(info['radio']);
                    });
                    $('.op3').each(function(){
                                $(this).text(info['select']);
                    });
                    $('.op4').each(function(){
                                $(this).text(info['checkbox']);
                    });
                    $('.op5').each(function(){
                                $(this).text(info['condition']);
                    });
                    $('.op6').each(function(){
                                $(this).text(info['date']);
                    });
                    $('.op7').each(function(){
                                $(this).text(info['number']);
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
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
            <li><a href="/forms" id="forms">Forms</a></li>
            <li><a href="/generate" id="generate">Generate</a></li>
            <li><a href="/auth/logout" id="logout">Logout</a></li>
        </ul>
    </div>
</nav>
@yield('allcontent')
</body>
</html>