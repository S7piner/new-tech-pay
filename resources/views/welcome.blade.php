<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW TECH PAY — Plateforme RH & Paie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --blue-950: #04122e;
            --blue-900: #0a1f52;
            --blue-800: #0f2f7a;
            --blue-700: #1540a8;
            --blue-600: #1d55d4;
            --blue-500: #3b74f0;
            --blue-400: #6b96f5;
            --blue-300: #9cb8fa;
            --blue-100: #e0eaff;
            --blue-50:  #f0f4ff;

            --ink:     #06080f;
            --ink-80:  #1c2033;
            --ink-60:  #424766;
            --ink-40:  #8088a8;
            --ink-20:  #c8ccdd;
            --ink-10:  #eaecf4;
            --white:   #ffffff;

            --accent:  #00e5c0;
            --accent2: #f7a23b;

            --font-display: 'Syne', sans-serif;
            --font-body:    'DM Sans', sans-serif;

            --radius-sm:  6px;
            --radius-md:  12px;
            --radius-lg:  20px;
            --radius-xl:  32px;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: var(--font-body);
            background: var(--white);
            color: var(--ink);
            -webkit-font-smoothing: antialiased;
        }

        /* ─── NAVBAR ─── */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 0 40px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--ink-10);
        }

        .logo {
            font-family: var(--font-display);
            font-weight: 800;
            font-size: 22px;
            color: var(--ink);
            letter-spacing: -0.5px;
        }

        .logo span {
            color: var(--blue-600);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-ghost {
            font-family: var(--font-body);
            font-size: 14px;
            font-weight: 500;
            color: var(--ink-60);
            text-decoration: none;
            padding: 9px 18px;
            border-radius: var(--radius-md);
            transition: background 0.2s, color 0.2s;
            border: none;
            background: none;
            cursor: pointer;
        }

        .btn-ghost:hover {
            background: var(--ink-10);
            color: var(--ink);
        }

        .btn-primary {
            font-family: var(--font-body);
            font-size: 14px;
            font-weight: 500;
            color: var(--white);
            text-decoration: none;
            padding: 10px 22px;
            border-radius: var(--radius-md);
            background: var(--blue-600);
            transition: background 0.2s, transform 0.15s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-primary:hover {
            background: var(--blue-700);
            transform: translateY(-1px);
        }

        /* ─── HERO ─── */
        .hero {
            min-height: 100vh;
            padding: 140px 40px 80px;
            background: var(--white);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -120px;
            right: -200px;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, var(--blue-100) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -100px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, #e8fff9 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--blue-50);
            border: 1px solid var(--blue-100);
            color: var(--blue-700);
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.04em;
            padding: 6px 14px;
            border-radius: 99px;
            margin-bottom: 28px;
            text-transform: uppercase;
        }

        .hero-badge .dot {
            width: 6px;
            height: 6px;
            background: var(--accent);
            border-radius: 50%;
        }

        .hero-title {
            font-family: var(--font-display);
            font-size: 62px;
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -2px;
            color: var(--ink);
            margin-bottom: 24px;
        }

        .hero-title em {
            font-style: normal;
            color: var(--blue-600);
        }

        .hero-subtitle {
            font-size: 17px;
            line-height: 1.75;
            color: var(--ink-60);
            max-width: 480px;
            margin-bottom: 44px;
        }

        .hero-cta {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .btn-cta-primary {
            font-family: var(--font-body);
            font-size: 15px;
            font-weight: 500;
            color: var(--white);
            text-decoration: none;
            padding: 14px 28px;
            border-radius: var(--radius-lg);
            background: var(--blue-600);
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 20px rgba(29,85,212,0.28);
        }

        .btn-cta-primary:hover {
            background: var(--blue-700);
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(29,85,212,0.36);
        }

        .btn-cta-secondary {
            font-family: var(--font-body);
            font-size: 15px;
            font-weight: 500;
            color: var(--ink-60);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: color 0.2s;
        }

        .btn-cta-secondary:hover { color: var(--blue-600); }

        .btn-arrow {
            width: 28px;
            height: 28px;
            background: var(--ink-10);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            transition: background 0.2s;
        }

        .btn-cta-secondary:hover .btn-arrow {
            background: var(--blue-100);
        }

        /* Hero stats */
        .hero-stats {
            display: flex;
            gap: 32px;
            margin-top: 48px;
            padding-top: 40px;
            border-top: 1px solid var(--ink-10);
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .stat-number {
            font-family: var(--font-display);
            font-size: 26px;
            font-weight: 700;
            color: var(--ink);
            letter-spacing: -0.5px;
        }

        .stat-label {
            font-size: 12px;
            color: var(--ink-40);
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .stat-divider {
            width: 1px;
            background: var(--ink-10);
        }

        /* Hero visual card */
        .hero-visual {
            position: relative;
        }

        .dashboard-preview {
            background: var(--white);
            border-radius: var(--radius-xl);
            border: 1px solid var(--ink-10);
            padding: 32px;
            box-shadow: 0 32px 80px rgba(6,8,15,0.08), 0 8px 24px rgba(6,8,15,0.04);
            position: relative;
        }

        .preview-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .preview-title {
            font-family: var(--font-display);
            font-size: 15px;
            font-weight: 700;
            color: var(--ink);
        }

        .preview-date {
            font-size: 12px;
            color: var(--ink-40);
        }

        .preview-metrics {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }

        .metric-card {
            padding: 18px;
            border-radius: var(--radius-md);
            background: var(--blue-50);
        }

        .metric-card.dark {
            background: var(--blue-900);
        }

        .metric-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            color: var(--blue-400);
            margin-bottom: 8px;
        }

        .metric-card.dark .metric-label {
            color: var(--blue-300);
        }

        .metric-value {
            font-family: var(--font-display);
            font-size: 28px;
            font-weight: 700;
            color: var(--blue-800);
            line-height: 1;
        }

        .metric-card.dark .metric-value {
            color: var(--white);
        }

        .metric-sub {
            font-size: 11px;
            color: var(--blue-500);
            margin-top: 6px;
        }

        .metric-card.dark .metric-sub {
            color: var(--blue-300);
        }

        .preview-bar {
            margin-bottom: 20px;
        }

        .bar-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 12px;
            color: var(--ink-60);
        }

        .bar-track {
            height: 8px;
            background: var(--ink-10);
            border-radius: 99px;
            overflow: hidden;
        }

        .bar-fill {
            height: 100%;
            border-radius: 99px;
            background: linear-gradient(90deg, var(--blue-500), var(--blue-400));
        }

        .preview-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .list-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: var(--radius-md);
            background: var(--ink-10);
        }

        .list-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--blue-100);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 600;
            color: var(--blue-700);
            flex-shrink: 0;
        }

        .list-info {
            flex: 1;
        }

        .list-name {
            font-size: 13px;
            font-weight: 500;
            color: var(--ink);
        }

        .list-role {
            font-size: 11px;
            color: var(--ink-40);
        }

        .list-amount {
            font-size: 13px;
            font-weight: 600;
            color: var(--blue-700);
        }

        .badge-success {
            font-size: 10px;
            font-weight: 600;
            color: #065f46;
            background: #d1fae5;
            padding: 3px 8px;
            border-radius: 99px;
        }

        /* Floating notification card */
        .float-card {
            position: absolute;
            background: var(--white);
            border: 1px solid var(--ink-10);
            border-radius: var(--radius-lg);
            padding: 14px 18px;
            box-shadow: 0 16px 40px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .float-card.top-right {
            top: -24px;
            right: -32px;
        }

        .float-card.bottom-left {
            bottom: -24px;
            left: -32px;
        }

        .float-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .float-icon.green { background: #d1fae5; }
        .float-icon.blue  { background: var(--blue-50); }

        .float-text p {
            font-size: 12px;
            color: var(--ink-60);
        }

        .float-text strong {
            font-size: 14px;
            font-weight: 600;
            color: var(--ink);
        }

        /* ─── SECTION SHARED ─── */
        .section {
            padding: 100px 40px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-eyebrow {
            font-family: var(--font-display);
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--blue-600);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-eyebrow::before {
            content: '';
            display: inline-block;
            width: 24px;
            height: 2px;
            background: var(--blue-600);
        }

        .section-heading {
            font-family: var(--font-display);
            font-size: 46px;
            font-weight: 800;
            letter-spacing: -1.5px;
            line-height: 1.1;
            color: var(--ink);
            max-width: 640px;
            margin-bottom: 20px;
        }

        .section-heading em {
            font-style: normal;
            color: var(--blue-600);
        }

        .section-desc {
            font-size: 16px;
            line-height: 1.75;
            color: var(--ink-60);
            max-width: 560px;
        }

        /* ─── FEATURES ─── */
        .features-section {
            background: var(--ink-10);
        }

        .features-header {
            margin-bottom: 60px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
            background: var(--ink-20);
            border-radius: var(--radius-xl);
            overflow: hidden;
        }

        .feature-cell {
            background: var(--white);
            padding: 44px 36px;
            transition: background 0.25s;
            position: relative;
        }

        .feature-cell:hover {
            background: var(--blue-50);
        }

        .feature-cell:hover .feature-icon-wrap {
            background: var(--blue-100);
        }

        .feature-icon-wrap {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-md);
            background: var(--ink-10);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin-bottom: 24px;
            transition: background 0.25s;
        }

        .feature-cell h3 {
            font-family: var(--font-display);
            font-size: 20px;
            font-weight: 700;
            color: var(--ink);
            margin-bottom: 12px;
        }

        .feature-cell p {
            font-size: 14px;
            line-height: 1.75;
            color: var(--ink-60);
        }

        /* ─── HOW IT WORKS ─── */
        .how-section {
            background: var(--white);
        }

        .how-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 100px;
            align-items: center;
        }

        .steps {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .step {
            display: flex;
            gap: 24px;
            padding: 28px 0;
            border-bottom: 1px solid var(--ink-10);
        }

        .step:last-child { border-bottom: none; }

        .step-num {
            font-family: var(--font-display);
            font-size: 13px;
            font-weight: 700;
            color: var(--blue-400);
            width: 28px;
            flex-shrink: 0;
            padding-top: 2px;
        }

        .step-content h4 {
            font-family: var(--font-display);
            font-size: 18px;
            font-weight: 700;
            color: var(--ink);
            margin-bottom: 8px;
        }

        .step-content p {
            font-size: 14px;
            line-height: 1.7;
            color: var(--ink-60);
        }

        /* Right side visual */
        .how-visual {
            background: var(--blue-900);
            border-radius: var(--radius-xl);
            padding: 40px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .how-card {
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: var(--radius-lg);
            padding: 24px;
        }

        .how-card-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--blue-300);
            margin-bottom: 12px;
        }

        .bulletin-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }

        .bulletin-row:last-child { border-bottom: none; }

        .bulletin-row span:first-child {
            font-size: 13px;
            color: rgba(255,255,255,0.55);
        }

        .bulletin-row span:last-child {
            font-size: 13px;
            font-weight: 500;
            color: var(--white);
        }

        .bulletin-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px;
            background: var(--accent);
            border-radius: var(--radius-md);
            margin-top: 6px;
        }

        .bulletin-total span:first-child {
            font-size: 13px;
            font-weight: 600;
            color: #003d34;
        }

        .bulletin-total span:last-child {
            font-family: var(--font-display);
            font-size: 20px;
            font-weight: 700;
            color: #003d34;
        }

        /* ─── CTA BAND ─── */
        .cta-section {
            background: var(--ink);
            padding: 100px 40px;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 60% 80% at 80% 50%, rgba(29,85,212,0.25) 0%, transparent 70%),
                radial-gradient(ellipse 40% 60% at 20% 60%, rgba(0,229,192,0.1) 0%, transparent 70%);
        }

        .cta-inner {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 60px;
        }

        .cta-text h2 {
            font-family: var(--font-display);
            font-size: 50px;
            font-weight: 800;
            letter-spacing: -2px;
            line-height: 1.1;
            color: var(--white);
            margin-bottom: 16px;
        }

        .cta-text h2 em {
            font-style: normal;
            color: var(--accent);
        }

        .cta-text p {
            font-size: 16px;
            line-height: 1.7;
            color: rgba(255,255,255,0.55);
            max-width: 460px;
        }

        .cta-action {
            flex-shrink: 0;
        }

        .btn-cta-white {
            font-family: var(--font-display);
            font-size: 15px;
            font-weight: 700;
            color: var(--ink);
            text-decoration: none;
            padding: 18px 36px;
            border-radius: var(--radius-lg);
            background: var(--white);
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .btn-cta-white:hover {
            background: var(--blue-50);
            transform: translateY(-2px);
        }

        /* ─── FOOTER ─── */
        footer {
            background: var(--ink-950, #030508);
            border-top: 1px solid rgba(255,255,255,0.05);
            padding: 32px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .footer-logo {
            font-family: var(--font-display);
            font-weight: 800;
            font-size: 18px;
            color: rgba(255,255,255,0.4);
        }

        .footer-copy {
            font-size: 13px;
            color: rgba(255,255,255,0.3);
        }

        /* ─── ANIMATIONS ─── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .hero-badge   { animation: fadeUp 0.5s ease both; }
        .hero-title   { animation: fadeUp 0.6s 0.1s ease both; }
        .hero-subtitle{ animation: fadeUp 0.6s 0.2s ease both; }
        .hero-cta     { animation: fadeUp 0.6s 0.3s ease both; }
        .hero-stats   { animation: fadeUp 0.6s 0.4s ease both; }
        .hero-visual  { animation: fadeUp 0.8s 0.25s ease both; }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 1024px) {
            .hero-title { font-size: 48px; }
            .section-heading { font-size: 36px; }
            .features-grid { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 768px) {
            .navbar { padding: 0 20px; }
            .navbar .logo { font-size: 18px; }

            .hero { padding: 120px 20px 60px; }
            .hero-inner {
                grid-template-columns: 1fr;
                gap: 48px;
            }
            .hero-title { font-size: 40px; letter-spacing: -1px; }
            .float-card { display: none; }

            .section { padding: 72px 20px; }
            .features-grid { grid-template-columns: 1fr; }
            .how-inner { grid-template-columns: 1fr; gap: 48px; }
            .cta-inner { flex-direction: column; gap: 36px; }
            .cta-text h2 { font-size: 36px; }
            footer { flex-direction: column; gap: 12px; text-align: center; }
        }
    </style>
</head>

<body>

<!-- ── NAVBAR ── -->
<nav class="navbar">
    <div class="logo">NEW TECH <span>PAY</span></div>
    <div class="nav-right">
        <a href="{{ route('login') }}" class="btn-ghost">Connexion</a>
        <a href="{{ route('entreprises.create') }}" class="btn-primary">
            Créer un compte →
        </a>
    </div>
</nav>

<!-- ── HERO ── -->
<section class="hero">
    <div class="hero-inner">

        <div class="hero-left">
            <div class="hero-badge">
                <span class="dot"></span>
                Plateforme RH & Paie
            </div>

            <h1 class="hero-title">
                La gestion<br>
                de votre <em>entreprise</em><br>
                réinventée
            </h1>

            <p class="hero-subtitle">
                Automatisez vos bulletins de paie, gérez vos collaborateurs et pilotez vos performances depuis une seule plateforme moderne et sécurisée.
            </p>

            <div class="hero-cta">
                <a href="{{ route('entreprises.create') }}" class="btn-cta-primary">
                    Créer mon entreprise
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                        <path d="M3 8h10M8 3l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <a href="{{ route('login') }}" class="btn-cta-secondary">
                    Se connecter
                    <span class="btn-arrow">→</span>
                </a>
            </div>

            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">150+</span>
                    <span class="stat-label">Employés gérés</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-number">98%</span>
                    <span class="stat-label">Automatisation</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Disponibilité</span>
                </div>
            </div>
        </div>

        <!-- Dashboard Preview -->
        <div class="hero-visual">
            <div class="float-card top-right">
                <div class="float-icon green">✅</div>
                <div class="float-text">
                    <strong>Bulletins générés</strong>
                    <p>47 bulletins ce mois</p>
                </div>
            </div>

            <div class="dashboard-preview">
                <div class="preview-topbar">
                    <span class="preview-title">Tableau de bord</span>
                    <span class="preview-date">Mai 2026</span>
                </div>

                <div class="preview-metrics">
                    <div class="metric-card dark">
                        <div class="metric-label">Masse salariale</div>
                        <div class="metric-value">12.4M</div>
                        <div class="metric-sub">+8.2% ce mois</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-label" style="color:var(--blue-600)">Effectif</div>
                        <div class="metric-value">148</div>
                        <div class="metric-sub" style="color:var(--blue-500)">3 nouveaux</div>
                    </div>
                </div>

                <div class="preview-bar">
                    <div class="bar-header">
                        <span>Paie traitée</span>
                        <span style="font-weight:600; color:var(--blue-700)">93%</span>
                    </div>
                    <div class="bar-track">
                        <div class="bar-fill" style="width:93%"></div>
                    </div>
                </div>

                <div class="preview-list">
                    <div class="list-row">
                        <div class="list-avatar">KD</div>
                        <div class="list-info">
                            <div class="list-name">Kofi Mensah</div>
                            <div class="list-role">Directeur Financier</div>
                        </div>
                        <span class="list-amount">485 000 F</span>
                        <span class="badge-success">Payé</span>
                    </div>
                    <div class="list-row">
                        <div class="list-avatar">AM</div>
                        <div class="list-info">
                            <div class="list-name">Aïcha Diallo</div>
                            <div class="list-role">Responsable RH</div>
                        </div>
                        <span class="list-amount">310 000 F</span>
                        <span class="badge-success">Payé</span>
                    </div>
                </div>
            </div>

            <div class="float-card bottom-left">
                <div class="float-icon blue">⚡</div>
                <div class="float-text">
                    <strong>Automatisation active</strong>
                    <p>Bulletin généré en 2s</p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ── FEATURES ── -->
<section class="section features-section">
    <div class="container">
        <div class="features-header">
            <div class="section-eyebrow">Fonctionnalités</div>
            <h2 class="section-heading">
                Tout ce dont votre<br><em>entreprise a besoin</em>
            </h2>
            <p class="section-desc">
                Une suite complète d'outils RH et de paie pour les entreprises modernes d'Afrique et d'ailleurs.
            </p>
        </div>

        <div class="features-grid">
            <div class="feature-cell">
                <div class="feature-icon-wrap">👨‍💼</div>
                <h3>Gestion RH</h3>
                <p>Gérez vos employés, contrats, services, postes et centres de coûts depuis une interface unifiée.</p>
            </div>
            <div class="feature-cell">
                <div class="feature-icon-wrap">💰</div>
                <h3>Paie automatisée</h3>
                <p>Génération automatique des bulletins, calcul des retenues, primes et heures supplémentaires.</p>
            </div>
            <div class="feature-cell">
                <div class="feature-icon-wrap">⏱️</div>
                <h3>Présences & Pointages</h3>
                <p>Suivez en temps réel les présences, absences, retards et heures supplémentaires.</p>
            </div>
            <div class="feature-cell">
                <div class="feature-icon-wrap">📊</div>
                <h3>Rapports & Analytics</h3>
                <p>Tableaux de bord dynamiques et rapports détaillés pour piloter vos performances RH.</p>
            </div>
            <div class="feature-cell">
                <div class="feature-icon-wrap">🏢</div>
                <h3>Multi-Entreprises</h3>
                <p>Chaque entreprise dispose de son propre espace isolé, sécurisé et entièrement indépendant.</p>
            </div>
            <div class="feature-cell">
                <div class="feature-icon-wrap">🔒</div>
                <h3>Sécurité & Fiabilité</h3>
                <p>Architecture professionnelle avec chiffrement, accès protégés et haute disponibilité.</p>
            </div>
        </div>
    </div>
</section>

<!-- ── HOW IT WORKS ── -->
<section class="section how-section">
    <div class="container">
        <div class="how-inner">
            <div>
                <div class="section-eyebrow">Comment ça marche</div>
                <h2 class="section-heading">
                    Opérationnel en<br><em>quelques minutes</em>
                </h2>
                <div class="steps">
                    <div class="step">
                        <div class="step-num">01</div>
                        <div class="step-content">
                            <h4>Créez votre entreprise</h4>
                            <p>Renseignez les informations de votre structure. Votre espace est immédiatement activé et prêt à l'emploi.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-num">02</div>
                        <div class="step-content">
                            <h4>Ajoutez vos employés</h4>
                            <p>Importez ou saisissez vos collaborateurs avec leurs contrats, postes et informations salariales.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-num">03</div>
                        <div class="step-content">
                            <h4>Générez votre paie</h4>
                            <p>En un clic, le système calcule et génère tous les bulletins. Téléchargement PDF instantané.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-num">04</div>
                        <div class="step-content">
                            <h4>Pilotez en temps réel</h4>
                            <p>Suivez vos KPIs RH, la masse salariale et les performances depuis votre tableau de bord.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="how-visual">
                <div class="how-card">
                    <div class="how-card-label">Bulletin de paie — Mai 2026</div>
                    <div class="bulletin-row">
                        <span>Salaire de base</span>
                        <span>350 000 FCFA</span>
                    </div>
                    <div class="bulletin-row">
                        <span>Heures supplémentaires</span>
                        <span>+ 28 500 FCFA</span>
                    </div>
                    <div class="bulletin-row">
                        <span>Prime de transport</span>
                        <span>+ 15 000 FCFA</span>
                    </div>
                    <div class="bulletin-row">
                        <span>CNSS (salarié)</span>
                        <span>− 14 700 FCFA</span>
                    </div>
                    <div class="bulletin-row">
                        <span>ITS (Impôt)</span>
                        <span>− 42 300 FCFA</span>
                    </div>
                    <div class="bulletin-total">
                        <span>Net à payer</span>
                        <span>336 500 FCFA</span>
                    </div>
                </div>
                <div class="how-card" style="display:flex; justify-content:space-between; align-items:center;">
                    <div>
                        <div class="how-card-label">Statut génération</div>
                        <div style="font-family:var(--font-display); font-size:22px; font-weight:700; color:var(--white);">148 / 148</div>
                        <div style="font-size:12px; color:rgba(255,255,255,0.4); margin-top:4px;">bulletins générés</div>
                    </div>
                    <div style="text-align:right;">
                        <div style="font-size:28px; font-weight:700; font-family:var(--font-display); color:var(--accent);">100%</div>
                        <div style="font-size:11px; color:var(--accent); opacity:0.7; margin-top:2px; text-transform:uppercase; letter-spacing:.06em;">Terminé</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ── CTA ── -->
<section class="cta-section">
    <div class="cta-inner">
        <div class="cta-text">
            <h2>Prêt à <em>moderniser</em><br>votre gestion RH ?</h2>
            <p>Rejoignez les entreprises qui ont fait confiance à NEW TECH PAY pour automatiser leur paie et piloter leurs ressources humaines.</p>
        </div>
        <div class="cta-action">
            <a href="{{ route('entreprises.create') }}" class="btn-cta-white">
                Créer mon entreprise
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                    <path d="M3 8h10M8 3l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- ── FOOTER ── -->
<footer>
    <div class="footer-logo">NEW TECH PAY</div>
    <div class="footer-copy">© {{ date('Y') }} New Tech Pay — Tous droits réservés.</div>
</footer>

</body>
</html>
