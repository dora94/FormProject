@extends('base.navBar')
@section('allcontent')
    <style>

        body{
            margin:0;
            color:lightgrey;
        }

        img{
            height:100%;
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

        .question{
            width:100%;
            display:block;
            text-align: left;
            padding-bottom:10px;
        }

        .actionsButton{
            width:20%;
            background-color: white;
            border:none;
        }

        .removeQuestion img{
            height:100%;
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

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.conditionRadio').parent().find('.newSection').hide();
            $('.conditionRadio').bind("change", function(){
                $(this).parent().find('.newSection').hide();
                if($(this).is(':checked'))
                    $(this).next().next().show();
            });
        });

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

        function sendSubmission(data){

                $.ajax({
                    url: '/submission/save',
                    type: 'POST',
                    data: { data: data , _token: '{{app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token())}}'},
                    success: function(info){
                        console.log(info);
                        alert("Submission has ben succesfully sent!");
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status);
                        console.log(thrownError);
                    }
                });
        }

        function loadSubmission(){
            $submission = '{ "url":"{{$form['url']}}", "answers":[';
            $('.question').each(function(){
                $submission = $submission + '{"question_id":"' + $(this).attr('id') + '", "answerValue":"' + getAnswer(this) + '"},';
            });

            $submission = $submission.slice(0, $submission.length - 1);

            $submission = $submission + "]}";
            console.log($submission);

            sendSubmission(JSON.parse($submission));
        }

        function getAnswer(element){
            var $type = getType(element);

            if($type == 1 || $type == 6 || $type == 7){
                    return $(element).find('input').first().val();
            }

            var $answer = "";
            if($type == 2 || $type == 3 || $type == 4 || $type == 5)
            {
                $(element).children().each(function(){
                    if($(this).prop( "checked" )){
                        $answer = $answer + $(this).val() + ";";
                    }
                });

                $answer = $answer.slice(0, $answer.length - 1);

                return $answer;
            }

            return "";

        }

    </script>
    <div class="mainSection">
        <div class="formInformation">
            <h2>{{$form['title']}}</h2>
            <p>{{$form['description']}}</p>
            @if($form['file_extension'] != "")
                <a href="{{ URL::to( '/download/' . $form['url'] . $form['file_extension']) }}" target="_blank">File</a>
            @endif
        </div>
        <form action="">
        @foreach($form['questions'] as $question)
            <h3 style="font-family:{{$question['fontFamily']}};font-style:{{$question['fontStyle']}};color:{{$question['textColor']}}">{{$question['text']}}</h3>
            @if($question['type'] == 1)
                <div class="question textQuestion" id={{$question['id']}} >
                <input type="text" class="answerText" {{$question['isRequired'] == true ? 'required' : ''}}>
             @elseif($question['type'] == 2)
                 <div class="question radioQuestion" id={{$question['id']}}>
                 @foreach($question['options'] as $option)
                    <input type="radio" name={{$question['id']}} value="{{$option['optionText']}}" {{$question['isRequired'] == true ? 'required' : ''}}>{{$option['optionText']}}</br>
                @endforeach
             @elseif($question['type'] == 4)
                <div class="question checkboxQuestion" id={{$question['id']}}>
                @foreach($question['options'] as $option)
                    <input type="checkbox" name={{$question['id']}} value="{{$option['optionText']}}" {{$question['isRequired'] == true ? 'required' : ''}}>{{$option['optionText']}}</br>
                @endforeach
             @elseif($question['type'] == 3)
                 <div class="question selectQuestion" id={{$question['id']}}>
                 <select class='choicesList'>
                @foreach($question['options'] as $option)
                    <option value="{{$option['optionText']}}" >{{$option['optionText']}}</option>
                @endforeach
                </select>
             @elseif($question['type'] == 5)
                <div class="question conditionQuestion" id={{$question['id']}}>
                @foreach($question['options'] as $option)
                    <input type="radio" name={{$question['id']}} class="conditionRadio" value="{{$option['optionText']}}" {{$question['isRequired'] == true ? 'required' : ''}}>{{$option['optionText']}}</br>
                    @if(isset($option['section']))
                        <?php $section = $option['section'];
                                ?>
                        <div class="newSection">
                        @foreach($section['questions'] as $question2)
                                 <h3>{{$question2['text']}}</h3>
                                    @if($question2['type'] == 1)
                                        <div class="question textQuestion" id={{$question2['id']}} {{$question2['isRequired'] == true ? 'required' : ''}}>
                                        <input type="text" class="answerText">
                                    @elseif($question2['type'] == 2)
                                        <div class="question radioQuestion" id={{$question2['id']}}>
                                        @foreach($question2['options'] as $option2)
                                            <input type="radio" name={{$question2['id']}} value="{{$option2['optionText']}}" {{$question2['isRequired'] == true ? 'required' : ''}}>{{$option2['optionText']}}</br>
                                        @endforeach
                                    @elseif($question2['type'] == 4)
                                        <div class="question checkboxQuestion" id={{$question2['id']}}>
                                        @foreach($question2['options'] as $option2)
                                            <input type="checkbox" name={{$question2['id']}} value="{{$option2['optionText']}}" {{$question2['isRequired'] == true ? 'required' : ''}}>{{$option2['optionText']}}</br>
                                        @endforeach
                                    @elseif($question2['type'] == 3)
                                        <div class="question selectQuestion" id={{$question2['id']}}>
                                        <select class='choicesList'>
                                            @foreach($question2['options'] as $option2)
                                                <option value="{{$option2['optionText']}}" >{{$option2['optionText']}}</option>
                                            @endforeach
                                        </select>
                                    @elseif($question2['type'] == 6)
                                        <div class="question dateQuestion" id={{$question2['id']}} {{$question2['isRequired'] == true ? 'required' : ''}}>
                                        <input type="date" class="answerText">
                                    @elseif($question2['type'] == 7)
                                        <div class="question numberQuestion" id={{$question2['id']}} {{$question2['isRequired'] == true ? 'required' : ''}}>
                                        <input type="number" class="answerText">
                                    @endif
                                    </div>
                         @endforeach
                         </div>
                     @endif
                @endforeach
             @elseif($question['type'] == 6)
                    <div class="question dateQuestion" id={{$question['id']}} {{$question['isRequired'] == true ? 'required' : ''}}>
                    <input type="date" class="answerText">
             @elseif($question['type'] == 7)
                    <div class="question numberQuestion" id={{$question['id']}} {{$question['isRequired'] == true ? 'required' : ''}}>
                    <input type="number" class="answerText">
             @endif
             </div>
        @endforeach
        </form>
        <input type="button" value="Submit" class="submitButton" onclick="loadSubmission()">

    </div>
@stop