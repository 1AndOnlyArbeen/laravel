<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Page Not Found</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --y: #F8CB2E;
            --yd: #C9A200;
            --bg: #0A0A0A;
            --surface: #141414;
            --border: #222;
            --text: #FFFFFF;
            --muted: #555;
            --sub: #888;
        }

        body {
            background: var(--bg);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            display: grid;
            place-items: center;
            overflow: hidden;
        }

        /* Subtle grid */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(var(--border) 1px, transparent 1px),
                linear-gradient(90deg, var(--border) 1px, transparent 1px);
            background-size: 60px 60px;
            opacity: 0.35;
            pointer-events: none;
        }

        /* Yellow glow bottom center */
        body::after {
            content: '';
            position: fixed;
            bottom: -200px;
            left: 50%;
            transform: translateX(-50%);
            width: 700px;
            height: 400px;
            background: radial-gradient(ellipse, #F8CB2E18 0%, transparent 70%);
            pointer-events: none;
        }

        .wrap {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 80px;
            max-width: 1000px;
            width: 100%;
            padding: 2rem 3rem;
        }

        /* LEFT SIDE */
        .left { display: flex; flex-direction: column; gap: 0; }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--y);
            margin-bottom: 1.6rem;
            opacity: 0;
            animation: up 0.5s ease 0.1s forwards;
        }

        .tag::before {
            content: '';
            display: block;
            width: 20px;
            height: 1.5px;
            background: var(--y);
        }

        h1 {
            font-family: 'Syne', sans-serif;
            font-size: clamp(48px, 7vw, 80px);
            font-weight: 800;
            line-height: 1.0;
            color: var(--text);
            letter-spacing: -2px;
            margin-bottom: 1.4rem;
            opacity: 0;
            animation: up 0.5s ease 0.2s forwards;
        }

        h1 em {
            font-style: normal;
            color: var(--y);
        }

        p {
            font-size: 15px;
            color: var(--sub);
            line-height: 1.75;
            max-width: 340px;
            margin-bottom: 2.2rem;
            opacity: 0;
            animation: up 0.5s ease 0.3s forwards;
        }

        .actions {
            display: flex;
            gap: 10px;
            opacity: 0;
            animation: up 0.5s ease 0.4s forwards;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 600;
            padding: 12px 22px;
            border-radius: 10px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.18s ease;
            border: none;
        }

        .btn-fill {
            background: var(--y);
            color: #000;
        }

        .btn-fill:hover {
            background: var(--yd);
            transform: translateY(-1px);
        }

        .btn-ghost {
            background: transparent;
            color: var(--sub);
            border: 1px solid var(--border);
        }

        .btn-ghost:hover {
            border-color: #333;
            color: var(--text);
            transform: translateY(-1px);
        }

        /* RIGHT SIDE */
        .right {
            opacity: 0;
            animation: fadeIn 0.7s ease 0.3s forwards;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--y), transparent);
        }

        .bg-num {
            font-family: 'Syne', sans-serif;
            font-size: 130px;
            font-weight: 800;
            color: #1a1a1a;
            line-height: 1;
            text-align: center;
            letter-spacing: -6px;
            user-select: none;
            margin-bottom: -1rem;
        }

        .status-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 1.8rem;
        }

        .status-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 10px;
            border: 1px solid var(--border);
            background: #0f0f0f;
            transition: border-color 0.2s;
        }

        .status-item:hover { border-color: #333; }

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .dot-red   { background: #ff4444; box-shadow: 0 0 6px #ff444488; }
        .dot-green { background: #22c55e; box-shadow: 0 0 6px #22c55e88;
                     animation: blink 2s ease-in-out infinite; }
        .dot-gray  { background: #333; }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        .status-label {
            font-size: 13px;
            color: var(--sub);
            flex: 1;
        }

        .status-val {
            font-size: 12px;
            font-weight: 600;
        }

        .val-red   { color: #ff4444; }
        .val-green { color: #22c55e; }
        .val-muted { color: var(--muted); }

        .divider {
            height: 1px;
            background: var(--border);
            margin: 1.6rem 0 1.2rem;
        }

        .card-foot {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .error-code {
            font-family: 'Syne', sans-serif;
            font-size: 12px;
            color: var(--muted);
            letter-spacing: 1px;
        }

        .error-code span { color: var(--y); }

        .timestamp {
            font-size: 11px;
            color: #333;
            font-variant-numeric: tabular-nums;
        }

        @keyframes up {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 700px) {
            .wrap {
                grid-template-columns: 1fr;
                gap: 40px;
                padding: 2rem 1.5rem;
            }
            .right { order: -1; }
            .bg-num { font-size: 90px; }
        }
    </style>
</head>
<body>
<div class="wrap">

    <div class="left">
        <span class="tag">Error 404</span>
        <h1>Page not<br>found <em>here.</em></h1>
        <p>The page you're looking for doesn't exist or has been moved. Head back home and try again.</p>
        <div class="actions">
            <a href="{{ url('/') }}" class="btn btn-fill">← Back to Home</a>
            <a href="javascript:history.back()" class="btn btn-ghost">Go back</a>
        </div>
    </div>

    <div class="right">
        <div class="card">
            <div class="bg-num">404</div>
            <div class="status-list">
                <div class="status-item">
                    <div class="dot dot-red"></div>
                    <span class="status-label">Requested page</span>
                    <span class="status-val val-red">Not found</span>
                </div>
                <div class="status-item">
                    <div class="dot dot-green"></div>
                    <span class="status-label">Server status</span>
                    <span class="status-val val-green">Online</span>
                </div>
                <div class="status-item">
                    <div class="dot dot-gray"></div>
                    <span class="status-label">Homepage</span>
                    <span class="status-val val-muted">Available</span>
                </div>
            </div>
            <div class="divider"></div>
            <div class="card-foot">
                <span class="error-code">HTTP <span>404</span> / NOT_FOUND</span>
                <span class="timestamp" id="ts"></span>
            </div>
        </div>
    </div>

</div>
<script>
    const ts = document.getElementById('ts');
    function tick() {
        ts.textContent = new Date().toLocaleTimeString('en-US', { hour12: false });
    }
    tick();
    setInterval(tick, 1000);
</script>
</body>
</html>