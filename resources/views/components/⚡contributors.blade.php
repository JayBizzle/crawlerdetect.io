<?php

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

new class extends Component
{
    public array $contributors = [];
    public bool $loaded = false;

    public function loadContributors(): void
    {
        $this->contributors = Cache::remember('github_contributors', 3600, function () {
            try {
                $response = Http::timeout(5)
                    ->withHeaders(['Accept' => 'application/vnd.github.v3+json'])
                    ->get('https://api.github.com/repos/JayBizzle/Crawler-Detect/contributors', [
                        'per_page' => 100,
                    ]);

                if ($response->successful()) {
                    return collect($response->json())->map(fn ($c) => [
                        'login' => $c['login'],
                        'avatar' => $c['avatar_url'],
                        'url' => $c['html_url'],
                        'contributions' => $c['contributions'],
                    ])->all();
                }
            } catch (\Exception $e) {
            }

            return [];
        });

        $this->loaded = true;
    }
};
?>

<div wire:init="loadContributors">
    @if($loaded && count($contributors))
        {{-- Connector --}}
        <div class="max-w-5xl mx-auto flex justify-center">
            <div class="line-v h-10 is-visible"></div>
        </div>
        <div class="max-w-5xl mx-auto px-6 flex items-center gap-0">
            <div class="line-h flex-1 is-visible"></div>
            <div class="line-node mx-0 is-visible"></div>
            <div class="line-h flex-1 line-h-right is-visible"></div>
        </div>

        <section class="max-w-5xl mx-auto px-6 pt-8 pb-10">
            <div class="text-center mb-10">
                <h2 class="text-2xl sm:text-[1.75rem] font-bold tracking-[-0.025em]">Built by the community</h2>
                <p class="text-[15px] text-white/40 mt-3 leading-[1.7] max-w-md mx-auto">CrawlerDetect wouldn't exist without its contributors. Thank you to every one of the {{ count($contributors) }} people who have helped shape this project.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-1">
                @foreach($contributors as $contributor)
                    <a
                        href="{{ $contributor['url'] }}"
                        target="_blank"
                        rel="noopener"
                        title="{{ $contributor['login'] }} &mdash; {{ $contributor['contributions'] }} contribution{{ $contributor['contributions'] !== 1 ? 's' : '' }}"
                        class="relative group"
                    >
                        <img
                            src="{{ $contributor['avatar'] }}&s=64"
                            alt="{{ $contributor['login'] }}"
                            width="36"
                            height="36"
                            loading="lazy"
                            class="rounded-lg grayscale opacity-60 transition-all duration-300 group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-110"
                        />
                    </a>
                @endforeach
            </div>
            <div class="text-center mt-6">
                <a href="https://github.com/JayBizzle/Crawler-Detect" target="_blank" rel="noopener" class="text-[13px] text-emerald-400/60 hover:text-emerald-400 transition-colors duration-200">
                    Become a contributor &rarr;
                </a>
            </div>
        </section>
    @elseif(!$loaded)
        {{-- Skeleton --}}
        <div class="max-w-5xl mx-auto px-6 pt-16 pb-10 animate-pulse">
            <div class="text-center mb-10">
                <div class="h-7 bg-white/[0.04] rounded-lg w-56 mx-auto"></div>
                <div class="h-4 bg-white/[0.03] rounded w-80 mx-auto mt-4"></div>
            </div>
            <div class="flex flex-wrap justify-center gap-1">
                @for($i = 0; $i < 30; $i++)
                    <div class="w-9 h-9 bg-white/[0.04] rounded-lg"></div>
                @endfor
            </div>
        </div>
    @endif
</div>
