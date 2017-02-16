<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <title>CrawlerDetect - the web crawler detection library</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,500,700" rel="stylesheet">

<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>

        <script type="text/javascript">
            
            $(function() {
                $.ajaxSetup({
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                });

                $('input').on('keyup', function() {
                    $.ajax({
                        method: "POST",
                        url: "/q",
                        data: { q: $(this).val() }
                    })
                    .done(function( msg ) {
                        if(msg.result) {
                            $('.is-bot').css('display', 'inline-block');
                            $('.not-bot').hide();
                        } else {
                            $('.is-bot').hide();
                            $('.not-bot').css('display', 'inline-block');
                        }
                    });
                });
            });

        </script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #48505a;
                font-family: 'Roboto', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            input {
                border-radius: 5px;
                padding: 10px 20px;
                border: solid 1px #48505a;
                display: block;
                box-shadow: 0 55px 70px -40px rgba(50,50,93,.55), 0 20px 30px -10px rgba(0,0,0,.14);
                font-size: 28px;
                color: #48505a;
                width: 100%;
                text-align: center;
                font-weight: 100;
                box-sizing: border-box;
            }

            input:focus {
                outline: none;
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
                width: 60vw;
            }

            .title {
                font-size: 52px;
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

            .result-wrap {
                margin-top: 40px;
                height: 59px;
            }

            .result {
                display: none;
                font-weight: 300;
                border-radius: 5px;
                padding: 20px;
            }

            .is-bot {
                color: #4F8A10;
                background-color: #DFF2BF;
            }

            .not-bot {
                color: #D8000C;
                background-color: #FFBABA;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <a href="{{ url('/register') }}">GitHub</a>
            </div>

            <div class="content">
                <div class="title m-b-md">
                    <img src="https://cloud.githubusercontent.com/assets/340752/20685655/251a6466-b5ad-11e6-9509-24d12f24a042.png" style="width: 128px; height: 128px; vertical-align: middle" /> CrawlerDetect
                </div>

                <div class="links">
                    <input type="text" />

                    <div class="result-wrap">
                        <div class="result is-bot">
                            User agent is a bot
                        </div>

                        <div class="result not-bot">
                            User agent is NOT a bot
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
