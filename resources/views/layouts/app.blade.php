<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vintech') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Plaster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Plaster&display=swap" rel="stylesheet"> 


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <div class="row firstStep">
            <div class="col-md-2 text-left">
                <a class="navbar-brand vintechLogo" href="{{ url('/') }}">
                    VINTECH
                </a>
            </div>
            <div class="col-md-4">
                @include('search.search')
            </div>
            <div class="col-md-2 text-right">
                @php
                $qteTotal = 0;

                if(session("cart")) {
                    foreach (session("cart") as $key => $item) {

                    $qteTotal += $item['quantity'];

                    }
                }

                @endphp
                <a class="text-right" href="{{ route('cart.show') }}"><i class="fas fa-shopping-basket"></i><span id="totalCart">@php echo $qteTotal @endphp</span></a>


            </div>

            <div class="col-md-2 text-center">
                @auth
                <a class="align-bottom" href="{{ route('favorites.index') }}"><i class="far fa-heart"></i></a>
                @endauth
            </div>

            <div class="col-md-2 nameUser">
                @guest
                @if (Route::has('login'))
                <a class="nav-link" href="{{ route('login') }}"><i class="far fa-user"></i></a>
                @endif

                @else
                <div class="nav-item dropdown nameUser ">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle nameUser" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('profile.show', $user = Auth::user()) }}">
                            Profil
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                @endguest

            </div>
        </div>


        <nav class="navbar navbar-expand-md ">

            <div class="container-fluide">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon align-middle">
                        <div class="whiteLign"></div>
                        <div class="whiteLign"></div>
                        <div class="whiteLign"></div>
                    </span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto align-middle justify-content-between">
                        <li class="nav-item dropdown align-bottom">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Catégories
                            </a>
                            <ul class="dropdown-menu align-bottom" aria-labelledby="navbarDropdown">
                                @foreach($ranges_navBar as $range)
                                <li>
                                    <a class="ranges align-bottom" href="{{ route('show.range', $range->id) }}">{{ $range->range }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>

                        @foreach($promotions_navBar as $promotion)
                        <li class="align-center">
                            <a class="promotions align-middle" href="{{ route('show.promotion', $promotion->id) }}">{{ $promotion->name }}</a>
                        </li>
                        @endforeach

                        <li class="align-center">
                            <a class="allProducts align-middle" href="{{ route('product.index') }}">Tous les produits</a>
                        </li>

                        <li>
                            <a href="{{ route('history') }}">Qui sommes nous?</a>
                        </li>

                        @admin
                        <li class="align-center">
                            <a class="promotions align-middle" href="{{route('admin.index')}}">administration</a>
                        </li>
                        @endadmin

                        <!--affichage nombre d'article dans le panier -->

                        @php
                        $qteTotal = 0;

                        if(session("cart")) {
                        foreach (session("cart") as $key => $item) {

                        $qteTotal += $item['quantity'];

                        }
                        }

                        @endphp
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            <div class="container-fluid text-center">
                @if(session()->has('message'))
                <p class="alert alert-success">{{ session()->get('message') }}</p>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            @yield('content')


        </main>
    </div>
    @yield('footer')
</body>

</html>