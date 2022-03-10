<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<h2>Login</h2>

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

<form method="POST" action="">
    @csrf
    <input type="email" placeholder="Email" name="email"/>
    <input type="password" placeholder="Password" name="password"/>
    <input type="submit" value="Login"/>
</form>
<a href="/register">Register</a>
</body>
</html>
