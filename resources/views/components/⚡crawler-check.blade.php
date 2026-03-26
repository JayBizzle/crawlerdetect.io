<?php

use Livewire\Component;
use Jaybizzle\CrawlerDetect\CrawlerDetect;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\RateLimiter;

new class extends Component
{
    #[Validate('required|string|max:1000')]
    public string $userAgent = '';
    public ?bool $isCrawler = null;
    public string $matchedName = '';
    public bool $analyzed = false;
    public string $rateLimitError = '';

    public function mount(): void
    {
        $ua = request()->query('ua');

        if ($ua) {
            $this->userAgent = substr($ua, 0, 1000);
            $this->analyze();
        }
    }

    public function analyze(): void
    {
        $this->rateLimitError = '';
        $this->validate();

        $key = 'crawler-check:' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 30)) {
            $seconds = RateLimiter::availableIn($key);
            $this->rateLimitError = "Too many requests. Please try again in {$seconds} seconds.";
            return;
        }

        RateLimiter::hit($key, 60);

        $detector = new CrawlerDetect();
        $this->isCrawler = $detector->isCrawler($this->userAgent);
        $this->matchedName = $detector->getMatches() ?? '';
        $this->analyzed = true;
    }

    public function clear(): void
    {
        $this->reset();
    }

    public function loadExample(string $agent): void
    {
        $this->userAgent = $agent;
        $this->analyzed = false;
        $this->isCrawler = null;
        $this->matchedName = '';
    }
};
?>

<div class="w-full">
    <form wire:submit="analyze" class="space-y-5">
        <div>
            <label for="ua-input" class="text-[11px] text-white/25 uppercase tracking-[0.08em] font-medium block mb-2.5">User-agent string</label>
            <textarea
                id="ua-input"
                wire:model="userAgent"
                placeholder="Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)"
                rows="3"
                class="w-full bg-white/[0.04] border border-white/[0.08] rounded-xl px-4 py-3.5 text-white/80 placeholder-white/20 focus:outline-none focus:ring-2 focus:ring-emerald-500/40 focus:border-emerald-500/30 transition-all duration-300 resize-none font-mono text-[13px] leading-[1.65]"
            ></textarea>
        </div>

        <div class="flex flex-wrap items-center gap-1.5">
            <span class="text-[11px] text-white/25 uppercase tracking-[0.08em] font-medium mr-1">Examples</span>
            <button type="button" wire:click="loadExample('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)')" class="px-2.5 py-1 rounded-md bg-white/[0.04] border border-white/[0.06] text-[12px] text-white/40 hover:bg-white/[0.07] hover:text-white/60 transition-all duration-200 cursor-pointer">
                Googlebot
            </button>
            <button type="button" wire:click="loadExample('Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)')" class="px-2.5 py-1 rounded-md bg-white/[0.04] border border-white/[0.06] text-[12px] text-white/40 hover:bg-white/[0.07] hover:text-white/60 transition-all duration-200 cursor-pointer">
                Bingbot
            </button>
            <button type="button" wire:click="loadExample('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36')" class="px-2.5 py-1 rounded-md bg-white/[0.04] border border-white/[0.06] text-[12px] text-white/40 hover:bg-white/[0.07] hover:text-white/60 transition-all duration-200 cursor-pointer">
                Chrome
            </button>
            <button type="button" wire:click="loadExample('Slackbot-LinkExpanding 1.0 (+https://api.slack.com/robots)')" class="px-2.5 py-1 rounded-md bg-white/[0.04] border border-white/[0.06] text-[12px] text-white/40 hover:bg-white/[0.07] hover:text-white/60 transition-all duration-200 cursor-pointer">
                Slackbot
            </button>
            <button type="button" wire:click="loadExample('Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1')" class="px-2.5 py-1 rounded-md bg-white/[0.04] border border-white/[0.06] text-[12px] text-white/40 hover:bg-white/[0.07] hover:text-white/60 transition-all duration-200 cursor-pointer">
                Safari iOS
            </button>
        </div>

        <div class="flex gap-2.5 pt-1">
            <button
                type="submit"
                wire:loading.attr="disabled"
                class="flex-1 bg-emerald-500 hover:bg-emerald-400 text-black text-[14px] font-semibold py-3 px-6 rounded-xl transition-all duration-300 hover:shadow-lg hover:shadow-emerald-500/20 cursor-pointer tracking-[-0.01em] relative overflow-hidden"
            >
                <span wire:loading.class="opacity-0" wire:target="analyze" class="transition-opacity duration-150">Analyze</span>
                <span wire:loading.class="!opacity-100" wire:target="analyze" class="absolute inset-0 flex items-center justify-center gap-2 opacity-0 transition-opacity duration-150">
                    <svg class="animate-spin h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    Analyzing...
                </span>
            </button>
            <button
                type="button"
                wire:click="clear"
                class="px-5 py-3 rounded-xl border border-white/[0.08] text-[14px] text-white/40 hover:text-white/70 hover:border-white/15 transition-all duration-300 cursor-pointer tracking-[-0.01em]"
                style="{{ $analyzed ? '' : 'display: none;' }}"
            >
                Reset
            </button>
        </div>

        @error('userAgent')
            <p class="text-red-400/80 text-[13px] mt-2">{{ $message }}</p>
        @enderror
        @if($rateLimitError)
            <p class="text-amber-400/80 text-[13px] mt-2">{{ $rateLimitError }}</p>
        @endif
    </form>

    @if($analyzed)
        <div
            x-data="{ shown: false }"
            x-init="$nextTick(() => setTimeout(() => shown = true, 50))"
            style="max-height: 0; opacity: 0; overflow: hidden;"
            :style="shown ? 'max-height: 500px; opacity: 1; margin-top: 1.5rem; overflow: visible; transition: max-height 0.5s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.4s ease-out, margin-top 0.4s ease-out;' : 'max-height: 0; opacity: 0; margin-top: 0; overflow: hidden;'"
        >
                <div
                    class="rounded-xl border overflow-hidden"
                    :style="(shown ? 'transform: translateY(0); transition: transform 0.5s cubic-bezier(0.22, 1, 0.36, 1);' : 'transform: translateY(-8px);') + ' border-color: {{ $isCrawler ? "rgba(245, 158, 11, 0.2)" : "rgba(16, 185, 129, 0.2)" }}; background: {{ $isCrawler ? "rgba(245, 158, 11, 0.04)" : "rgba(16, 185, 129, 0.04)" }};'"
                >
                <div class="px-5 py-5">
                    <div class="flex items-start gap-4">
                        @if($isCrawler)
                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-amber-500/15 flex items-center justify-center mt-0.5">
                                <svg class="w-5 h-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-[17px] font-bold text-amber-400 tracking-[-0.02em]">Crawler identified</h3>
                                <p class="text-[14px] text-white/45 mt-0.5 leading-[1.6]">This user-agent matches a known bot signature.</p>
                                @if($matchedName)
                                    <div class="mt-3 inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-amber-500/8 border border-amber-500/15">
                                        <span class="text-amber-400/50 text-[12px] font-medium uppercase tracking-[0.05em]">Match</span>
                                        <span class="text-amber-300 font-mono text-[13px] font-medium">{{ $matchedName }}</span>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-emerald-500/15 flex items-center justify-center mt-0.5">
                                <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-[17px] font-bold text-emerald-400 tracking-[-0.02em]">Looks human</h3>
                                <p class="text-[14px] text-white/45 mt-0.5 leading-[1.6]">No known crawler patterns found in this user-agent.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Community contribution CTA --}}
            @php
                $issueType = $isCrawler ? 'False positive' : 'False negative';
                $issueUrl = 'https://github.com/JayBizzle/Crawler-Detect/issues/new?' . http_build_query([
                    'title' => $issueType . ': ' . Str::limit($userAgent, 80),
                    'body' => "**Type:** {$issueType}\n\n**User-Agent:**\n```\n{$userAgent}\n```\n\n**CrawlerDetect result:** " . ($isCrawler ? "Detected as crawler" . ($matchedName ? " (matched: `{$matchedName}`)" : "") : "Not detected as crawler") . "\n\n**Why I believe this is incorrect:**\n\n<!-- Please explain why you think this result is wrong -->\n",
                    'labels' => $isCrawler ? 'false positive' : 'false negative',
                ]);
            @endphp
            <div class="mt-3.5 rounded-xl border border-white/[0.06] bg-white/[0.02] px-4 py-3.5">
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-violet-500/10 flex items-center justify-center mt-0.5">
                        <svg class="w-4 h-4 text-violet-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-[13px] font-semibold text-white/70 tracking-[-0.01em]">Disagree with this result?</h4>
                        <p class="text-[12px] text-white/35 mt-0.5 leading-[1.55]">CrawlerDetect is powered by community contributions. Every report helps improve detection for millions of&nbsp;users.</p>
                        <a
                            href="{{ $issueUrl }}"
                            target="_blank"
                            rel="noopener"
                            class="inline-flex items-center gap-1.5 mt-2.5 text-[12px] font-medium text-violet-400 hover:text-violet-300 transition-colors duration-200 group"
                        >
                            <span>Open an issue on GitHub</span>
                            <svg class="w-3 h-3 transition-transform duration-200 group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Share link --}}
            <div class="mt-3 flex justify-center" x-data="{ copied: false }">
                <button
                    @click="
                        const url = new URL(window.location.origin);
                        url.searchParams.set('ua', @js($userAgent));
                        navigator.clipboard.writeText(url.toString());
                        copied = true;
                        setTimeout(() => copied = false, 2500);
                    "
                    class="flex items-center gap-1.5 text-[12px] text-white/25 hover:text-white/45 transition-colors duration-200 cursor-pointer"
                >
                    <svg :class="copied ? 'hidden' : ''" class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0-12.814a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0 12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                    </svg>
                    <svg :class="copied ? '' : 'hidden'" class="w-4 h-4 flex-shrink-0 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                    <span x-text="copied ? 'Link copied!' : 'Copy shareable link'"></span>
                </button>
            </div>
        </div>
    @endif
</div>
