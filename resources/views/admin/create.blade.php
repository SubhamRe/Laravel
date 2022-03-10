<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <h1>Admin</h1>
    <form method="POST" action="/logout">
        @csrf
        <input type="submit" value="Logout">
    </form>
    <br>
    @if (session()->has('message'))
        <div>{{ session()->get("message") }}</div>
    @endif
    <form method="POST">
        @csrf
        <label>User : </label>
        <select name="user">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select><br><br>
        <label>Type : </label><select name="teacher">
            <option value="1">Teacher</option>
            <option value="0">Student</option>
        </select><br><br>
        <input type="submit" value="Change">
    </form>
</body>
</html>
