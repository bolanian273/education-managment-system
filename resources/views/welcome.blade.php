<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EMIS</title>
        <link rel="icon" type="image/png" href="/img/title.png" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        {{-- <a href="{{ route('login') }}"></a> --}}
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md" style="font-weight:bold; font-size:4vw; font-style: italic">
                    Educational Management Information System
                </div>

                <div id="banner" style="display: block;">
                        <div class="images" style="display: inline-block; max-width: 50%; margin: 0 5%;">
                            <a href="{{route('admin.login')}}"><img src="/img/fadmin.png" alt="Admin Login"></a>
                        </div>

                        <div class="images" style="display: inline-block; max-width: 50%; margin: 0 8%;">
                            <a href="{{route('admin.login')}}"><img src="/img/fteacher.png" alt="Teacher Login"></a>
                        </div>

                        <div class="images" style="display: inline-block; max-width: 50%; margin: 0 6%;">
                            <a href="{{route('admin.login')}}"><img src="/img/fstudent.png" alt="Student Login"></a>
                        </div>
                        <div class="images" style="display: inline-block; max-width: 50%; margin: 0 4%;">
                            <a href="{{route('admin.login')}}"><img src="/img/fparents.png" alt="Parents Corner"></a>
                        </div>
                    </div>
            </div>
        </div>
    </body>
</html>
