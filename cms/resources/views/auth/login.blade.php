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
<body id="login-body">
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login</div>
                        <div class="panel-body">
                            <!-- <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </form> -->
                            <h3 class="shishalog-title">SHISHA Log</h3>

                            <img src="css/img/takaya_yoshida_bg_white.jpg" alt="" class="takayayoshida">

                            <!-- Googleログイン -->
                            <div class="form-group row mt-2">
                                <div class="col-md-8 offset-md-4 login-brand">
                                    <h4>ログインアカウントの選択</h4>
                                    <a href="/login/google" class="" role="button">
                                        <img src="css/img/btn_google_signin_dark_normal_web.png" alt="">
                                    </a>
                                </div>
                            </div>

                            <!-- <div id="firebaseui-auth-container"></div>
                            <form id="loginform" action="/login" method="post" style="display:none">
                                {{ csrf_field() }}
                                <input id="token" name="token">
                                <input id="name" name="name">
                                <input id="twitter_p" name="twitter_profile_image_url_https">
                            </form> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

