<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

</head>
<body>
{!! Form::open(['url' => '/send', 'method' => 'POST']) !!}
<input type="text" name="emailTo"></br>
<button type="submit">Send email</button>
{!! Form::close() !!}
</body>
</html>