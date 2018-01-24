<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div>
            <ul>
                <li><a href="{{ route('tech') }}">Tech</a></li>
                <li><a href="{{ route('worship-tech') }}">Worship Tech</a></li>
                <li><a href="{{ route('creative') }}">Creative</a></li>
                <li><a href="{{ route('resources') }}">Resources</a></li>
                <li><a href="{{ route('facility') }}">Facility</a></li>
                <li><a href="{{ route('tech') }}">Tech</a></li>
            </ul>
        </div>
    </body>
</html>
