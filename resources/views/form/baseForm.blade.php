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
        .mainSection{
            color:black;
            width:70%;
            height:100%;
            margin:0 auto;
            padding:5px;
            padding-top:100px;
            border:1px solid lightgrey;
        }
        .formInformation{
            width:100%;
            height:30%;
        }
        .formInformation input[type="text"]{
            width:100%;
            border:none;
            font-size:30px;
            border-bottom:2px solid darkgrey;
        }
        .formInformation input[type="image"]{
            height:20px;
        }
        .formInformation textarea{
            width:100%;
            border:1px solid lightgrey;
            resize: none;
            height:100px;
            overflow: auto;
            margin-top:10px;
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
            padding-bottom:10px;
            border: 1px solid #2e6da4;
        }
        #saveForm{
            margin-top:20px;
            width:100%;
            background-color: #2e6da4;
            color:white;
            font-size: 20px;
            border:none;
        }
        .questionOptions{
            width:90%;
            height:20px;
            display:inline-block;
            text-align: left;
            background-color: white;
            padding:3px;
            color:dimgrey;
        }
        .actionsButton{
            width:20%;
            background-color: white;
            border:none;
        }
        .textColor{
            width:20%;
            height:100%;
        }
        .removeQuestion{
             height:25px;
         }
        .removeQuestion img{
            height:100%;
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
            border-bottom:2px solid darkgrey;
        }
        .questionText{
            width:60%;
            height:90%;
            text-align: left;
            font-size:15px;
            font-family: "Calisto MT";
            border:none;
            border-bottom:2px solid darkgrey;
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
            width:99%;
            height:90%;
            text-align: left;
            font-size:15px;
            font-family: "Calisto MT";
            border:none;
            border-bottom:2px solid darkgrey;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script>

        function replaceSrc(element){
            if($(element).attr("src") == "/images/unchecked_checkbox.png"){
                $(element).attr("src","/images/checked_checkbox.png");
            }
            else{
                $(element).attr("src","/images/unchecked_checkbox.png");
            }
        }

        function AddNewQuestion(element){

            var val = $(element).siblings().first().val();

            if($(element).siblings()[1].value.length == 0)
                    alert('Question text cannot be empty');
            else
            switch(val){
                case "1":
                    $(element).parent().before('<div class="question">' + $('#secretContent').first().html() + '<h3 contenteditable="true">' + $(element).siblings()[1].value + '</h3></br><input type="text" class="answerText"></div>');
                    break;
                case "6":
                    $(element).parent().before('<div class="question">' + $('#secretContent').first().html() + '<h3 contenteditable="true">' + $(element).siblings()[1].value + '</h3></br><input type="date" class="answerText"></div>');
                    break;
                case "7":
                    $(element).parent().before('<div class="question">' + $('#secretContent').first().html() + '<h3 contenteditable="true">' + $(element).siblings()[1].value + '</h3></br><input type="number" class="answerText"></div>');
                    break;
                case "2":
                    $(element).parent().before('<div class="question">' + $('#secretContent').first().html() + '<h3 contenteditable="true">' + $(element).siblings()[1].value + '</h3></br>' + $('.optionsList').html() + '</div>');
                    $('.optionsList').html("");
                    break;
                case "3":
                    $(element).parent().before('<div class="question">' + $('#secretContent').first().html() + '<h3 contenteditable="true">' + $(element).siblings()[1].value + '</h3></br>' + $('.optionsList').html() + '</div>');
                    $('.optionsList').html("");
                    break;
                case "4":
                    $(element).parent().before('<div class="question">' + $('#secretContent').first().html() + '<h3 contenteditable="true">' + $(element).siblings()[1].value + '</h3></br>' + $('.optionsList').html() + '</div>');
                    $('.optionsList').html("");
                    break;
                case "5":
                    $(element).parent().before('<div class="question">' + $('#secretContent').first().html() + '<h3 contenteditable="true">' + $(element).siblings()[1].value + '</h3></br>' + $('.optionsList').html() + '</div>');
                    $('.optionsList').html("");
                    break;
            }
        };
        $(document).change(function(){
            $('.questionType').bind("change",function() {
                console.log($.inArray( this.value, ['2','3','4']));
                if ($.inArray( this.value, ['2','3','4','5']) != -1 ) {
                    if ($(this).parent().children().last().attr("class") != 'newOption')
                        $(this).parent().append(' <div class="newOption"><input type="text" class="optionText"><input type="button" value="Add Option" class="submitButton" onclick="AddNewOption(this)"></div>');
                }
                else {
                    if ($(this).parent().children().last().attr('class') == 'newOption')
                        $(this).parent().children().last('.newOption').remove();
                }
            });
            $('.fontFamily').bind("change",function() {
                $(this).parent().siblings().css("font-family", this.value);
            });

            $('.globalFontFamily').bind("change",function() {
                $(this).parent().parent().css("font-family", this.value);
            });

            $('.fontStyle').bind("change",function(){
                $(this).parent().siblings().css("font-style", this.value);
            });

            $('.globalFontStyle').bind("change",function(){
                $(this).parent().parent().css("font-style", this.value);
            });

            $('.textColor').bind("change",function(){
                $(this).parent().parent().css("color", this.value);
            });

            $('.globalFontColor').bind("change",function(){
                $(this).parent().parent().css("color", this.value);
            });

            $('.removeQuestion').bind("click",function(){
                $(this).parent().parent().remove();
            });
        });

        $(document).ready(function(){

            $('.fontFamily > option, .globalFontFamily > option').each(function() {
                $(this).css("font-family", this.value);
            });
        });
        function removeQuestion(element){
            $(element).parent().parent().detach();
        }

        function AddNewOption(element){
            if($(element).siblings().first().val().length == 0)
                    alert('Add option text!');
            else
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
                    $('.optionsList').last().append('<div class="newSection"><div class="newQuestion"><select class="questionType"><option value="1">Text Answer</option><option value="2">Single Choice-radio</option><option value="3">Single Choice-select</option><option value="4">Multiple Choice</option><option value="5">Condition</option></select><input type="text" placeholder="Question Text" class="questionText"><input type="button" value="Add Question" class="submitButton" onclick="AddNewQuestion(this)"></div><div class="optionsList"></div></div>');
                    $('.optionText').val("");
                    break;

            }
        }
        function getType(data){
            if($(data).find('input[type=text]').size() != 0)
                    return 1;
            if($(data).find('input[type=radio]').size() != 0)
                    return 2;
            if($(data).find('input[type=checkbox]').size() != 0)
                    return 3;
            if($(data).find('select').size() != 0 )
                    return 4;
            if($(data).find('input[type=date]').size() != 0)
                return 6;
            if($(data).find('input[type=number]').size() != 0)
                return 7;
            //need to add case for conditional question
        }

        function isRequired(data){
           return $(data).find('.isRequired:checked').length > 0;
        }
        function sendForm(data){
            console.log(data);

            $.ajax({
                url: 'generate',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(info){
                    console.log(info);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });

        }
        function saveForm(){
            var form = '{ "token":"{{csrf_token()}}", "title":"' + $('.formInformation').children().first().val() + '","description":"' + $('.formInformation').children()[1].value + '","questions": [';

            $('.question').each(function(){
                var type = getType(this);
                form = form + '{"text":"' +$(this).find('h3').first().text() + '",';
                form = form + '"type":' + type + ', "isRequired":' + isRequired(this);

                if(type == 2 || type == 3){
                    form = form + ',"options":[';
                    $(this).find('input').each(function(){
                        form = form + '{"optionText":"' + $(this).val() + '"},';
                    })
                    form = form.slice(0,form.length-1);
                    form = form + ']';
                }
                else
                    form = form + ',"options":[]';
                form = form + '},';
            });

            form = form.slice(0,form.length-1);
            form = form + ']}';

            sendForm(JSON.parse(form));
        }


    </script>
</head>
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
@yield('content')
</body>
</html>