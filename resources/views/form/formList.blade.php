@extends('base.navBar')
@section('allcontent')
<div id="formsList">
    @if($forms != null)
        @foreach($forms as $form)
            <a href="{{ URL::to("/submit/" . $form['url']) }}">
            <div class="form" id="{{$form['url']}}">
                <div class="formTitle">{{$form['title']}}</div>
                <div class="formDescription"><p>{{$form['description']}}</p></div>
            </div>
            </a>
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
        width:20%;
        height:100px;
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
        heigth:60%;
        color:black;
        overflow: auto;
        max-height: 80px;
    }

</style>
@stop