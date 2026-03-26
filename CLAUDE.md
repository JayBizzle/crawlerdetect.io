# CrawlerDetect.io

Landing page and interactive demo for the [CrawlerDetect](https://github.com/JayBizzle/Crawler-Detect) PHP package.

## Tech Stack

- **Laravel 13** with PHP 8.3
- **Tailwind CSS v4** via Vite
- **Livewire v4 (Volt)** for interactive components
- **Alpine.js** (bundled with Livewire) for client-side interactions
- **No database** — cache uses file driver, sessions use file driver, queue is sync
- Deployed on **Laravel Cloud**

## Architecture

### Controller
- `HomeController` — simple invokable, just returns the view. No data fetching.

### Livewire Volt Components (single-file, in `resources/views/components/`)
- `⚡crawler-check.blade.php` — Main interactive UA checker. Supports `?ua=` query param for pre-filled analysis. Uses CrawlerDetect package directly. Rate limited to 30 req/min per IP.
- `⚡stats.blade.php` — Deferred. Fetches Packagist download/star counts. Shows skeleton while loading.
- `⚡contributors.blade.php` — Deferred. Fetches GitHub contributors. Shows skeleton avatar grid while loading.
- `⚡releases.blade.php` — Deferred. Fetches recent GitHub releases and parses changelog. Shows skeleton cards while loading.

All deferred components use `wire:init` so the page loads instantly and data populates asynchronously. API responses are cached for 1 hour via Laravel's file cache.

### External APIs
- **Packagist** (`packagist.org/packages/jaybizzle/crawler-detect.json`) — download stats, stars, forks
- **GitHub API** — contributors list, releases with changelogs

### Routes
- `/` — Main landing page
- `/og-image-preview` — Standalone HTML template for generating the OG share image (1200x630)

### Key Design Decisions
- Dark theme (zinc-950) with emerald accent (#10b981)
- Inter font for body, JetBrains Mono for code
- Animated dashed connecting lines between sections with emerald glow nodes
- Hero terminal demo cycles through bot/human UA examples using Alpine.js
- Sticky frosted-glass nav
- Results animation uses max-height transition to avoid layout jumps
- Share button generates `?ua=` links for linking to specific analysis results
- Custom spider SVG icon and matching favicon
- OG image generated from blade template via `npx capture-website-cli`

## Build

```bash
npm run dev    # Vite dev server
npm run build  # Production build (outputs to public/build/)
php artisan serve
```

## Environment Variables (Laravel Cloud)

```
CACHE_STORE=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

No database connection needed.

## Automation

- `.github/workflows/update-crawler-detect.yml` — Runs every 6 hours, checks for new CrawlerDetect releases and auto-commits composer.lock updates.

## Regenerating the OG Image

```bash
php artisan serve --port=8877 &
npx capture-website-cli http://127.0.0.1:8877/og-image-preview --width=1200 --height=630 --output=public/og-image.png --overwrite
kill %1
```

## What's Done

- Full single-page site with hero, stats, features, interactive demo, install/usage, language ports, contributors, releases, footer
- Custom spider SVG icon and matching favicon
- Open Graph and Twitter Card meta tags with generated share image
- Shareable UA links (`?ua=` param) with auto-scroll and share button
- Deferred loading for all external API data with skeleton placeholders
- Rate limiting on UA checker (30 req/min per IP)
- Scroll-triggered animations on sections and connecting lines
- Community contribution CTA linking to prefilled GitHub issues
- Auto-update workflow for CrawlerDetect package (6-hour cron)
- Deployed to Laravel Cloud

## Potential Future Work

- Mobile nav (hamburger menu) — current nav links are hidden on small screens
- CrawlerDetect Cloud / Pro offering (API-as-a-service)
- Repository dispatch trigger from Crawler-Detect repo instead of cron schedule for auto-updates
