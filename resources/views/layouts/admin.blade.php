<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - laravel 1</title>
</head>
<body>
    <header>
        <h1>Headr</h1>
    </header>
    <section>
        @yield('content')
    </section>
    <hr>
    <footer>
        Rodapé
    </footer>
</body>
</html>