<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hexashop Ecommerce HTML CSS Template</title>
    <!-- Additional CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>
<body>

<!-- ***** Main Banner Area Start ***** -->
<div class="container mw-100 p-0">
    <div class="header">
        <div class="sidebar">
            <div class="logo-container">
                <div class="logo-block">
                    <img src="{{ asset("storage/images/logo.png") }}" alt="logo" title="">
                </div>
                <p class="site-title">Enterprise Resource Planning</p>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="top-of-page">
            <div class="sections">
                <a href="#" class="section active">ПРОДУКТЫ</a>
            </div>
            <div class="login-container">
                @auth()
                    <span class="username">{{ auth()->user()->email }}</span>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="logout-btn" type="submit">Log out</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}">Log In</a>
                    <a href="{{ route('register') }}">Register</a>
                @endguest
            </div>
        </div>
        <div class="products-container">

            @yield('content')
        </div>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ url('js/app.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</script>
</body>
</html>
