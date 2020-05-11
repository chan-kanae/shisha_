<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SHISHA Log') }}</title>

    <link rel="shortcut icon" href="{{ asset('/favicon_takaya_yoshida.ico') }}">
    <link rel="apple-touch-icon" href="favicon_180.png" sizes="180x180">
    <link rel="icon" type="image/png" href="favicon_192.png" sizes="192x192">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/ajax.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top nav-margin">
            <div class="container">
                <div class="navbar-header header-custom">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @auth
                    <a class="navbar-brand" href="{{ url('/hometl') }}">
                        {{ config('app.name', 'SHISHA Log') }}
                    </a>
                    @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'SHISHA Log') }}
                    </a>
                    @endauth

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">ログイン</a></li>
                            <li><a href="{{ route('register') }}">新規登録</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            ログアウト
                                        </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                        <form action="{{ url('/account') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="submit" class="account-edit" value="アカウント情報変更">
                                            </input>
                                        </form>

                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if(Session::has('flashmessage'))
        <!-- モーダルウィンドウの中身 -->
        <div class="modal fade" id="myModal" tabindex="-1"
            ole="dialog" aria-labelledby="label1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        {{ session('flashmessage') }}
                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="main">
        <div class="tabarea">
            <a href="hometl">
                <img src="css/img/homegol.png" class="tab1">
            </a>
            <a href="searchindex">
                <img src="css/img/searchol.png" class="searchi">
            </a>
            <a href="index">
                <img src="css/img/pencilgol.png" class="tab2">
            </a>
            <a href="mypage" class="mp">
                <img src="css/img/humangol.png" class="mpi">
            </a>
            <a href="bookmark" class="bm">
                <img src="css/img/bmgol.png" class="bmi">
            </a>
        </div> 
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        // ブックマークモーダル
        $(window).on('load',function(){
            $('#myModal').modal('show');
        });
    </script>
    @yield('script')
</body>
</html>
