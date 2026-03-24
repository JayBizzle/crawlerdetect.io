<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CrawlerDetect &mdash; The PHP Standard for Bot Detection</title>
    <meta name="description" content="Identify bots, crawlers, and spiders from their user-agent string. Three methods. Zero dependencies. Trusted across 96 million installs.">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=jetbrains-mono:400,500&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 text-white antialiased min-h-screen">

    {{-- Background gradient effects --}}
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-[500px] h-[500px] bg-emerald-500/8 rounded-full blur-[100px]"></div>
        <div class="absolute top-1/3 -left-40 w-[400px] h-[400px] bg-emerald-600/5 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-0 right-1/4 w-[400px] h-[400px] bg-teal-500/5 rounded-full blur-[100px]"></div>
    </div>

    <div class="relative">

        {{-- Navigation --}}
        <nav class="sticky top-0 z-50 border-b border-white/[0.06] bg-zinc-950/70 backdrop-blur-xl">
            <div class="max-w-5xl mx-auto px-6 py-4 flex items-center justify-between">
                <a href="/" class="flex items-center gap-2.5 group">
                    <div class="w-7 h-7 bg-emerald-500 rounded-md flex items-center justify-center transition-shadow duration-300 group-hover:shadow-[0_0_12px_rgba(16,185,129,0.4)]">
                        <svg class="w-4 h-4 text-black" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </div>
                    <span class="font-bold text-[15px] tracking-[-0.01em]">CrawlerDetect</span>
                </a>
                <div class="flex items-center gap-7">
                    <a href="#features" class="text-[13px] text-white/40 hover:text-white/80 transition-colors duration-200">Features</a>
                    <a href="#try-it" class="text-[13px] text-emerald-400/70 hover:text-emerald-400 transition-colors duration-200">Try It</a>
                    <a href="#install" class="text-[13px] text-white/40 hover:text-white/80 transition-colors duration-200">Install</a>
                    <a href="https://github.com/JayBizzle/Crawler-Detect" target="_blank" rel="noopener" class="text-[13px] text-white/40 hover:text-white/80 transition-colors duration-200 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        GitHub
                    </a>
                </div>
            </div>
        </nav>

        {{-- Hero Section --}}
        <section class="max-w-6xl mx-auto px-6 pt-28 sm:pt-36 pb-10 section-reveal">
            {{-- Badge with shimmer --}}
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-[13px] font-medium mb-8 badge-shimmer">
                <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></span>
                v1.3.7 &mdash; Actively maintained
            </div>

            {{-- Heading + Terminal side by side --}}
            <div class="flex flex-col lg:flex-row lg:items-end lg:gap-14">
                {{-- Left: Heading, subtitle, CTAs --}}
                <div class="lg:flex-1 min-w-0">
                    <h1 class="text-[2.75rem] sm:text-[3.5rem] lg:text-[4rem] font-extrabold tracking-[-0.04em] leading-[1.08]">
                        The open-source standard for <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300">bot&nbsp;detection.</span>
                    </h1>

                    <p class="mt-6 text-[17px] sm:text-lg text-white/50 leading-[1.7] max-w-md">
                        Identify crawlers, spiders, and bots from any user-agent string. Three methods, zero dependencies, one&nbsp;Composer&nbsp;install.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="#try-it" class="bg-emerald-500 hover:bg-emerald-400 text-black text-[15px] font-semibold py-3 px-7 rounded-xl transition-all duration-300 hover:shadow-lg hover:shadow-emerald-500/20 hover:-translate-y-px tracking-[-0.01em]">
                            Try it live
                        </a>
                        <a href="https://github.com/JayBizzle/Crawler-Detect" target="_blank" rel="noopener" class="border border-white/10 hover:border-white/20 text-white/80 text-[15px] font-medium py-3 px-7 rounded-xl transition-all duration-300 hover:-translate-y-px flex items-center gap-2.5 tracking-[-0.01em]">
                            <svg class="w-[18px] h-[18px] text-white/50" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            View on GitHub
                        </a>
                    </div>
                </div>

                {{-- Right: Terminal demo --}}
                <div class="mt-10 lg:mt-0 lg:w-[520px] lg:flex-shrink-0 relative" x-data="heroDemo()" x-init="start()">
                    <div class="absolute -inset-4 bg-emerald-500/[0.07] rounded-3xl blur-2xl pointer-events-none"></div>
                    <div class="relative bg-zinc-950 border border-emerald-500/15 rounded-2xl overflow-hidden shadow-[0_0_80px_-12px_rgba(16,185,129,0.2)]">
                        {{-- Terminal title bar --}}
                        <div class="flex items-center gap-2 px-4 py-3 border-b border-white/[0.06]">
                            <div class="flex gap-1.5">
                                <div class="w-2.5 h-2.5 rounded-full bg-[#ff5f57]/60"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-[#febc2e]/60"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-[#28c840]/60"></div>
                            </div>
                            <span class="text-[11px] text-white/20 font-mono ml-2">php interactive shell</span>
                        </div>

                        {{-- Terminal content --}}
                        <div class="p-5 font-mono text-[13px] leading-[1.8] min-h-[240px]">
                            <div class="flex">
                                <span class="text-emerald-400/50 select-none mr-2">&gt;</span>
                                <span>
                                    <span class="text-emerald-400/70">$detect</span>
                                    <span class="text-white/30"> = </span>
                                    <span class="text-emerald-400/70">new</span>
                                    <span class="text-teal-300"> CrawlerDetect</span><span class="text-white/30">;</span>
                                </span>
                            </div>

                            <div class="mt-3 flex items-baseline" x-show="step >= 1" x-transition.opacity.duration.400ms>
                                <span class="text-emerald-400/50 select-none mr-2 flex-shrink-0">&gt;</span>
                                <span class="truncate min-w-0"><span class="text-emerald-400">$detect</span><span class="text-white/30">-></span><span class="text-teal-300">isCrawler</span><span class="text-white/30">(</span><span class="text-amber-300/80">'<span x-text="currentUA"></span>'</span><span class="text-white/30">);</span></span>
                            </div>

                            <div class="mt-2" x-show="step >= 2" x-transition.opacity.duration.400ms>
                                <span class="text-white/20 select-none">= </span>
                                <span class="font-medium" :class="currentIsBot ? 'text-amber-400' : 'text-emerald-400'" x-text="currentIsBot ? 'true' : 'false'"></span>
                                <span class="text-white/15 ml-3" x-text="currentIsBot ? '// Bot detected' : '// Human visitor'"></span>
                            </div>

                            <div class="mt-3" x-show="step >= 3 && currentIsBot" x-transition.opacity.duration.400ms>
                                <div class="flex">
                                    <span class="text-emerald-400/50 select-none mr-2">&gt;</span>
                                    <span>
                                        <span class="text-emerald-400">$detect</span><span class="text-white/30">-></span><span class="text-teal-300">getMatches</span><span class="text-white/30">();</span>
                                    </span>
                                </div>
                                <div class="mt-1">
                                    <span class="text-white/20 select-none">= </span>
                                    <span class="text-amber-300/80">"<span x-text="currentMatch"></span>"</span>
                                </div>
                            </div>

                            <div class="mt-3 flex" x-show="step >= 4" x-transition.opacity.duration.400ms>
                                <span class="text-emerald-400/50 select-none mr-2">&gt;</span>
                                <span class="w-2 h-[18px] bg-emerald-400/60 animate-pulse"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Connector: Hero → Stats --}}
        <div class="max-w-5xl mx-auto px-6 flex items-center gap-0">
            <div class="line-h flex-1" data-delay="200"></div>
            <div class="line-node-glow mx-0" data-delay="600"></div>
            <div class="line-h flex-1 line-h-right" data-delay="200"></div>
        </div>

        {{-- Stats Section --}}
        <section class="max-w-5xl mx-auto px-6 pt-14 pb-6 section-reveal">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 stagger-children">
                <div class="bg-white/[0.03] border border-white/[0.06] rounded-2xl p-6 sm:p-7 text-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-white/[0.02] to-transparent pointer-events-none"></div>
                    <div class="relative">
                        <div class="text-3xl sm:text-4xl font-extrabold tracking-[-0.03em] text-white">{{ number_format($stats['total'] / 1000000, 0) }}M<span class="text-emerald-400">+</span></div>
                        <div class="text-[13px] text-white/35 mt-1.5 tracking-wide">Total installs</div>
                    </div>
                </div>
                <div class="bg-white/[0.03] border border-white/[0.06] rounded-2xl p-6 sm:p-7 text-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-white/[0.02] to-transparent pointer-events-none"></div>
                    <div class="relative">
                        <div class="text-3xl sm:text-4xl font-extrabold tracking-[-0.03em] text-white">{{ number_format($stats['monthly'] / 1000000, 1) }}M</div>
                        <div class="text-[13px] text-white/35 mt-1.5 tracking-wide">Monthly installs</div>
                    </div>
                </div>
                <div class="bg-white/[0.03] border border-white/[0.06] rounded-2xl p-6 sm:p-7 text-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-white/[0.02] to-transparent pointer-events-none"></div>
                    <div class="relative">
                        <div class="text-3xl sm:text-4xl font-extrabold tracking-[-0.03em] text-white">{{ number_format($stats['stars']) }}</div>
                        <div class="text-[13px] text-white/35 mt-1.5 tracking-wide">GitHub stars</div>
                    </div>
                </div>
                <div class="bg-white/[0.03] border border-white/[0.06] rounded-2xl p-6 sm:p-7 text-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-white/[0.02] to-transparent pointer-events-none"></div>
                    <div class="relative">
                        <div class="text-3xl sm:text-4xl font-extrabold tracking-[-0.03em] text-white">{{ number_format($stats['forks']) }}</div>
                        <div class="text-[13px] text-white/35 mt-1.5 tracking-wide">Forks</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Connector: Stats → Features --}}
        <div class="max-w-5xl mx-auto flex justify-center">
            <div class="line-v h-10" data-delay="0"></div>
        </div>
        <div class="max-w-5xl mx-auto px-6 flex items-center gap-0">
            <div class="line-h flex-1" data-delay="300"></div>
            <div class="line-node mx-0" data-delay="700"></div>
            <div class="line-h flex-1 line-h-right" data-delay="300"></div>
        </div>

        {{-- Features Section --}}
        <section id="features" class="max-w-5xl mx-auto px-6 pt-8 pb-6 section-reveal">
            <div class="text-center mb-10">
                <h2 class="text-2xl sm:text-[1.75rem] font-bold tracking-[-0.025em]">What sets it apart</h2>
                <p class="text-[15px] text-white/40 mt-3 max-w-md mx-auto leading-[1.7]">Not another SaaS dashboard. A single PHP class that does one thing and does it well.</p>
            </div>
            <div class="grid sm:grid-cols-3 gap-5 stagger-children">
                <div class="bg-white/[0.03] border border-white/[0.06] rounded-2xl p-7 relative overflow-hidden">
                    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-emerald-400/30 to-transparent"></div>
                    <div class="w-9 h-9 bg-emerald-500/10 rounded-lg flex items-center justify-center mb-5">
                        <svg class="w-[18px] h-[18px] text-emerald-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                        </svg>
                    </div>
                    <h3 class="text-[15px] font-semibold tracking-[-0.01em] mb-2">Zero network overhead</h3>
                    <p class="text-[14px] text-white/40 leading-[1.7]">Pure regex matching against a local signature database. No API calls, no latency penalty, no third-party dependency.</p>
                </div>
                <div class="bg-white/[0.03] border border-white/[0.06] rounded-2xl p-7 relative overflow-hidden">
                    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-emerald-400/30 to-transparent"></div>
                    <div class="w-9 h-9 bg-emerald-500/10 rounded-lg flex items-center justify-center mb-5">
                        <svg class="w-[18px] h-[18px] text-emerald-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                    </div>
                    <h3 class="text-[15px] font-semibold tracking-[-0.01em] mb-2">Thousands of signatures</h3>
                    <p class="text-[14px] text-white/40 leading-[1.7]">Community-maintained list of known bots, crawlers, and spiders. Updated regularly with new signatures as they appear in the wild.</p>
                </div>
                <div class="bg-white/[0.03] border border-white/[0.06] rounded-2xl p-7 relative overflow-hidden">
                    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-emerald-400/30 to-transparent"></div>
                    <div class="w-9 h-9 bg-emerald-500/10 rounded-lg flex items-center justify-center mb-5">
                        <svg class="w-[18px] h-[18px] text-emerald-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                        </svg>
                    </div>
                    <h3 class="text-[15px] font-semibold tracking-[-0.01em] mb-2">Three-method API</h3>
                    <p class="text-[14px] text-white/40 leading-[1.7]"><code class="text-emerald-400/60 font-mono text-[13px]">isCrawler()</code>, <code class="text-emerald-400/60 font-mono text-[13px]">getMatches()</code>, and <code class="text-emerald-400/60 font-mono text-[13px]">setUserAgent()</code>. That's the entire surface area. Works standalone or with Laravel, Symfony, and&nbsp;Yii.</p>
                </div>
            </div>
        </section>

        {{-- Connector: Features → Try It --}}
        <div class="max-w-5xl mx-auto flex justify-center relative">
            <div class="line-v h-10" data-delay="0"></div>
        </div>
        <div class="max-w-5xl mx-auto px-6 flex items-center gap-0">
            <div class="line-h w-1/4 hidden sm:block" data-delay="200"></div>
            <div class="line-h flex-1" data-delay="300"></div>
            <div class="line-node-glow mx-0" data-delay="700"></div>
            <div class="line-h flex-1 line-h-right" data-delay="300"></div>
            <div class="line-h w-1/4 line-h-right hidden sm:block" data-delay="200"></div>
        </div>
        <div class="max-w-5xl mx-auto flex justify-center">
            <div class="line-v h-6" data-delay="400"></div>
        </div>

        {{-- Try It Section --}}
        <section id="try-it" class="relative pb-6 section-reveal">
            {{-- Glow background --}}
            <div class="absolute inset-0 -top-20 -bottom-20 overflow-hidden pointer-events-none">
                <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[400px] bg-emerald-500/[0.06] rounded-full blur-[120px]"></div>
            </div>

            <div class="relative max-w-5xl mx-auto px-6">
                <div class="max-w-2xl mx-auto">
                    <div class="text-center mb-10">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-[12px] font-medium mb-5 tracking-wide uppercase">
                            Interactive demo
                        </div>
                        <h2 class="text-[1.75rem] sm:text-3xl font-bold tracking-[-0.03em]">See it in action</h2>
                        <p class="text-[15px] text-white/45 mt-3 leading-[1.7] max-w-md mx-auto">Drop in any user-agent string and CrawlerDetect will analyse it in real time. Try it &mdash; it's instant.</p>
                    </div>
                    <div class="bg-zinc-950 border border-emerald-500/15 rounded-2xl p-6 sm:p-8 shadow-[0_0_60px_-12px_rgba(16,185,129,0.15)]">
                        <livewire:crawler-check />
                    </div>
                </div>
            </div>
        </section>

        {{-- Connector: Try It → Install --}}
        <div class="max-w-5xl mx-auto flex justify-center">
            <div class="line-v h-10" data-delay="0"></div>
        </div>
        <div class="max-w-5xl mx-auto px-6 flex items-center gap-0">
            <div class="line-h flex-1" data-delay="250"></div>
            <div class="line-node mx-0" data-delay="650"></div>
            <div class="line-h flex-1 line-h-right" data-delay="250"></div>
        </div>
        <div class="max-w-5xl mx-auto flex justify-center">
            <div class="line-v h-6" data-delay="400"></div>
        </div>

        {{-- Install Section --}}
        <section id="install" class="max-w-5xl mx-auto px-6 pb-6 section-reveal">
            <div class="max-w-2xl mx-auto">
                <div class="text-center mb-10">
                        <h2 class="text-2xl sm:text-[1.75rem] font-bold tracking-[-0.025em]">Up and running in seconds</h2>
                    <p class="text-[15px] text-white/40 mt-3 leading-[1.7]">One Composer command. No config files, no service providers, no setup.</p>
                </div>

                <div class="space-y-5">
                    {{-- Install --}}
                    <div>
                        <div class="text-[11px] text-white/25 uppercase tracking-[0.08em] mb-2.5 font-medium">Install</div>
                        <div class="bg-white/[0.03] border border-white/[0.06] rounded-xl overflow-hidden font-mono text-[13px]" x-data="{ copied: false }">
                            <div class="flex items-center justify-between px-5 py-4 border-l-2 border-emerald-500/40">
                                <div>
                                    <span class="text-white/25 select-none">$ </span><code class="text-emerald-400">composer require jaybizzle/crawler-detect</code>
                                </div>
                                <button
                                    @click="navigator.clipboard.writeText('composer require jaybizzle/crawler-detect'); copied = true; setTimeout(() => copied = false, 2000)"
                                    class="text-white/20 hover:text-white/50 transition-colors cursor-pointer ml-4 flex-shrink-0"
                                    aria-label="Copy to clipboard"
                                >
                                    <svg x-show="!copied" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9.75a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                                    </svg>
                                    <svg x-show="copied" class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Usage --}}
                    <div>
                        <div class="text-[11px] text-white/25 uppercase tracking-[0.08em] mb-2.5 font-medium">Usage</div>
                        <div class="bg-white/[0.03] border border-white/[0.06] rounded-xl overflow-hidden relative">
                            <div class="absolute top-3 right-4 text-[10px] text-white/15 uppercase tracking-[0.1em] font-medium select-none">PHP</div>
                            <div class="px-5 py-5 font-mono text-[13px] leading-[1.75] overflow-x-auto">
<pre><span class="text-emerald-400/70">use</span> <span class="text-white/50">Jaybizzle\CrawlerDetect\</span><span class="text-teal-300">CrawlerDetect</span>;

<span class="text-white/25">// Check the current visitor's user-agent</span>
<span class="text-emerald-400">$detect</span> = <span class="text-emerald-400/70">new</span> <span class="text-teal-300">CrawlerDetect</span>();

<span class="text-emerald-400/70">if</span> (<span class="text-emerald-400">$detect</span>-><span class="text-teal-300">isCrawler</span>()) {
    <span class="text-white/25">// It's a bot</span>
}

<span class="text-white/25">// Or pass any user-agent string</span>
<span class="text-emerald-400">$detect</span>-><span class="text-teal-300">isCrawler</span>(<span class="text-amber-300/80">'Googlebot/2.1'</span>); <span class="text-white/25">// true</span>

<span class="text-white/25">// Get the name of the matched bot</span>
<span class="text-emerald-400">$detect</span>-><span class="text-teal-300">getMatches</span>(); <span class="text-white/25">// "Googlebot"</span></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Connector: Install → Languages --}}
        <div class="max-w-5xl mx-auto flex justify-center">
            <div class="line-v h-10" data-delay="0"></div>
        </div>
        <div class="max-w-5xl mx-auto px-6 flex items-center gap-0">
            <div class="line-h w-1/6 hidden sm:block" data-delay="100"></div>
            <div class="line-h flex-1" data-delay="200"></div>
            <div class="line-node mx-0" data-delay="600"></div>
            <div class="line-h flex-1 line-h-right" data-delay="200"></div>
            <div class="line-h w-1/6 line-h-right hidden sm:block" data-delay="100"></div>
        </div>

        {{-- Multi-language section --}}
        <section class="max-w-5xl mx-auto px-6 pt-8 pb-10 section-reveal">
            <div class="text-center mb-10">
                <h2 class="text-2xl sm:text-[1.75rem] font-bold tracking-[-0.025em]">Not just PHP</h2>
                <p class="text-[15px] text-white/40 mt-3 leading-[1.7]">Community ports bring CrawlerDetect to every major language and runtime.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-2.5 stagger-children">
                @php
                    $ports = [
                        ['PHP', 'https://github.com/JayBizzle/Crawler-Detect'],
                        ['Laravel', 'https://github.com/JayBizzle/Laravel-Crawler-Detect'],
                        ['Node.js', 'https://github.com/JefferyHus/es6-crawler-detect'],
                        ['Python', 'https://github.com/moskrc/CrawlerDetect'],
                        ['Ruby', 'https://github.com/loadkpi/crawler_detect'],
                        ['Go', 'https://github.com/x-way/crawlerdetect'],
                        ['.NET', 'https://github.com/gplumb/NetCrawlerDetect'],
                        ['JVM', 'https://github.com/nekosoftllc/crawler-detect'],
                    ];
                @endphp
                @foreach($ports as [$name, $url])
                    <a href="{{ $url }}" target="_blank" rel="noopener" class="px-4 py-2 bg-white/[0.03] border border-white/[0.06] rounded-lg text-[13px] font-medium text-white/50 hover:text-white hover:border-emerald-500/25 hover:bg-emerald-500/[0.04] transition-all duration-300">
                        {{ $name }}
                    </a>
                @endforeach
            </div>
        </section>

        {{-- Connector: Languages → Contributors --}}
        @if(count($contributors))
        <div class="max-w-5xl mx-auto flex justify-center">
            <div class="line-v h-10" data-delay="0"></div>
        </div>
        <div class="max-w-5xl mx-auto px-6 flex items-center gap-0">
            <div class="line-h flex-1" data-delay="200"></div>
            <div class="line-node mx-0" data-delay="600"></div>
            <div class="line-h flex-1 line-h-right" data-delay="200"></div>
        </div>

        {{-- Contributors Section --}}
        <section class="max-w-5xl mx-auto px-6 pt-8 pb-10 section-reveal">
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
        @endif

        {{-- Releases Section --}}
        @if(count($releases))
        <div class="max-w-5xl mx-auto flex justify-center">
            <div class="line-v h-10" data-delay="0"></div>
        </div>
        <div class="max-w-5xl mx-auto px-6 flex items-center gap-0">
            <div class="line-h flex-1" data-delay="200"></div>
            <div class="line-node mx-0" data-delay="600"></div>
            <div class="line-h flex-1 line-h-right" data-delay="200"></div>
        </div>

        <section class="max-w-5xl mx-auto px-6 pt-8 pb-10 section-reveal">
            <div class="text-center mb-10">
                <h2 class="text-2xl sm:text-[1.75rem] font-bold tracking-[-0.025em]">Recent releases</h2>
                <p class="text-[15px] text-white/40 mt-3 leading-[1.7]">Actively maintained with {{ count($releases) > 0 ? '169+' : '' }} releases and counting.</p>
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
        @endif

        {{-- Footer --}}
        <footer class="footer-border mt-4">
            <div class="max-w-5xl mx-auto px-6 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-[13px] text-white/25 tracking-wide">
                    Created by <a href="https://github.com/JayBizzle" target="_blank" rel="noopener" class="text-emerald-400/70 hover:text-emerald-400 transition-colors duration-200">Mark Beech</a>
                    <span class="mx-1.5 text-white/15">/</span>
                    MIT License
                </div>
                <div class="flex items-center gap-5">
                    <a href="#" class="text-[13px] text-white/25 hover:text-white/50 transition-colors duration-200 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                        Top
                    </a>
                    <span class="text-white/10">|</span>
                    <a href="https://github.com/JayBizzle/Crawler-Detect" target="_blank" rel="noopener" class="text-[13px] text-white/25 hover:text-white/50 transition-colors duration-200">GitHub</a>
                    <a href="https://packagist.org/packages/jaybizzle/crawler-detect" target="_blank" rel="noopener" class="text-[13px] text-white/25 hover:text-white/50 transition-colors duration-200">Packagist</a>
                </div>
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const delay = parseInt(entry.target.dataset.delay || '0', 10);
                        setTimeout(() => {
                            entry.target.classList.add('is-visible');
                        }, delay);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -40px 0px'
            });

            document.querySelectorAll('.line-v, .line-h, .line-node, .line-node-glow, .section-reveal, .stagger-children').forEach(el => {
                observer.observe(el);
            });
        });

        function heroDemo() {
            return {
                step: 0,
                index: 0,
                currentUA: '',
                currentIsBot: true,
                currentMatch: '',
                examples: [
                    { ua: 'Googlebot/2.1 (+http://www.google.com/bot.html)', bot: true, match: 'Googlebot' },
                    { ua: 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) Chrome/120.0', bot: false, match: '' },
                    { ua: 'Slackbot-LinkExpanding 1.0', bot: true, match: 'Slackbot' },
                    { ua: 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0) Safari/604.1', bot: false, match: '' },
                    { ua: 'Bingbot/2.0 (+http://www.bing.com/bingbot.htm)', bot: true, match: 'bingbot' },
                ],
                start() {
                    this.showExample();
                },
                showExample() {
                    const ex = this.examples[this.index];
                    this.currentUA = ex.ua;
                    this.currentIsBot = ex.bot;
                    this.currentMatch = ex.match;

                    setTimeout(() => { this.step = 1; }, 600);
                    setTimeout(() => { this.step = 2; }, 1400);
                    setTimeout(() => { this.step = 3; }, 2100);
                    setTimeout(() => { this.step = 4; }, 2600);
                    setTimeout(() => { this.clearAndNext(); }, 5000);
                },
                clearAndNext() {
                    this.step = 0;
                    setTimeout(() => {
                        this.index = (this.index + 1) % this.examples.length;
                        this.showExample();
                    }, 500);
                }
            }
        }
    </script>

</body>
</html>
