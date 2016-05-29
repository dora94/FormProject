@extends('form.baseForm')
@section('content')
<div class="mainSection">
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
    </div>
    <div class="optionsList">

    </div>

   </div>
@endsection