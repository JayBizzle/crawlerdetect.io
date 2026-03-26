<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        @import url('https://fonts.bunny.net/css?family=inter:400,600,700,800&display=swap');

        body {
            width: 1200px;
            height: 630px;
            background: #09090b;
            font-family: 'Inter', sans-serif;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Background glows */
        .glow-1 {
            position: absolute;
            top: -100px;
            right: -100px;
            width: 500px;
            height: 500px;
            background: rgba(16, 185, 129, 0.08);
            border-radius: 50%;
            filter: blur(100px);
        }
        .glow-2 {
            position: absolute;
            bottom: -100px;
            left: -100px;
            width: 400px;
            height: 400px;
            background: rgba(16, 185, 129, 0.05);
            border-radius: 50%;
            filter: blur(100px);
        }

        .content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 900px;
        }

        .icon {
            width: 64px;
            height: 64px;
            background: #10b981;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 32px;
        }

        h1 {
            font-size: 64px;
            font-weight: 800;
            letter-spacing: -0.04em;
            line-height: 1.1;
            margin-bottom: 20px;
        }

        h1 span {
            background: linear-gradient(to right, #34d399, #5eead4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p {
            font-size: 22px;
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            border-radius: 999px;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: #34d399;
            font-size: 14px;
            font-weight: 600;
            margin-top: 28px;
        }

        .badge .dot {
            width: 6px;
            height: 6px;
            background: #34d399;
            border-radius: 50%;
        }

        /* Dashed lines decoration */
        .line-h {
            position: absolute;
            height: 1px;
            background: repeating-linear-gradient(to right, transparent, transparent 4px, rgba(255,255,255,0.06) 4px, rgba(255,255,255,0.06) 12px);
        }
        .line-top { top: 80px; left: 60px; right: 60px; }
        .line-bottom { bottom: 80px; left: 60px; right: 60px; }

        .node {
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #10b981;
            box-shadow: 0 0 8px rgba(16, 185, 129, 0.4);
        }
        .node-top { top: 77px; left: 50%; transform: translateX(-50%); }
        .node-bottom { bottom: 77px; left: 50%; transform: translateX(-50%); }
    </style>
</head>
<body>
    <div class="glow-1"></div>
    <div class="glow-2"></div>

    <div class="line-h line-top"></div>
    <div class="node node-top"></div>
    <div class="line-h line-bottom"></div>
    <div class="node node-bottom"></div>

    <div class="content">
        <div class="icon">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <ellipse cx="16" cy="18" rx="5" ry="6.5" fill="#09090b"/>
                <circle cx="16" cy="9.5" r="3" fill="#09090b"/>
                <path d="M11.5 13.5 L7 11 L3 6" stroke="#09090b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11 17.5 L6 16.5 L2 15" stroke="#09090b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.5 22 L7 24 L3 28" stroke="#09090b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M20.5 13.5 L25 11 L29 6" stroke="#09090b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21 17.5 L26 16.5 L30 15" stroke="#09090b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M20.5 22 L25 24 L29 28" stroke="#09090b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>

        <h1>The open-source standard for <span>bot detection.</span></h1>
        <p>Identify bots, crawlers, and spiders from their user-agent string. Three methods. Zero dependencies.</p>

        <div class="badge">
            <div class="dot"></div>
            crawlerdetect.io
        </div>
    </div>
</body>
</html>
