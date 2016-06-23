@extends('form.baseForm')
@section('content')
<div class="mainSection">
    <div class="formInformation">
        <input type="text" placeholder="Title">
        <textarea placeholder="Description"></textarea>
        <input type="image" name="isquiz" id="isquiz" src="/images/unchecked_checkbox.png" onclick="replaceSrc(this)">Quiz
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
    </div>
    <div class="newQuestion">
        <select class="questionType">
            <option value="1">Text Answer</option>
            <option value="2">Single Choice-radio</option>
            <option value="3">Single Choice-select</option>
            <option value="4">Multiple Choice</option>
            <option value="5">Condition</option>
            <option value="6">Date</option>
            <option value="7">Number</option>
        </select>
        <input type="text" placeholder="Question Text" class="questionText">
        <input type="button" value="Add Question" class="submitButton" onclick="AddNewQuestion(this)">
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
@endsection