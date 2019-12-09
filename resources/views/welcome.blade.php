<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CrawlerDetect - the web crawler detection library</title>

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ mix('/js/app.js') }}"></script>

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-92361874-1', 'auto');
            ga('send', 'pageview');
        </script>


    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <a href="https://github.com/JayBizzle/Crawler-Detect" target="_blank">GitHub</a>
            </div>
            <div class="content">
                <div class="title">
                    <img src="https://cloud.githubusercontent.com/assets/340752/20685655/251a6466-b5ad-11e6-9509-24d12f24a042.png" style="width: 128px; height: 128px; vertical-align: middle; margin-bottom: 20px;" /><br />CrawlerDetect
                    <br />
                    <a href="https://packagist.org/packages/jaybizzle/crawler-detect"><img src="https://img.shields.io/packagist/dm/JayBizzle/Crawler-Detect.svg?style=flat-square" /></a>
                </div>
        
                @livewire('bot-check')

                <small>Checking against CrawlerDetect <a href="https://github.com/JayBizzle/Crawler-Detect/releases" style="text-decoration: none; font-weight: 400; color: #48505a" target="_blank">{{$installedVersion}}</a></small>

                <div class="result-wrap">

                    @livewire('result')

                </div>
            </div>
        </div>

        @livewireAssets

    </body>
</html>