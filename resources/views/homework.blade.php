<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $homework->title }}</title>
</head>
<body>
    <h1>{{ $homework->title }}</h1>
    <p>{{ $homework->desc }}</p>
    <pre>{{$homework->deadline}}</pre>
    @if( $passed)


        @if(auth()->user()->hasSubmittedWork($homework->id))
            <h4>You have submitted your work</h4>


        @else
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <label>Homework : </label>
                <input type="file" name="homework" id="file">
                <br>
                <input type="submit" value="Submit">
            </form>
        @endif
    @else
        <h4>The deadline has already passed</h4>
    @endif
        @if (auth()->user()->is_teacher)
            @foreach ($homework->works as $work)
                <div style="border: 1px solid black; padding: 5px; margin: 5px">
                    {{ $work->user->name }}
                    <a href="{{ $work->file_path }}"><button>Download</button></a>
                </div>
            @endforeach
        @endif
                <br>

        <a href="/home">Back</a>
</body>
</html>
