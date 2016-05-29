@extends('content')

<div class="initialSection">
    <form method="POST" action="{{ url('/user/addForm') }}">
        <label for="formTitle">Title</label>
        <input type="text" name="formTitle">

        <label for="formDescription">Description</label>
        <input type="text" name="formDescription">

        <label for="formMaxSubscriptions">Maximum Subscriptions</label>
        <input type="number" name="formMaxSubscriptions">

        <button type="submit">Next</button>
    </form method="POST" action="{{ url('/user/addForm') }}">
</div>
@stop