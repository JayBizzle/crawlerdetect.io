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

        $contributors = Cache::remember('github_contributors', 3600, function () {
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
                // Fallback
            }

            return [];
        });

        $releases = Cache::remember('github_releases', 3600, function () {
            try {
                $response = Http::timeout(5)
                    ->withHeaders(['Accept' => 'application/vnd.github.v3+json'])
                    ->get('https://api.github.com/repos/JayBizzle/Crawler-Detect/releases', [
                        'per_page' => 3,
                    ]);

                if ($response->successful()) {
                    return collect($response->json())->map(function ($r) {
                        // Extract just the "What's Changed" bullet points from the body
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
                // Fallback
            }

            return [];
        });

        return view('home', [
            'stats' => $stats,
            'contributors' => $contributors,
            'releases' => $releases,
        ]);
    }
}
