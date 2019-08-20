<div class="status">
    @if($isBot === true)
        <div class="result is-bot">
            User agent is a bot
        </div>
    @elseif($isBot === false)
        <div class="result not-bot">
            User agent is NOT a bot
        </div>
    @endif

    @if(!is_null($isBot))
        <div class="contact-wrap">
            <div class="contact">Think this is incorrect? <a href="https://github.com/JayBizzle/Crawler-Detect/issues/new?title=Incorrect agent result&amp;body={{ urlencode($query) }}" target="_blank">Let us know</a></div>
        </div>
    @endif
</div>