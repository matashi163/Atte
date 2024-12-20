<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
</head>
<body>
    <div class="base">
        <header class="header">
            <h1 class="header__logo">Atte</h1>
            <div class="header__content">
                @yield('header')
            </div>
        </header>
        <main class="main">
            @yield('content')
        </main>
        <footer class="footer">
            <small class="copyright">Atte,inc.</small>
        </footer>
    </div>
</body>
</html>