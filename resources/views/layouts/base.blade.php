<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>flashcards</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
            crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @if (Route::has('login'))
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 text-right">
                    @auth
                        <a href="{{ url('/home') }}">Strona główna</a>
                    @else
                        <a href="{{ route('login') }}">Zaloguj się</a>
                        <a href="{{ route('register') }}">Zarejestruj się</a>
                    @endauth
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <h1>flashcards</h1>
        </div>
    </div>
    @yield('content')
</body>
</html>