<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function __invoke()
    {
        $stats = Cache::remember('packagist_stats', 3600, function () {
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
                // Fallback stats
            }

            return [
                'total' => 96000000,
                'monthly' => 2200000,
                'daily' => 94000,
                'stars' => 2332,
                'forks' => 276,
            ];
        });

        return view('home', ['stats' => $stats]);
    }
}
