<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
</head>
<body>
@if (session()->has('message'))
    <div>{{ session()->get("message") }}</div>
@endif
<h1>Admin Login</h1>
<form method="POST" action="/admin/login">
    @csrf
    <input placeholder="Username" name="username"/><br>
    <input placeholder="Password" name="password" type="password"/><br>
    <input type="submit" value="Login">
</form>
</body>
</html>

