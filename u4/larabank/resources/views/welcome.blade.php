<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500&family=Work+Sans&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            .login-buttons {
                text-align: center;

            }
            h1{
                color: #03e9f4;
                text-transform: uppercase;
                letter-spacing: 10px;
                font-family: 'Montserrat', sans-serif;
                font-size: 60px;
                margin-top: 10%
            }
            .login-btn{
                border: none;
                background: none;
                text-align: center;
                position: relative;
                display: inline-block;
                padding: 10px 20px;
                color: #03e9f4;
                font-size: 16px;
                text-decoration: none;
                text-transform: uppercase;
                overflow: hidden;
                transition: .5s;
                margin-top: 40px;
                letter-spacing: 4px;
                margin-bottom: 5px;
            }
            .login-btn:hover {
                background: #03e8f47b;
                color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 5px #03e9f4,
                            0 0 15px #03e9f4,
                            0 0 30px #03e9f4,
                            0 0 50px #03e9f4;
            }
        </style>
    </head>
    <body style=" background: linear-gradient(#57606f, #2f3542);  background-repeat: no-repeat; height: 100vh">
        <div>
            @if (Route::has('login'))
                <div  class="login-buttons">
                    <h1>Welcome!</h1>
                    @auth
                    <a href="{{ route('home') }}" class="login-btn">Go back</a>
                        {{-- <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a> --}}
                    @else
                        <a href="{{ route('login') }}" class="login-btn">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="login-btn">Register</a>
                        @endif
                    @endauth
                  
                </div>
            @endif



        </div>
    </body>
</html>
