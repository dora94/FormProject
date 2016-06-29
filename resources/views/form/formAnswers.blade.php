@extends('base.navBar')
@section('allcontent')
<?php $c=0; ?>
<div id="answersList">
    <table>
        <thead id="header">
            <td>No.</td>
            @foreach($questions as $question)
                <td>{{$question}}</td>
            @endforeach
            <td>Submission Date</td>
            <td>Points</td>
        </thead>
        @foreach($submissions as $submission)
            <?php $c++; ?>
            <tr class="rows">
                <td>{{$c}}</td>
                @foreach($submission['answers'] as $answer)
                        <td>{{$answer['answerValue']}}</td>
                @endforeach
                <td>{{$submission['submission_date']}}</td>
                <td>{{$submission['points']}}</td>
            </tr>
        @endforeach
    </table>
    <a href="{{ URL::to( '/submission/' . $url . '/download')}}" target="_blank">Download as File</a>
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
