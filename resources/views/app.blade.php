<html>
<head>
    <title>City Selector</title>
</head>
<body>
<header>
    <h1>Текущий город: {{ session('city', 'Не выбран') }}</h1>
    <nav>
        <a href="{{ route('about') }}">О нас</a>
        <a href="{{ route('news') }}">Новости</a>
    </nav>
</header>

@yield('content')
</body>
</html>

