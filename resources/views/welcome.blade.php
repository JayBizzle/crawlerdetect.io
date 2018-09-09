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

        <script src="https://unpkg.com/vue/dist/vue.js"></script>

        <script type="text/javascript">
            $(function() {
                var app = new Vue({
                    el: '#app',
                    data: {
                        query: '{!! \Request::get('q') !!}',
                        isCrawler: {{ $result ? 'true' : 'false' }},
                        processing: {{ $result ? 'false' : 'true' }},
                    },
                    methods: {
                        fetchData: function() {
                            var self = this;
                            self.processing = true;
                            $.ajax({
                                url: '/',
                                headers: { 
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                },
                                type: 'post',
                                dataType: 'json',
                                data: { q: self.query },
                                success: function(data) {
                                    self.isCrawler = data.result;
                                    self.processing = false;
                                    history.pushState(null, null, '?q=' + self.query);
                                }
                            });
                        }
                    },
                    mounted: function() {
                        this.$nextTick(function () {
                            this.fetchData()
                        })
                    }
                });
            });
            
            $(function() {
                var delay = (function(){
                    var timer = 0;
                    return function(callback, ms) {
                        clearTimeout (timer);
                        timer = setTimeout(callback, ms);
                    };
                })();
            });

        </script>

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-92361874-1', 'auto');
            ga('send', 'pageview');
        </script>

        <!-- Styles -->
        <style>
            html, body {
                color: #48505a;
                font-family: 'Roboto', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-color: #f6f8fa;
                background-image: url("data:image/svg+xml,%3Csvg width='84' height='48' viewBox='0 0 84 48' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0h12v6H0V0zm28 8h12v6H28V8zm14-8h12v6H42V0zm14 0h12v6H56V0zm0 8h12v6H56V8zM42 8h12v6H42V8zm0 16h12v6H42v-6zm14-8h12v6H56v-6zm14 0h12v6H70v-6zm0-16h12v6H70V0zM28 32h12v6H28v-6zM14 16h12v6H14v-6zM0 24h12v6H0v-6zm0 8h12v6H0v-6zm14 0h12v6H14v-6zm14 8h12v6H28v-6zm-14 0h12v6H14v-6zm28 0h12v6H42v-6zm14-8h12v6H56v-6zm0-8h12v6H56v-6zm14 8h12v6H70v-6zm0 8h12v6H70v-6zM14 24h12v6H14v-6zm14-8h12v6H28v-6zM14 8h12v6H14V8zM0 8h12v6H0V8z' fill='%2348505a' fill-opacity='0.02' fill-rule='evenodd'/%3E%3C/svg%3E");
            }

            

            [v-cloak] .v-cloak--block {
                display: block!important;
            }

            [v-cloak] .v-cloak--inline {
                display: inline!important;
            }

            [v-cloak] .v-cloak--inlineBlock {
                display: inline-block!important;
            }

            [v-cloak] .v-cloak--hidden {
                display: none!important;
            }

            [v-cloak] .v-cloak--invisible {
                visibility: hidden!important;
            }

            .v-cloak--block,
            .v-cloak--inline,
            .v-cloak--inlineBlock {
                display: none!important;
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
                margin: 80px 0 20px 0;
            }

            input:focus {
                outline: none;
            }

            .full-height {
                height: 80vh;
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
            }

                .result-wrap .status {
                    height: 61px;
                }

                .result-wrap  .contact-wrap {
                    height: 10px;
                    margin-top: 10px;
                }

                .result-wrap .contact {
                    display: block;
                    font-size: 11px;
                    
                    font-weight: 400;
                }

                    .result-wrap  a {
                        color: inherit;
                    }

            .result {
                font-weight: 400;
                border-radius: 5px;
                padding: 20px;
                display: inline-block;
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
        <div id="app" class="flex-center position-ref full-height">
            <div class="top-right links">
                <a href="https://github.com/JayBizzle/Crawler-Detect" target="_blank">GitHub</a>
            </div>

            <div class="content">
                <div class="title m-b-md">
                    <img src="https://cloud.githubusercontent.com/assets/340752/20685655/251a6466-b5ad-11e6-9509-24d12f24a042.png" style="width: 128px; height: 128px; vertical-align: middle; margin-bottom: 20px;" /><br />CrawlerDetect
                </div>

                <div class="links">
                    <input type="text" placeholder="Enter user agent" v-model="query" v-on:keyup="fetchData" />

                    <small>Checking against CrawlerDetect <a href="https://github.com/JayBizzle/Crawler-Detect/releases" style="text-decoration: none; font-weight: 400; color: #48505a" target="_blank">{{$installedVersion}}</a></small>

                    <div class="result-wrap" v-cloak>
                        <div class="status">
                            <div class="result is-bot v-cloak--hidden" v-show="isCrawler && query && ! processing">
                                User agent is a bot
                            </div>

                            <div class="result not-bot v-cloak--hidden" v-show="! isCrawler && query && ! processing">
                                User agent is NOT a bot
                            </div>
                        </div>

                        <div class="contact-wrap" v-cloak>
                            <div class="contact v-cloak--hidden" v-show="query && ! processing">Think this is incorrect? <a :href="'https://github.com/JayBizzle/Crawler-Detect/issues/new?title=Incorrect agent result&amp;body=' + encodeURIComponent(query)" target="_blank">Let us know</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
