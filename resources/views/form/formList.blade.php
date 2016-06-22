@extends('base.navBar')
@section('allcontent')
<div id="formsList">
    @if(@formList != null)
        @foreach($formList as $form)
            <div class="form" id="{{$form->id}}">
                <div class="formTitle">{{$form->title}}</div>
                <div class="formDescription"><p>{{$form->description}}</p></div>
            </div>
        @endforeach
    @endif
</div>
<script>

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
        height:30%;
        border:1px solid #2e6da4;
        border-radius:5px;
        float:left;
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
</style>
@stop