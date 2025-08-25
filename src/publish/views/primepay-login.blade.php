<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PrimePay - Sign In</title>

    <style>
        :root {
            --primary: #2684ff;
            --primary-pressed: #1b6fe0;
            --text: #0f172a;
            --muted: #475569;
            --bg: #f1f5f9;
            --panel: #ffffff;
            --border: #e2e8f0;
            --green: #16a34a;
            --red: #ef4444;
        }

        * { box-sizing: border-box; }

        html, body { height: 100%; }

        body {
            margin: 0;
            font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
            color: var(--text);
            background: var(--bg);
        }

        .page {
            display: flex;
            min-height: 100vh;
        }

        .left-panel {
            position: relative;
            flex: 1 1 55%;
            background: radial-gradient(1200px 600px at 20% 50%, #0ea5e9 0%, #0b5394 40%, #0b193f 100%);
            color: #fff;
            overflow: hidden;
        }

        .left-panel .slide-bg {
            position: absolute;
            inset: 0;
            background-position: center;
            background-size: cover;
            opacity: 0.18;
            transition: background-image 0.6s ease-in-out, opacity 0.6s ease-in-out;
        }

        .left-content {
            position: relative;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px;
            text-align: center;
        }

        .left-content h2 {
            margin: 0;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .tagline {
            margin-top: 12px;
            font-size: 14px;
            color: #e2e8f0;
        }

        .right-panel {
            flex: 1 1 45%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 32px;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .card {
            width: 100%;
            max-width: 460px;
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 10px 30px rgba(2, 8, 23, 0.08);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 4px;
        }

        .brand-mark {
            width: 26px;
            height: 26px;
            border-radius: 6px;
            background: conic-gradient(from 160deg, #ef4444, #f59e0b, #10b981, #3b82f6, #ef4444);
        }

        .brand-title {
            font-weight: 700;
            letter-spacing: 0.2px;
        }

        .welcome {
            margin: 0 0 18px 0;
            color: var(--muted);
            font-size: 14px;
        }

        form label {
            display: block;
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid var(--border);
            background: #fff;
            color: var(--text);
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(38,132,255,0.15);
        }

        .field { margin-bottom: 16px; }

        .error {
            color: var(--red);
            font-size: 12px;
            margin-top: 6px;
        }

        .actions { margin-top: 10px; }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px 16px;
            border: 0;
            border-radius: 999px;
            background: var(--primary);
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.15s ease, transform 0.02s ease;
        }

        .btn-primary:active { transform: translateY(1px); background: var(--primary-pressed); }

        .helper-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 8px;
        }

        .checkbox { display: inline-flex; align-items: center; gap: 8px; font-size: 13px; color: var(--muted); }

        .notice-group { margin-top: 20px; display: grid; gap: 12px; }

        .notice {
            border-radius: 12px;
            padding: 14px 16px;
            font-size: 13px;
            line-height: 1.35;
            border: 1px solid var(--border);
        }

        .notice.success { background: #ecfdf5; border-color: #bbf7d0; color: #065f46; }
        .notice.danger { background: #fef2f2; border-color: #fecaca; color: #7f1d1d; }

        .notice strong { display: block; margin-bottom: 6px; }

        @media (max-width: 980px) {
            .page { flex-direction: column; }
            .left-panel { min-height: 38vh; }
            .right-panel { padding-top: 24px; padding-bottom: 48px; }
        }
    </style>
</head>
<body>
<div class="page">
    <div class="left-panel" aria-hidden="true">
        <div class="slide-bg" id="slideBg"></div>
        <div class="left-content">
            <div>
                <h2>Now pay your corporate and personal taxes</h2>
                <div class="tagline">Plus e-passport and other government fees from our selected branches and internet banking platform.</div>
            </div>
        </div>
    </div>

    <div class="right-panel">
        <div class="card">
            <div class="brand">
                <div class="brand-mark" aria-hidden="true"></div>
                <div class="brand-title">Prime Bank</div>
            </div>
            <p class="welcome">Welcome to PrimePay</p>

            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf
                <div class="field">
                    <label for="email">Login ID</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required class="input">
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="input">
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="helper-row">
                    <label class="checkbox">
                        <input type="checkbox" name="remember" value="1"> Remember me
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="font-size: 13px; color: var(--primary); text-decoration: none;">Forgot password?</a>
                    @endif
                </div>

                <div class="actions">
                    <button type="submit" class="btn-primary">Sign In</button>
                </div>
            </form>

            <div class="notice-group">
                <div class="notice success">
                    <strong>ALWAYS</strong>
                    <div>Choose a complex password.</div>
                    <div>Ensure the website starts with https://</div>
                    <div>Properly log out after completing online activities.</div>
                    <div>Keep your computer up to date with antivirus.</div>
                </div>
                <div class="notice danger">
                    <strong>NEVER</strong>
                    <div>Disclose your Login ID, Password or Secret PIN.</div>
                    <div>Use the same Login ID or password for other websites.</div>
                    <div>Save your Login ID and passwords anywhere.</div>
                    <div>Access your account from a public or unprotected device.</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        var slideEl = document.getElementById('slideBg');
        if (!slideEl) return;

        var images = [
            "{{ asset('images/primepay/slide-1.jpg') }}",
            "{{ asset('images/primepay/slide-2.jpg') }}",
            "{{ asset('images/primepay/slide-3.jpg') }}"
        ];

        // Fallback to gradient if images are not present
        var index = 0;
        function apply() {
            if (!images.length) return;
            slideEl.style.opacity = '0.12';
            // allow opacity transition to start before swapping
            setTimeout(function () {
                slideEl.style.backgroundImage = 'url(' + images[index] + ')';
                slideEl.style.opacity = '0.18';
                index = (index + 1) % images.length;
            }, 120);
        }

        // Initialize immediately and then rotate
        apply();
        setInterval(apply, 6000);
    })();
    </script>
</body>
</html>

