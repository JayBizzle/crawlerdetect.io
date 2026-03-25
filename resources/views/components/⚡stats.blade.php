<?php

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

new class extends Component
{
    public array $stats = [];
    public bool $loaded = false;

    public function loadStats(): void
    {
        $this->stats = Cache::remember('packagist_stats', 3600, function () {
            try {
                $response = Http::timeout(5)->get('https://packagist.org/packages/jaybizzle/crawler-detect.json');

                if ($response->successful()) {
                    $data = $response->json();
                    $package = $data['package'] ?? [];
                    $downloads = $package['downloads'] ?? [];

                    return [
                        'total' => $downloads['total'] ?? 0,
                        'monthly' => $downloads['monthly'] ?? 0,
                        'daily' => $downloads['daily'] ?? 0,
                        'stars' => $package['github_stars'] ?? 0,
                        'forks' => $package['github_forks'] ?? 0,
                    ];
                }
            } catch (\Exception $e) {
            }

            return [
                'total' => 96000000,
                'monthly' => 2200000,
                'daily' => 94000,
                'stars' => 2332,
                'forks' => 276,
            ];
        });

        $this->loaded = true;
    }
};
?>

<div wire:init="loadStats">
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        @if($loaded)
            @php
                $items = [
                    ['value' => number_format($stats['total'] / 1000000, 0) . 'M<span class="text-emerald-400">+</span>', 'label' => 'Total installs'],
                    ['value' => number_format($stats['monthly'] / 1000000, 1) . 'M', 'label' => 'Monthly installs'],
                    ['value' => number_format($stats['stars']), 'label' => 'GitHub stars'],
                    ['value' => number_format($stats['forks']), 'label' => 'Forks'],
                ];
            @endphp
            @foreach($items as $item)
                <div class="bg-white/[0.03] border border-white/[0.06] rounded-2xl p-6 sm:p-7 text-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-white/[0.02] to-transparent pointer-events-none"></div>
                    <div class="relative">
                        <div class="text-3xl sm:text-4xl font-extrabold tracking-[-0.03em] text-white">{!! $item['value'] !!}</div>
                        <div class="text-[13px] text-white/35 mt-1.5 tracking-wide">{{ $item['label'] }}</div>
                    </div>
                </div>
            @endforeach
        @else
            @for($i = 0; $i < 4; $i++)
                <div class="bg-white/[0.03] border border-white/[0.06] rounded-2xl p-6 sm:p-7 text-center animate-pulse">
                    <div class="h-9 bg-white/[0.04] rounded-lg w-20 mx-auto"></div>
                    <div class="h-4 bg-white/[0.03] rounded w-24 mx-auto mt-2.5"></div>
                </div>
            @endfor
        @endif
    </div>
</div>
