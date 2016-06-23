@extends('base.navBar')
@section('allcontent')
    <div class="mainSection">
        <div class="formInformation">
            <h3>{{$form->title}}</h3>
            <p>{{$form->description}}</p>
        </div>
        {!! Form::open(['id' => 'formSubmission', 'method' => 'POST']) !!}
        @foreach($form->questions as $question)
            <div class="question"></br>
            <h3>{{$question->title}}</h3>
            @if($question->type == 1)
                <input type="text" class="answerText">
             @elseif($question->type == 2)
                @foreach($question->options as $option)
                    <input type="radio" name="question" value="{{$option->title}}" >{{$option->title}}</br>
                @endforeach
             @elseif($question->type == 3)
                @foreach($question->options as $option)
                    <input type="checkbox" name="question" value="{{$option->title}}" >{{$option->title}}</br>
                @endforeach
             @elseif($question->type == 4)
                <select class='choicesList'>
                @foreach($question->options as $option)
                    <option value="{{$option->title}}" >{{$option->title}}</option>
                @endforeach
                </select>
             @elseif($question->type == 5)
                <!-- here need to add something else for the conditional question thingy -->
                @foreach($question->options as $option)
                    <input type="radio" name="question" value="{{$option->title}}" >{{$option->title}}</br>
                @endforeach
             @elseif($question->type == 6)
                    <input type="date" class="answerText">
             @endif
             @elseif($question->type == 7)
                    <input type="number" class="answerText">
             @endif
             </div>
        @endforeach
        <input type="button" value="Submit" class="submitButton" onclick="document.getElementById('submissionForm').submit()">
        {!! Form::close() !!}

    </div>
@stop