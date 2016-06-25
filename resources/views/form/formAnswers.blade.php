@extends('base.navBar')
@section('allcontent')
<div id="answersList">
    <table>
        <thead id="header">
            @foreach($questions as $question)
                <td>{{$question}}</td>
            @endforeach
            <td>Submission Date</td>
        </thead>
        @foreach($submissions as $submission)
            <tr class="rows">
                @foreach($submission['answers'] as $answer)
                        <td>{{$answer['answerValue']}}</td>
                @endforeach
                <td>{{$submission['submission_date']}}</td>
            </tr>
        @endforeach
    </table>
    <a href="{{ URL::to( '/submission/' . $url . '/download')}}" target="_blank">File</a>
</div>
<style>
    #answersList{
        position: fixed;
        text-align: center;
        margin:0 auto;
        margin-top:100px;

    }
    #answersList table{
        margin:0 auto;
    }
    #header{
        background-color: #2e6da4;
    }
    .rows{
        background-color: #c3daee;
        color:black;
    }
</style>
