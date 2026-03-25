<?php

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

new class extends Component
{
    public array $releases = [];
    public bool $loaded = false;

    public function loadReleases(): void
    {
        $this->releases = Cache::remember('github_releases', 3600, function () {
            try {
                $response = Http::timeout(5)
                    ->withHeaders(['Accept' => 'application/vnd.github.v3+json'])
                    ->get('https://api.github.com/repos/JayBizzle/Crawler-Detect/releases', [
                        'per_page' => 3,
                    ]);

                if ($response->successful()) {
                    return collect($response->json())->map(function ($r) {
                        $body = $r['body'] ?? '';
                        $changes = [];

                        if (preg_match_all('/^\* (.+?) by @/m', $body, $matches)) {
                            $changes = array_slice($matches[1], 0, 5);
                        }

                        return [
                            'tag' => $r['tag_name'],
                            'url' => $r['html_url'],
                            'date' => $r['published_at'],
                            'changes' => $changes,
                        ];
                    })->all();
                }
            } catch (\Exception $e) {
            }

            return [];
        });

        $this->loaded = true;
    }
};
?>

<div wire:init="loadReleases">
    @if($loaded && count($releases))
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
                <h2 class="text-2xl sm:text-[1.75rem] font-bold tracking-[-0.025em]">Recent releases</h2>
                <p class="text-[15px] text-white/40 mt-3 leading-[1.7]">Actively maintained with 169+ releases and counting.</p>
            </div>

            <div class="max-w-2xl mx-auto space-y-4">
                @foreach($releases as $release)
                    <div class="bg-white/[0.03] border border-white/[0.06] rounded-xl overflow-hidden">
                        <div class="px-5 py-4 flex items-center justify-between border-b border-white/[0.04]">
                            <div class="flex items-center gap-3">
                                <span class="text-[14px] font-semibold text-white tracking-[-0.01em]">{{ $release['tag'] }}</span>
                                <span class="text-[12px] text-white/25">{{ \Carbon\Carbon::parse($release['date'])->format('M j, Y') }}</span>
                            </div>
                            <a href="{{ $release['url'] }}" target="_blank" rel="noopener" class="text-[12px] text-emerald-400/60 hover:text-emerald-400 transition-colors duration-200">
                                View release &rarr;
                            </a>
                        </div>
                        @if(count($release['changes']))
                            <ul class="px-5 py-3.5 space-y-1.5">
                                @foreach($release['changes'] as $change)
                                    <li class="flex items-start gap-2.5 text-[13px] text-white/40 leading-[1.6]">
                                        <span class="text-emerald-400/40 mt-[7px] flex-shrink-0">
                                            <svg class="w-2 h-2" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3"/></svg>
                                        </span>
                                        {{ $change }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-6">
                <a href="https://github.com/JayBizzle/Crawler-Detect/releases" target="_blank" rel="noopener" class="text-[13px] text-emerald-400/60 hover:text-emerald-400 transition-colors duration-200">
                    View all releases &rarr;
                </a>
            </div>
        </section>
    @elseif(!$loaded)
        {{-- Skeleton --}}
        <div class="max-w-5xl mx-auto px-6 pt-16 pb-10 animate-pulse">
            <div class="text-center mb-10">
                <div class="h-7 bg-white/[0.04] rounded-lg w-44 mx-auto"></div>
                <div class="h-4 bg-white/[0.03] rounded w-72 mx-auto mt-4"></div>
            </div>
            <div class="max-w-2xl mx-auto space-y-4">
                @for($i = 0; $i < 3; $i++)
                    <div class="bg-white/[0.03] border border-white/[0.06] rounded-xl p-5">
                        <div class="h-5 bg-white/[0.04] rounded w-24"></div>
                        <div class="h-3 bg-white/[0.03] rounded w-48 mt-3"></div>
                        <div class="h-3 bg-white/[0.03] rounded w-40 mt-2"></div>
                    </div>
                @endfor
            </div>
        </div>
    @endif
</div>
