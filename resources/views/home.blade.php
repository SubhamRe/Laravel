<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Management</title>
    </head>
    <body>
        <h4>Welcome {{ $user->name }},</h4>
        <form method="POST" action="/logout">
            @csrf
            <input type="submit" value="Logout"/>
        </form>
        @if ($user->is_teacher)
            <a href="/teacher/create">Create Homework</a>
        @endif
        @foreach ($homeworks as $homework)
            <div style="border: 1px solid black; padding: 5px; margin: 5px">
                {{ $homework->title }}
                <a href="/homework/{{ $homework->id }}"><button>Visit</button></a>
            </div>
        @endforeach
    </body>
</html>
