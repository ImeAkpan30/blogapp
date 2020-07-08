<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ime Akpan Blog @yield('title')</title>

    <!-- Scripts  -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/styles.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL::to('uploads/MOSCO.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md regitrationcardheader  shadow-sm">
            <div class="container">
                <a class="navbar-brand logo cat" href="{{ url('/home') }}">
                        BLOG
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link cat" href="{{ url('/home') }}" style="color:whitesmoke; text-decoration:none;"> <i class="fa fa-home fa-lg" aria-hidden="true"></i> HOME</a></li>
                        <li class="nav-item"><a class="nav-link cat" href="{{ url('/contact') }}" style="color:whitesmoke; text-decoration:none;">CONTACT</a></li>
                        {{-- @if(Auth::id() == 1)
                            <li class="nav-item"><a class="nav-link cat" href="{{ url('/post') }}" style="color:whitesmoke; text-decoration:none;">ADD POST</a></li>
                        @endif --}}

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link cat" href="{{ route('login') }}" style="color:whitesmoke;">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link cat" href="{{ route('register') }}" style="color:whitesmoke;">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color:whitesmoke" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::id() == 1)
                                    <a class="dropdown-item cat" href="{{ url('/profile') }}">Profile</a>
                                    <a class="dropdown-item cat" href="{{ url('/category') }}">Category</a>
                                    <a class="dropdown-item cat" href="{{ url('/post') }}">Post</a>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item cat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('sweetalert::alert')


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ URL::to('js/auth.js') }}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    
<script>

    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>


</body>
</html>
