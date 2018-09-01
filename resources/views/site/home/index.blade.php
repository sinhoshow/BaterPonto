<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BaterPonto</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 12px;
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
                        <a href="{{ url('/painel') }}">Painel Administrativo</a>
                    @else
                        <a href="{{ route('login') }}">Login Administrativo</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Bater PONTO
                </div>

                <div class="box">
                    <div class="box-header">                        
                    </div>
                    <div class="box-body">
                        @include('site.includes.alerts')
                        <form method="POST" action="{{ route('register.point') }}">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <input type="text" name="id" placeholder="ID" class="form-control">
                                <select name="periodo" class="form-control">
                                    <option value="">Selecione o ponto</option>
                                    <option value="In">Entrada</option>
                                    <option value="Lunch">Almoço</option>
                                    <option value="LunchBack">Volta Almoço</option>
                                    <option value="DailyOut">Intervalo</option>
                                    <option value="Out">Saída</option>
                                </select>                            
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Bater ponto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
