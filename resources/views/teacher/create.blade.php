<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Homework</title>
</head>
<body>
<h1>Create Homework</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('message'))
    <div>{{ session()->get("message") }}</div>
@endif
<form method="POST">
    @csrf
    <input name="title" placeholder="Title"><br>
    <textarea name="desc" placeholder="Description"></textarea><br>
    <input name="deadline" type="datetime-local"><br>
    <input type="submit" value="Create">
</form>
<br>
<a href="/home">Back</a>
</body>
</html>
