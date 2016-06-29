@extends('base.navBar')
@section('allcontent')
<div class="mainSection">
    <div class="formInformation">
        <input type="text" placeholder="Title" id="title">
        <textarea placeholder="Description" id="description"></textarea>
        <input type="image" name="isquiz" id="isquiz" src="/images/unchecked_checkbox.png" onclick="replaceSrc(this)"><label id="quiz">Quiz</label>
        <input type="number" min="0" id="maxsub" placeholder=" Max Submissions">
        <select class="globalFontFamily">
            <option value="Calisto MT">Calisto MT</option>
            <option value="Times New Roman">Times New Roman</option>
            <option value="Verdana">Verdana</option>
            <option value="Calibri">Calibri</option>
            <option value="Lucida Console">Lucida Console</option>
            <option value="Impact">Impact</option>
            <option value="Arial">Arial</option>
        </select>
        <select class="globalFontStyle">
            <option value="normal" style="font-style:normal">normal</option>
            <option value="italic" style="font-style:italic">italic</option>
        </select>
        <input type="color" class="globalFontColor" title="Text colour">
        <br><br>
        <form method="post" action="" id="fileSave" enctype="multipart/form-data">
            <input type="file" id="fileUpload" name="fileUpload">
        </form>

    </div>
    <div class="newQuestion">
        <select class="questionType">
            <option value="1" class="op1">Text Answer</option>
            <option value="2" class="op2">Single Choice-radio</option>
            <option value="3" class="op3">Single Choice-select</option>
            <option value="4" class="op4">Multiple Choice</option>
            <option value="5" class="op5">Condition</option>
            <option value="6" class="op6">Date</option>
            <option value="7" class="op7">Number</option>
        </select>
        <input type="text" placeholder="Question Text" class="questionText">
        <input type="button" value="Add Question" class="submitButton addQuestionButton" onclick="AddNewQuestion(this)">
        <div class="optionsList">

        </div>
    </div>

    <input type="button" id="saveForm" value="Save form" onclick="saveForm()">
</div>


<div id="secretContent" style="display:none;">
    <div class="questionOptions">
        <button class="removeQuestion" onclick="removeQuestion(this)"><img src="/images/remove.png"></button>
        {{--<input type="button" value="Remove" class="actionsButton" onclick="">--}}
        <select class="fontFamily">
            <option value="Calisto MT">Calisto MT</option>
            <option value="Times New Roman">Times New Roman</option>
            <option value="Verdana">Verdana</option>
            <option value="Calibri">Calibri</option>
            <option value="Lucida Console">Lucida Console</option>
            <option value="Impact">Impact</option>
            <option value="Arial">Arial</option>
        </select>
        <select class="fontStyle">
            <option value="normal" style="font-style:normal">normal</option>
            <option value="italic" style="font-style:italic">italic</option>
        </select>
        <input type="color" class="textColor">
        <input type="checkbox" name="isrequired" class="isRequired">Required
    </div>
</div>
<style>

    body{
        margin:0;
        color:lightgrey;
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

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>

    $('.conditionRadio:not(:checked)').next('.newSection').hide();

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
                    $(element).parent().before('<div class="question textQuestion">' + $('#secretContent').first().html() + '<h3 contenteditable="true">' + $(element).siblings()[1].value + '</h3><input type="text" class="answerText"></div>');
                    break;
                case "6":
                    $(element).parent().before('<div class="question dateQuestion">' + $('#secretContent').first().html() + '<h3 contenteditable="true">' + $(element).siblings()[1].value + '</h3><input type="date" class="answerText"></div>');
                    break;
                case "7":
                    $(element).parent().before('<div class="question numberQuestion">' + $('#secretContent').first().html() + '<h3 contenteditable="true">' + $(element).siblings()[1].value + '</h3><input type="number" class="answerText"></div>');
                    break;
                case "2":
                    $(element).parent().before('<div class="question radioQuestion">' + $('#secretContent').first().html() + '<h3 contenteditable="true">' + $(element).siblings()[1].value + '</h3>' + $(element).parent().find('.optionsList:first').html() + '</div>');
                    $(element).parent().find('.optionsList:first').html("")
                    break;
                case "3":
                    $(element).parent().before('<div class="question selectQuestion">' + $('#secretContent').first().html() + '<h3 contenteditable="true">' + $(element).siblings()[1].value + '</h3>' + $(element).parent().find('.optionsList:first').html() + '</div>');
                    $(element).parent().find('.optionsList:first').html("")
                    break;
                case "4":
                    $(element).parent().before('<div class="question checkboxQuestion">' + $('#secretContent').first().html() + '<h3 contenteditable="true">' + $(element).siblings()[1].value + '</h3>' + $(element).parent().find('.optionsList:first').html() + '</div>');
                    $(element).parent().find('.optionsList:first').html("");
                    break;
                case "5":
                    $(element).parent().before('<div class="question conditionQuestion">' + $('#secretContent').first().html() + '<h3 contenteditable="true">' + $(element).siblings()[1].value + '</h3>' + $(element).parent().find('.optionsList:first').html() + '</div>');
                    $(element).parent().find('.optionsList:first').html("");
                    $('.newSection').find('.newQuestion').remove();
                    activateJavascript();
                    break;
            }
    };

    function activateJavascript(){
        $('.conditionRadio').parent().find('.newSection').hide();
        $('.conditionRadio').bind("change", function(){
            $(this).parent().find('.newSection').hide();
            if($(this).is(':checked'))
                $(this).next().next().show();
        });

    }
    $(document).change(function(){
        $('.questionType').bind("change",function() {

            if ($.inArray( this.value, ['2','3','4','5']) != -1 ) {
                if ($(this).parent().children().last().attr("class") != 'newOption')
                    $(this).parent().append(' <div class="newOption"><input type="text" class="optionText"><input type="button" value="Add Option" class="submitButton addOptionButton" onclick="AddNewOption(this)"></div>');
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
            switch($(element).parent().siblings().first().val()){
                case "2":
                    $(element).parent().parent().find('.optionsList:first').append('<input class="option" type="radio" name="' + $(element).siblings().first().val() + '" value="' + $(element).siblings().first().val() + '" >' + $(element).siblings().first().val()+'<br>');
                    $(element).siblings().first().val("");
                    break;
                case "3":
                    if(!$(element).parent().parent().find('.choicesList:first').length)
                        $(element).parent().parent().find('.optionsList:first').append("<select class='choicesList'></select>");
                    $(element).parent().parent().find('.choicesList:first').append('<option class="option" value="' + $('.optionText').val() + '" >' + $('.optionText').val()+'</option><br>');
                    $(element).siblings().first().val("");
                    break;
                case "4":
                    $(element).parent().parent().find('.optionsList:first').append('<input class="option" type="checkbox" name="' + $(element).siblings().first().val() + '" value="' + $('.optionText').val() + '" >' + $('.optionText').val()+'<br>');
                    $(element).siblings().first().val("");
                    break;
                case "5":
                    $(element).parent().parent().find('.optionsList:first').append('<input type="radio" name="' + $(element).siblings().first().val() + '" value="' + $('.optionText').val() + '" class="conditionRadio option">' + $('.optionText').val()+'<br>');
                    $(element).parent().parent().find('.optionsList:first').append('<div class="newSection"><div class="newQuestion"><select class="questionType"><option value="1" class="op1">Text Answer</option><option value="2" class="op2">Single Choice-radio</option><option value="3" class="op3">Single Choice-select</option><option value="4" class="op4">Multiple Choice</option><option value="6" class="op6">Date</option><option value="7" class="op7">Number</option></select><input type="text" placeholder="Question Text" class="questionText"><input type="button" value="Add Question" class="submitButton addQuestionButton" onclick="AddNewQuestion(this)"><div class="optionsList"></div></div></div>');
                    $(element).siblings().first().val("");
                    break;

            }
    }
    function getType(data){
        if($(data).hasClass('textQuestion'))
            return 1;
        if($(data).hasClass('radioQuestion'))
            return 2;
        if($(data).hasClass('selectQuestion'))
            return 3;
        if($(data).hasClass('checkboxQuestion'))
            return 4;
        if($(data).hasClass('conditionQuestion'))
            return 5;
        if($(data).hasClass('dateQuestion'))
            return 6;
        if($(data).hasClass('numberQuestion'))
            return 7;
    }

    function isRequired(data){
        return $(data).find('.isRequired:checked').length > 0;
    }
    function sendForm(data){
        console.log(data);

        $.ajax({
            url: '/generate',
            type: 'POST',
            data: { data: data , _token: '{{app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token())}}'},
            success: function(info){
                console.log(info);

                var fd = new FormData();
                if($('#fileUpload').get(0).files[0] != undefined) {
                    fd.append('fileUpload', $('#fileUpload').get(0).files[0]);
                    $.ajax({
                        url: 'generate/upload',
                        data: fd,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (data) {
                            console.log(data);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.log(xhr.status);
                            console.log(thrownError);
                        }
                    });
                }
                alert('Form has been successfully created!');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });

    }
    function saveForm(){

        var isQuiz = $('#isquiz').attr('src') == "/images/checked_checkbox.png";
        var form = '{"title":"' + $('.formInformation').children().first().val() +
                '","description":"' + $('.formInformation').children()[1].value +
                '","maxsubmissions":' + $('#maxsub').val() +
                ', "isQuiz":' + isQuiz +',"questions": [';
        var count = 0;
        $('.mainSection').children().each(function(){
            if($(this).hasClass('question')) {
                count = count + 1;
                var type = getType(this);
                var style = getFontStyle(this);
                form = form + '{"text":"' +$(this).find('h3').first().text() + '",';
                form = form + '"type":' + type + ', "isRequired":' + isRequired(this) +
                        ', "fontFamily":"' + style[0] + '", "fontStyle":"' + style[1] + '","textColor":"' + style[2] + '"';

                if(type == 2 || type == 3 || type == 4 || type == 5){
                    form = form + ',"options":[';
                    $(this).children().each(function() {
                        if ($(this).hasClass('option')) {
                            form = form + '{"isChecked":' + $(this).is(':checked') + ',"optionText":"' + $(this).val() + '"';

                            if (type == 5) {
                                form = form + ',"section":{"questions":[';
                                $(this).next().next().find('.question').each(function () {
                                    var type2 = getType(this);
                                    var style2 = getFontStyle(this);

                                    form = form + '{"text":"' + $(this).find('h3').first().text() + '",' +
                                            '"type":' + type2 + ', "isRequired":' + isRequired(this) +
                                            ', "fontFamily":"' + style2[0] + '", "fontStyle":"' + style2[1] + '","textColor":"' + style2[2];
                                    form = form + '","options":[';
                                    if (type2 == 2 || type2 == 3 || type2 == 4) {

                                        $(this).find('.option').each(function () {
                                            form = form + '{"isChecked":' + $(this).is(':checked') + ',optionText":"' + $(this).val() + '"},';
                                        });
                                        form = form.slice(0, form.length - 1);

                                    }
                                    form = form + ']},';
                                });

                                form = form.slice(0, form.length - 1);
                                form = form + ']}';
                            }

                            form = form + '},';
                        }
                    });
                    form = form.slice(0,form.length-1);
                    form = form + ']';
                }
                else{
                    form = form + ',"options":[]';
                }
                form = form + '},';
            }});

        form = form.slice(0,form.length-1);
        form = form + ']}';
        console.log(count);
        console.log(form);
        sendForm(JSON.parse(form));
    }

    function getFontStyle(element){

        lis = [$(element).find('.fontFamily').first().val(),
            $(element).find('.fontStyle').first().val(),
            $(element).find('.textColor').first().val()];

        return lis;
    }

</script>
@endsection