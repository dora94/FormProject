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
        img{
            height:100%;
        }
        .menuSection{
            height:90%;
            width:70%;
        }
        .mainSection{
            color:black;
            width:70%;
            height:100%;
            margin:0 auto;
            padding-top:100px;
        }

        .newSection{
            color:black;
            width:100%;
            margin:0 auto;
            display:inline-block;
        }
        .newQuestion{
            margin-top:10px;
            width:100%;
            display:inline-block;
            text-align: left;
        }
        .newOption{
            padding-top:10px;
            width:100%;
            display:inline-block;
            text-align: left;
        }
        .question{
            width:100%;
            display:block;
            text-align: left;
        }
        .questionType{
            width:20%;
            height:90%;
            background-color: #2e6da4;
            color:white;
            border-radius:5px;
            border:none;
            text-align: center;
            font-size:15px;
            font-family: "Calisto MT";
        }
        .optionText{
            width:80%;
            height:90%;
            text-align: left;
            font-size:15px;
            font-family: "Calisto MT";
            border:none;
            border-bottom:1px solid darkgrey;
        }
        .questionText{
            width:60%;
            height:90%;
            text-align: left;
            font-size:15px;
            font-family: "Calisto MT";
            border:none;
            border-bottom:1px solid darkgrey;
        }
        .submitButton{
            width:15%;
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
            display:block;
            margin: 5px 0;
        }
        .answerText{
            width:80%;
            height:90%;
            text-align: left;
            font-size:15px;
            font-family: "Calisto MT";
            border:none;
            border-bottom:1px solid darkgrey;
        }
        .answerText:hover, .answerText:focus{
            border-bottom:2px solid cadetblue;
        }
        .questionText:hover, .questionText:focus{
            border-bottom:2px solid cadetblue;
        }
        .optionText:hover, .optionText:focus{
            border-bottom:2px solid cadetblue;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script>

        function AddNewQuestion(element){

            var val = $(element).siblings().first().val();

            switch(val){
                case "1":
                    $(element).parent().before('<div class="question"><h3>' + $(element).siblings()[1].value + '</h3></br><input type="text" class="answerText"></div>');
                    break;
                case "2":
                    $(element).parent().before('<div class="question"><h3>' + $(element).siblings()[1].value + '</h3></br>' + $('.optionsList').html() + '</div>');
                    $(element).parent().parent().children().last('.optionsList').html("");
                    break;
                case "3":
                    $(element).parent().before('<div class="question"><h3>' + $(element).siblings()[1].value + '</h3></br>' + $('.optionsList').html() + '</div>');
                    $(element).parent().parent().children().last('.optionsList').html("");
                    break;
                case "4":
                    $(element).parent().before('<div class="question"><h3>' + $(element).siblings()[1].value + '</h3></br>' + $('.optionsList').html() + '</div>');
                    $(element).parent().parent().children().last('.optionsList').html("");
                    break;
            }
        };
        $(document).change(function(){
            $('.questionType').bind("change",function() {
                if (this.value != "1") {
                    if ($(this).parent().children().last().attr("class") != 'newOption')
                        $(this).parent().append(' <div class="newOption"><input type="text" class="optionText"><input type="button" value="Add Option" class="submitButton" onclick="AddNewOption(this)"></div>');
                }
                else {
                    if ($(this).parent().children().last().attr('class') == 'newOption')
                        $(this).parent().children().last('.newOption').remove();
                }
            });
        });

        function AddNewOption(element){

            switch($('.questionType').val()){
                case "2":
                    $('.optionsList').append('<input type="radio" name="question" value="' + $('.optionText').val() + '" >' + $('.optionText').val()+'<br>');
                    $('.optionText').val("");
                    break;
                case "3":
                    if(!$('.choicesList').length)
                        $('.optionsList').append("<select class='choicesList'></select>");
                    $('.choicesList').append('<option value="' + $('.optionText').val() + '" >' + $('.optionText').val()+'</option><br>');
                    $('.optionText').val("");
                    break;
                case "4":
                    $('.optionsList').append('<input type="checkbox" name="question" value="' + $('.optionText').val() + '" >' + $('.optionText').val()+'<br>');
                    $('.optionText').val("");
                    break;
                case "5":
                    $('.optionsList').last().append('<input type="radio" name="question" value="' + $('.optionText').val() + '" >' + $('.optionText').val()+'<br>');
                    $('.optionsList').last().append('<div class="newSection"><div class="newQuestion"><select class="questionType"><option value="1">Text Answer</option><option value="2">Single Choice-radio</option><option value="3">Single Choice-select</option><option value="4">Multiple Choice</option><option value="5">Condition</option></select><input type="text" placeholder="Question Text" class="questionText"><input type="button" value="Add Question" class="submitButton" onclick="AddNewQuestion(this)"></div><div class="optionsList"s></div></div>');
                    $('.optionText').val("");
                    break;

            }
        }
    </script>
</head>
<body>
<nav class="navigationBar">
    <div class="logoSection">
        <img src="/images/logo.png">
    </div>
    <div class="menuSection">
    </div>
</nav>
@yield('content')
</body>
</html>