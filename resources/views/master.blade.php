<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lara Blog</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="py-3">
    @yield('content')
</body>

</html>
