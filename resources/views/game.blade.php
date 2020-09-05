<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Play Game</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"/>
    <script type="application/javascript" src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <h1 class="text-center">Spaceship Game</h1>

        <div id="game"
             data-initial-game-type='{{ $gameType }}'
             data-play-person-api-endpoint='{{ $playPersonApiEndpoint }}'
             data-play-starship-api-endpoint='{{$playStarshipApiEndpoint}}'></div>
    </div>
</div>
</body>
</html>
