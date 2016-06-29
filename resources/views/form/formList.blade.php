@extends('base.navBar')
@section('allcontent')
<div id="formsList">
    @if($forms != null)
        @foreach($forms as $form)
            <div class="form" id="{{$form['url']}}">
                <a href="{{ URL::to("/submit/" . $form['url']) }}">
                    <div class="formTitle">{{$form['title']}}</div>
                </a>
                <div class="formDescription"><p>{{$form['description']}}</p></div>
                <a href = "{{URL::to("/remove/" . $form['url'])}}">
                    <input type="button" value="Remove form">
                </a>
                <a href = "{{URL::to("/submission/" . $form['url'])}}">
                    <input type="button" value="View submissions">
                </a>
            </div>
        @endforeach
    @endif
</div>
<script>
    $('.form').click(function(){

    });
</script>
<style>
    #formsList{
        position:fixed;
        margin-top: 60px;
        width:100%;
        text-align:center;
    }

    .form{
        margin: 2%;
        width:22%;
        height:120px;
        max-height:120px;
        border:1px solid #2e6da4;
        border-radius:5px;
        float:left;
        overflow: auto;
    }

    .form:hover > .formTitle{
        background-color: #5bc0de;
    }

    .formTitle{
        width:100%;
        heigth:30%;
        color:white;
        background-color: #2e6da4;

    }

    .formDescription{
        width:100%;
        height: 80px;
        color:black;
        overflow: auto;
        max-height: 99px;
    }

    a input{
        width:50%;
        float:left;
        height:20%;
        background-color: #2e6da4;
        color:white;
        border:none;
        text-align: center;
        font-family: "Calisto MT";
    }

</style>
@stop