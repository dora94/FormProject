@extends('form.baseForm')
@section('content')
<div class="mainSection">
    <div class="formInformation">
        <input type="text" placeholder="Title">
        <textarea placeholder="Description"></textarea>
        <input type="image" name="isquiz" src="/images/unchecked_checkbox.png" onclick="replaceSrc(this)">Quiz
    </div>
    <div class="newQuestion">
        <select class="questionType">
            <option value="1">Text Answer</option>
            <option value="2">Single Choice-radio</option>
            <option value="3">Single Choice-select</option>
            <option value="4">Multiple Choice</option>
            <option value="5">Condition</option>
        </select>
        <input type="text" placeholder="Question Text" class="questionText">
        <input type="button" value="Add Question" class="submitButton" onclick="AddNewQuestion(this)">
        <div class="optionsList">

        </div>
    </div>

    <input type="button" id="saveForm" value="Save form">
</div>


<div id="secretContent" style="display:none;">
    <div class="questionOptions">
        <button class="removeQuestion"><img src="/images/remove.png"></button>
        {{--<input type="button" value="Remove" class="actionsButton" onclick="">--}}
        <select class="fontFamily">
            <option>Calisto MT</option>
            <option>Times New Roman</option>
            <option>Verdana</option>
            <option>Calibri</option>
        </select>
        <input type="color" class="textColor">
        <input type="checkbox" name="isrequired">Required
    </div>
</div>
@endsection