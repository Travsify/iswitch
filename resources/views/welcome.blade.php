<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>iSwitch | The Global Mobility Super-App</title>
    <link rel="icon" href="/iswitch_brand_logo.png" type="image/png">
    
    <script>
        // Global Elite State Hub
        window.iSwitchState = {
            flightConfirmed: false,
            showLeadModal: false,
            leadContext: 'Global Mobility',
            leadMessage: 'Exploring the ecosystem'
        };
    </script>
    <!-- Elite Social Discovery -->
    <meta name="description" content="Switch your life. One app for global mobility, hacker flight fares, luxury stays, and automated visa probability.">
    <meta property="og:title" content="iSwitch: The Global Mobility Super-App">
    <meta property="og:description" content="The next-gen utility for migration, aviation, and hospitality. Solve your world in one intelligent vault.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/iswitch_brand_logo.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="iSwitch: Total Global Mobility">
    <meta name="twitter:image" content="/iswitch_brand_logo.png">

    <!-- Tailwind CSS (Vite via Laravel) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Alpine.js for interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        :root {
            --bg-color: #030712; /* Tailwind Gray 950 - Almost pure black */
            --primary: #FF7D00;
            --secondary: #00C897;
        }

        @media (max-width: 1023px) {
            .mobile-only { display: block !important; }
            .desktop-only { display: none !important; }
            
            main { padding-top: 110px !important; }
            
            .text-gradient, .text-gradient-orange { 
                font-size: 2.5rem !important; 
                line-height: 1.1 !important;
            }

            #mobile-svc-grid {
                display: grid !important;
                grid-template-columns: repeat(4, 1fr) !important;
                gap: 8px !important;
                padding: 0 12px !important;
                overflow: visible !important;
            }

            .svc-tile {
                width: 100% !important;
                min-width: 0 !important;
                padding: 12px 4px !important;
                border-radius: 16px !important;
            }

            .svc-icon {
                width: 36px !important;
                height: 36px !important;
                font-size: 0.9rem !important;
                margin-bottom: 6px !important;
            }

            .svc-label {
                font-size: 9px !important;
                letter-spacing: -0.02em !important;
            }
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-color);
            color: #F8FAFC;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* --- IMMERSIVE HERO BACKGROUND --- */
        .hero-bg {
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 110vh;
            background-image: url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?q=80&w=2500&auto=format&fit=crop');
            background-size: cover;
            background-position: center 30%;
            z-index: -2;
            opacity: 0.35;
        }
        .hero-gradient {
            position: absolute;
            top: 0; left: 0; right: 0; height: 110vh;
            background: linear-gradient(to bottom, 
                var(--bg-color) 0%, 
                rgba(3, 7, 18, 0.4) 30%, 
                var(--bg-color) 100%);
            z-index: -1;
        }

        /* --- PREMIUM GLASS COMPOSITIONS --- */
        .glass-nav {
            background: rgba(3, 7, 18, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .glass-widget {
            background: rgba(15, 23, 42, 0.45);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 2rem;
            box-shadow: 0 40px 80px rgba(0,0,0,0.5), inset 0 1px 0 rgba(255,255,255,0.1);
        }

        /* --- UNICORN SEARCH BAR --- */
        .search-pill {
            background: rgba(3, 7, 18, 0.7);
            border-radius: 100px;
            display: flex;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 10;
        }

        .search-pill-input {
            position: relative;
            transition: all 0.3s ease;
            border-radius: 100px;
        }
        .search-pill-input:hover {
            background: rgba(255, 255, 255, 0.05);
        }
        .search-pill-input:focus-within {
            background: var(--bg-color);
            box-shadow: 0 0 0 2px var(--primary);
            z-index: 20;
        }

        /* --- TYPOGRAPHY & GRADIENTS --- */
        .text-gradient {
            background: linear-gradient(135deg, #FFFFFF 0%, #94A3B8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .text-gradient-orange {
            background: linear-gradient(135deg, #FFB800, #FF5500);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* --- BUTTONS --- */
        .btn-magical {
            background: linear-gradient(135deg, var(--primary), #E65C00);
            position: relative;
            overflow: hidden;
            border: none;
            z-index: 1;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: 0 8px 25px rgba(255, 125, 0, 0.4);
        }
        .btn-magical::before {
            content: '';
            position: absolute; top: 0; left: -100%; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: all 0.5s ease;
            z-index: -1;
        }
        .btn-magical:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 35px rgba(255, 125, 0, 0.6);
        }
        .btn-magical:hover::before {
            left: 100%;
        }

        /* --- CARD HOVER EFFECTS --- */
        .destination-card {
            border-radius: 24px;
            overflow: hidden;
            position: relative;
            transform: translateZ(0); /* Hardware accel */
            transition: transform 0.5s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.5s;
        }
        .destination-card img {
            transition: transform 0.7s cubic-bezier(0.2, 0.8, 0.2, 1);
        }
        .destination-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6), 0 0 20px rgba(255, 125, 0, 0.2);
            border-color: rgba(255, 125, 0, 0.4);
        }
        .destination-card:hover img {
            transform: scale(1.08);
        }
        
        .card-overlay {
            background: linear-gradient(to top, rgba(3,7,18,0.95) 0%, rgba(3,7,18,0.4) 50%, transparent 100%);
        }

        /* Ambient Lighting */
        .ambient-glow {
            position: absolute; width: 40vw; height: 40vw;
            background: radial-gradient(circle, rgba(255,125,0,0.08) 0%, transparent 70%);
            border-radius: 50%; filter: blur(60px); z-index: -1; pointer-events: none;
        }
        @media (max-width: 1023px) {
            .ambient-glow { display: none !important; }
        }

        /* Custom Scrollbar for pills */
        .hide-scroll::-webkit-scrollbar { display: none; }
        .hide-scroll { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<style>
    /* ═══════════ SYSTEM: GLOBAL CLAMPS ═══════════ */
    [x-cloak] { display: none !important; }
    html, body { max-width: 100%; overflow-x: hidden !important; position: relative; }
    * { -webkit-tap-highlight-color: transparent; box-sizing: border-box; }

    /* iOS notch safe areas */
    @supports (padding-bottom: env(safe-area-inset-bottom)) {
        .mobile-bottom-nav { padding-bottom: calc(8px + env(safe-area-inset-bottom)) !important; }
    }

    /* ═══════════ FIXED BOTTOM NAV (Native App) ═══════════ */
    .mobile-bottom-nav {
        display: none;
        position: fixed; bottom: 0; left: 0; right: 0;
        background: rgba(5,8,22,0.97);
        backdrop-filter: blur(30px); -webkit-backdrop-filter: blur(30px);
        border-top: 1px solid rgba(255,255,255,0.06);
        z-index: 99999; padding: 6px 0 12px;
    }
    .mobile-bottom-nav .nav-items {
        display: flex; justify-content: space-around; align-items: flex-end; padding: 0 6px;
        position: relative; z-index: 100;
    }
    .mobile-bottom-nav .nav-item {
        display: flex; flex-direction: column; align-items: center; gap: 4px;
        padding: 6px 10px; border-radius: 14px; cursor: pointer;
        text-decoration: none; min-width: 52px; color: #4b5563;
        transition: color 0.2s; border: none; background: none;
    }
    .mobile-bottom-nav .nav-item.active { color: #FF7D00; }
    .mobile-bottom-nav .nav-item .nav-icon { font-size: 20px; line-height: 1; transition: transform 0.2s; }
    .mobile-bottom-nav .nav-item.active .nav-icon { transform: translateY(-2px); }
    .mobile-bottom-nav .nav-item .nav-label { font-size: 9px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; }
    .mobile-bottom-nav .nav-item .nav-dot { width: 4px; height: 4px; border-radius: 50%; background: #FF7D00; margin-top: 1px; opacity: 0; transition: opacity 0.2s; }
    .mobile-bottom-nav .nav-item.active .nav-dot { opacity: 1; }

    /* Center CTA */
    .mobile-bottom-nav .nav-center {
        display: flex; flex-direction: column; align-items: center; gap: 4px;
        margin-top: -22px; cursor: pointer;
    }
    .mobile-bottom-nav .nav-center .center-btn {
        width: 58px; height: 58px;
        background: linear-gradient(135deg, #FF7D00, #E65C00);
        border-radius: 50%; display: flex; align-items: center; justify-content: center;
        font-size: 22px; color: white;
        box-shadow: 0 4px 20px rgba(255,125,0,0.6), 0 0 0 4px #050816;
        transition: transform 0.15s; border: none;
    }
    .mobile-bottom-nav .nav-center .center-btn:active { transform: scale(0.9); }
    .mobile-bottom-nav .nav-center .nav-label { font-size: 9px; font-weight: 800; text-transform: uppercase; color: #FF7D00; letter-spacing: 0.05em; }

    /* ═══════════ MOBILE SERVICE ICON GRID ═══════════ */
    .mobile-service-grid { display: none; }

    /* ═══════════ MOBILE OVERRIDES ═══════════ */
    @media (max-width: 1023px) {
        button:active { opacity: 0.75; transform: scale(0.96); }
        a:active { opacity: 0.75; }

        /* Hero: Compact */
        .hero-compact-pt { padding-top: 160px !important; }
        .hero-subtext { font-size: 14px !important; }
        .hero-badge { margin-bottom: 10px !important; }

        .mobile-service-grid {
            position: relative;
            z-index: 100 !important;
            pointer-events: auto !important;
            display: grid !important;
            grid-template-columns: repeat(4, 1fr);
            gap: 6px !important;
            width: 100% !important;
            padding: 0 4px;
            margin-top: 20px;
        }
        .mobile-bottom-nav { display: block; }
        body { padding-bottom: 110px !important; }
        .mobile-only { display: block !important; }
        .desktop-only { display: none !important; }
        
        /* High-visibility active state for tabs */
        .svc-tile.active-tab {
            background: rgba(255,125,0,0.15) !important;
            border: 1px solid rgba(255,125,0,0.3) !important;
        }
        .svc-tile.active-tab .svc-label { color: white !important; }
        
        .mobile-service-grid .svc-tile {
            min-height: 80px;
            -webkit-tap-highlight-color: transparent;
        }
        .glass-widget { border-radius: 1.25rem !important; }

        /* Mobile Service Grid */
        .mobile-service-grid {
            display: grid !important;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .mobile-service-grid .svc-tile {
            display: flex; flex-direction: column; align-items: center; gap: 6px;
            padding: 14px 6px 12px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 18px; cursor: pointer; text-decoration: none;
            transition: all 0.15s; text-align: center;
        }
        .mobile-service-grid .svc-tile:active {
            transform: scale(0.93);
        }
        .mobile-service-grid .svc-tile .svc-icon {
            width: 44px; height: 44px; border-radius: 14px;
            display: flex; align-items: center; justify-content: center; font-size: 20px;
        }
        .mobile-service-grid .svc-tile .svc-label {
            font-size: 9.5px; font-weight: 700; color: #94a3b8; line-height: 1.2;
        }

        /* Smooth destination cards on mobile */
        .destination-card:hover { transform: none; }
        .destination-card:active { transform: scale(0.97); }

        /* Hide desktop pill tabs — icon grid replaces them */
        #desktop-tab-strip { display: none; }

        /* ── PIXEL-PERFECT TYPOGRAPHY SCALE ── */
        h1 { font-size: 22px !important; line-height: 1.15 !important; letter-spacing: -0.02em !important; }
        h2 { font-size: 19px !important; line-height: 1.2 !important; }
        h3 { font-size: 17px !important; line-height: 1.25 !important; }
        h4 { font-size: 15px !important; }
        p  { font-size: 13px !important; line-height: 1.6 !important; }
        .text-sm, small { font-size: 12px !important; }
        .hero-badge span { font-size: 10px !important; }

        /* ── SEARCH ENGINE CARD — Perfect Mobile Stack ── */
        #search-engine {
            border-radius: 20px !important;
            padding: 16px !important;
            width: 100% !important;
        }

        /* All search input rows: full width, generous height */
        #search-engine input[type="text"],
        #search-engine input[type="email"],
        #search-engine select {
            font-size: 15px !important;
            height: 52px !important;
            padding: 0 16px 0 44px !important;
        }

        /* Stack flex rows vertically */
        #search-engine form,
        #search-engine .flex.flex-col.lg\:flex-row,
        form[x-show] {
            flex-direction: column !important;
            border-radius: 16px !important;
        }

        /* Individual input sections: full width stacked */
        #search-engine .flex-1,
        #search-engine [class*="flex-1"] {
            width: 100% !important;
            padding: 12px 14px !important;
            border-radius: 14px !important;
        }

        /* Remove dividers between stacked fields on mobile */
        #search-engine .divide-y > * { border-top: 1px solid rgba(255,255,255,0.06) !important; }
        #search-engine .divide-x > *,
        #search-engine [class*="divide-x"] > * { border-left: none !important; border-top: 1px solid rgba(255,255,255,0.06) !important; }

        /* Search submit button: Full width, 52px tall */
        #search-engine button[type="submit"],
        #search-engine .btn-magical,
        #search-engine form > .btn-magical {
            width: 100% !important;
            height: 52px !important;
            border-radius: 14px !important;
            font-size: 14px !important;
            font-weight: 900 !important;
            margin-top: 4px !important;
        }

        /* Input label: Clear, small */
        #search-engine label,
        #search-engine .text-\[10px\] {
            font-size: 9px !important;
            letter-spacing: 0.08em !important;
        }

        /* Search results / flight results area */
        #search-engine .grid { grid-template-columns: 1fr !important; gap: 12px !important; }

        /* Trip type switcher scrollable row */
        #search-engine .flex.items-center.gap-3.mb-6 { gap: 8px !important; }

        /* ── DESTINATION CARDS: Horizontal Snap Scroll ── */
        .destinations-grid {
            display: flex !important;
            flex-direction: row !important;
            overflow-x: auto !important;
            scroll-snap-type: x mandatory !important;
            -webkit-overflow-scrolling: touch !important;
            scrollbar-width: none !important;
            gap: 12px !important;
            padding-bottom: 8px !important;
            margin: 0 -4px !important;
        }
        .destinations-grid::-webkit-scrollbar { display: none; }
        .destinations-grid > * {
            flex: 0 0 76vw !important;
            max-width: 300px !important;
            scroll-snap-align: start !important;
            height: 220px !important;
        }
        .destination-card { height: 220px !important; }

        /* ── STATS / FEATURE GRIDS ── */
        /* 4-col → 2×2 grid */
        [class*="grid-cols-4"] { grid-template-columns: repeat(2, 1fr) !important; gap: 12px !important; }
        [class*="grid-cols-3"] { grid-template-columns: 1fr !important; gap: 12px !important; }
        [class*="grid-cols-2"] { grid-template-columns: 1fr 1fr !important; gap: 10px !important; }

        /* ── BUTTONS: Minimum tap size ── */
        .btn-magical { min-height: 48px !important; padding: 12px 20px !important; font-size: 14px !important; border-radius: 14px !important; }

        /* ── GLASS WIDGETS on Mobile ── */
        .glass-widget { padding: 16px !important; border-radius: 20px !important; }

        /* ── SECTION SPACING ── */
        section, [class*="py-20"], [class*="py-32"] { padding-top: 36px !important; padding-bottom: 36px !important; }
        [class*="mb-16"] { margin-bottom: 24px !important; }
        [class*="mb-10"] { margin-bottom: 16px !important; }
        [class*="mt-16"] { margin-top: 24px !important; }

        /* ── FOOTER: Compact Mobile ── */
        footer .grid { grid-template-columns: 1fr !important; gap: 28px !important; }
        footer .lg\:col-span-2 { grid-column: 1 / -1 !important; }
        footer p.text-slate-400 { font-size: 13px !important; line-height: 1.6 !important; }
        footer h4 { font-size: 15px !important; margin-bottom: 0 !important; padding: 12px 0 !important; border-bottom: 1px solid rgba(255,255,255,0.05); }
        footer ul { padding-top: 16px !important; }
        footer ul li a, footer ul li { font-size: 13px !important; }
        footer [class*="px-6"] { padding-left: 16px !important; padding-right: 16px !important; }
        footer .mb-20 { margin-bottom: 40px !important; }

        /* ── MICRO-UTILITIES CARDS ── */
        .glass-widget input { height: 44px !important; font-size: 14px !important; }
        .glass-widget h4 { font-size: 14px !important; }
        .glass-widget p { font-size: 11px !important; }

        /* ── NAV COMPACT ── */
        nav.glass-nav { padding: 10px 14px !important; }

        /* ── MODAL FORMS ── */
        .fixed.inset-0 input { height: 52px !important; font-size: 15px !important; }
    }

    @media (min-width: 1024px) {
        .mobile-only { display: none !important; }
        /* Show desktop pill tabs on desktop */
        #desktop-tab-strip { display: flex !important; }
        .destinations-grid { display: grid; }
    }
</style>

<body class="antialiased min-h-screen flex flex-col bg-[#030712] text-white" 
      x-data="{ 
        tab: 'flights', 
        transferMode: 'airport',
        flightConfirmed: false,
        insuranceData: null,
        visaResult: null,
        searchOrigin: 'LOS',
        searchDest: 'LHR',
        flightResults: [],
        searching: false,
        recommended: null,
        showLeadModal: false,
        leadContext: 'Global Mobility',
        leadMessage: 'I am interested in exploring the iSwitch ecosystem.',
        newsletterEmail: '',
        alertModal: false,
        priceRadar: false,
        popover: null,
        currentCurrency: 'USD',
        currencySymbol: '$',
        currentLang: 'EN',
        
        switchCurrency(code, symbol) {
            this.currentCurrency = code;
            this.currencySymbol = symbol;
        },
        switchLang(code) {
            this.currentLang = code;
        },

        /* ── AUTH MODAL ── */
        showAuthModal: false,
        authMode: 'login',
        authName: '',
        authEmail: '',
        authPassword: '',
        authConfirm: '',
        authLoading: false,
        isAgency: false,
        authError: '',
        authSuccess: '',
        
        // Agency Specific Fields
        agencyName: '',
        agencyReg: '',
        agencyAddress: '',
        agencyFiles: {
            cert: null,
            utility: null,
            photo: null,
            id: null
        },

        openAuth(mode = 'login') {
            this.authMode = mode;
            this.authError = '';
            this.authSuccess = '';
            this.showAuthModal = true;
        },

        async submitAuth() {
            this.authLoading = true;
            this.authError = '';
            this.authSuccess = '';
            const endpoint = this.authMode === 'login' ? '/api/login' : '/api/register';
            
            let formData = new FormData();
            formData.append('email', this.authEmail);
            formData.append('password', this.authPassword);
            
            if (this.authMode === 'register') {
                formData.append('name', this.authName);
                formData.append('password_confirmation', this.authConfirm);
                formData.append('role', this.isAgency ? 'agent' : 'customer');
                
                if (this.isAgency) {
                    formData.append('company_registration_name', this.agencyReg);
                    formData.append('business_name', this.agencyName);
                    formData.append('address', this.agencyAddress);
                    
                    if (this.agencyFiles.cert) formData.append('registration_document', this.agencyFiles.cert);
                    if (this.agencyFiles.utility) formData.append('utility_bill', this.agencyFiles.utility);
                    if (this.agencyFiles.photo) formData.append('passport_photo', this.agencyFiles.photo);
                    if (this.agencyFiles.id) formData.append('government_id', this.agencyFiles.id);
                }
            }

            try {
                const res = await fetch(endpoint, {
                    method: 'POST',
                    headers: { 'Accept': 'application/json' },
                    body: formData
                });
                const data = await res.json();
                if (!res.ok) {
                    this.authError = data.message || Object.values(data.errors || {})[0]?.[0] || 'Something went wrong.';
                } else {
                    if (data.access_token) localStorage.setItem('iswitch_token', data.access_token);
                    this.authSuccess = data.message || (this.authMode === 'login' ? 'Welcome back! Redirecting...' : 'Account created! Welcome aboard!');
                    
                    if (data.status === 'pending_approval' || (data.user && data.user.role === 'agent' && !data.user.is_approved)) {
                        this.authSuccess = "B2B Registration Received. Your account is pending administrative approval.";
                        setTimeout(() => { this.showAuthModal = false; }, 3000);
                    } else {
                        setTimeout(() => { window.location.href = '/user'; }, 1500);
                    }
                }
            } catch(e) {
                this.authError = 'Network error. Please try again.';
            } finally {
                this.authLoading = false;
            }
        },
        
        async submitLead(email, type = 'newsletter', payload = null) {
            this.searching = true;
            try {
                const response = await fetch('/api/v1/leads', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ email, type, payload })
                });
                const data = await response.json();
                alert(data.message);
                this.newsletterEmail = '';
                if(this.alertModal) this.alertModal = false;
            } catch (e) {
                alert('Connection failed. Please check your network.');
            } finally {
                this.searching = false;
            }
        },

        async fetchFlights() {
            this.searching = true;
            try {
                const response = await fetch(`/api/v1/flights/search?origin=${this.searchOrigin}&destination=${this.searchDest}`);
                this.flightResults = await response.json();
                this.flightConfirmed = true;
                if(this.searchDest.toLowerCase().includes('lon') || this.searchDest.toLowerCase().includes('cdg')) {
                    this.recommended = 'schengen';
                }
            } catch (e) {
                console.error('Flight Search Failed', e);
            } finally {
                this.searching = false;
            }
        },
        async verifyVisa() {
            this.searching = true;
            try {
                const response = await fetch(`/api/v1/visa/check?passport=NGA&destination=${this.searchDest}`);
                const data = await response.json();
                this.visaResult = data;
                
                // Also pre-fetch insurance for this region
                const region = this.searchDest.toLowerCase().includes('france') ? 'schengen' : 'worldwide';
                const insResponse = await fetch(`/api/v1/insurance/quote?region=${region}`);
                this.insuranceData = await insResponse.json();

                alert(`iSwitch Intelligence: Probability ${data.probability}. ${this.insuranceData.name} identified at $${this.insuranceData.price}.`);
                
                this.showLeadModal = true;
                this.leadContext = 'Visa & Immigration';
                this.leadMessage = `I noticed a ${data.probability} approval probability and a ${this.insuranceData.name} policy for ${this.searchDest}. I want to proceed.`;
            } catch (e) {
                console.error('Visa Check Failed', e);
            } finally {
                this.searching = false;
            }
        },
        async fetchTours() {
            this.searching = true;
            try {
                const response = await fetch(`/api/v1/tours/search?q=${this.searchDest}`);
                const data = await response.json();
                alert(`iSwitch Discovery: Found ${data.length} curated experiences in ${this.searchDest}.`);
                this.showLeadModal = true;
                this.leadContext = 'Experience Specialist';
                this.leadMessage = `I want to explore the ${data[0].name} in ${this.searchDest}.`;
            } finally {
                this.searching = false;
            }
        },
        async fetchTransfers() {
            this.searching = true;
            try {
                const response = await fetch(`/api/v1/logistics/quote`);
                const data = await response.json();
                alert(`iSwitch Logistics: ${data[0].vehicle} identified for arrival. Pricing is $${data[0].price}.`);
                this.showLeadModal = true;
                this.leadContext = 'Logistics Specialist';
                this.leadMessage = `I want to secure the ${data[0].vehicle} meet-and-greet service.`;
            } finally {
                this.searching = false;
            }
        }
      }">

    <!-- ═══════════════════════════════════════════════════════════
         AUTH MODAL: Sign In / Register — Slide Up Sheet
         Replaces all /user/login and /register page navigations
    ═══════════════════════════════════════════════════════════ -->
    <div x-show="showAuthModal"
         class="fixed inset-0 z-[200] flex items-end lg:items-center justify-center"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display:none;">

        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" @click="showAuthModal = false"></div>

        <!-- Sheet -->
        <div class="relative w-full max-w-md bg-[#080c18] border border-white/10 rounded-t-[2.5rem] lg:rounded-[2.5rem] p-7 pb-10 shadow-2xl z-10"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="translate-y-full lg:translate-y-0 lg:scale-95 opacity-0"
             x-transition:enter-end="translate-y-0 lg:scale-100 opacity-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="translate-y-0 lg:scale-100 opacity-100"
             x-transition:leave-end="translate-y-full lg:translate-y-0 lg:scale-95 opacity-0">

            <!-- Drag handle (mobile only) -->
            <div class="w-10 h-1 rounded-full bg-white/20 mx-auto mb-6 lg:hidden"></div>

            <!-- Close -->
            <button @click="showAuthModal = false" class="absolute top-6 right-6 w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>

            <!-- Logo & Brand -->
            <div class="flex items-center gap-3 mb-6">
                <img src="/iswitch_brand_logo.png" onerror="this.onerror=null;this.src='https://iswitch.onrender.com/iswitch_brand_logo.png'" class="h-8 w-auto">
                <span class="font-black text-white text-lg">iSwitch</span>
            </div>

            <!-- Mode Tab Selector -->
            <div class="flex bg-white/5 rounded-2xl p-1 mb-6 border border-white/8">
                <button @click="authMode = 'login'; authError = ''; authSuccess = ''"
                        :class="authMode === 'login' ? 'bg-brand-orange text-white shadow-lg shadow-brand-orange/30' : 'text-slate-400 hover:text-white'"
                        class="flex-1 py-2.5 rounded-xl text-sm font-black transition-all">
                    Sign In
                </button>
                <button @click="authMode = 'register'; authError = ''; authSuccess = ''"
                        :class="authMode === 'register' ? 'bg-brand-orange text-white shadow-lg shadow-brand-orange/30' : 'text-slate-400 hover:text-white'"
                        class="flex-1 py-2.5 rounded-xl text-sm font-black transition-all">
                    Create Account
                </button>
            </div>

            <!-- Error / Success -->
            <div x-show="authError" class="mb-4 px-4 py-3 bg-red-500/15 border border-red-500/30 rounded-xl text-red-400 text-sm font-medium" x-text="authError"></div>
            <div x-show="authSuccess" class="mb-4 px-4 py-3 bg-emerald-500/15 border border-emerald-500/30 rounded-xl text-emerald-400 text-sm font-medium flex items-center gap-2">
                <i class="fa-solid fa-circle-check"></i> <span x-text="authSuccess"></span>
            </div>

            <!-- Form -->
            <form @submit.prevent="submitAuth()" class="flex flex-col gap-4">

                <!-- Name (register only) -->
                <div x-show="authMode === 'register'" class="relative">
                    <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                    <input type="text" x-model="authName" placeholder="Full Name" autocomplete="name"
                           class="w-full bg-white/5 border border-white/10 rounded-2xl pl-11 pr-4 py-3.5 text-white placeholder-slate-500 outline-none focus:border-brand-orange/60 transition-all text-sm font-medium">
                </div>

                <!-- Email -->
                <div class="relative">
                    <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                    <input type="email" x-model="authEmail" placeholder="Email Address" autocomplete="email" required
                           class="w-full bg-white/5 border border-white/10 rounded-2xl pl-11 pr-4 py-3.5 text-white placeholder-slate-500 outline-none focus:border-brand-orange/60 transition-all text-sm font-medium">
                </div>

                <!-- Password -->
                <div class="relative">
                    <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                    <input type="password" x-model="authPassword" placeholder="Password" autocomplete="current-password" required
                           class="w-full bg-white/5 border border-white/10 rounded-2xl pl-11 pr-4 py-3.5 text-white placeholder-slate-500 outline-none focus:border-brand-orange/60 transition-all text-sm font-medium">
                </div>

                <!-- Confirm Password (register only) -->
                <div x-show="authMode === 'register'" class="relative">
                    <i class="fa-solid fa-shield-check absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                    <input type="password" x-model="authConfirm" placeholder="Confirm Password" autocomplete="new-password"
                           class="w-full bg-white/5 border border-white/10 rounded-2xl pl-11 pr-4 py-3.5 text-white placeholder-slate-500 outline-none focus:border-brand-orange/60 transition-all text-sm font-medium">
                </div>

                <!-- B2B Agency Toggle -->
                <div x-show="authMode === 'register'" class="mt-2 space-y-4">
                    <div class="flex items-center justify-between p-4 bg-white/5 border border-white/10 rounded-2xl">
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-white">Agency Registration</p>
                            <p class="text-[9px] text-slate-500 font-bold uppercase tracking-tight">Become an iSwitch B2B Partner</p>
                        </div>
                        <button type="button" @click="isAgency = !isAgency" 
                                :class="isAgency ? 'bg-brand-emerald shadow-lg shadow-emerald-500/20' : 'bg-white/10'"
                                class="w-12 h-6 rounded-full relative transition-all duration-300">
                            <div :class="isAgency ? 'translate-x-6' : 'translate-x-1'" class="absolute top-1 left-0 w-4 h-4 bg-white rounded-full transition-transform"></div>
                        </button>
                    </div>

                    <!-- Agency Specific Fields -->
                    <div x-show="isAgency" x-transition class="space-y-4 border-l-2 border-brand-emerald/30 pl-4 mt-4">
                        <div class="space-y-3">
                            <p class="text-[9px] text-slate-500 font-black uppercase tracking-widest">Business Identity (KYB)</p>
                            <input type="text" x-model="agencyName" placeholder="Agency / Business Name" class="w-full bg-white/3 border border-white/5 rounded-xl px-4 py-3 text-white text-xs outline-none focus:border-brand-emerald/50">
                            <input type="text" x-model="agencyReg" placeholder="Registration Number (ID)" class="w-full bg-white/3 border border-white/5 rounded-xl px-4 py-3 text-white text-xs outline-none focus:border-brand-emerald/50">
                            <textarea x-model="agencyAddress" placeholder="Physical Business Address" rows="2" class="w-full bg-white/3 border border-white/5 rounded-xl px-4 py-3 text-white text-xs outline-none focus:border-brand-emerald/50 resize-none"></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div class="space-y-1">
                                <label class="text-[8px] font-black uppercase tracking-widest text-slate-600 block">Certificate</label>
                                <input type="file" @change="agencyFiles.cert = $event.target.files[0]" class="hidden" id="reg-cert">
                                <label for="reg-cert" class="block w-full text-center py-2 bg-white/5 border border-dashed border-white/20 rounded-lg text-[9px] text-slate-400 cursor-pointer overflow-hidden whitespace-nowrap px-2" x-text="agencyFiles.cert ? agencyFiles.cert.name : '+ Upload'"></label>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[8px] font-black uppercase tracking-widest text-slate-600 block">Utility Bill</label>
                                <input type="file" @change="agencyFiles.utility = $event.target.files[0]" class="hidden" id="util-bill">
                                <label for="util-bill" class="block w-full text-center py-2 bg-white/5 border border-dashed border-white/20 rounded-lg text-[9px] text-slate-400 cursor-pointer overflow-hidden whitespace-nowrap px-2" x-text="agencyFiles.utility ? agencyFiles.utility.name : '+ Upload'"></label>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[8px] font-black uppercase tracking-widest text-slate-600 block">Rep. Passport</label>
                                <input type="file" @change="agencyFiles.photo = $event.target.files[0]" class="hidden" id="rep-photo">
                                <label for="rep-photo" class="block w-full text-center py-2 bg-white/5 border border-dashed border-white/20 rounded-lg text-[9px] text-slate-400 cursor-pointer overflow-hidden whitespace-nowrap px-2" x-text="agencyFiles.photo ? agencyFiles.photo.name : '+ Upload'"></label>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[8px] font-black uppercase tracking-widest text-slate-600 block">National ID</label>
                                <input type="file" @change="agencyFiles.id = $event.target.files[0]" class="hidden" id="gov-id">
                                <label for="gov-id" class="block w-full text-center py-2 bg-white/5 border border-dashed border-white/20 rounded-lg text-[9px] text-slate-400 cursor-pointer overflow-hidden whitespace-nowrap px-2" x-text="agencyFiles.id ? agencyFiles.id.name : '+ Upload'"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit" :disabled="authLoading"
                        class="btn-magical w-full py-4 rounded-2xl font-black text-white text-sm mt-2 flex items-center justify-center gap-2 transition-all">
                    <span x-show="!authLoading" x-text="authMode === 'login' ? 'Sign In to iSwitch' : 'Create My Account'"></span>
                    <span x-show="authLoading" class="flex items-center gap-2">
                        <i class="fa-solid fa-spinner animate-spin"></i> Please wait...
                    </span>
                </button>
            </form>

            <!-- Social proof -->
            <p class="text-center text-slate-500 text-xs mt-5">
                Join <span class="text-brand-orange font-bold">50,000+</span> global movers on iSwitch
            </p>
        </div>
    </div>

    <!-- ================= LEAD CAPTURE MODAL (The Converter) ================= -->
    <div x-show="showLeadModal" 
         class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-slate-950/80 backdrop-blur-xl"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none;">
        
        <div class="bg-[#0b0c10] border border-white/10 w-full max-w-xl rounded-[40px] p-6 lg:p-12 relative overflow-y-auto max-h-[90vh] shadow-[0_20px_100px_rgba(0,0,0,1)]"
             @click.away="showLeadModal = false">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-brand-orange/10 blur-[100px] rounded-full"></div>
            
            <button @click="showLeadModal = false" class="absolute top-8 right-8 text-slate-500 hover:text-white transition-colors text-2xl">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-orange/10 border border-brand-orange/20 mb-6">
                    <span class="w-1.5 h-1.5 rounded-full bg-brand-orange animate-pulse"></span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-brand-orange" x-text="'Expert Consultation: ' + leadContext"></span>
                </div>
                
                <h2 class="text-3xl lg:text-4xl font-black text-white mb-4 leading-tight">Ready to <span class="text-brand-orange italic font-serif">Switch?</span></h2>
                <p class="text-slate-400 text-sm mb-10 leading-relaxed" x-text="'One of our ' + leadContext + ' specialists will review your profile instantly. No account required to start.'"></p>

                <form @submit.prevent="showLeadModal = false; alert('Lead Captured Successfully! Redirecting to specialist...')" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1">Full Identity</label>
                            <input type="text" placeholder="Mr. Henderson" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white outline-none focus:border-brand-orange/50 transition-all font-bold placeholder-slate-700">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1">WhatsApp / Email</label>
                            <input type="text" placeholder="+1 234..." class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white outline-none focus:border-brand-orange/50 transition-all font-bold placeholder-slate-700">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1">Your Intent</label>
                        <textarea x-model="leadMessage" rows="3" class="w-full bg-white/5 border border-white/10 rounded-3xl px-6 py-4 text-white outline-none focus:border-brand-orange/50 transition-all font-bold placeholder-slate-700 resize-none"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-brand-orange text-white font-black uppercase tracking-widest py-6 rounded-2xl shadow-2xl hover:scale-[1.02] active:scale-95 transition-all text-xs flex items-center justify-center gap-3">
                        Initiate Specialist Sync <i class="fa-solid fa-bolt"></i>
                    </button>
                </form>

                <p class="text-[9px] text-slate-600 mt-8 text-center uppercase tracking-widest font-bold">
                    <i class="fa-solid fa-shield-halved mr-1"></i> Biometric Data Securely Stored in Your Vault
                </p>
            </div>
        </div>
    </div>

    <!-- Hero Backdrops -->
    <div class="hero-bg"></div>
    <div class="hero-gradient"></div>
    <div class="ambient-glow top-0 right-0"></div>
    <div class="ambient-glow bottom-0 left-0" style="background: radial-gradient(circle, rgba(0,200,151,0.08) 0%, transparent 70%);"></div>

    <!-- Navigation -->
    <nav x-data="{ mobileMenuOpen: false, scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)" 
         :class="{'glass-nav py-3' : scrolled, 'py-6 bg-transparent' : !scrolled}" 
         class="fixed top-0 w-full z-50 transition-all duration-500">
        <div class="max-w-[90rem] mx-auto px-6 flex justify-between items-center">
            
            <!-- Brand Logo (High Fidelity) -->
            <a href="/" class="flex items-center gap-2 group relative z-50">
                <img src="/iswitch_brand_logo.png" class="h-10 sm:h-12 w-auto shadow-[0_0_15px_rgba(255,255,255,0.05)] transform group-hover:scale-105 rounded-xl sm:rounded-2xl transition-all duration-500" alt="iSwitch Logo">
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center bg-white/5 border border-white/10 rounded-full px-2 py-1.5 backdrop-blur-md">
                <a href="#search-engine" class="px-5 py-2 text-sm font-semibold text-slate-300 hover:text-white hover:bg-white/10 rounded-full transition-all">Search Engine</a>
                <a href="#features" class="px-5 py-2 text-sm font-semibold text-slate-300 hover:text-white hover:bg-white/10 rounded-full transition-all">Inside the Vault</a>
                
                <!-- Consultations Dropdown -->
                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="px-5 py-2 text-sm font-semibold text-slate-300 hover:text-white hover:bg-white/10 rounded-full transition-all flex items-center gap-2">
                        Consultations <i class="fa-solid fa-chevron-down text-[10px] opacity-70 group-hover:rotate-180 transition-transform"></i>
                    </button>
                    <!-- Dropdown -->
                    <div x-show="open" x-transition.opacity class="absolute top-full right-0 mt-3 w-64 glass-widget p-3 z-50 rounded-2xl border border-white/10 shadow-2xl">
                        <a @click="showLeadModal = true; leadContext = 'Educational Placement'; leadMessage = 'I am interested in the Study Abroad program and university admissions support.'" class="flex gap-4 items-start p-3 hover:bg-white/5 rounded-xl transition-colors cursor-pointer">
                            <div class="text-brand-orange mt-0.5"><i class="fa-solid fa-graduation-cap"></i></div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Study Abroad</h4>
                                <p class="text-[11px] text-slate-400 mt-1">Visas & Admissions</p>
                            </div>
                        </a>
                        <a @click="showLeadModal = true; leadContext = 'Migration Expert'; leadMessage = 'I need professional support for a Work & Migrate relocation package.'" class="flex gap-4 items-start p-3 hover:bg-white/5 rounded-xl transition-colors cursor-pointer">
                            <div class="text-brand-emerald mt-0.5"><i class="fa-solid fa-briefcase"></i></div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Work & Migrate</h4>
                                <p class="text-[11px] text-slate-400 mt-1">Immigration support</p>
                            </div>
                        </a>
                        <a @click="showLeadModal = true; leadContext = 'Corporate Concierge'; leadMessage = 'I want to discuss a Corporate Relocation or offshore business setup.'" class="flex gap-4 items-start p-3 hover:bg-white/5 rounded-xl transition-colors cursor-pointer">
                            <div class="text-blue-400 mt-0.5"><i class="fa-solid fa-building"></i></div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Business Setup</h4>
                                <p class="text-[11px] text-slate-400 mt-1">Corporate relocation</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Global Controls & Auth CTA -->
            <div class="hidden lg:flex gap-4 items-center">
                <!-- Currency Switcher -->
                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="flex items-center gap-1 text-sm font-semibold text-slate-300 hover:text-white transition-colors">
                        USD <i class="fa-solid fa-chevron-down text-[10px] opacity-70"></i>
                    </button>
                    <div x-show="open" x-transition.opacity class="absolute top-full right-0 mt-2 w-24 glass-widget p-2 z-50 rounded-xl border border-white/10 shadow-2xl">
                        <a href="#" class="block px-3 py-1 text-xs text-brand-orange font-bold hover:bg-white/10 rounded-md">USD ($)</a>
                        <a href="#" class="block px-3 py-1 text-xs text-white hover:bg-white/10 rounded-md">EUR (€)</a>
                        <a href="#" class="block px-3 py-1 text-xs text-white hover:bg-white/10 rounded-md">GBP (£)</a>
                        <a href="#" class="block px-3 py-1 text-xs text-white hover:bg-white/10 rounded-md">NGN (₦)</a>
                    </div>
                </div>

                <!-- Language Switcher -->
                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="flex items-center gap-1 text-sm font-semibold text-slate-300 hover:text-white transition-colors">
                        <i class="fa-solid fa-globe text-brand-emerald"></i> EN <i class="fa-solid fa-chevron-down text-[10px] opacity-70"></i>
                    </button>
                    <div x-show="open" x-transition.opacity class="absolute top-full right-0 mt-2 w-32 glass-widget p-2 z-50 rounded-xl border border-white/10 shadow-2xl">
                        <a href="#" class="block px-3 py-1 text-xs text-brand-emerald font-bold hover:bg-white/10 rounded-md">English (EN)</a>
                        <a href="#" class="block px-3 py-1 text-xs text-white hover:bg-white/10 rounded-md">French (FR)</a>
                        <a href="#" class="block px-3 py-1 text-xs text-white hover:bg-white/10 rounded-md">Spanish (ES)</a>
                        <a href="#" class="block px-3 py-1 text-xs text-white hover:bg-white/10 rounded-md">Arabic (AR)</a>
                    </div>
                </div>

                <div class="w-px h-6 bg-white/10 mx-2"></div>

                <a href="/agent" class="text-sm font-bold text-slate-300 hover:text-brand-emerald transition-colors">Partners</a>
                @auth
                    <a href="/user" class="text-sm font-bold text-brand-orange hover:text-orange-400 transition-colors">Go to Portal</a>
                @else
                    <a @click.prevent="openAuth('login')" href="#" class="text-sm font-bold text-white hover:text-brand-orange transition-colors">Sign In</a>
                @endauth
                <a @click.prevent="openAuth('register')" href="#" class="btn-magical px-6 py-2.5 rounded-full text-sm font-bold text-white ml-2">
                    Premium Setup
                </a>
            </div>

            <!-- Hamburger Button & Mobile Auth (Mobile) -->
            <div class="lg:hidden flex items-center gap-2 sm:gap-3 z-50 relative">
                <!-- Mobile Selectors (Currency/Lang) -->
                <div class="hidden sm:flex items-center gap-2 mr-1">
                    <button class="text-[9px] font-black text-slate-400 bg-white/5 border border-white/10 px-2 py-1 rounded-md uppercase tracking-tighter">USD $</button>
                    <button class="text-[9px] font-black text-slate-400 bg-white/5 border border-white/10 px-2 py-1 rounded-md uppercase tracking-tighter">EN</button>
                </div>

                <div class="flex items-center bg-white/10 rounded-full p-0.5 backdrop-blur-md border border-white/5">
                    <a @click.prevent="openAuth('login')" href="#" class="text-white text-[10px] sm:text-xs font-bold px-3 py-1.5 rounded-full hover:bg-white/10 transition-colors">
                        Sign In
                    </a>
                    <a @click.prevent="openAuth('register')" href="#" class="text-white text-[10px] sm:text-xs font-bold bg-brand-orange px-3 py-1.5 rounded-full shadow-sm shadow-brand-orange/20">
                        Register
                    </a>
                </div>
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white text-xl sm:text-2xl focus:outline-none px-1">
                    <i class="fa-solid" :class="mobileMenuOpen ? 'fa-xmark' : 'fa-bars-staggered'"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div x-show="mobileMenuOpen" x-transition class="fixed inset-0 bg-slate-900/95 backdrop-blur-xl z-40 lg:hidden flex flex-col pt-24 px-6 pb-6 overflow-y-auto">
            <div class="flex flex-col gap-6 text-xl font-bold">
                <a href="#search-engine" @click="mobileMenuOpen = false" class="text-white border-b border-white/10 pb-4">Booking Engine</a>
                <a href="#features" @click="mobileMenuOpen = false" class="text-white border-b border-white/10 pb-4">The Vault</a>
                
                <div class="text-slate-400 text-sm tracking-widest uppercase mt-4 mb-2">Consultations</div>
                <a @click="mobileMenuOpen = false; showLeadModal = true; leadContext = 'Study Abroad'; leadMessage = 'I am interested in Study Abroad and Admissions support.'" class="text-brand-orange border-b border-white/10 pb-4 flex items-center gap-3 cursor-pointer"><i class="fa-solid fa-graduation-cap"></i> Study Abroad</a>
                <a @click="mobileMenuOpen = false; showLeadModal = true; leadContext = 'Work & Migrate'; leadMessage = 'I want to discuss Work & Migrate relocation support.'" class="text-brand-emerald border-b border-white/10 pb-4 flex items-center gap-3 cursor-pointer"><i class="fa-solid fa-briefcase"></i> Work & Migrate</a>
                <div class="mt-8 flex flex-col gap-4">
                    <div class="grid grid-cols-2 gap-3 mb-2">
                         <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="w-full text-center text-xs py-3 rounded-xl bg-white/5 border border-white/10 text-slate-400 font-bold uppercase tracking-widest flex items-center justify-center gap-2">
                                <i class="fa-solid fa-dollar-sign"></i> <span x-text="currentCurrency"></span> <i class="fa-solid fa-chevron-down text-[8px]"></i>
                            </button>
                            <div x-show="open" @click.away="open = false" class="absolute bottom-full left-0 w-full mb-2 glass-widget p-2 rounded-xl border border-white/10 z-50">
                                <a href="#" @click.prevent="switchCurrency('USD', '$'); open = false" class="block p-2 text-[10px] font-bold" :class="currentCurrency === 'USD' ? 'text-brand-orange' : 'text-white'">USD ($)</a>
                                <a href="#" @click.prevent="switchCurrency('NGN', '₦'); open = false" class="block p-2 text-[10px] font-bold" :class="currentCurrency === 'NGN' ? 'text-brand-orange' : 'text-white'">NGN (₦)</a>
                                <a href="#" @click.prevent="switchCurrency('GBP', '£'); open = false" class="block p-2 text-[10px] font-bold" :class="currentCurrency === 'GBP' ? 'text-brand-orange' : 'text-white'">GBP (£)</a>
                            </div>
                         </div>
                         <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="w-full text-center text-xs py-3 rounded-xl bg-white/5 border border-white/10 text-slate-400 font-bold uppercase tracking-widest flex items-center justify-center gap-2">
                                <i class="fa-solid fa-globe"></i> <span x-text="currentLang"></span> <i class="fa-solid fa-chevron-down text-[8px]"></i>
                            </button>
                            <div x-show="open" @click.away="open = false" class="absolute bottom-full left-0 w-full mb-2 glass-widget p-2 rounded-xl border border-white/10 z-50">
                                <a href="#" @click.prevent="switchLang('EN'); open = false" class="block p-2 text-[10px] font-bold" :class="currentLang === 'EN' ? 'text-brand-emerald' : 'text-white'">English</a>
                                <a href="#" @click.prevent="switchLang('FR'); open = false" class="block p-2 text-[10px] font-bold" :class="currentLang === 'FR' ? 'text-brand-emerald' : 'text-white'">French</a>
                            </div>
                         </div>
                    </div>
                    <a @click.prevent="openAuth('login')" href="#" class="text-center text-lg py-4 rounded-2xl bg-white/5 border border-white/10">Sign In</a>
                    <a @click.prevent="openAuth('register')" href="#" class="btn-magical text-center text-lg py-4 rounded-2xl">Register Now</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ULTRA PREMIUM HERO -->
    <main class="flex-grow flex flex-col items-center justify-center pt-40 md:pt-40 lg:pt-40 pb-20 px-4 sm:px-6 relative z-10 w-full max-w-[90rem] mx-auto overflow-hidden">
        
        <div class="text-center mb-6 lg:mb-16 w-full max-w-5xl mx-auto">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800/30 border border-slate-700/30 backdrop-blur-md mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-brand-emerald animate-pulse"></span>
                <span class="text-[9px] font-black text-slate-400 tracking-widest uppercase">The Future of Mobility</span>
            </div>
            
            <h1 class="text-4xl sm:text-5xl md:text-7xl lg:text-[6rem] font-black leading-none tracking-tighter mb-4">
                <span class="text-gradient">Limitless Travel.</span><br class="hidden sm:block">
                <span class="text-gradient-orange">Zero Friction.</span>
            </h1>
            <p class="text-sm md:text-2xl text-slate-400 max-w-xl mx-auto font-medium leading-relaxed opacity-80">
                Connect flights, stays, and visas in one intelligent vault.
            </p>
        </div>

        <div id="mobile-svc-grid" class="flex items-center gap-4 mb-2 md:mb-8 w-full max-w-6xl mx-auto overflow-x-auto scrolling-touch px-4 pb-6 scrollbar-hide">
            <!-- Row 1 -->
            <button type="button" @click="tab = 'flights'" class="svc-tile bg-white/5 border border-white/10 rounded-2xl flex flex-col items-center p-6 min-w-[125px] transition-all" :class="tab === 'flights' ? 'active-tab border-brand-orange ring-1 ring-brand-orange/20' : ''">
                <div class="svc-icon bg-orange-500/15 text-orange-400 w-12 h-12 rounded-xl flex items-center justify-center text-xl mb-3"><i class="fa-solid fa-plane"></i></div>
                <div class="svc-label text-xs font-bold text-slate-400">Flights</div>
            </button>
            <button type="button" @click="tab = 'hotels'" class="svc-tile bg-white/5 border border-white/10 rounded-2xl flex flex-col items-center p-6 min-w-[125px] transition-all" :class="tab === 'hotels' ? 'active-tab border-brand-emerald ring-1 ring-brand-emerald/20' : ''">
                <div class="svc-icon bg-emerald-500/15 text-emerald-400 w-12 h-12 rounded-xl flex items-center justify-center text-xl mb-3"><i class="fa-solid fa-bed"></i></div>
                <div class="svc-label text-xs font-bold text-slate-400">Hotels</div>
            </button>
            <button type="button" @click="tab = 'visas'" class="svc-tile bg-white/5 border border-white/10 rounded-2xl flex flex-col items-center p-6 min-w-[125px] transition-all" :class="tab === 'visas' ? 'active-tab border-blue-500 ring-1 ring-blue-500/20' : ''">
                <div class="svc-icon bg-blue-500/15 text-blue-400 w-12 h-12 rounded-xl flex items-center justify-center text-xl mb-3"><i class="fa-solid fa-passport"></i></div>
                <div class="svc-label text-xs font-bold text-slate-400">Visas</div>
            </button>
            <button type="button" @click="tab = 'insurance'" class="svc-tile bg-white/5 border border-white/10 rounded-2xl flex flex-col items-center p-6 min-w-[125px] transition-all" :class="tab === 'insurance' ? 'active-tab border-pink-500 ring-1 ring-pink-500/20' : ''">
                <div class="svc-icon bg-pink-500/15 text-pink-400 w-12 h-12 rounded-xl flex items-center justify-center text-xl mb-3"><i class="fa-solid fa-shield-heart"></i></div>
                <div class="svc-label text-xs font-bold text-slate-400">Insurance</div>
            </button>
            <button type="button" @click="tab = 'tours'" class="svc-tile bg-white/5 border border-white/10 rounded-2xl flex flex-col items-center p-6 min-w-[125px] transition-all" :class="tab === 'tours' ? 'active-tab border-yellow-500 ring-1 ring-yellow-500/20' : ''">
                <div class="svc-icon bg-yellow-500/15 text-yellow-400 w-12 h-12 rounded-xl flex items-center justify-center text-xl mb-3"><i class="fa-solid fa-umbrella-beach"></i></div>
                <div class="svc-label text-xs font-bold text-slate-400">Tours</div>
            </button>
            <button type="button" @click="tab = 'transfers'" class="svc-tile bg-white/5 border border-white/10 rounded-2xl flex flex-col items-center p-6 min-w-[125px] transition-all" :class="tab === 'transfers' ? 'active-tab border-purple-500 ring-1 ring-purple-500/20' : ''">
                <div class="svc-icon bg-purple-500/15 text-purple-400 w-12 h-12 rounded-xl flex items-center justify-center text-xl mb-3"><i class="fa-solid fa-car"></i></div>
                <div class="svc-label text-xs font-bold text-slate-400">Pickups</div>
            </button>

            <button type="button" @click.prevent="openAuth('login')" class="svc-tile bg-white/5 border border-white/10 rounded-2xl flex flex-col items-center p-6 min-w-[120px]">
                <div class="svc-icon bg-indigo-500/15 text-indigo-400 w-12 h-12 rounded-xl flex items-center justify-center text-xl mb-3"><i class="fa-solid fa-vault"></i></div>
                <div class="svc-label text-xs font-bold text-slate-400">Vault</div>
            </button>
            <button type="button" @click="showLeadModal = true; leadContext = 'Expert Advisor'" class="svc-tile bg-white/5 border border-white/10 rounded-2xl flex flex-col items-center p-6 min-w-[120px]">
                <div class="svc-icon bg-rose-500/15 text-rose-400 w-12 h-12 rounded-xl flex items-center justify-center text-xl mb-3"><i class="fa-solid fa-user-tie"></i></div>
                <div class="svc-label text-xs font-bold text-slate-400">Experts</div>
            </button>
        </div>

        <!-- MIND BLOWING SEARCH ENGINE (Grid Architecture) -->
        <div id="search-engine" class="w-full max-w-6xl glass-widget p-3 md:p-6 pb-8 shadow-[0_20px_50px_rgba(0,0,0,0.5)] border border-white/10">
             
             <!-- ENGINE FORMS & DYNAMIC CONTENT -->
            <div class="px-2 md:px-6 relative min-h-[400px]">
                
                <!-- ================= FLIGHTS ================= -->
                <div x-show="tab === 'flights'" class="w-full" x-data="{ tripType: 'round' }">
                    
                    <!-- Integrated Control Row -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10 px-1">
                        <!-- Segmented Switcher (The Pill) -->
                        <div class="flex p-1 bg-white/5 backdrop-blur-md rounded-2xl border border-white/10 w-full max-w-sm shadow-xl">
                            <button type="button" @click="tripType = 'one'" 
                                :class="tripType === 'one' ? 'bg-white/10 text-white shadow-lg shadow-white/5 border-white/10' : 'text-slate-500 hover:text-slate-300 border-transparent'" 
                                class="flex-1 py-3 text-[10px] font-black uppercase tracking-widest rounded-xl transition-all border border-transparent">One-way</button>
                            <button type="button" @click="tripType = 'round'" 
                                :class="tripType === 'round' ? 'bg-brand-orange text-white shadow-lg shadow-brand-orange/30 border-brand-orange/20' : 'text-slate-500 hover:text-slate-300 border-transparent'" 
                                class="flex-1 py-3 text-[10px] font-black uppercase tracking-widest rounded-xl transition-all border border-transparent">Round-trip</button>
                            <button type="button" @click="tripType = 'multi'" 
                                :class="tripType === 'multi' ? 'bg-white/10 text-white shadow-lg shadow-white/5 border-white/10' : 'text-slate-500 hover:text-slate-300 border-transparent'" 
                                class="flex-1 py-3 text-[10px] font-black uppercase tracking-widest rounded-xl transition-all border border-transparent">Multi-city</button>
                        </div>

                        <!-- Price Alert Action -->
                        <div x-data="{ alertModal: false, alertEmail: '' }" class="w-full md:w-auto">
                            <button @click.prevent="alertModal = true" class="w-full md:w-auto text-[10px] font-black uppercase tracking-widest bg-brand-orange/10 hover:bg-brand-orange/20 border border-brand-orange/30 rounded-full px-6 py-3.5 transition-all text-brand-orange flex items-center justify-center gap-2 group">
                                <i class="fa-solid fa-bell group-hover:animate-bounce"></i> Price Drop Tracker
                            </button>
                            <!-- Alert Modal -->
                            <div x-show="alertModal" class="fixed inset-0 z-[1000] flex items-center justify-center p-4 bg-black/80 backdrop-blur-md" x-cloak style="display: none;">
                                <div @click.outside="alertModal = false" class="glass-widget p-8 max-w-md w-full relative border border-white/10 shadow-2xl">
                                    <button @click="alertModal = false" class="absolute top-4 right-4 text-slate-500 hover:text-white transition-colors"><i class="fa-solid fa-times text-xl"></i></button>
                                    <div class="w-16 h-16 rounded-2xl bg-brand-orange/20 border border-brand-orange/30 flex items-center justify-center mb-6">
                                        <i class="fa-solid fa-paper-plane text-brand-orange text-2xl"></i>
                                    </div>
                                    <h3 class="text-3xl font-black text-white mb-2 leading-none">Price Radar</h3>
                                    <p class="text-slate-400 text-sm mb-8 font-medium">We'll scan the global network and alert you the second this route hits your target price.</p>
                                    <form @submit.prevent="submitLead(alertEmail, 'tracker', {origin: searchOrigin, destination: searchDest})" class="space-y-4">
                                        <input type="email" x-model="alertEmail" placeholder="Elite ID or Email" required class="w-full bg-black/40 border border-white/10 rounded-2xl px-5 py-4 text-white font-bold outline-none focus:border-brand-orange transition-all placeholder:text-slate-600">
                                        <button type="submit" class="w-full bg-white text-black font-black uppercase tracking-[0.2em] text-[11px] py-5 rounded-2xl hover:bg-brand-orange hover:text-white transition-all shadow-xl shadow-white/5">Activate Radar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- iSwitch Search Engine (The Form) -->
                    <form @submit.prevent="fetchFlights()" class="flex flex-col lg:flex-row w-full bg-slate-900/40 backdrop-blur-3xl rounded-[2.5rem] lg:rounded-full divide-y lg:divide-y-0 lg:divide-x divide-white/10 shadow-[0_40px_100px_rgba(0,0,0,0.8)] border border-white/10 relative z-20 focus-within:ring-4 ring-brand-orange/20 transition-all overflow-hidden group/form">
                        
                        <!-- ORIGIN -->
                        <div class="flex-1 p-8 lg:py-6 lg:px-10 group/input cursor-text relative hover:bg-white/5 transition-colors">
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 group-focus-within/input:text-brand-orange transition-colors mb-2">Origin</label>
                            <div class="flex items-center gap-4">
                                <i class="fa-solid fa-location-dot text-slate-500 text-lg group-focus-within/input:text-brand-orange transition-colors"></i>
                                <input type="text" placeholder="Lagos (LOS)" x-model="searchOrigin" class="w-full bg-transparent outline-none text-white font-black text-xl placeholder:text-slate-800">
                            </div>
                        </div>

                        <!-- DESTINATION -->
                        <div class="flex-1 p-8 lg:py-6 lg:px-10 group/input cursor-text relative hover:bg-white/5 transition-colors">
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 group-focus-within/input:text-brand-orange transition-colors mb-2">Destination</label>
                            <div class="flex items-center gap-4">
                                <i class="fa-solid fa-plane-arrival text-slate-500 text-lg group-focus-within/input:text-brand-orange transition-colors"></i>
                                <input type="text" placeholder="London (LHR)" x-model="searchDest" class="w-full bg-transparent outline-none text-white font-black text-xl placeholder:text-slate-800">
                            </div>
                        </div>

                        <!-- DATE BLOCKS -->
                        <div class="flex-1 flex flex-col sm:flex-row divide-y sm:divide-y-0 sm:divide-x divide-white/10">
                            <!-- Departure -->
                            <div class="flex-1 p-8 lg:py-6 lg:px-10 group/input cursor-pointer relative hover:bg-white/5 transition-colors">
                                <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 group-hover/input:text-brand-orange transition-colors mb-2">Departure</label>
                                <div class="flex items-center gap-4">
                                    <i class="fa-solid fa-calendar-alt text-slate-500 text-lg group-hover/input:text-brand-orange transition-colors"></i>
                                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Add Date" class="w-full bg-transparent outline-none text-white font-black text-xl placeholder:text-slate-800">
                                </div>
                            </div>
                            <!-- Return -->
                            <div x-show="tripType === 'round'" x-transition 
                                 class="flex-1 p-8 lg:py-6 lg:px-10 group/input cursor-pointer relative bg-brand-orange/5 hover:bg-brand-orange/10 transition-colors">
                                <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover/input:text-brand-orange transition-colors mb-2">Return</label>
                                <div class="flex items-center gap-4">
                                    <i class="fa-solid fa-calendar-check text-brand-orange text-lg"></i>
                                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Return Date" class="w-full bg-transparent outline-none text-white font-black text-xl placeholder:text-slate-700">
                                </div>
                            </div>
                        </div>

                        <!-- TRAVELERS & CLASS -->
                        <div class="flex-1 p-8 lg:py-6 lg:px-10 group/input relative hover:bg-white/5 transition-colors" x-data="{ popover: false }">
                            <div @click="popover = !popover" class="cursor-pointer">
                                <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 group-hover/input:text-brand-orange transition-colors mb-2">Travelers</label>
                                <div class="flex items-center gap-4">
                                    <i class="fa-solid fa-user-group text-slate-500 text-lg group-hover/input:text-brand-orange transition-colors"></i>
                                    <span class="text-white font-black text-xl truncate">1 Adult, Economy</span>
                                </div>
                            </div>
                            <!-- Popover -->
                            <div x-show="popover" @click.outside="popover = false" x-transition class="absolute top-full left-0 lg:right-0 lg:left-auto mt-4 w-full lg:w-80 bg-[#0b0c10] border border-white/10 p-8 rounded-[2rem] shadow-2xl z-[100]" style="display: none;" x-cloak>
                                <div class="space-y-6">
                                    <div class="flex justify-between items-center">
                                        <div><h4 class="font-bold text-white text-sm">Adults</h4><p class="text-[10px] text-slate-500 uppercase tracking-widest">Age 12+</p></div>
                                        <div class="flex items-center gap-4 bg-white/5 rounded-full px-3 py-1 border border-white/10">
                                            <button type="button" class="text-slate-400 hover:text-white"><i class="fa-solid fa-minus"></i></button>
                                            <span class="text-white font-black text-sm">1</span>
                                            <button type="button" class="text-slate-400 hover:text-white"><i class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="border-t border-white/5"></div>
                                    <div>
                                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-3">Service Tier</label>
                                        <select class="w-full bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white text-sm font-bold outline-none focus:border-brand-orange">
                                            <option>Economy</option>
                                            <option>Premium Economy</option>
                                            <option>Business Class</option>
                                            <option>First Class</option>
                                        </select>
                                    </div>
                                    <button type="button" @click="popover = false" class="w-full bg-white text-black font-black uppercase tracking-[0.2em] text-[10px] py-5 rounded-2xl shadow-xl">Apply Choices</button>
                                </div>
                            </div>
                        </div>

                        <!-- SEARCH ACTION -->
                        <div class="p-6 lg:p-4 flex items-center justify-center bg-white/5 lg:bg-transparent">
                             <button type="submit" class="hidden lg:flex w-24 h-24 rounded-full bg-brand-orange text-white items-center justify-center text-3xl shadow-[0_0_40px_rgba(255,125,0,0.4)] hover:scale-110 active:scale-95 transition-all transform shrink-0" :disabled="searching">
                                <i class="fa-solid fa-search" x-show="!searching"></i>
                                <i class="fa-solid fa-spinner animate-spin" x-show="searching"></i>
                             </button>
                             <button type="submit" class="lg:hidden w-full bg-brand-orange text-white font-black py-6 rounded-[2rem] flex items-center justify-center gap-4 shadow-xl shadow-brand-orange/20 active:scale-95 transition-all text-sm uppercase tracking-[0.3em]" :disabled="searching">
                                <span x-show="!searching">Explore Fares <i class="fa-solid fa-arrow-right-long animate-pulse"></i></span>
                                <span x-show="searching"><i class="fa-solid fa-gear animate-spin"></i> Optimizing Route...</span>
                             </button>
                        </div>
                    </form>


                    <!-- Ecosystem Micro-Utilities (Tracker & Visa Checker) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                        <!-- Flight Tracker -->
                        <div class="glass-widget bg-slate-900/60 border border-white/10 rounded-2xl p-5 hover:bg-slate-900 transition-colors group">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full bg-blue-500/10 flex items-center justify-center border border-blue-500/20">
                                    <i class="fa-solid fa-plane-radar text-blue-500"></i>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-white">Live Flight Tracker</h4>
                                    <p class="text-[10px] text-slate-400">Check status in real-time</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <input type="text" placeholder="e.g. BA 123" class="w-full bg-black/50 border border-white/10 rounded-lg px-3 py-2 text-sm text-white outline-none focus:border-blue-500 transition-colors">
                                <button class="bg-white/10 hover:bg-white/20 text-white p-2 rounded-lg transition-colors border border-white/5"><i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                        </div>

                        <!-- Visa Auto-Checker -->
                        <div class="glass-widget bg-slate-900/60 border border-white/10 rounded-2xl p-5 hover:bg-slate-900 transition-colors group">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full bg-pink-500/10 flex items-center justify-center border border-pink-500/20">
                                    <i class="fa-solid fa-passport text-pink-500"></i>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-white">Visa Auto-Check</h4>
                                    <p class="text-[10px] text-slate-400">Cross-reference your Vault</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <input type="text" value="Nigeria (NG)" class="w-1/2 bg-black/50 border border-white/10 rounded-lg px-3 py-2 text-sm text-slate-300 outline-none cursor-default font-semibold" readonly title="Pulled from Vault">
                                <input type="text" placeholder="Destination" class="w-1/2 bg-black/50 border border-white/10 rounded-lg px-3 py-2 text-sm text-white outline-none focus:border-pink-500 transition-colors">
                            </div>
                        </div>

                        <!-- BNPL Showcase Promo -->
                        <div class="glass-widget bg-gradient-to-br from-brand-orange/20 to-brand-orange/5 border border-brand-orange/20 rounded-2xl p-5 relative overflow-hidden group">
                            <div class="absolute -right-6 -bottom-6 text-brand-orange/20 text-6xl group-hover:scale-110 transition-transform"><i class="fa-solid fa-wallet"></i></div>
                            <div class="relative z-10">
                                <div class="inline-block px-2 py-0.5 bg-brand-orange text-white text-[9px] font-black uppercase tracking-widest rounded mb-2 shadow-lg shadow-brand-orange/30">iSwitch Wallet</div>
                                <h4 class="text-lg font-black text-white leading-tight">Fly Now,<br>Pay Later.</h4>
                                <p class="text-[11px] text-slate-300 mt-1">Split any flight into 4 payments. <a @click="showLeadModal = true; leadContext = 'Payment Plan'; leadMessage = 'I would like to see if I qualify for the Split-into-4 Payment Plan for my flights.'" class="text-white underline font-semibold cursor-pointer">See if you qualify</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Beautiful Content Grid -->
                    <div id="vault" class="mt-16">
                        <div class="flex justify-between items-end mb-6">
                            <h3 class="text-2xl font-bold flex items-center gap-3"><i class="fa-solid fa-earth-americas text-brand-orange animate-pulse"></i> Handpicked Routes</h3>
                            <a @click="handleBottomNav('vault')" class="text-brand-orange font-semibold text-sm hover:underline cursor-pointer">Explore all <i class="fa-solid fa-arrow-right text-xs"></i></a>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 destinations-grid">
                            <!-- Card 1 -->
                            <div class="destination-card h-80 group border border-white/10">
                                <img src="https://images.unsplash.com/photo-1502602898657-3e90760abfae?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover" alt="Paris">
                                <div class="card-overlay absolute inset-0 flex flex-col justify-between p-6">
                                    <div class="self-start bg-purple-600 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full flex items-center gap-1 shadow-[0_0_15px_rgba(147,51,234,0.6)] border border-purple-400">
                                        <i class="fa-solid fa-bolt text-xs"></i> Hacker Fare - Save $250
                                    </div>
                                    <div class="flex justify-between items-end mt-auto">
                                        <div>
                                            <h4 class="text-3xl font-black text-white leading-tight">Paris</h4>
                                            <p class="text-slate-300 font-medium tracking-wide">France</p>
                                        </div>
                                        <div class="bg-black/50 backdrop-blur-md px-4 py-2 rounded-xl border border-white/10 text-right">
                                            <p class="text-[10px] uppercase text-slate-400 font-bold mb-0.5">From</p>
                                            <p class="text-brand-orange font-bold text-lg">$650</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 2 -->
                            <div class="destination-card h-80 group border border-white/10">
                                <img src="https://images.unsplash.com/photo-1499856871958-5b9627545d1a?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover" alt="New York">
                                <div class="card-overlay absolute inset-0 flex flex-col justify-between p-6">
                                    <div class="self-start bg-blue-500 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full shadow-lg shadow-blue-500/20">
                                        Trending Route
                                    </div>
                                    <div class="flex justify-between items-end mt-auto">
                                        <div>
                                            <h4 class="text-3xl font-black text-white leading-tight">New York</h4>
                                            <p class="text-slate-300 font-medium tracking-wide">United States</p>
                                        </div>
                                        <div class="bg-black/50 backdrop-blur-md px-4 py-2 rounded-xl border border-white/10 text-right">
                                            <p class="text-[10px] uppercase text-slate-400 font-bold mb-0.5">From</p>
                                            <p class="text-brand-orange font-bold text-lg">$890</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 3 -->
                            <div class="destination-card h-80 group border border-white/10 hidden lg:block">
                                <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover" alt="Dubai">
                                <div class="card-overlay absolute inset-0 flex flex-col justify-between p-6">
                                    <div class="self-start bg-brand-orange text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full shadow-lg shadow-brand-orange/20">
                                        Best Value
                                    </div>
                                    <div class="flex justify-between items-end mt-auto">
                                        <div>
                                            <h4 class="text-3xl font-black text-white leading-tight">Dubai</h4>
                                            <p class="text-slate-300 font-medium tracking-wide">United Arab Emirates</p>
                                        </div>
                                        <div class="bg-black/50 backdrop-blur-md px-4 py-2 rounded-xl border border-white/10 text-right">
                                            <p class="text-[10px] uppercase text-slate-400 font-bold mb-0.5">From</p>
                                            <p class="text-brand-orange font-bold text-lg">$420</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- === THE AVIATION LOUNGE (SUPER APP FEATURE) === -->
                        <div class="mt-16 bg-[#0B1120]/80 backdrop-blur-xl border border-white/10 rounded-3xl p-8 lg:p-12 relative overflow-hidden">
                            <!-- Ambient glow -->
                            <div class="absolute -left-32 -top-32 w-96 h-96 bg-indigo-600/20 blur-[100px] rounded-full pointer-events-none"></div>
                            
                            <div class="flex flex-col lg:flex-row gap-12 relative z-10 items-center">
                                <!-- Text & Hook -->
                                <div class="flex-1 lg:max-w-md">
                                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 mb-4">
                                        <span class="text-indigo-400"><i class="fa-solid fa-martini-glass-citrus"></i></span>
                                        <span class="text-[10px] font-bold uppercase tracking-widest text-indigo-300">The Aviation Lounge</span>
                                    </div>
                                    <h3 class="text-3xl lg:text-4xl font-black text-white leading-tight mb-4">Fly Next to Greatness.</h3>
                                    <p class="text-slate-400 mb-8 leading-relaxed">Stop flying solo. Connect with verified founders, executives, and innovators sharing your flight or airport layover. Network before you even land.</p>
                                    
                                    <div class="relative bg-black/40 border border-white/10 rounded-xl p-2 flex flex-col sm:flex-row items-center gap-2">
                                        <div class="flex items-center w-full">
                                            <i class="fa-solid fa-plane-departure text-slate-500 ml-3 mr-2"></i>
                                            <input type="text" placeholder="Flight # (e.g. EK 123)" class="bg-transparent text-white outline-none w-full text-sm placeholder-slate-500 font-semibold py-2">
                                        </div>
                                        <button class="bg-indigo-600 hover:bg-indigo-500 w-full sm:w-auto transition-colors text-white text-xs font-bold px-5 py-3 rounded-lg whitespace-nowrap shadow-[0_0_15px_rgba(79,70,229,0.5)]">Unlock Lounge</button>
                                    </div>
                                </div>

                                <!-- Live Connections Grid/Carousel Mockup -->
                                <div class="flex-1 w-full grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <!-- Connection 1 -->
                                    <div class="glass-widget bg-white/5 border border-white/10 rounded-2xl p-4 flex gap-4 items-center group cursor-pointer hover:bg-white/10 transition-colors">
                                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=200&auto=format&fit=crop" class="w-14 h-14 rounded-full object-cover border-2 border-indigo-500/50">
                                        <div>
                                            <h4 class="text-white font-bold text-sm">Sarah Jenkins</h4>
                                            <p class="text-[10px] text-slate-400 mb-1">Founder @ TechStart</p>
                                            <div class="text-[9px] font-bold text-indigo-400 uppercase tracking-widest bg-indigo-500/10 px-2 py-0.5 rounded-full inline-block">✈️ Layover DXB</div>
                                        </div>
                                    </div>
                                    <!-- Connection 2 -->
                                    <div class="glass-widget bg-white/5 border border-white/10 rounded-2xl p-4 flex gap-4 items-center group cursor-pointer hover:bg-white/10 transition-colors mt-0 sm:mt-6">
                                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=200&auto=format&fit=crop" class="w-14 h-14 rounded-full object-cover border-2 border-emerald-500/50">
                                        <div>
                                            <h4 class="text-white font-bold text-sm">Marcus Chen</h4>
                                            <p class="text-[10px] text-slate-400 mb-1">VP Ops @ GlobalTrade</p>
                                            <div class="text-[9px] font-bold text-emerald-400 uppercase tracking-widest bg-emerald-500/10 px-2 py-0.5 rounded-full inline-block">✈️ Boarding LHR</div>
                                        </div>
                                    </div>
                                    <!-- Connection 3 -->
                                    <div class="glass-widget bg-white/5 border border-white/10 rounded-2xl p-4 flex gap-4 items-center group cursor-pointer hover:bg-white/10 transition-colors">
                                        <div class="w-14 h-14 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-500">
                                            <i class="fa-solid fa-lock"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white font-bold text-sm filter blur-[2px]">Hidden Member</h4>
                                            <p class="text-[10px] text-slate-400 mb-1 filter blur-[1px]">Partner @ VC Firm</p>
                                            <div class="text-[9px] font-bold text-slate-500 uppercase tracking-widest bg-slate-800 px-2 py-0.5 rounded-full inline-block">Unlock to View</div>
                                        </div>
                                    </div>
                                    <!-- Connection 4 -->
                                    <div class="glass-widget bg-white/5 border border-white/10 rounded-2xl p-4 flex gap-4 items-center group cursor-pointer hover:bg-white/10 transition-colors mt-0 sm:mt-6 hidden sm:flex">
                                        <div class="w-14 h-14 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-500">
                                            <i class="fa-solid fa-plus font-bold text-xl"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white font-bold text-sm">24 Others</h4>
                                            <p class="text-[10px] text-slate-400 leading-tight mt-1">Networking on<br>Flight EK 123</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Brand Value Proposition (Social Proof) -->
                        <div class="mt-16 bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 border border-white/5 rounded-3xl p-8 lg:p-12 shadow-2xl relative overflow-hidden">
                            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
                            <div class="absolute -right-20 -top-20 w-64 h-64 bg-brand-orange/20 blur-[80px] rounded-full pointer-events-none"></div>
                            
                            <div class="text-center mb-10 relative z-10">
                                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 mb-4">
                                    <span class="text-brand-orange"><i class="fa-solid fa-crown"></i></span>
                                    <span class="text-[10px] font-bold uppercase tracking-widest text-slate-300">Why book with iSwitch?</span>
                                </div>
                                <h3 class="text-3xl lg:text-4xl font-black text-white leading-tight">The Ultimate Flight Experience</h3>
                                <p class="text-slate-400 mt-3 max-w-2xl mx-auto">We don’t just sell tickets. We guarantee the smoothest travel lifecycle on the planet with real-time multi-currency payments and zero gateway failures.</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10">
                                <div class="glass-widget p-6 bg-slate-900/50 hover:bg-slate-800 transition-colors border border-white/5 group">
                                    <div class="w-12 h-12 bg-blue-500/10 rounded-xl border border-blue-500/20 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-wallet text-2xl text-blue-500"></i>
                                    </div>
                                    <h4 class="font-bold text-lg text-white mb-2">Multi-Currency Wallet</h4>
                                    <p class="text-sm text-slate-400 leading-relaxed">Pay effortlessly in NGN, USD, GBP, or EUR from a single wallet. We instantly handle the forex, guaranteeing 0% payment drop-offs globally.</p>
                                </div>
                                <div class="glass-widget p-6 bg-slate-900/50 hover:bg-slate-800 transition-colors border border-white/5 group">
                                    <div class="w-12 h-12 bg-brand-emerald/10 rounded-xl border border-brand-emerald/20 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-plane-circle-check text-2xl text-brand-emerald"></i>
                                    </div>
                                    <h4 class="font-bold text-lg text-white mb-2">500+ Top Airlines</h4>
                                    <p class="text-sm text-slate-400 leading-relaxed">Through our deep market integrations, we offer real-time inventory on the world's most luxurious and reliable airlines at exclusive wholesale rates.</p>
                                </div>
                                <div class="glass-widget p-6 bg-slate-900/50 hover:bg-slate-800 transition-colors border border-white/5 group">
                                    <div class="w-12 h-12 bg-brand-orange/10 rounded-xl border border-brand-orange/20 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-headset text-2xl text-brand-orange"></i>
                                    </div>
                                    <h4 class="font-bold text-lg text-white mb-2">24/7 Global Concierge</h4>
                                    <p class="text-sm text-slate-400 leading-relaxed">Change of plans? Flight delayed? Our human-in-the-loop AI support team rebooks, refunds, and assists you within minutes, anywhere in the world.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================= HOTELS ================= -->
                <div x-show="tab === 'hotels'" x-cloak class="w-full">
                    <form action="/search" class="flex flex-col lg:flex-row w-full bg-slate-900/40 backdrop-blur-3xl rounded-[2.5rem] lg:rounded-full divide-y lg:divide-y-0 lg:divide-x divide-white/10 shadow-[0_40px_100px_rgba(0,0,0,0.8)] border border-white/10 relative z-20 focus-within:ring-4 ring-brand-emerald/20 transition-all overflow-hidden group/form">
                        
                        <!-- LOCATION -->
                        <div class="flex-[2] p-8 lg:py-6 lg:px-10 group/input cursor-text relative hover:bg-white/5 transition-colors">
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 group-focus-within/input:text-brand-emerald transition-colors mb-2">Location</label>
                            <div class="flex items-center gap-4">
                                <i class="fa-solid fa-map-location-dot text-slate-500 text-lg group-focus-within/input:text-brand-emerald transition-colors"></i>
                                <input type="text" placeholder="Search cities, hotels, or landmarks" class="w-full bg-transparent outline-none text-white font-black text-xl placeholder:text-slate-800">
                            </div>
                        </div>

                        <!-- DATE RANGE -->
                        <div class="flex-1 p-8 lg:py-6 lg:px-10 group/input cursor-pointer relative hover:bg-white/5 transition-colors">
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 group-hover/input:text-brand-emerald transition-colors mb-2">Dates</label>
                            <div class="flex items-center gap-4">
                                <i class="fa-solid fa-calendar-range text-slate-500 text-lg group-hover/input:text-brand-emerald transition-colors"></i>
                                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Check-in / Out" class="w-full bg-transparent outline-none text-white font-black text-xl placeholder:text-slate-800">
                            </div>
                        </div>

                        <!-- GUESTS -->
                        <div class="flex-1 p-8 lg:py-6 lg:px-10 group/input cursor-pointer relative hover:bg-white/5 transition-colors">
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 group-hover/input:text-brand-emerald transition-colors mb-2">Occupancy</label>
                            <div class="flex items-center gap-4">
                                <i class="fa-solid fa-user-tag text-slate-500 text-lg group-hover/input:text-brand-emerald transition-colors"></i>
                                <span class="text-white font-black text-xl">2 Adults, 1 Room</span>
                            </div>
                        </div>

                        <!-- HOTEL ACTION -->
                        <div class="p-6 lg:p-4 flex items-center justify-center bg-white/5 lg:bg-transparent">
                             <button type="submit" class="hidden lg:flex w-24 h-24 rounded-full bg-brand-emerald text-slate-900 items-center justify-center text-3xl shadow-[0_0_40px_rgba(0,200,151,0.4)] hover:scale-110 active:scale-95 transition-all transform shrink-0">
                                <i class="fa-solid fa-search"></i>
                             </button>
                             <button type="submit" class="lg:hidden w-full bg-brand-emerald text-slate-900 font-black py-6 rounded-[2rem] flex items-center justify-center gap-4 shadow-xl shadow-brand-emerald/20 active:scale-95 transition-all text-sm uppercase tracking-[0.3em]">
                                Locate Stays <i class="fa-solid fa-arrow-right-long animate-pulse"></i>
                             </button>
                        </div>
                    </form>

                    <!-- Quick Filters & Luggage Toggle -->
                    <div class="mt-4 flex flex-col xl:flex-row items-center justify-between gap-4 px-2">
                        <!-- Vibe Filters (Horizontal Scroll) -->
                        <div class="flex overflow-x-auto hide-scroll gap-2 w-full xl:w-auto pb-2 xl:pb-0">
                            <button class="bg-white/5 hover:bg-white/10 text-slate-300 text-[11px] font-bold uppercase tracking-widest px-4 py-2 rounded-full border border-white/10 whitespace-nowrap transition-colors"><i class="fa-solid fa-fire text-red-500 mr-1"></i> TikTok Viral</button>
                            <button class="bg-white/5 hover:bg-white/10 text-slate-300 text-[11px] font-bold uppercase tracking-widest px-4 py-2 rounded-full border border-white/10 whitespace-nowrap transition-colors"><i class="fa-solid fa-building text-slate-400 mr-1"></i> Brutalist</button>
                            <button class="bg-white/5 hover:bg-white/10 text-slate-300 text-[11px] font-bold uppercase tracking-widest px-4 py-2 rounded-full border border-white/10 whitespace-nowrap transition-colors"><i class="fa-solid fa-microphone-lines text-purple-400 mr-1"></i> Podcast Ready</button>
                            <button class="bg-white/5 hover:bg-white/10 text-slate-300 text-[11px] font-bold uppercase tracking-widest px-4 py-2 rounded-full border border-white/10 whitespace-nowrap hidden lg:block transition-colors"><i class="fa-solid fa-city text-blue-400 mr-1"></i> Skyline View</button>
                        </div>
                        
                        <!-- VIP Luggage Toggle -->
                        <label class="flex items-center gap-3 cursor-pointer group bg-black/40 px-4 py-2 rounded-full border border-white/5 hover:border-brand-emerald/50 transition-colors w-full xl:w-auto justify-center">
                            <div class="relative">
                                <input type="checkbox" class="sr-only peer">
                                <div class="block bg-slate-800 w-10 h-6 rounded-full peer-checked:bg-brand-emerald transition-colors"></div>
                                <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform peer-checked:translate-x-4"></div>
                            </div>
                            <div class="text-[11px] font-bold text-slate-300 uppercase tracking-widest group-hover:text-white transition-colors flex items-center gap-1.5"><i class="fa-solid fa-suitcase-rolling text-brand-emerald"></i> VIP Luggage Teleportation</div>
                        </label>
                    </div>

                    <!-- Stay-to-Visa Integration Banner -->
                    <div class="mt-8 bg-blue-500/10 border border-blue-500/20 rounded-2xl p-4 md:p-6 flex flex-col md:flex-row items-center justify-between gap-6 group hover:bg-blue-500/10 transition-colors cursor-pointer overflow-hidden relative">
                        <div class="absolute right-0 top-0 w-64 h-full bg-gradient-to-l from-blue-500/20 to-transparent pointer-events-none"></div>
                        <div class="flex items-start md:items-center gap-4 relative z-10 w-full md:w-auto">
                            <div class="w-12 h-12 bg-blue-500/20 rounded-full flex flex-shrink-0 items-center justify-center shadow-[0_0_15px_rgba(59,130,246,0.3)]">
                                <i class="fa-solid fa-passport text-blue-400 text-xl group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-sm tracking-wide">Automated Digital Nomad Visa</h4>
                                <p class="text-xs text-slate-300 mt-1 max-w-sm leading-relaxed">Booking a 30+ day luxury stay? Let our AI process your global mobility visa seamlessly via the iSwitch Vault.</p>
                            </div>
                        </div>
                        <button class="bg-blue-600 hover:bg-blue-500 w-full md:w-auto text-white text-xs font-bold px-6 py-3 rounded-xl whitespace-nowrap shadow-[0_0_15px_rgba(59,130,246,0.5)] transition-colors relative z-10"><i class="fa-solid fa-robot"></i> Engage AI Processor</button>
                    </div>

                    <div class="mt-12">
                        <div class="flex justify-between items-end mb-6">
                            <h3 class="text-2xl font-bold flex items-center gap-3"><i class="fa-solid fa-star text-brand-emerald animate-pulse"></i> Ultra Premium Stays</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="destination-card h-80 group border border-white/10">
                                <img src="https://images.unsplash.com/photo-1499793983690-e29da59ef1c2?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover" alt="Maldives">
                                <div class="card-overlay absolute inset-0 flex flex-col justify-between p-6">
                                    <div class="self-end bg-black/80 backdrop-blur-md border border-brand-emerald/30 px-3 py-1.5 rounded-full flex items-center gap-2 shadow-[0_0_15px_rgba(0,200,151,0.3)]">
                                        <div class="w-2 h-2 bg-brand-emerald rounded-full animate-pulse"></div>
                                        <span class="text-[10px] font-bold text-white uppercase tracking-widest"><i class="fa-solid fa-wifi text-brand-emerald mr-1"></i> Verified 250Mbps Fiber</span>
                                    </div>
                                    <div class="flex justify-between items-end mt-auto">
                                        <div>
                                            <h4 class="text-3xl font-black text-white leading-tight">Soneva Jani</h4>
                                            <div class="flex text-yellow-400 text-xs gap-1 mt-1"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                                        </div>
                                        <div class="bg-black/50 backdrop-blur-md px-4 py-2 rounded-xl text-right">
                                            <p class="text-brand-emerald font-bold text-lg">$2,400<span class="text-xs text-slate-400">/nt</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- The Secret Ledger -->
                            <div class="destination-card h-80 group border border-white/10 relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1542314831-c6a4d14d8c53?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover filter blur-[4px] transition-all group-hover:blur-[2px]" alt="Secret Luxury">
                                <div class="absolute inset-0 bg-black/60 flex flex-col items-center justify-center p-6 text-center z-10 transition-colors group-hover:bg-black/40">
                                    <div class="w-16 h-16 rounded-full bg-slate-900 border border-white/10 flex items-center justify-center mb-4 relative">
                                        <div class="absolute inset-0 rounded-full border border-brand-orange animate-ping opacity-20"></div>
                                        <i class="fa-solid fa-lock text-2xl text-brand-orange"></i>
                                    </div>
                                    <h4 class="text-2xl font-black text-white leading-tight mb-2">Unlisted Premium Property</h4>
                                    <p class="text-xs text-slate-300 max-w-xs mx-auto mb-6">This 5-star Dubai property legally cannot publicize our discounted rate online.</p>
                                    <div class="bg-brand-orange hover:bg-orange-500 cursor-pointer transition-transform transform hover:scale-105 text-white text-xs font-black uppercase tracking-widest px-6 py-3.5 rounded-xl shadow-[0_0_20px_rgba(255,125,0,0.4)] flex items-center gap-2">
                                        <i class="fa-solid fa-key"></i> Unlock Secret Rate (-30%)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- The Midnight Auction -->
                    <div class="mt-8 bg-[#09090b] border border-red-500/20 rounded-3xl p-6 lg:p-12 relative overflow-hidden group">
                        <div class="absolute right-0 top-0 w-1/2 h-full bg-gradient-to-l from-red-600/10 to-transparent pointer-events-none"></div>
                        <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-red-600/20 blur-[100px] rounded-full pointer-events-none group-hover:bg-red-500/30 transition-colors duration-700"></div>
                        
                        <div class="flex flex-col lg:flex-row gap-8 lg:gap-16 items-center relative z-10">
                            <!-- Info -->
                            <div class="flex-1 text-center lg:text-left">
                                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-500/10 border border-red-500/20 mb-4">
                                    <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-red-400">Classified Inventory</span>
                                </div>
                                <h3 class="text-3xl lg:text-5xl font-black text-white leading-tight font-serif italic mb-2">The Midnight Auction.</h3>
                                <p class="text-slate-400 text-sm max-w-md mx-auto lg:mx-0 leading-relaxed mb-6">Hotels despise empty suites, but won't discount publicly. Place a blind bid on top-tier unsold penthouses for tonight. If accepted, you win.</p>
                                
                                <div class="flex items-center justify-center lg:justify-start gap-4">
                                    <div class="text-center">
                                        <div class="text-2xl font-black text-white font-mono bg-black/50 border border-white/10 px-3 py-2 rounded-lg">04</div>
                                        <div class="text-[9px] text-slate-500 uppercase font-bold mt-1 tracking-widest">Hours</div>
                                    </div>
                                    <div class="text-xl font-black text-slate-600">:</div>
                                    <div class="text-center">
                                        <div class="text-2xl font-black text-white font-mono bg-black/50 border border-white/10 px-3 py-2 rounded-lg">12</div>
                                        <div class="text-[9px] text-slate-500 uppercase font-bold mt-1 tracking-widest">Mins</div>
                                    </div>
                                    <div class="text-xl font-black text-slate-600">:</div>
                                    <div class="text-center">
                                        <div class="text-2xl font-black text-red-500 font-mono bg-black/50 border border-red-500/20 px-3 py-2 rounded-lg">59</div>
                                        <div class="text-[9px] text-red-900 uppercase font-bold mt-1 tracking-widest">Secs</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bid Console -->
                            <div class="w-full lg:w-96 bg-black/80 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-2xl relative">
                                <div class="absolute -top-3 -right-3 bg-red-600 text-white text-[9px] font-black uppercase tracking-widest px-3 py-1 rounded-full shadow-[0_0_15px_rgba(220,38,38,0.5)] transform rotate-12">Live Now</div>
                                
                                <h4 class="text-white font-bold text-sm mb-4 border-b border-white/10 pb-2">Target: 5-Star Dubai Penthouse</h4>
                                
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-[10px] text-slate-500 uppercase font-bold tracking-widest mb-1">Enter Blind Bid (USD)</label>
                                        <div class="relative">
                                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold">$</span>
                                            <input type="number" placeholder="0.00" class="w-full bg-white/5 border border-white/10 rounded-xl py-3 pl-8 pr-4 text-white font-black text-xl outline-none focus:border-red-500 transition-colors text-right" value="850">
                                        </div>
                                    </div>
                                    <div class="flex justify-between text-[10px] font-bold uppercase tracking-widest">
                                        <span class="text-slate-500">Retail Value: <span class="line-through">$4,200</span></span>
                                        <span class="text-brand-emerald">Saving: 80%</span>
                                    </div>
                                    <button class="w-full bg-white text-black hover:bg-slate-200 transition-colors font-black uppercase tracking-widest text-xs py-4 rounded-xl mt-2 flex items-center justify-center gap-2">
                                        <i class="fa-solid fa-gavel"></i> Lock In Bid
                                    </button>
                                    <p class="text-[9px] text-center text-slate-500 mt-2 w-full leading-tight">Your iSwitch Wallet will only be charged if the hotel accepts.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fractional / Split Penthouse Showcase -->
                    <div class="mt-12 bg-[#050B14]/80 backdrop-blur-xl border border-white/10 rounded-3xl p-6 lg:p-10 relative overflow-hidden flex flex-col md:flex-row items-center gap-8 mb-8">
                        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-emerald/15 blur-[120px] rounded-full pointer-events-none"></div>
                        
                        <div class="w-full md:w-1/2 relative rounded-2xl overflow-hidden border border-white/10 shadow-2xl h-64 lg:h-72">
                            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover" alt="Split Mansion">
                            <div class="absolute top-4 left-4 bg-black/70 backdrop-blur-md px-3 py-1 rounded-full text-[10px] text-white font-bold tracking-widest uppercase border border-white/10 z-10 flex items-center gap-1">
                                <i class="fa-solid fa-crown text-yellow-500"></i> The Malibu Estate
                            </div>
                            <div class="absolute bottom-4 left-4 right-4 bg-black/80 backdrop-blur-xl border border-white/10 p-4 rounded-xl flex justify-between items-center z-10 shadow-lg">
                                <div>
                                    <p class="text-[9px] text-slate-400 uppercase font-black tracking-widest mb-0.5">Total Cost</p>
                                    <p class="text-slate-400 font-bold line-through text-xs">$10,000</p>
                                </div>
                                <div class="text-right flex items-center gap-4">
                                    <div class="text-right">
                                        <p class="text-[9px] text-brand-emerald uppercase font-black tracking-widest mb-0.5">Your Split (1/4)</p>
                                        <p class="text-white font-black text-xl lg:text-2xl">$2,500</p>
                                    </div>
                                    <div class="w-10 h-10 rounded-full bg-brand-emerald/20 border border-brand-emerald flex items-center justify-center">
                                        <i class="fa-solid fa-arrow-right text-brand-emerald"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 relative z-10 pl-0 md:pl-2">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-emerald/10 border border-brand-emerald/20 mb-4">
                                <span class="text-brand-emerald"><i class="fa-solid fa-users-viewfinder"></i></span>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-brand-emerald">Fractional Booking Protocol</span>
                            </div>
                            <h3 class="text-3xl lg:text-4xl font-black text-white leading-tight mb-4">Mansion Stays.<br>Split Effortlessly.</h3>
                            <p class="text-slate-400 mb-8 leading-relaxed max-w-md">Stop putting extreme luxury travel on one credit card. Seamlessly split the cost of penthouses and villas with friends directly via the iSwitch Wallet link.</p>
                            
                            <div class="flex items-center gap-4 mb-6">
                                <div class="flex -space-x-4">
                                    <img class="w-12 h-12 rounded-full border-2 border-slate-900 relative z-30" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&h=100&q=80">
                                    <img class="w-12 h-12 rounded-full border-2 border-slate-900 relative z-20" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=100&h=100&q=80">
                                    <img class="w-12 h-12 rounded-full border-2 border-slate-900 relative z-10 filter grayscale" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=100&h=100&q=80">
                                    <div class="w-12 h-12 rounded-full border-2 border-slate-900 bg-slate-800 flex items-center justify-center text-xs text-slate-400 font-bold relative z-0 shadow-inner">+1</div>
                                </div>
                                <div class="text-[10px] text-slate-400 font-mono">
                                    > AWAITING FUNDS...
                                </div>
                            </div>
                            
                            <button class="bg-brand-emerald hover:bg-emerald-500 text-slate-900 text-sm font-black px-6 py-3.5 rounded-xl whitespace-nowrap shadow-[0_0_20px_rgba(0,200,151,0.4)] transition-all transform hover:scale-105 flex items-center gap-2"><i class="fa-solid fa-link"></i> Generate Split-Pay Link</button>
                        </div>
                    </div>

                </div>

                <!-- ================= TOURS ================= -->
                <div x-show="tab === 'tours'" x-cloak class="w-full">
                    <!-- Live Activity Ticker (FOMO) -->
                    <div class="mb-8 overflow-hidden bg-black/40 border-y border-white/5 py-2.5 relative">
                        <div class="flex items-center gap-12 animate-marquee whitespace-nowrap">
                            <span class="flex items-center gap-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Dynamic Inventory Active
                            </span>
                            <span class="text-[10px] font-bold text-white uppercase tracking-widest"><i class="fa-solid fa-fire text-orange-500 mr-2"></i> Last Booked: Private Amalfi Yacht Charter (3 mins ago)</span>
                            <span class="text-[10px] font-bold text-white uppercase tracking-widest"><i class="fa-solid fa-users text-blue-500 mr-2"></i> 4 Users currently viewing Maasai Mara Safari</span>
                            <span class="text-[10px] font-bold text-white uppercase tracking-widest"><i class="fa-solid fa-bolt text-yellow-500 mr-2"></i> Price Drop: Santorini Helicopter Tour now $890</span>
                            <!-- Duplicate for seamless loop -->
                            <span class="text-[10px] font-bold text-white uppercase tracking-widest"><i class="fa-solid fa-fire text-orange-500 mr-2"></i> Last Booked: Private Amalfi Yacht Charter (3 mins ago)</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pb-12">
                        <!-- Left Col: Search & Intro -->
                        <div class="lg:col-span-1 flex flex-col justify-center">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-yellow-500/10 border border-yellow-500/20 mb-4 w-fit">
                                <span class="text-yellow-500"><i class="fa-solid fa-compass"></i></span>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-yellow-500">Global Adventure Hub</span>
                            </div>
                            <h2 class="text-4xl lg:text-5xl font-black mb-4 text-white leading-tight">Curated <br/><span class="text-yellow-500 underline decoration-yellow-500/30 underline-offset-8">Experiences.</span></h2>
                            <p class="text-slate-400 text-sm leading-relaxed mb-8 max-w-sm">Stop traveling like a tourist. Access secret vineyard tours, luxury yacht charters, and private safaris completely white-labeled through the iSwitch network.</p>
                            
                            <form class="bg-white/5 border border-white/10 p-1.5 rounded-2xl flex flex-col gap-2">
                                <div class="flex items-center px-4 py-2">
                                    <i class="fa-solid fa-magnifying-glass text-slate-500 mr-3"></i>
                                    <input type="text" placeholder="Where do you want to explore?" class="bg-transparent flex-1 outline-none text-white text-sm placeholder-slate-600 font-semibold py-2">
                                </div>
                                <button type="button" @click="fetchTours()" :disabled="searching" class="bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-black text-xs uppercase tracking-widest p-4 rounded-xl transition-all hover:scale-[1.02] active:scale-95 shadow-[0_10px_20px_rgba(234,179,8,0.2)]">
                                    <span x-show="!searching">Reveal Secret Experiences</span>
                                    <span x-show="searching"><i class="fa-solid fa-spinner animate-spin"></i> Inventory Scan...</span>
                                </button>
                            </form>
                        </div>

                        <!-- Main Grid: API Optimized Experiences -->
                        <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Experience Card 1 -->
                            <div class="destination-card h-[450px] group border border-white/10 relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1516426122078-c23e76319801?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                                <div class="card-overlay absolute inset-0 flex flex-col justify-between p-6">
                                    <div class="flex justify-between items-start">
                                        <div class="bg-emerald-500 text-slate-900 text-[9px] font-black uppercase tracking-widest px-3 py-1 rounded-full shadow-[0_0_15px_rgba(16,185,129,0.5)]"><i class="fa-solid fa-bolt mr-1"></i> Skip The Line</div>
                                        <div class="bg-black/60 backdrop-blur-md border border-white/10 px-3 py-1 rounded-full text-[9px] text-white font-bold"><i class="fa-solid fa-star text-yellow-500 mr-1"></i> 4.9 (2.4k Reviews)</div>
                                    </div>
                                    <div class="mt-auto">
                                        <h4 class="text-2xl font-black text-white leading-tight mb-2">Maasai Mara Private Safari</h4>
                                        <p class="text-[10px] text-slate-300 uppercase tracking-widest mb-4"><i class="fa-solid fa-clock mr-1"></i> 7 Days • All Inclusive</p>
                                        <div class="flex justify-between items-center bg-black/40 backdrop-blur-xl border border-white/10 p-3 rounded-xl">
                                            <div>
                                                <p class="text-[8px] text-slate-400 uppercase font-black tracking-widest mb-0.5">Starting From</p>
                                                <p class="text-white font-black text-lg">$3,200</p>
                                            </div>
                                            <button @click="showLeadModal = true; leadContext = 'Adventure Specialist'; leadMessage = 'I want to book the Maasai Mara Private Safari experience.'" class="bg-white text-black text-[10px] font-black uppercase tracking-widest px-4 py-2 rounded-lg hover:bg-yellow-500 transition-colors">Book leg</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Experience Card 2 -->
                            <div class="destination-card h-[450px] group border border-white/10 relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1499678329028-101435549a4e?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                                <div class="card-overlay absolute inset-0 flex flex-col justify-between p-6">
                                    <div class="flex justify-between items-start">
                                        <div class="bg-indigo-600 text-white text-[9px] font-black uppercase tracking-widest px-3 py-1 rounded-full shadow-[0_0_15px_rgba(79,70,229,0.5)]"><i class="fa-solid fa-users-line mr-1"></i> Fractional Charter</div>
                                        <div class="bg-black/60 backdrop-blur-md border border-white/10 px-3 py-1 rounded-full text-[9px] text-white font-bold"><i class="fa-solid fa-star text-yellow-500 mr-1"></i> 5.0 (840 Reviews)</div>
                                    </div>
                                    <div class="mt-auto">
                                        <h4 class="text-2xl font-black text-white leading-tight mb-2">Amalfi Coast Yacht Charter</h4>
                                        <p class="text-[10px] text-slate-300 uppercase tracking-widest mb-4"><i class="fa-solid fa-user-tie mr-1 text-indigo-400"></i> Local Fixer Included</p>
                                        <div class="flex justify-between items-center bg-black/40 backdrop-blur-xl border border-white/10 p-3 rounded-xl">
                                            <div>
                                                <p class="text-[8px] text-indigo-400 uppercase font-black tracking-widest mb-0.5">Your Split Price</p>
                                                <p class="text-white font-black text-lg">$1,375 <span class="text-[10px] text-slate-500 font-normal">/ 4 ppl</span></p>
                                            </div>
                                            <button @click="showLeadModal = true; leadContext = 'Group Charter'; leadMessage = 'I want to join the Amalfi Coast Yacht Charter group.'" class="bg-indigo-600 text-white text-[10px] font-black uppercase tracking-widest px-4 py-2 rounded-lg hover:bg-indigo-500 transition-colors">Join Group</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- The Alpha Series (Hidden Ledger) -->
                    <div class="mt-8 bg-[#020617] border border-white/5 rounded-3xl p-8 lg:p-12 relative overflow-hidden group mb-12 shadow-inner">
                         <div class="absolute inset-0 opacity-20 pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/diagmonds-light.png')]"></div>
                         <div class="absolute -left-32 -bottom-32 w-96 h-96 bg-brand-orange/10 blur-[120px] rounded-full"></div>
                         
                         <div class="flex flex-col md:flex-row gap-12 items-center relative z-10">
                            <div class="flex-1">
                                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-orange/10 border border-brand-orange/20 mb-4">
                                    <i class="fa-solid fa-crown text-brand-orange text-xs"></i>
                                    <span class="text-[9px] font-bold uppercase tracking-widest text-brand-orange">The Alpha Series</span>
                                </div>
                                <h3 class="text-3xl lg:text-4xl font-black text-white leading-tight mb-4">Invitation-Only <br>Experiences.</h3>
                                <p class="text-slate-400 text-sm leading-relaxed mb-8 max-w-md">Our most exclusive "Hidden Ledger" of experiences—from private dinner at the Louvre to after-hours access at the Great Pyramids. Reserved for iSwitch Elite members.</p>
                                <div class="flex items-center gap-4">
                                     <button @click="showLeadModal = true; leadContext = 'Elite Fulfillment'; leadMessage = 'I am requesting an invitation to the Alpha Series: Paris Fashion Week experience.'" class="bg-white text-black font-black text-xs uppercase tracking-widest px-8 py-3.5 rounded-xl hover:bg-brand-orange hover:text-white transition-all transform hover:scale-105">View Elite Inventory</button>
                                     <div class="text-[10px] text-slate-500 font-bold uppercase tracking-widest border-l border-white/10 pl-4 py-1">Direct-API<br>Authentication Required</div>
                                </div>
                            </div>
                            <div class="w-full md:w-80 h-96 rounded-2xl overflow-hidden border border-white/10 relative group-hover:border-brand-orange/50 transition-colors">
                                <img src="https://images.unsplash.com/photo-1549490349-8643362247b5?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-1000">
                                <div class="absolute inset-0 bg-black/60 flex flex-col items-center justify-center p-6 text-center">
                                    <i class="fa-solid fa-lock text-3xl text-brand-orange mb-4 animate-bounce"></i>
                                    <h4 class="text-xl font-black text-white mb-2">Paris Fashion Week</h4>
                                    <p class="text-[10px] text-slate-400 uppercase font-bold tracking-widest">Front Row Access • Restricted</p>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>

                <!-- ================= VISAS ================= -->
                <div x-show="tab === 'visas'" x-cloak class="w-full">
                    
                    <!-- Atlys Engine Form -->
                    <div class="bg-[#0B1120]/80 backdrop-blur-xl border border-white/10 rounded-[2rem] lg:rounded-full p-3 lg:p-2 flex flex-col lg:flex-row gap-2 shadow-[0_0_40px_rgba(59,130,246,0.15)] mb-8 relative z-20">
                        <div class="flex-1 bg-black/40 rounded-2xl lg:rounded-full p-4 flex items-center gap-4 group hover:bg-black/60 transition-colors cursor-text border border-transparent hover:border-white/5">
                            <i class="fa-solid fa-passport text-blue-500 text-2xl ml-4"></i>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-0.5 group-hover:text-blue-400 transition-colors">Passport Nationality</label>
                                <input type="text" placeholder="e.g. United States" class="bg-transparent text-white font-bold text-lg outline-none w-full placeholder-slate-600">
                            </div>
                        </div>
                        
                        <div class="hidden lg:flex items-center justify-center -mx-4 z-10">
                            <div class="w-10 h-10 bg-slate-900 border border-white/10 rounded-full flex items-center justify-center text-slate-500 shadow-xl">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>

                        <div class="flex-[1.5] bg-black/40 rounded-2xl lg:rounded-full p-4 flex items-center gap-4 group hover:bg-black/60 transition-colors cursor-text border border-transparent hover:border-white/5">
                            <i class="fa-solid fa-location-dot text-brand-emerald text-2xl ml-2 lg:ml-6"></i>
                            <div class="flex-1">
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-0.5 group-hover:text-brand-emerald transition-colors">Destination Country</label>
                                <input type="text" placeholder="Where are you traveling to?" x-model="searchDest" class="bg-transparent text-white font-bold text-lg outline-none w-full placeholder-slate-600">
                            </div>
                            <button @click="verifyVisa()" :disabled="searching" class="bg-blue-600 hover:bg-blue-500 transition-colors text-white font-black px-6 lg:px-8 py-3.5 rounded-xl lg:rounded-full shadow-[0_0_20px_rgba(59,130,246,0.5)] flex items-center gap-2 whitespace-nowrap">
                                <span x-show="!searching">Check Entry Rules <i class="fa-solid fa-arrow-right"></i></span>
                                <span x-show="searching"><i class="fa-solid fa-spinner animate-spin"></i> Atlys Scanning...</span>
                            </button>
                        </div>
                    </div>

                    <!-- The Vault Toggle & Feature Hook -->
                    <div class="flex flex-col md:flex-row items-center justify-between gap-6 bg-blue-500/5 border border-blue-500/10 rounded-3xl p-6 relative overflow-hidden mb-12">
                        <div class="absolute left-0 top-0 w-64 h-full bg-gradient-to-r from-blue-500/10 to-transparent pointer-events-none"></div>
                        
                        <div class="flex-1 relative z-10">
                            <div class="flex items-center gap-3 mb-2">
                                <i class="fa-solid fa-shield-halved text-blue-400 text-xl"></i>
                                <h3 class="text-white font-bold text-lg">iSwitch Vault Auto-Apply</h3>
                            </div>
                            <p class="text-sm text-slate-400 leading-relaxed max-w-xl">Already have your passport secured in our encrypted backend? You never have to manually fill forms or upload selfies again. Toggle Vault integration below to enable 1-click B2B API processing.</p>
                        </div>

                        <div class="relative z-10 flex flex-col items-center md:items-end gap-3">
                            <label class="flex items-center gap-3 cursor-pointer group bg-[#09090b] px-6 py-4 rounded-2xl border border-white/5 hover:border-blue-500/50 transition-colors w-full md:w-auto shadow-2xl justify-between md:justify-start">
                                <div class="text-[10px] font-black text-white uppercase tracking-widest flex items-center gap-2">
                                    Link My Vault <i class="fa-solid fa-link text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                                </div>
                                <div class="relative ml-4">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="block bg-slate-800 w-12 h-7 rounded-full peer-checked:bg-blue-600 transition-colors"></div>
                                    <div class="dot absolute left-1 top-1 bg-white w-5 h-5 rounded-full transition-transform peer-checked:translate-x-5 shadow-sm"></div>
                                </div>
                            </label>
                            
                            <!-- API Ticker -->
                            <div class="flex gap-4 text-[9px] uppercase font-bold tracking-widest text-slate-500">
                                <span class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span> Atlys API Active</span>
                                <span class="text-brand-emerald">99.8% Approval Rate</span>
                                <span class="text-blue-400">Avg Processing: 24h</span>
                            </div>
                        </div>
                    </div>

                    <!-- Dynamic Atlys Eligibility Matrix -->
                    <div class="mt-8 pb-12" x-data="{ passportEntered: false }">
                        <div class="text-center mb-8">
                            <h3 class="text-3xl lg:text-4xl font-black text-white mb-3">Dynamic Atlys <span class="text-blue-500">Eligibility Matrix</span></h3>
                            <p class="text-slate-400 max-w-xl mx-auto text-sm leading-relaxed">The moment you enter your passport nationality above, our B2B engine scans the Global Entry Database to show you 100% verified E-Visa routes.</p>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Matrix Item 1 -->
                            <div class="bg-black/40 border border-white/5 rounded-2xl p-5 hover:border-blue-500/50 transition-all group flex flex-col justify-between h-48 cursor-pointer">
                                <div>
                                    <div class="flex justify-between items-start mb-4">
                                        <div class="w-8 h-8 rounded-lg bg-blue-500/10 flex items-center justify-center border border-blue-500/20">
                                            <i class="fa-solid fa-bolt text-blue-400 text-xs"></i>
                                        </div>
                                        <span class="text-[9px] font-black uppercase tracking-tighter bg-emerald-500/10 text-emerald-400 px-2 py-0.5 rounded">98% Success</span>
                                    </div>
                                    <h4 class="text-white font-bold">Turkey E-Visa</h4>
                                    <p class="text-[10px] text-slate-500 mt-1 uppercase tracking-widest">Processing: 12 Hours</p>
                                </div>
                                <button @click="showLeadModal = true; leadContext = 'E-Visa Processing'; leadMessage = 'I want to generate an application for the Turkey E-Visa.'" class="w-full bg-white/5 group-hover:bg-blue-600 group-hover:text-white text-slate-400 text-[10px] font-bold py-2 rounded-lg transition-colors mt-4">Generate Application</button>

                            </div>
                            <!-- Matrix Item 2 -->
                            <div class="bg-black/40 border border-white/5 rounded-2xl p-5 hover:border-blue-500/50 transition-all group flex flex-col justify-between h-48 cursor-pointer">
                                <div>
                                    <div class="flex justify-between items-start mb-4">
                                        <div class="w-8 h-8 rounded-lg bg-blue-500/10 flex items-center justify-center border border-blue-500/20">
                                            <i class="fa-solid fa-clock text-blue-400 text-xs"></i>
                                        </div>
                                        <span class="text-[9px] font-black uppercase tracking-tighter bg-emerald-500/10 text-emerald-400 px-2 py-0.5 rounded">Fast Lane</span>
                                    </div>
                                    <h4 class="text-white font-bold">Egypt E-Visa</h4>
                                    <p class="text-[10px] text-slate-500 mt-1 uppercase tracking-widest">Processing: 24 Hours</p>
                                </div>
                                <button class="w-full bg-white/5 group-hover:bg-blue-600 group-hover:text-white text-slate-400 text-[10px] font-bold py-2 rounded-lg transition-colors mt-4">Apply Now</button>
                            </div>
                            <!-- Matrix Item 3 -->
                            <div class="bg-black/40 border border-white/5 rounded-2xl p-5 hover:border-blue-500/50 transition-all group flex flex-col justify-between h-48 cursor-pointer">
                                <div>
                                    <div class="flex justify-between items-start mb-4">
                                        <div class="w-8 h-8 rounded-lg bg-blue-500/10 flex items-center justify-center border border-blue-500/20">
                                            <i class="fa-solid fa-star text-blue-400 text-xs"></i>
                                        </div>
                                        <span class="text-[9px] font-black uppercase tracking-tighter bg-indigo-500/10 text-indigo-400 px-2 py-0.5 rounded">Popular</span>
                                    </div>
                                    <h4 class="text-white font-bold">Kenya ETA</h4>
                                    <p class="text-[10px] text-slate-500 mt-1 uppercase tracking-widest">Processing: 48 Hours</p>
                                </div>
                                <button class="w-full bg-white/5 group-hover:bg-blue-600 group-hover:text-white text-slate-400 text-[10px] font-bold py-2 rounded-lg transition-colors mt-4">View Requirements</button>
                            </div>
                            <!-- Matrix Item 4 -->
                            <div class="bg-black/40 border border-white/5 rounded-2xl p-5 hover:border-blue-500/50 transition-all group flex flex-col justify-between h-48 cursor-pointer">
                                <div>
                                    <div class="flex justify-between items-start mb-4">
                                        <div class="w-8 h-8 rounded-lg bg-blue-500/10 flex items-center justify-center border border-blue-500/20">
                                            <i class="fa-solid fa-globe text-blue-400 text-xs"></i>
                                        </div>
                                        <span class="text-[9px] font-black uppercase tracking-tighter bg-slate-500/10 text-slate-400 px-2 py-0.5 rounded">Multientry</span>
                                    </div>
                                    <h4 class="text-white font-bold">Sri Lanka ETA</h4>
                                    <p class="text-[10px] text-slate-500 mt-1 uppercase tracking-widest">Processing: 2 Hours</p>
                                </div>
                                <button class="w-full bg-white/5 group-hover:bg-blue-600 group-hover:text-white text-slate-400 text-[10px] font-bold py-2 rounded-lg transition-colors mt-4">Lock In Price</button>
                            </div>
                        </div>
                    </div>

                    <!-- Visa Denial Protection & White-Glove Logistics Row -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 pb-20">
                        <!-- Fintech: Visa Denial Protection -->
                        <div class="bg-gradient-to-br from-amber-500/20 via-slate-900 to-slate-900 border border-amber-500/20 rounded-3xl p-8 relative overflow-hidden group">
                            <div class="absolute -right-20 -top-20 w-64 h-64 bg-amber-500/10 blur-[80px] rounded-full pointer-events-none"></div>
                            <div class="relative z-10">
                                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/20 mb-4">
                                    <i class="fa-solid fa-shield-check text-amber-500 text-xs"></i>
                                    <span class="text-[9px] font-bold uppercase tracking-widest text-amber-400">Exclusive Fintech Shield</span>
                                </div>
                                <h3 class="text-2xl lg:text-3xl font-black text-white leading-tight mb-4">Visa Denial <br><span class="text-amber-500 underline decoration-amber-500/30 underline-offset-4">Protection Insurance</span></h3>
                                <p class="text-slate-400 text-sm leading-relaxed mb-8 max-w-sm">Travel with absolute peace of mind. Add iSwitch Denial Protection for $49. If your visa is rejected, we refund 100% of your non-refundable flights and hotels. No questions asked.</p>
                                <button class="bg-amber-500 hover:bg-amber-400 text-slate-900 font-black text-xs px-8 py-3.5 rounded-xl shadow-[0_10px_30px_rgba(245,158,11,0.3)] transition-all transform hover:scale-105">Activate Insurance Shield</button>
                            </div>
                        </div>

                        <!-- Logistics: White-Glove Embassy Concierge -->
                        <div class="bg-[#0b0c10] border border-white/5 rounded-3xl p-8 relative overflow-hidden group">
                            <!-- Matrix/Tech pattern bg -->
                            <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
                            
                            <div class="relative z-10 h-full flex flex-col justify-between">
                                <div>
                                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 mb-4">
                                        <i class="fa-solid fa-user-tie text-blue-400 text-xs"></i>
                                        <span class="text-[9px] font-bold uppercase tracking-widest text-slate-400">VIP Logistics Section</span>
                                    </div>
                                    <h3 class="text-2xl lg:text-3xl font-black text-white leading-tight mb-4">White-Glove <br><span class="text-blue-400 italic">Embassy Concierge</span></h3>
                                    <p class="text-slate-400 text-sm leading-relaxed mb-6">Need a paper visa for the US or Schengen? Skip the queues. Our secure courier picks up your passport, manages the entire embassy workflow, and delivers it back to your suite—stamped and ready.</p>
                                </div>
                                <div class="flex items-center justify-between mt-auto pt-4 border-t border-white/5">
                                    <div class="flex -space-x-3">
                                        <div class="w-10 h-10 rounded-full bg-slate-800 border-2 border-slate-900 flex items-center justify-center text-blue-400"><i class="fa-solid fa-user"></i></div>
                                        <div class="w-10 h-10 rounded-full bg-slate-800 border-2 border-slate-900 flex items-center justify-center text-blue-400"><i class="fa-solid fa-user-group"></i></div>
                                    </div>
                                    <button class="text-white text-[11px] font-black uppercase tracking-tighter hover:text-blue-400 transition-colors flex items-center gap-2">Request VIP Courier <i class="fa-solid fa-chevron-right text-xs"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================= TRANSFERS ================= -->
                <div x-show="tab === 'transfers'" x-cloak class="w-full" x-data="{ transferMode: 'airport' }">
                    
                    <!-- Monzo-Style Sub-Navigation -->
                    <div class="flex items-center gap-1 bg-black/40 p-1.5 rounded-2xl border border-white/5 mb-8 w-full max-w-md mx-auto">
                        <button @click="transferMode = 'airport'" :class="transferMode === 'airport' ? 'bg-indigo-600 text-white shadow-xl' : 'text-slate-500 hover:text-slate-300'" class="flex-1 py-3 px-6 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all duration-300">
                            <i class="fa-solid fa-plane-arrival mr-2"></i> Airport Pickup
                        </button>
                        <button @click="transferMode = 'ground'" :class="transferMode === 'ground' ? 'bg-indigo-600 text-white shadow-xl' : 'text-slate-500 hover:text-slate-300'" class="flex-1 py-3 px-6 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all duration-300">
                            <i class="fa-solid fa-car-side mr-2"></i> Ground Control
                        </button>
                    </div>

                    <!-- Mode: Airport Pickup (The Arrive Protocol) -->
                    <div x-show="transferMode === 'airport'" 
                         x-transition:enter="transition ease-out duration-300 transform opacity-0 scale-95" 
                         x-transition:enter-start="opacity-0 scale-95" 
                         x-transition:enter-end="opacity-100 scale-100"
                         x-data="{ scanning: false, flightConfirmed: false, flightNum: '', arrivalAir: '' }">
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 pb-20">
                            <!-- Left: Terminal & Nameplate -->
                            <div class="flex flex-col gap-6">
                                <!-- Intelligent Entry Block -->
                                <div class="bg-[#0b0c10] border border-white/10 rounded-3xl p-6 relative overflow-hidden shadow-2xl">
                                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-transparent"></div>
                                    <div class="relative z-10">
                                        <h4 class="text-white font-black text-xs uppercase tracking-widest mb-4 flex items-center gap-2">
                                            <i class="fa-solid fa-satellite-dish text-indigo-400"></i> Arrival Logistics Identity
                                        </h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div class="bg-white/5 rounded-xl p-3 border border-white/10 focus-within:border-indigo-500/50 transition-all">
                                                <label class="block text-[8px] text-slate-500 uppercase font-black tracking-widest mb-1">Flight Number</label>
                                                <input type="text" x-model="flightNum" placeholder="e.g. UA-2433" class="bg-transparent text-white font-black w-full outline-none text-sm uppercase">
                                            </div>
                                            <div class="bg-white/5 rounded-xl p-3 border border-white/10 focus-within:border-indigo-500/50 transition-all">
                                                <label class="block text-[8px] text-slate-500 uppercase font-black tracking-widest mb-1">Arrival Airport</label>
                                                <input type="text" x-model="arrivalAir" placeholder="e.g. Heathrow (LHR)" class="bg-transparent text-white font-black w-full outline-none text-sm">
                                            </div>
                                        </div>
                                        <button @click="scanning = true; setTimeout(() => { scanning = false; flightConfirmed = true }, 2000)" 
                                                class="w-full mt-4 bg-indigo-600/20 hover:bg-indigo-600/40 text-indigo-400 font-black text-[10px] uppercase tracking-widest py-3 rounded-xl border border-indigo-500/30 transition-all flex items-center justify-center gap-2 overflow-hidden relative">
                                            <span x-show="!scanning" class="flex items-center gap-2">Sync & Verify Flight <i class="fa-solid fa-bolt"></i></span>
                                            <span x-show="scanning" class="flex items-center gap-2">
                                                <i class="fa-solid fa-spinner animate-spin"></i> Cross-Referencing AviationStack...
                                            </span>
                                            <div x-show="scanning" class="absolute inset-y-0 left-0 w-full bg-indigo-500/10 animate-[loading_2s_ease-in-out_infinite]"></div>
                                        </button>
                                    </div>
                                </div>

                                <!-- Terminal Display Card -->
                                <div class="bg-[#0b0c10] border border-white/5 rounded-3xl p-8 relative overflow-hidden group min-h-[300px] flex flex-col justify-between">
                                    <div class="absolute inset-0 opacity-5 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
                                    <div class="relative z-10 transition-all duration-500" :class="scanning ? 'blur-sm grayscale' : ''">
                                        <div class="flex items-center justify-between mb-8">
                                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                                <span class="text-[9px] font-black uppercase tracking-widest text-emerald-400">Live Flight Sync Active</span>
                                            </div>
                                            <div class="text-[10px] font-mono text-slate-500 font-bold tracking-tighter">> STATUS: EN_ROUTE</div>
                                        </div>
                                        
                                        <div class="mb-10">
                                            <p class="text-[10px] text-slate-500 uppercase font-black tracking-widest mb-1">Target Vessel</p>
                                            <h3 class="text-4xl lg:text-5xl font-black text-white font-serif italic leading-tight" x-text="flightConfirmed ? flightNum : '—— ——'"></h3>
                                            <p class="text-indigo-400 text-sm font-sans not-italic mt-1" x-text="flightConfirmed ? arrivalAir : 'Waiting for Identity...'"></p>
                                            
                                            <div class="mt-6 flex gap-8">
                                                <div>
                                                    <p class="text-[9px] text-slate-500 uppercase font-bold tracking-widest">ETA</p>
                                                    <p class="text-white font-black" x-text="flightConfirmed ? '14:22' : '--:--'"> <span x-show="flightConfirmed" class="text-[8px] text-emerald-400 ml-1">(-5m early)</span></p>
                                                </div>
                                                <div class="border-l border-white/10 pl-8">
                                                    <p class="text-[9px] text-slate-500 uppercase font-bold tracking-widest">Gate</p>
                                                    <p class="text-white font-black text-xl" x-text="flightConfirmed ? 'B-12' : '--'"></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="bg-white/5 flex flex-col items-center justify-center py-6 rounded-2xl border border-white/10 group-hover:border-indigo-500/30 transition-colors shadow-inner">
                                            <p class="text-[9px] text-slate-500 uppercase font-bold tracking-widest mb-3">Nameplate Presentation</p>
                                            <div class="bg-white px-8 py-3 shadow-2xl transform rotate-1 group-hover:rotate-0 transition-transform">
                                                <p class="text-black font-serif italic text-xl font-black tracking-tighter">Mr. Henderson</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Scanning Overlay -->
                                    <div x-show="scanning" class="absolute inset-0 z-20 flex flex-col items-center justify-center bg-black/40 backdrop-blur-md">
                                        <div class="relative w-16 h-16">
                                            <div class="absolute inset-0 border-4 border-indigo-500/20 rounded-full"></div>
                                            <div class="absolute inset-0 border-4 border-t-indigo-500 rounded-full animate-spin"></div>
                                        </div>
                                        <p class="text-[10px] text-indigo-400 font-black uppercase tracking-widest mt-4 animate-pulse">Establishing Signal...</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right: Custom Comfort Selection -->
                            <div class="flex flex-col gap-6">
                                <div class="bg-black/40 border border-white/5 rounded-3xl p-8 shadow-xl">
                                    <h4 class="text-white font-black text-sm uppercase tracking-widest mb-6 border-b border-indigo-500/20 pb-2 flex items-center gap-2">
                                        <i class="fa-solid fa-bottle-water text-indigo-400"></i> Pre-Arrival Refreshment
                                    </h4>
                                    <div class="grid grid-cols-2 gap-3">
                                        <button class="bg-indigo-600 text-white p-4 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-[0_5px_15px_rgba(79,70,229,0.3)]"><i class="fa-solid fa-check mr-2"></i> Chilled Fiji Water</button>
                                        <button class="bg-white/5 hover:bg-white/10 text-slate-400 border border-white/10 p-4 rounded-xl text-[10px] font-black uppercase tracking-widest transition-colors">Iced Espresso</button>
                                        <button class="bg-white/5 hover:bg-white/10 text-slate-400 border border-white/10 p-4 rounded-xl text-[10px] font-black uppercase tracking-widest transition-colors">Organic Juice</button>
                                        <button class="bg-white/5 hover:bg-white/10 text-slate-400 border border-white/10 p-4 rounded-xl text-[10px] font-black uppercase tracking-widest transition-colors">No Refreshment</button>
                                    </div>
                                </div>

                                <div class="bg-black/40 border border-white/5 rounded-3xl p-8 shadow-xl">
                                    <h4 class="text-white font-black text-sm uppercase tracking-widest mb-6 border-b border-indigo-500/20 pb-2 flex items-center gap-2">
                                        <i class="fa-solid fa-wind text-indigo-400"></i> Signature Ambient Scent
                                    </h4>
                                    <div class="flex flex-wrap gap-2">
                                        <button class="bg-white/10 text-white px-4 py-2.5 rounded-full text-[9px] font-black uppercase tracking-widest border border-white/20 hover:border-indigo-400 transition-all">Santal-33</button>
                                        <button class="bg-indigo-600 text-white px-4 py-2.5 rounded-full text-[9px] font-black uppercase tracking-widest shadow-lg">Eucalyptus-Mint</button>
                                        <button class="bg-white/5 text-slate-500 px-4 py-2.5 rounded-full text-[9px] font-black uppercase tracking-widest border border-white/5">French Lavender</button>
                                        <button class="bg-white/5 text-slate-500 px-4 py-2.5 rounded-full text-[9px] font-black uppercase tracking-widest border border-white/5">Oud Wood</button>
                                    </div>
                                </div>

                                <button @click="fetchTransfers()" 
                                        :disabled="searching"
                                        class="w-full bg-white text-black font-black uppercase tracking-widest py-5 rounded-2xl shadow-2xl hover:bg-indigo-600 hover:text-white transition-all transform hover:scale-[1.01] active:scale-95 text-xs flex items-center justify-center gap-3 mt-4">
                                    <span x-show="!searching">Secure My Meet-and-Greet <i class="fa-solid fa-arrow-right"></i></span>
                                    <span x-show="searching"><i class="fa-solid fa-spinner animate-spin"></i> Logistics Sync...</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Mode: Global Ground Control (Chauffeur Suite) -->
                    <div x-show="transferMode === 'ground'" x-transition:enter="transition ease-out duration-300 transform opacity-0 scale-95" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" style="display: none;">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pb-20">
                            <!-- Col 1: Granular Route Input -->
                            <div class="lg:col-span-1 bg-[#0b0c10] border border-white/10 rounded-3xl p-6 flex flex-col justify-between h-fit lg:min-h-[600px]">
                                <div>
                                    <h3 class="text-2xl font-black text-white mb-6">Autonomous <br><span class="text-indigo-400">Ground Control</span></h3>
                                    
                                    <!-- Pickup Matrix -->
                                    <div class="space-y-3 mb-6">
                                        <div class="flex items-center gap-2 text-[9px] font-black text-indigo-400 uppercase tracking-widest mb-1 px-1">
                                            <i class="fa-solid fa-location-dot"></i> Pick-up Source
                                        </div>
                                        <div class="grid grid-cols-2 gap-2">
                                            <div class="bg-white/5 rounded-xl p-3 border border-white/10 focus-within:border-indigo-500/50 transition-colors">
                                                <label class="block text-[8px] text-slate-500 uppercase font-black tracking-widest mb-1">Airport</label>
                                                <input type="text" placeholder="e.g. LOS" class="bg-transparent text-white font-bold w-full outline-none text-xs">
                                            </div>
                                            <div class="bg-white/5 rounded-xl p-3 border border-white/10 focus-within:border-indigo-500/50 transition-colors">
                                                <label class="block text-[8px] text-slate-500 uppercase font-black tracking-widest mb-1">City</label>
                                                <input type="text" placeholder="e.g. Ikeja" class="bg-transparent text-white font-bold w-full outline-none text-xs">
                                            </div>
                                        </div>
                                        <div class="bg-white/5 rounded-xl p-3 border border-white/10 focus-within:border-indigo-500/50 transition-colors">
                                            <label class="block text-[8px] text-slate-500 uppercase font-black tracking-widest mb-1">Street / Building Address</label>
                                            <input type="text" placeholder="Start typing address..." class="bg-transparent text-white font-bold w-full outline-none text-xs">
                                        </div>
                                    </div>

                                    <div class="flex justify-center -my-3 relative z-10">
                                        <div class="w-8 h-8 rounded-full bg-slate-900 border border-white/20 flex items-center justify-center text-indigo-400 shadow-xl cursor-pointer hover:scale-110 transition-transform"><i class="fa-solid fa-arrows-up-down"></i></div>
                                    </div>

                                    <!-- Drop-off Matrix -->
                                    <div class="space-y-3 mt-4">
                                        <div class="flex items-center gap-2 text-[9px] font-black text-brand-emerald uppercase tracking-widest mb-1 px-1">
                                            <i class="fa-solid fa-flag-checkered"></i> Drop-off Destination
                                        </div>
                                        <div class="grid grid-cols-2 gap-2">
                                            <div class="bg-white/5 rounded-xl p-3 border border-white/10 focus-within:border-brand-emerald/50 transition-colors">
                                                <label class="block text-[8px] text-slate-500 uppercase font-black tracking-widest mb-1">Airport</label>
                                                <input type="text" placeholder="e.g. LHR" class="bg-transparent text-white font-bold w-full outline-none text-xs">
                                            </div>
                                            <div class="bg-white/5 rounded-xl p-3 border border-white/10 focus-within:border-brand-emerald/50 transition-colors">
                                                <label class="block text-[8px] text-slate-500 uppercase font-black tracking-widest mb-1">City</label>
                                                <input type="text" placeholder="e.g. London" class="bg-transparent text-white font-bold w-full outline-none text-xs">
                                            </div>
                                        </div>
                                        <div class="bg-white/5 rounded-xl p-3 border border-white/10 focus-within:border-brand-emerald/50 transition-colors">
                                            <label class="block text-[8px] text-slate-500 uppercase font-black tracking-widest mb-1">Street / Building Address</label>
                                            <input type="text" placeholder="Final destination..." class="bg-transparent text-white font-bold w-full outline-none text-xs">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-8 border-t border-white/5 pt-6 flex flex-col gap-3">
                                    <div class="flex justify-between items-center text-[10px] uppercase font-black tracking-widest text-slate-500 px-1">
                                        <span>Estimated Range</span>
                                        <span class="text-white">42 KM / 28 MIN</span>
                                    </div>
                                    <button class="bg-indigo-600 text-white font-black uppercase text-xs py-4 rounded-xl shadow-[0_10px_30px_rgba(79,70,229,0.3)] hover:bg-indigo-500 transition-colors flex items-center justify-center gap-2">
                                        Request Quotation <i class="fa-solid fa-calculator text-[10px] opacity-60"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Col 2: High-End Vehicle Selector -->
                            <div class="lg:col-span-1 flex flex-col gap-4">
                                <!-- Vehicle 1 (Tesla) -->
                                <div class="bg-black/40 border-2 border-indigo-600 rounded-3xl p-5 relative overflow-hidden group cursor-pointer">
                                     <div class="absolute -right-4 -top-4 w-24 h-24 bg-indigo-600/10 blur-[40px] rounded-full"></div>
                                     <div class="flex justify-between items-start mb-6">
                                         <div>
                                             <h4 class="text-white font-black text-xl italic font-serif">Model S Plaid</h4>
                                             <p class="text-[9px] text-indigo-400 uppercase font-black tracking-widest mt-1">Eco-Elite Series</p>
                                         </div>
                                         <div class="bg-indigo-600 text-white px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest shadow-lg">Recommended</div>
                                     </div>
                                     <img src="https://images.unsplash.com/photo-1617788138017-80ad40651399?q=80&w=800&auto=format&fit=crop" class="w-full h-32 object-cover rounded-xl mb-6 shadow-2xl">
                                     <div class="flex justify-between items-center bg-black/40 rounded-xl p-3 border border-white/5">
                                          <div>
                                              <p class="text-[8px] text-slate-500 uppercase font-bold tracking-widest leading-none mb-1">iSwitch Rate</p>
                                              <p class="text-white font-black text-xl">$185.00</p>
                                          </div>
                                          <div class="text-right">
                                               <p class="text-[8px] text-red-500 line-through font-bold uppercase tracking-widest leading-none mb-1">$240.00</p>
                                               <p class="text-emerald-400 font-bold text-[9px] uppercase tracking-widest">Save 23%</p>
                                          </div>
                                     </div>
                                </div>
                                <!-- Vehicle 2 (Maybach) -->
                                <div class="bg-black/40 border border-white/10 rounded-3xl p-5 hover:border-indigo-500/30 transition-all cursor-pointer">
                                     <h4 class="text-white font-black text-xl italic font-serif opacity-70">Maybach S-680</h4>
                                     <p class="text-[9px] text-slate-500 uppercase font-black tracking-widest mt-1">Presidential Fleet</p>
                                     <div class="flex justify-between items-end mt-8">
                                          <p class="text-white font-black text-2xl">$420.00</p>
                                          <p class="text-[9px] text-slate-500 font-bold uppercase tracking-widest mb-1">Capacity: 4 PAX</p>
                                     </div>
                                </div>
                            </div>

                            <!-- Col 3: Live Trace & Split-Pay -->
                            <div class="lg:col-span-1 flex flex-col gap-6">
                                <!-- Simulated Live Map UI -->
                                <div class="bg-[#12141a] border border-white/10 rounded-3xl p-6 relative overflow-hidden h-64 shadow-2xl group">
                                     <div class="absolute inset-0 opacity-20 bg-[url('https://maps.gstatic.com/tactile/pane/gray-1x.png')] bg-cover filter invert grayscale"></div>
                                     <div class="absolute inset-0 bg-gradient-to-t from-[#12141a] via-transparent to-transparent pointer-events-none"></div>
                                     
                                     <div class="relative z-10 flex flex-col h-full items-center justify-center">
                                          <div class="w-12 h-12 rounded-full bg-indigo-600 flex items-center justify-center text-white shadow-[0_0_20px_rgba(79,70,229,0.8)] animate-pulse mb-3">
                                              <i class="fa-solid fa-location-crosshairs text-xl"></i>
                                          </div>
                                          <p class="text-white font-black text-[10px] uppercase tracking-widest bg-black/80 px-4 py-2 rounded-full border border-white/10 backdrop-blur-md">Tracing Chauffeur Hub...</p>
                                     </div>
                                     <!-- Trace Line Overlay -->
                                     <div class="absolute bottom-10 left-10 w-4 text-[8px] text-indigo-400 font-black uppercase tracking-widest transform -rotate-90 origin-left opacity-30 group-hover:opacity-100 transition-opacity">Live Trace Mode</div>
                                </div>

                                <!-- Monzo-Style Split Pay Card -->
                                <div class="bg-indigo-600/10 border border-indigo-600/30 rounded-3xl p-6 relative overflow-hidden group">
                                     <div class="flex items-start gap-4 mb-6">
                                          <div class="w-12 h-12 rounded-full bg-indigo-600 flex items-center justify-center text-white shadow-xl relative z-20">
                                              <i class="fa-solid fa-users-viewfinder text-xl"></i>
                                          </div>
                                          <div>
                                              <h4 class="text-white font-bold text-lg mb-1 leading-tight">Split Transfer Cost</h4>
                                              <p class="text-xs text-indigo-300 leading-snug">Generate a Monzo-style payment link to share this luxury ride cost with 4 friends instantly.</p>
                                          </div>
                                     </div>
                                     <button class="w-full bg-indigo-600 text-white font-black text-[11px] uppercase tracking-widest py-4 rounded-xl shadow-2xl hover:bg-indigo-500 transition-all flex items-center justify-center gap-2">
                                         <i class="fa-solid fa-link"></i> Create Social Pay-Link
                                     </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================= INSURANCE ================= -->
                <div x-show="tab === 'insurance'" x-cloak class="w-full" x-data="{ insType: 'medical', insCountry: '', recommended: '' }">
                    
                    <!-- Global Insurance Hub Header -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 pb-12">
                         <div class="flex flex-col justify-center">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-pink-500/10 border border-pink-500/20 mb-4 w-fit">
                                <span class="text-pink-500"><i class="fa-solid fa-shield-heart"></i></span>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-pink-500">Immigration Shield Hub</span>
                            </div>
                            <h2 class="text-4xl lg:text-5xl font-black mb-4 text-white leading-tight">Global <br/><span class="text-pink-500 underline decoration-pink-500/30 underline-offset-8">Protection.</span></h2>
                            
                            <!-- Destination Context Entry -->
                            <div class="mb-8 w-full max-w-sm">
                                <label class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">Destination Context (Auto-Advisor)</label>
                                <div class="relative group">
                                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-pink-500 transition-colors">
                                        <i class="fa-solid fa-earth-africa"></i>
                                    </div>
                                    <input type="text" x-model="insCountry" 
                                           @input="recommended = insCountry.toLowerCase().includes('france') || insCountry.toLowerCase().includes('germany') || insCountry.toLowerCase().includes('schengen') ? 'schengen' : (insCountry.toLowerCase().includes('usa') ? 'usa' : '')"
                                           placeholder="Where are you going?" 
                                           class="w-full bg-black/40 border border-white/10 rounded-2xl pl-12 pr-4 py-4 text-white font-bold outline-none focus:border-pink-500/50 transition-all placeholder-slate-700">
                                </div>
                                <p class="text-[9px] text-slate-500 mt-2 uppercase tracking-tight italic">Try typing 'France' or 'USA' to see predictive compliance advisory.</p>
                            </div>

                            <!-- Sub-Nav Switcher -->
                            <div class="flex items-center gap-2 bg-black/40 p-1 rounded-2xl border border-white/5 w-fit">
                                <button @click="insType = 'medical'" :class="insType === 'medical' ? 'bg-pink-600 text-white shadow-xl' : 'text-slate-500'" class="px-6 py-2.5 rounded-xl text-[9px] font-black uppercase tracking-widest transition-all">Migration Medical</button>
                                <button @click="insType = 'travel'" :class="insType === 'travel' ? 'bg-pink-600 text-white shadow-xl' : 'text-slate-500'" class="px-6 py-2.5 rounded-xl text-[9px] font-black uppercase tracking-widest transition-all">Comprehensive Travel</button>
                            </div>
                        </div>

                        <!-- Predictive Advisor Status Card -->
                        <div class="bg-[#0b0c10] border border-white/5 rounded-3xl p-8 relative overflow-hidden flex flex-col justify-center min-h-[300px]">
                             <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]" :class="recommended ? 'text-pink-500' : ''"></div>
                             
                             <div class="relative z-10">
                                 <div x-show="!recommended" class="text-center py-10">
                                     <div class="w-16 h-16 rounded-full bg-white/5 border border-white/10 flex items-center justify-center mx-auto mb-4">
                                         <i class="fa-solid fa-wand-magic-sparkles text-slate-600 text-2xl"></i>
                                     </div>
                                     <p class="text-slate-500 font-bold text-xs uppercase tracking-widest leading-relaxed">Enter your destination to <br/>activate the Predictive Advisor</p>
                                 </div>

                                 <div x-show="recommended" x-transition class="space-y-6">
                                     <div class="flex justify-between items-center mb-4">
                                         <h4 class="text-white font-black text-sm uppercase tracking-widest flex items-center gap-2">
                                             <i class="fa-solid fa-bolt text-pink-400"></i> AI Recommendation
                                         </h4>
                                         <div class="flex items-center gap-2 text-[9px] font-bold text-emerald-400">
                                             <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Compliance Guard Active
                                         </div>
                                     </div>
                                     
                                     <div x-show="recommended === 'schengen'" class="p-6 bg-pink-500/10 border border-pink-500/30 rounded-3xl relative group">
                                         <div class="absolute -right-4 -top-4 w-20 h-20 bg-pink-500/20 blur-3xl"></div>
                                         <h5 class="text-white font-black text-lg mb-1 leading-tight italic font-serif">Schengen-Elite Shield</h5>
                                         <p class="text-[10px] text-pink-300 uppercase font-black tracking-widest mb-4">Must-Have for French Visa</p>
                                         <ul class="space-y-2 mb-6 text-[10px] text-slate-400 font-bold">
                                             <li class="flex items-center gap-2 text-emerald-400"><i class="fa-solid fa-circle-check"></i> €30,000 Medical Limit Compliant</li>
                                             <li class="flex items-center gap-2 text-emerald-400"><i class="fa-solid fa-circle-check"></i> Repatriation Expenses Included</li>
                                             <li class="flex items-center gap-2 text-emerald-400"><i class="fa-solid fa-circle-check"></i> Zero-Deductible Policy</li>
                                         </ul>
                                         <div class="flex justify-between items-center bg-black/40 p-4 rounded-xl border border-white/5">
                                             <p class="text-white font-black text-xl" x-text="'$' + (insuranceData ? insuranceData.price : '45.00') + (insuranceData ? '' : ' /mo')"></p>
                                             <button @click="showLeadModal = true; leadContext = 'Insurance Shield'; leadMessage = 'I want to lock in the ' + (insuranceData?.name || 'Schengen Shield') + ' policy.'" class="bg-pink-600 text-white px-4 py-2 rounded-lg text-[9px] font-black uppercase tracking-widest shadow-lg">Lock Policy</button>
                                         </div>
                                     </div>

                                     <div x-show="recommended === 'usa'" class="p-6 bg-indigo-500/10 border border-indigo-500/30 rounded-3xl relative group">
                                         <h5 class="text-white font-black text-lg mb-1 leading-tight italic font-serif">Premium USA J1/H1B Guard</h5>
                                         <p class="text-[10px] text-indigo-300 uppercase font-black tracking-widest mb-4">Optimized for US Entry</p>
                                         <ul class="space-y-2 mb-6 text-[10px] text-slate-400 font-bold">
                                             <li class="flex items-center gap-2 text-emerald-400"><i class="fa-solid fa-circle-check"></i> $1,000,000 Liability Limit</li>
                                             <li class="flex items-center gap-2 text-emerald-400"><i class="fa-solid fa-circle-check"></i> 24/7 Concierge Hotline</li>
                                         </ul>
                                         <div class="flex justify-between items-center bg-black/40 p-4 rounded-xl border border-white/5">
                                             <p class="text-white font-black text-xl">$85.00 <span class="text-[9px] text-slate-500">/mo</span></p>
                                             <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-[9px] font-black uppercase tracking-widest shadow-lg">Lock Policy</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                        </div>
                    </div>

                    <!-- Coverage Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 pb-20">
                         <!-- Feature 1 -->
                         <div class="bg-black/40 border border-white/5 rounded-2xl p-6 hover:border-pink-500/50 transition-all group relative overflow-hidden">
                             <div class="absolute -right-4 -top-4 text-pink-600/10 text-4xl group-hover:scale-110 transition-transform"><i class="fa-solid fa-hospital"></i></div>
                             <div class="bg-pink-500/10 text-pink-500 w-10 h-10 rounded-xl flex items-center justify-center mb-4 border border-pink-500/20">
                                 <i class="fa-solid fa-staff-snake"></i>
                             </div>
                             <h4 class="text-white font-bold mb-2">Hospitalization</h4>
                             <p class="text-[10px] text-slate-500 leading-relaxed uppercase tracking-wider">Up to $1,000,000 coverage for emergency inpatient services worldwide.</p>
                         </div>
                         <!-- Feature 2 -->
                         <div class="bg-black/40 border border-white/5 rounded-2xl p-6 hover:border-pink-500/50 transition-all group relative overflow-hidden">
                             <div class="absolute -right-4 -top-4 text-pink-600/10 text-4xl group-hover:scale-110 transition-transform"><i class="fa-solid fa-plane-slash"></i></div>
                             <div class="bg-pink-500/10 text-pink-500 w-10 h-10 rounded-xl flex items-center justify-center mb-4 border border-pink-500/20">
                                 <i class="fa-solid fa-circle-xmark"></i>
                             </div>
                             <h4 class="text-white font-bold mb-2">Trip Disruption</h4>
                             <p class="text-[10px] text-slate-500 leading-relaxed uppercase tracking-wider">100% refund on non-refundable bookings due to medical emergencies.</p>
                         </div>
                         <!-- Feature 3 -->
                         <div class="bg-black/40 border border-white/5 rounded-2xl p-6 hover:border-pink-500/50 transition-all group relative overflow-hidden">
                             <div class="absolute -right-4 -top-4 text-pink-600/10 text-4xl group-hover:scale-110 transition-transform"><i class="fa-solid fa-passport"></i></div>
                             <div class="bg-pink-500/10 text-pink-500 w-10 h-10 rounded-xl flex items-center justify-center mb-4 border border-pink-500/20">
                                 <i class="fa-solid fa-check-double"></i>
                             </div>
                             <h4 class="text-white font-bold mb-2">Visa Compliance</h4>
                             <p class="text-[10px] text-slate-500 leading-relaxed uppercase tracking-wider">Policies pre-verified against Atlys database for immigrant entry requirements.</p>
                             <div class="mt-4 inline-block px-2 py-0.5 bg-emerald-500 text-slate-900 text-[8px] font-black uppercase tracking-widest rounded">Vetting Protocol Active</div>
                         </div>
                         <!-- Feature 4 (Lead Gen) -->
                         <div class="bg-gradient-to-br from-pink-600 to-indigo-900 rounded-2xl p-6 flex flex-col justify-between shadow-2xl">
                             <div>
                                 <h4 class="text-white font-black text-xl leading-tight mb-2">Need Custom Migration Medical?</h4>
                                 <p class="text-[10px] text-pink-100 uppercase tracking-widest font-bold">Expert Review Required</p>
                             </div>
                             <button class="w-full bg-white text-pink-600 font-black text-[10px] uppercase tracking-widest py-3 rounded-lg hover:bg-black hover:text-white transition-all shadow-xl">Contact Agent</button>
                         </div>
                    </div>
                </div>

                <!-- ================= CONSULTATIONS etc. ================= -->
                <div x-show="tab === 'consult'" style="display: none;" class="w-full">
                     <div class="w-full h-[350px] rounded-3xl border border-white/10 bg-slate-800/30 overflow-hidden relative flex flex-col items-center justify-center text-center p-8">
                        
                        <!-- Dynamic Icon -->
                        <div class="w-24 h-24 rounded-full bg-slate-900 shadow-xl border border-white/10 flex items-center justify-center mb-8 relative z-10">
                            <i class="fa-solid fa-user-tie text-4xl text-brand-orange"></i>
                        </div>

                        <!-- Dynamic Text -->
                        <div class="relative z-10 max-w-2xl">
                            <h2 class="text-3xl md:text-5xl font-black mb-4">Expert <span class="text-brand-orange">Mobility Strategy</span></h2>
                            
                            <p class="text-slate-400 text-lg md:text-xl leading-relaxed mb-8">
                                Connect with your personal intelligent mobility assistant. Enter your details below and we will automatically route you to the correct processing channel without requiring you to create an account yet.
                            </p>
                        </div>
                        
                        <div class="relative z-10">
                             <input type="text" placeholder="Enter service code or region..." class="bg-black/50 border border-white/20 text-white px-8 py-4 rounded-full w-full max-w-md outline-none focus:border-white transition-colors text-lg focus:ring-4 ring-white/10">
                        </div>
                     </div>
                </div>

            </div>
        </div>
    </main>

    <!-- MEGA FOOTER DIRECTORY -->
    <footer class="bg-[#030712] border-t border-slate-800 pt-24 pb-12 relative overflow-hidden z-20 w-full mt-auto">
        <!-- Footer Ambient Light -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-6xl h-px bg-gradient-to-r from-transparent via-brand-orange to-transparent opacity-50"></div>
        <div class="absolute -top-[300px] left-1/2 -translate-x-1/2 w-[800px] h-[300px] bg-brand-orange/10 blur-[100px] rounded-full pointer-events-none"></div>

        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-x-12 gap-y-16 mb-20 relative">
            
            <!-- Brand & CTA Col (Takes 2 columns) -->
            <div class="lg:col-span-2">
                <a href="/" class="flex items-center gap-3 group relative z-50 mb-8 inline-flex">
                    <img src="/iswitch_brand_logo.png" onerror="this.onerror=null; this.src='https://iswitch.onrender.com/iswitch_brand_logo.png'" class="h-10 sm:h-12 w-auto max-w-full transform group-hover:scale-110 transition-transform duration-500">
                    <span class="text-3xl font-black tracking-tight text-white group-hover:text-brand-orange transition-colors">iSwitch</span>
                </a>
                <p class="text-slate-400 text-base leading-relaxed mb-10 max-w-sm">
                    The Next Big Unicorn in Global Mobility. Search flights, book luxury hotels, and secure visas automatically. Powered by advanced AI and unparalleled design.
                </p>
                
                <!-- App Links -->
                <div class="space-y-4">
                    <span class="text-xs font-bold uppercase tracking-widest text-slate-500 block">Download Mobile App (Optional)</span>
                    <div class="flex flex-wrap gap-4">
                        <a @click="window.scrollTo({top: 0, behavior: 'smooth'})" class="flex items-center gap-3 bg-white/5 hover:bg-white/10 transition-colors border border-white/10 px-6 py-3 rounded-xl w-fit cursor-pointer">
                            <i class="fa-brands fa-apple text-2xl"></i>
                            <div class="text-left">
                                <p class="text-[10px] text-slate-400 uppercase font-bold leading-none">Download on the</p>
                                <p class="text-sm font-semibold text-white leading-none mt-1">App Store</p>
                            </div>
                        </a>
                        <a @click="window.scrollTo({top: 0, behavior: 'smooth'})" class="flex items-center gap-3 bg-white/5 hover:bg-white/10 transition-colors border border-white/10 px-6 py-3 rounded-xl w-fit cursor-pointer">
                            <i class="fa-brands fa-google-play text-2xl text-brand-emerald"></i>
                            <div class="text-left">
                                <p class="text-[10px] text-slate-400 uppercase font-bold leading-none">GET IT ON</p>
                                <p class="text-sm font-semibold text-white leading-none mt-1">Google Play</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Destinations Grid -->
            <div x-data="{ open: window.innerWidth >= 1024 }">
                <h4 @click="if(window.innerWidth < 1024) open = !open" class="text-white font-bold text-lg mb-6 flex justify-between items-center cursor-pointer lg:cursor-default">
                    <span class="flex items-center gap-2"><i class="fa-solid fa-plane-up text-slate-500"></i> Trending Flights</span>
                    <i class="fa-solid fa-chevron-down lg:hidden transition-transform duration-300" :class="open ? 'rotate-180' : ''"></i>
                </h4>
                <ul x-show="open" x-collapse.duration.300ms class="space-y-4 text-sm text-slate-400 font-medium">
                    <li><a @click="showLeadModal = true; leadContext = 'Aviation Specialist'; leadMessage = 'I want to book a flight from Lagos to London.'" class="hover:text-brand-orange transition-colors flex justify-between items-center group cursor-pointer">Lagos to London <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$750</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Aviation Specialist'; leadMessage = 'I want to book a flight from New York to Paris.'" class="hover:text-brand-orange transition-colors flex justify-between items-center group cursor-pointer">New York to Paris <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$620</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Aviation Specialist'; leadMessage = 'I want to book a flight from Dubai to Tokyo.'" class="hover:text-brand-orange transition-colors flex justify-between items-center group cursor-pointer">Dubai to Tokyo <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$890</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Aviation Specialist'; leadMessage = 'I want to book a flight from Toronto to Miami.'" class="hover:text-brand-orange transition-colors flex justify-between items-center group cursor-pointer">Toronto to Miami <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$310</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Aviation Specialist'; leadMessage = 'I want to book a flight from Accra to Joburg.'" class="hover:text-brand-orange transition-colors flex justify-between items-center group cursor-pointer">Accra to Joburg <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$480</span></a></li>
                </ul>
            </div>

            <!-- Hotels Grid -->
            <div x-data="{ open: window.innerWidth >= 1024 }">
                <h4 @click="if(window.innerWidth < 1024) open = !open" class="text-white font-bold text-lg mb-6 flex justify-between items-center cursor-pointer lg:cursor-default">
                    <span class="flex items-center gap-2"><i class="fa-solid fa-hotel text-slate-500"></i> Amazing Hotels</span>
                    <i class="fa-solid fa-chevron-down lg:hidden transition-transform duration-300" :class="open ? 'rotate-180' : ''"></i>
                </h4>
                <ul x-show="open" x-collapse.duration.300ms class="space-y-4 text-sm text-slate-400 font-medium">
                    <li><a @click="showLeadModal = true; leadContext = 'Hospitality Specialist'; leadMessage = 'I want to book a stay at Soneva Jani.'" class="hover:text-brand-emerald transition-colors flex justify-between items-center group cursor-pointer">Soneva Jani <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$2,400</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Hospitality Specialist'; leadMessage = 'I want to book a stay at Burj Al Arab.'" class="hover:text-brand-emerald transition-colors flex justify-between items-center group cursor-pointer">Burj Al Arab <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$1,850</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Hospitality Specialist'; leadMessage = 'I want to book a stay at Aman Tokyo.'" class="hover:text-brand-emerald transition-colors flex justify-between items-center group cursor-pointer">Aman Tokyo <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$1,200</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Hospitality Specialist'; leadMessage = 'I want to book a stay at The Plaza NY.'" class="hover:text-brand-emerald transition-colors flex justify-between items-center group cursor-pointer">The Plaza NY <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$950</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Hospitality Specialist'; leadMessage = 'I want to book a stay at Ritz Paris.'" class="hover:text-brand-emerald transition-colors flex justify-between items-center group cursor-pointer">Ritz Paris <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$1,100</span></a></li>
                </ul>
            </div>

            <!-- Consultations Grid -->
            <!-- Consultations Grid -->
            <div x-data="{ open: false }" x-init="open = window.innerWidth >= 1024">
                <h4 @click="open = !open" class="text-white font-bold text-lg mb-6 flex justify-between items-center cursor-pointer lg:cursor-default">
                    <span class="flex items-center gap-2"><i class="fa-solid fa-user-tie text-slate-500"></i> Consultations</span>
                    <i class="fa-solid fa-chevron-down lg:hidden transition-transform duration-300" :class="open ? 'rotate-180' : ''"></i>
                </h4>
                <ul x-show="open" x-collapse.duration.300ms class="space-y-4 text-sm text-slate-400 font-medium">
                    <li><a @click="showLeadModal = true; leadContext = 'Educational Placement'; leadMessage = 'I am interested in university placements and study abroad support.'" class="hover:text-white transition-colors cursor-pointer">Study Abroad Experts</a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Migration Expert'; leadMessage = 'I need professional immigration support for my relocation.'" class="hover:text-white transition-colors cursor-pointer">Immigration Support</a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Corporate Concierge'; leadMessage = 'I want to discuss a Corporate Relocation or offshore business setup.'" class="hover:text-white transition-colors cursor-pointer">Business & Corp Setup</a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Visa & Immigration'; leadMessage = 'I need help managing my documents and visa applications in the Vault.'" class="hover:text-white transition-colors cursor-pointer">The Visa Vault</a></li>
                    <li><a @click.prevent="openAuth('login')" href="#" class="hover:text-white transition-colors mt-4 inline-block font-semibold border-b border-slate-700 pb-1">Client Login <i class="fa-solid fa-arrow-right text-[10px] ml-1"></i></a></li>
                </ul>
            </div>

            <!-- Partner Grid -->
            <div x-data="{ open: false }" x-init="open = window.innerWidth >= 1024">
                <h4 @click="open = !open" class="text-white font-bold text-lg mb-6 flex justify-between items-center cursor-pointer lg:cursor-default">
                    <span class="flex items-center gap-2"><i class="fa-solid fa-handshake text-slate-500"></i> Partnerships</span>
                    <i class="fa-solid fa-chevron-down lg:hidden transition-transform duration-300" :class="open ? 'rotate-180' : ''"></i>
                </h4>
                <ul x-show="open" x-collapse.duration.300ms class="space-y-4 text-sm text-slate-400 font-medium">
                    <li><a href="/agent" class="hover:text-brand-orange transition-colors">B2B Agent Portal</a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Partnership Team'; leadMessage = 'I am interested in joining the iSwitch Affiliate Network.'" class="hover:text-brand-orange transition-colors cursor-pointer">Affiliate Network</a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Corporate Sales'; leadMessage = 'I want to open a Corporate Account for my company employees.'" class="hover:text-brand-orange transition-colors cursor-pointer">Corporate Accounts</a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Technical Team'; leadMessage = 'I am interested in API integration and technical documentation.'" class="hover:text-brand-orange transition-colors cursor-pointer">API Documentation</a></li>
                    <li><a href="/admin/god-mode" class="text-brand-orange hover:text-white transition-colors mt-4 inline-block font-semibold border-b border-brand-orange/30 pb-1"><i class="fa-solid fa-crown mr-2"></i> God Mode Control</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="max-w-[90rem] mx-auto px-6 border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-slate-500 font-medium">
            <p>&copy; {{ date('Y') }} iSwitch Mobility Line. All rights reserved.</p>
            <div class="flex gap-6 mt-4 md:mt-0">
                <a @click="window.scrollTo({top: 0, behavior: 'smooth'})" class="hover:text-white transition border-b border-transparent hover:border-slate-500 pb-0.5 cursor-pointer">Privacy Policy</a>
                <a @click="window.scrollTo({top: 0, behavior: 'smooth'})" class="hover:text-white transition border-b border-transparent hover:border-slate-500 pb-0.5 cursor-pointer">Terms of Service</a>
                <a @click="window.scrollTo({top: 0, behavior: 'smooth'})" class="hover:text-white transition border-b border-transparent hover:border-slate-500 pb-0.5 cursor-pointer">Cookie Preferences</a>
            </div>
        </div>
    </footer>

    <!-- ═══════════════════════════════════════════════════════════
         NATIVE MOBILE BOTTOM NAV — Fully Functional — Mobile Only
         ═══════════════════════════════════════════════════════════ -->
    <nav class="mobile-bottom-nav" id="mobile-bottom-nav">
        <div class="nav-items">

            <!-- HOME: Scroll to top of page -->
            <button id="nav-home" class="nav-item active" onclick="handleBottomNav('home', this)">
                <div class="nav-icon"><i class="fa-solid fa-house"></i></div>
                <div class="nav-label" x-text="currentLang === 'EN' ? 'Home' : 'Accueil'">Home</div>
                <div class="nav-dot"></div>
            </button>

            <!-- VAULT: Scroll to The Vault / Passport Features -->
            <button id="nav-vault" class="nav-item" onclick="handleBottomNav('vault', this)">
                <div class="nav-icon"><i class="fa-solid fa-vault"></i></div>
                <div class="nav-label" x-text="currentLang === 'EN' ? 'Vault' : 'Coffre'">Vault</div>
                <div class="nav-dot"></div>
            </button>

            <!-- EXPERT CONCIERGE: Center CTA — opens specialist modal -->
            <button class="nav-center border-none bg-transparent"
                 @click="showLeadModal = true; leadContext = 'Expert Concierge'; leadMessage = 'I want to speak with an iSwitch expert regarding my upcoming travel, visas, and mobility blueprint.'">
                <div class="center-btn text-white">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <div class="nav-label text-brand-orange" x-text="currentLang === 'EN' ? 'Expert' : 'Expert'">Expert</div>
            </button>

            <!-- DEALS: Scroll to Promotions / Tours section -->
            <button id="nav-deals" class="nav-item" onclick="handleBottomNav('deals', this)">
                <div class="nav-icon"><i class="fa-solid fa-tag"></i></div>
                <div class="nav-label" x-text="currentLang === 'EN' ? 'Deals' : 'Offres'">Deals</div>
                <div class="nav-dot"></div>
            </button>

            <!-- ACCOUNT: Go to Sign In / Dashboard -->
            <a @click.prevent="openAuth('login')" href="#" id="nav-account" class="nav-item">
                <div class="nav-icon"><i class="fa-solid fa-circle-user"></i></div>
                <div class="nav-label" x-text="currentLang === 'EN' ? 'Account' : 'Compte'">Account</div>
                <div class="nav-dot"></div>
            </a>

        </div>
    </nav>

    <script>
        /* Bottom Nav Navigation Logic (Fixed for Deals & Analytics) */
        window.handleBottomNav = function(target, btn) {
            document.querySelectorAll('.nav-item').forEach(e => e.classList.remove('active'));
            if(btn) btn.classList.add('active');

            if (target === 'home') {
                window.scrollTo({top: 0, behavior: 'smooth'});
            } else if (target === 'vault') {
                const el = document.getElementById('vault') || document.getElementById('features');
                if(el) {
                    const offset = 100;
                    const bodyRect = document.body.getBoundingClientRect().top;
                    const elementRect = el.getBoundingClientRect().top;
                    const elementPosition = elementRect - bodyRect;
                    const offsetPosition = elementPosition - offset;
                    window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
                }
            } else if (target === 'deals') {
                const el = document.getElementById('vault') || document.querySelector('.destinations-grid');
                if(el) {
                    el.scrollIntoView({behavior:'smooth', block: 'center'});
                }
            }
        };

        /* Mobile nav active state on scroll */
        (function() {
            if (window.innerWidth >= 1024) return;
            const homeBtn = document.getElementById('nav-home');
            window.addEventListener('scroll', function() {
                if (window.scrollY < 300) {
                    document.querySelectorAll('.nav-item').forEach(e => e.classList.remove('active'));
                    if(homeBtn) homeBtn.classList.add('active');
                }
            }, { passive: true });
        })();
    </script>

</body>
</html>
