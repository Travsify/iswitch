<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iSwitch | The Global Mobility Super-App</title>
    <link rel="icon" href="/iswitch_brand_logo.png" type="image/png">
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

        /* Custom Scrollbar for pills */
        .hide-scroll::-webkit-scrollbar { display: none; }
        .hide-scroll { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col" 
      x-data="{ 
        tab: 'flights', 
        transferMode: 'airport',
        showLeadModal: false,
        leadContext: 'Global Mobility',
        leadMessage: 'I am interested in exploring the iSwitch ecosystem.',
        flightConfirmed: false
      }">

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
        
        <div class="bg-[#0b0c10] border border-white/10 w-full max-w-xl rounded-[40px] p-8 lg:p-12 relative overflow-hidden shadow-[0_20px_100px_rgba(0,0,0,1)]"
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
                <img src="/iswitch_brand_logo.png" class="h-10 w-auto transform group-hover:scale-105 transition-transform duration-500">
                <span class="text-2xl font-black tracking-tighter text-white group-hover:text-brand-orange transition-colors hidden lg:block">iSwitch</span>
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
                    <a href="/user/login" class="text-sm font-bold text-white hover:text-brand-orange transition-colors">Sign In</a>
                @endauth
                <a href="/user/register" class="btn-magical px-6 py-2.5 rounded-full text-sm font-bold text-white ml-2">
                    Premium Setup
                </a>
            </div>

            <!-- Hamburger Button (Mobile) -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden text-white text-2xl focus:outline-none z-50 relative">
                <i class="fa-solid" :class="mobileMenuOpen ? 'fa-xmark' : 'fa-bars-staggered'"></i>
            </button>
        </div>

        <!-- Mobile Menu Overlay -->
        <div x-show="mobileMenuOpen" x-transition class="fixed inset-0 bg-slate-900/95 backdrop-blur-xl z-40 lg:hidden flex flex-col pt-24 px-6 pb-6 overflow-y-auto">
            <div class="flex flex-col gap-6 text-xl font-bold">
                <a href="#search-engine" @click="mobileMenuOpen = false" class="text-white border-b border-white/10 pb-4">Booking Engine</a>
                <a href="#features" @click="mobileMenuOpen = false" class="text-white border-b border-white/10 pb-4">The Vault</a>
                
                <div class="text-slate-400 text-sm tracking-widest uppercase mt-4 mb-2">Consultations</div>
                <a href="#" class="text-brand-orange border-b border-white/10 pb-4 flex items-center gap-3"><i class="fa-solid fa-graduation-cap"></i> Study Abroad</a>
                <a href="#" class="text-brand-emerald border-b border-white/10 pb-4 flex items-center gap-3"><i class="fa-solid fa-briefcase"></i> Work & Migrate</a>
                <a href="#" class="text-blue-400 border-b border-white/10 pb-4 flex items-center gap-3"><i class="fa-solid fa-building"></i> Business Setup</a>
                
                <a href="/agent" class="text-white border-b border-white/10 pb-4 flex justify-between items-center">Partner Portal <i class="fa-solid fa-arrow-right text-sm"></i></a>
                
                <div class="mt-8 flex flex-col gap-4">
                    <a href="/user/login" class="text-center py-4 rounded-2xl bg-white/5 border border-white/10">Sign In</a>
                    <a href="/user/register" class="btn-magical text-center py-4 rounded-2xl">Create Free Account</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ULTRA PREMIUM HERO -->
    <main class="flex-grow flex flex-col items-center justify-center pt-32 lg:pt-40 pb-20 px-4 sm:px-6 relative z-10 w-full max-w-[90rem] mx-auto">
        
        <div class="text-center mb-10 lg:mb-16 w-full max-w-5xl mx-auto">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800/50 border border-slate-700/50 backdrop-blur-md mb-8">
                <span class="w-2 h-2 rounded-full bg-brand-emerald animate-pulse shadow-[0_0_8px_#00c897]"></span>
                <span class="text-xs font-bold text-slate-300 tracking-wide uppercase">The Future of Mobility is Live</span>
            </div>
            
            <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-[6rem] font-black leading-[1.05] tracking-tighter mb-6">
                <span class="text-gradient">Limitless Travel.</span><br>
                <span class="text-gradient-orange">Zero Friction.</span>
            </h1>
            <p class="text-lg md:text-2xl text-slate-400 max-w-3xl mx-auto font-light leading-relaxed">
                Connect flights, luxury stays, and secure visas perfectly in one place. No account required to explore the world.
            </p>
        </div>

        <!-- MIND BLOWING SEARCH ENGINE (Pill Layout) -->
        <div id="search-engine" class="w-full max-w-6xl glass-widget p-3 md:p-6 pb-8 shadow-[0_20px_50px_rgba(0,0,0,0.5)] border border-white/10" x-data="{ tab: 'flights' }">
            
            <!-- Category Switcher (Scrollable on Mobile) -->
            <div class="flex overflow-x-auto hide-scroll gap-2 mb-6 border-b border-white/5 pb-4 px-2 md:px-6">
                
                <button @click="tab = 'flights'" :class="tab === 'flights' ? 'text-white border-brand-orange bg-brand-orange/10' : 'text-slate-400 border-transparent hover:text-white'" class="flex-shrink-0 px-6 py-3 rounded-full text-sm lg:text-base font-bold transition-all flex items-center gap-2 border">
                    <i class="fa-solid fa-plane"></i> Flights
                </button>

                <button @click="tab = 'hotels'" :class="tab === 'hotels' ? 'text-white border-brand-emerald bg-brand-emerald/10' : 'text-slate-400 border-transparent hover:text-white'" class="flex-shrink-0 px-6 py-3 rounded-full text-sm lg:text-base font-bold transition-all flex items-center gap-2 border">
                    <i class="fa-solid fa-bed"></i> Hotels
                </button>

                <button @click="tab = 'visas'" :class="tab === 'visas' ? 'text-white border-blue-500 bg-blue-500/10' : 'text-slate-400 border-transparent hover:text-white'" class="flex-shrink-0 px-6 py-3 rounded-full text-sm lg:text-base font-bold transition-all flex items-center gap-2 border">
                    <i class="fa-solid fa-passport"></i> Visas
                </button>
                
                <button @click="tab = 'tours'" :class="tab === 'tours' ? 'text-white border-yellow-500 bg-yellow-500/10' : 'text-slate-400 border-transparent hover:text-white'" class="flex-shrink-0 px-6 py-3 rounded-full text-sm lg:text-base font-bold transition-all flex items-center gap-2 border">
                    <i class="fa-solid fa-umbrella-beach"></i> Tours
                </button>

                <button @click="tab = 'transfers'" :class="tab === 'transfers' ? 'text-white border-purple-500 bg-purple-500/10' : 'text-slate-400 border-transparent hover:text-white'" class="flex-shrink-0 px-6 py-3 rounded-full text-sm lg:text-base font-bold transition-all flex items-center gap-2 border">
                    <i class="fa-solid fa-car"></i> Pickups
                </button>

                <button @click="tab = 'insurance'" :class="tab === 'insurance' ? 'text-white border-pink-500 bg-pink-500/10' : 'text-slate-400 border-transparent hover:text-white'" class="flex-shrink-0 px-6 py-3 rounded-full text-sm lg:text-base font-bold transition-all flex items-center gap-2 border">
                    <i class="fa-solid fa-shield-heart"></i> Insurance
                </button>

            </div>

             <!-- ENGINE FORMS & DYNAMIC CONTENT -->
            <div class="px-2 md:px-6 relative min-h-[400px]">
                
                <!-- ================= FLIGHTS ================= -->
                <div x-show="tab === 'flights'" class="w-full" x-data="{ tripType: 'round' }">
                    
                    <!-- Trip Type Switcher -->
                    <div class="flex items-center gap-4 mb-4 px-2">
                        <label class="flex items-center gap-2 text-sm font-semibold cursor-pointer group">
                            <input type="radio" name="trip" value="one" x-model="tripType" class="hidden">
                            <div class="w-4 h-4 rounded-full border-2 border-slate-500 flex items-center justify-center transition-colors" :class="tripType === 'one' ? 'border-brand-orange' : 'group-hover:border-white'">
                                <div class="w-2 h-2 rounded-full bg-brand-orange transition-transform" :class="tripType === 'one' ? 'scale-100' : 'scale-0'"></div>
                            </div>
                            <span :class="tripType === 'one' ? 'text-white' : 'text-slate-400 group-hover:text-white'">One-way</span>
                        </label>
                        <label class="flex items-center gap-2 text-sm font-semibold cursor-pointer group">
                            <input type="radio" name="trip" value="round" x-model="tripType" class="hidden">
                            <div class="w-4 h-4 rounded-full border-2 border-slate-500 flex items-center justify-center transition-colors" :class="tripType === 'round' ? 'border-brand-orange' : 'group-hover:border-white'">
                                <div class="w-2 h-2 rounded-full bg-brand-orange transition-transform" :class="tripType === 'round' ? 'scale-100' : 'scale-0'"></div>
                            </div>
                            <span :class="tripType === 'round' ? 'text-white' : 'text-slate-400 group-hover:text-white'">Round-trip</span>
                        </label>
                        <label class="flex items-center gap-2 text-sm font-semibold cursor-pointer group">
                            <input type="radio" name="trip" value="multi" x-model="tripType" class="hidden">
                            <div class="w-4 h-4 rounded-full border-2 border-slate-500 flex items-center justify-center transition-colors" :class="tripType === 'multi' ? 'border-brand-orange' : 'group-hover:border-white'">
                                <div class="w-2 h-2 rounded-full bg-brand-orange transition-transform" :class="tripType === 'multi' ? 'scale-100' : 'scale-0'"></div>
                            </div>
                            <span :class="tripType === 'multi' ? 'text-white' : 'text-slate-400 group-hover:text-white'">Multi-city</span>
                        </label>
                        
                        <!-- Nomad Button added to Trip Types -->
                        <div class="w-px h-4 bg-white/20 mx-1"></div>
                        <label class="flex items-center gap-2 text-sm font-semibold cursor-pointer group ml-1 relative group" title="Tell us your budget, we find the destination.">
                            <input type="radio" name="trip" value="nomad" x-model="tripType" class="hidden">
                            <div class="px-3 py-1 rounded-full border transition-all flex items-center gap-1.5" :class="tripType === 'nomad' ? 'bg-indigo-500/20 border-indigo-500 text-indigo-300' : 'bg-white/5 border-white/10 text-slate-300 group-hover:bg-white/10 group-hover:text-white'">
                                <i class="fa-solid fa-wand-magic-sparkles text-xs"></i> <span>Inspire Me</span>
                            </div>
                        </label>
                        
                        <div class="ml-auto" x-data="{ alertModal: false }">
                            <button @click.prevent="alertModal = true" class="text-xs font-bold bg-white/5 hover:bg-white/10 border border-white/10 rounded-full px-3 py-1.5 transition-colors flex items-center gap-2 text-brand-orange">
                                <i class="fa-solid fa-bell"></i> Get Price Alerts
                            </button>
                            <!-- Lead Gen Modal -->
                            <div x-show="alertModal" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" style="display: none;">
                                <div @click.outside="alertModal = false" class="glass-widget p-8 max-w-md w-full relative">
                                    <button @click="alertModal = false" class="absolute top-4 right-4 text-slate-400 hover:text-white"><i class="fa-solid fa-times"></i></button>
                                    <div class="w-12 h-12 rounded-full bg-brand-orange/20 border border-brand-orange/50 flex items-center justify-center mb-6">
                                        <i class="fa-solid fa-bell text-brand-orange text-xl"></i>
                                    </div>
                                    <h3 class="text-2xl font-black text-white mb-2">Never miss a price drop</h3>
                                    <p class="text-slate-400 text-sm mb-6">Enter your email and we'll alert you the moment flights on this route get cheaper. No spam, just savings.</p>
                                    <form class="flex flex-col gap-3">
                                        <input type="email" placeholder="Enter your email address" class="w-full bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white outline-none focus:border-brand-orange">
                                        <button class="btn-magical w-full py-3 rounded-xl font-bold">Track Prices</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Search Pill (Airbnb Style) -->
                    <form action="/search" class="search-pill flex flex-col lg:flex-row w-full rounded-3xl lg:rounded-full divide-y lg:divide-y-0 lg:divide-x divide-white/10 shadow-[0_10px_30px_rgba(0,0,0,0.8)] border border-slate-700 relative z-20">
                        <div class="search-pill-input flex-[1.5] p-3 lg:py-4 lg:px-6 cursor-text group relative">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 group-focus-within:text-brand-orange transition-colors">Where from?</label>
                            <div class="flex items-center gap-2 mt-1">
                                <i class="fa-solid fa-plane-departure text-slate-500 text-sm group-focus-within:text-brand-orange"></i>
                                <input type="text" value="Lagos (LOS)" class="w-full bg-transparent outline-none text-white font-semibold text-lg lg:text-xl placeholder-slate-600">
                            </div>
                        </div>
                        <div class="search-pill-input flex-[1.5] p-3 lg:py-4 lg:px-6 cursor-text group relative">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 group-focus-within:text-brand-orange transition-colors">Where to?</label>
                            <div class="flex items-center gap-2 mt-1">
                                <i class="fa-solid fa-plane-arrival text-slate-500 text-sm group-focus-within:text-brand-orange"></i>
                                <input type="text" placeholder="London (LHR)" class="w-full bg-transparent outline-none text-white font-semibold text-lg lg:text-xl placeholder-slate-600">
                            </div>
                        </div>
                        <div class="search-pill-input flex-1 p-3 lg:py-4 lg:px-6 cursor-text group relative">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 group-focus-within:text-brand-orange transition-colors">Departure</label>
                            <div class="flex items-center gap-2 mt-1">
                                <i class="fa-regular fa-calendar text-slate-500 text-sm group-focus-within:text-brand-orange"></i>
                                <input type="text" placeholder="Add date" class="w-full bg-transparent outline-none text-white font-semibold text-lg lg:text-xl placeholder-slate-600">
                            </div>
                        </div>
                        <div x-show="tripType !== 'one'" x-transition class="search-pill-input flex-1 p-3 lg:py-4 lg:px-6 cursor-text group relative border-t lg:border-t-0 lg:border-l border-white/10">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 group-focus-within:text-brand-orange transition-colors">Return</label>
                            <div class="flex items-center gap-2 mt-1">
                                <i class="fa-regular fa-calendar-check text-slate-500 text-sm group-focus-within:text-brand-orange"></i>
                                <input type="text" placeholder="Add date" class="w-full bg-transparent outline-none text-white font-semibold text-lg lg:text-xl placeholder-slate-600">
                            </div>
                        </div>
                        <div class="search-pill-input flex-[1.2] p-3 lg:py-4 lg:px-6 cursor-text group flex justify-between items-center relative border-t lg:border-t-0 lg:border-l border-white/10" x-data="{ popover: false }">
                            <div @click="popover = !popover" class="cursor-pointer w-full">
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 group-focus-within:text-brand-orange transition-colors">Travelers & Class</label>
                                <div class="flex items-center gap-2 mt-1">
                                    <i class="fa-solid fa-user text-slate-500 text-sm group-focus-within:text-brand-orange"></i>
                                    <input type="text" readonly value="1 Adult, Economy" class="w-full bg-transparent outline-none text-white font-semibold text-lg lg:text-xl placeholder-slate-600 cursor-pointer pointer-events-none truncate">
                                </div>
                            </div>
                            
                            <!-- Dropdown Popover UX for Passengers -->
                            <div x-show="popover" @click.outside="popover = false" x-transition class="absolute top-full right-0 mt-4 w-72 glass-widget p-4 rounded-2xl shadow-2xl z-[60] border border-white/10" style="display: none;">
                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <h4 class="font-bold text-white">Adults</h4>
                                        <p class="text-xs text-slate-400">Age 12+</p>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <button type="button" class="w-8 h-8 rounded-full border border-slate-600 flex items-center justify-center text-slate-300 hover:border-white transition-colors"><i class="fa-solid fa-minus text-xs"></i></button>
                                        <span class="font-bold">1</span>
                                        <button type="button" class="w-8 h-8 rounded-full border border-slate-600 flex items-center justify-center text-slate-300 hover:border-white transition-colors"><i class="fa-solid fa-plus text-xs"></i></button>
                                    </div>
                                </div>
                                <div class="border-t border-white/10 my-3"></div>
                                <div>
                                    <h4 class="font-bold text-white mb-2 text-sm">Cabin Class</h4>
                                    <select class="w-full bg-black/50 border border-slate-700 rounded-lg p-2 text-sm text-white outline-none focus:border-brand-orange">
                                        <option>Economy</option>
                                        <option>Premium Economy</option>
                                        <option>Business Class</option>
                                        <option>First Class</option>
                                    </select>
                                </div>
                                <button type="button" @click="popover = false" class="w-full mt-4 bg-white/10 hover:bg-white/20 text-white font-bold py-2 rounded-lg text-sm transition-colors">Done</button>
                            </div>
                            
                            <!-- Search Btn -->
                            <button type="button" class="btn-magical w-14 h-14 rounded-full flex items-center justify-center shrink-0 ml-4 hidden lg:flex shadow-[0_0_20px_rgba(255,125,0,0.5)]">
                                <i class="fa-solid fa-search text-xl"></i>
                            </button>
                        </div>
                        
                        <!-- Mobile Search Btn -->
                        <button type="button" class="btn-magical w-full p-4 rounded-b-3xl text-lg font-bold lg:hidden flex items-center justify-center gap-2">
                           Search Flights <i class="fa-solid fa-search"></i>
                        </button>
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
                                <p class="text-[11px] text-slate-300 mt-1">Split any flight into 4 payments. <a href="#" class="text-white underline font-semibold">See if you qualify</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Beautiful Content Grid -->
                    <div class="mt-16">
                        <div class="flex justify-between items-end mb-6">
                            <h3 class="text-2xl font-bold flex items-center gap-3"><i class="fa-solid fa-earth-americas text-brand-orange animate-pulse"></i> Handpicked Routes</h3>
                            <a href="#" class="text-brand-orange font-semibold text-sm hover:underline">Explore all <i class="fa-solid fa-arrow-right text-xs"></i></a>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
                <div x-show="tab === 'hotels'" style="display: none;" class="w-full">
                    <form action="/search" class="search-pill flex flex-col lg:flex-row w-full rounded-3xl lg:rounded-full divide-y lg:divide-y-0 lg:divide-x divide-white/10 shadow-2xl">
                        <div class="search-pill-input flex-[2] p-4 lg:py-4 lg:px-8 cursor-text group">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 group-focus-within:text-brand-emerald transition-colors">Where are you going?</label>
                            <input type="text" placeholder="Search cities, hotels, or landmarks" class="w-full bg-transparent outline-none text-white font-semibold text-lg lg:text-xl placeholder-slate-600 mt-1">
                        </div>
                        <div class="search-pill-input flex-1 p-4 lg:py-4 lg:px-8 cursor-text group flex justify-between items-center">
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 group-focus-within:text-brand-emerald transition-colors">Guests & Rooms</label>
                                <input type="text" placeholder="2 Guests, 1 Room" class="w-full bg-transparent outline-none text-white font-semibold text-lg lg:text-xl placeholder-slate-600 mt-1">
                            </div>
                            <button type="button" class="bg-brand-emerald hover:bg-emerald-400 transition-colors w-14 h-14 rounded-full shadow-[0_5px_15px_rgba(0,200,151,0.4)] hidden lg:flex items-center justify-center shrink-0 ml-4">
                                <i class="fa-solid fa-search text-xl text-slate-900"></i>
                            </button>
                        </div>
                         <button type="button" class="bg-brand-emerald text-slate-900 w-full p-4 rounded-b-3xl text-lg font-bold lg:hidden flex items-center justify-center gap-2">
                            Search Stays <i class="fa-solid fa-search"></i>
                         </button>
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
                <div x-show="tab === 'tours'" style="display: none;" class="w-full">
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
                                <button type="button" class="bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-black text-xs uppercase tracking-widest p-4 rounded-xl transition-all hover:scale-[1.02] active:scale-95 shadow-[0_10px_20px_rgba(234,179,8,0.2)]">Reveal Secret Experiences</button>
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
                <div x-show="tab === 'visas'" style="display: none;" class="w-full">
                    
                    <!-- Atlys Engine Form -->
                    <div class="search-pill bg-[#0B1120]/80 backdrop-blur-xl border border-white/10 rounded-3xl lg:rounded-full p-2 flex flex-col lg:flex-row gap-2 shadow-[0_0_40px_rgba(59,130,246,0.15)] mb-6 relative z-20">
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
                                <input type="text" placeholder="Where are you traveling to?" class="bg-transparent text-white font-bold text-lg outline-none w-full placeholder-slate-600">
                            </div>
                            <button @click="showLeadModal = true; leadContext = 'Visa & Immigration'; leadMessage = 'I need to check entry rules and visa eligibility for my upcoming trip.'" class="bg-blue-600 hover:bg-blue-500 transition-colors text-white font-black px-6 lg:px-8 py-3.5 rounded-xl lg:rounded-full shadow-[0_0_20px_rgba(59,130,246,0.5)] flex items-center gap-2 whitespace-nowrap">
                                Check Entry Rules <i class="fa-solid fa-arrow-right"></i>
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
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
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
                <div x-show="tab === 'transfers'" style="display: none;" class="w-full" x-data="{ transferMode: 'airport' }">
                    
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
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 pb-20">
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

                                <button @click="showLeadModal = true; leadContext = 'Mobility Concierge'; leadMessage = 'I am interested in securing a Maybach/Tesla ground transfer with refreshments.'" 
                                        class="w-full bg-white text-black font-black uppercase tracking-widest py-5 rounded-2xl shadow-2xl hover:bg-indigo-600 hover:text-white transition-all transform hover:scale-[1.01] active:scale-95 text-xs flex items-center justify-center gap-3 mt-4">
                                    Secure My Meet-and-Greet <i class="fa-solid fa-arrow-right"></i>
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
                <div x-show="tab === 'insurance'" style="display: none;" class="w-full" x-data="{ insType: 'medical', insCountry: '', recommended: '' }">
                    
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
                                             <p class="text-white font-black text-xl">$45.00 <span class="text-[9px] text-slate-500">/mo</span></p>
                                             <button class="bg-pink-600 text-white px-4 py-2 rounded-lg text-[9px] font-black uppercase tracking-widest shadow-lg">Lock Policy</button>
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

        <div class="max-w-[90rem] mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-x-12 gap-y-16 mb-20 relative">
            
            <!-- Brand & CTA Col (Takes 2 columns) -->
            <div class="lg:col-span-2">
                <a href="/" class="flex items-center gap-3 group relative z-50 mb-8 inline-flex">
                    <img src="/iswitch_brand_logo.png" class="h-12 w-auto transform group-hover:scale-110 transition-transform duration-500">
                    <span class="text-3xl font-black tracking-tight text-white group-hover:text-brand-orange transition-colors">iSwitch</span>
                </a>
                <p class="text-slate-400 text-base leading-relaxed mb-10 max-w-sm">
                    The Next Big Unicorn in Global Mobility. Search flights, book luxury hotels, and secure visas automatically. Powered by advanced AI and unparalleled design.
                </p>
                
                <!-- App Links -->
                <div class="space-y-4">
                    <span class="text-xs font-bold uppercase tracking-widest text-slate-500 block">Download Mobile App (Optional)</span>
                    <div class="flex flex-wrap gap-4">
                        <a href="#" class="flex items-center gap-3 bg-white/5 hover:bg-white/10 transition-colors border border-white/10 px-6 py-3 rounded-xl w-fit">
                            <i class="fa-brands fa-apple text-2xl"></i>
                            <div class="text-left">
                                <p class="text-[10px] text-slate-400 uppercase font-bold leading-none">Download on the</p>
                                <p class="text-sm font-semibold text-white leading-none mt-1">App Store</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-center gap-3 bg-white/5 hover:bg-white/10 transition-colors border border-white/10 px-6 py-3 rounded-xl w-fit">
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
            <div>
                <h4 class="text-white font-bold text-lg mb-6 flex items-center gap-2"><i class="fa-solid fa-plane-up text-slate-500"></i> Trending Flights</h4>
                <ul class="space-y-4 text-sm text-slate-400 font-medium">
                    <li><a @click="showLeadModal = true; leadContext = 'Aviation Specialist'; leadMessage = 'I want to book a flight from Lagos to London.'" class="hover:text-brand-orange transition-colors flex justify-between items-center group cursor-pointer">Lagos to London <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$750</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Aviation Specialist'; leadMessage = 'I want to book a flight from New York to Paris.'" class="hover:text-brand-orange transition-colors flex justify-between items-center group cursor-pointer">New York to Paris <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$620</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Aviation Specialist'; leadMessage = 'I want to book a flight from Dubai to Tokyo.'" class="hover:text-brand-orange transition-colors flex justify-between items-center group cursor-pointer">Dubai to Tokyo <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$890</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Aviation Specialist'; leadMessage = 'I want to book a flight from Toronto to Miami.'" class="hover:text-brand-orange transition-colors flex justify-between items-center group cursor-pointer">Toronto to Miami <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$310</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Aviation Specialist'; leadMessage = 'I want to book a flight from Accra to Joburg.'" class="hover:text-brand-orange transition-colors flex justify-between items-center group cursor-pointer">Accra to Joburg <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$480</span></a></li>
                </ul>
            </div>

            <!-- Hotels Grid -->
            <div>
                <h4 class="text-white font-bold text-lg mb-6 flex items-center gap-2"><i class="fa-solid fa-hotel text-slate-500"></i> Amazing Hotels</h4>
                <ul class="space-y-4 text-sm text-slate-400 font-medium">
                    <li><a @click="showLeadModal = true; leadContext = 'Hospitality Specialist'; leadMessage = 'I want to book a stay at Soneva Jani.'" class="hover:text-brand-emerald transition-colors flex justify-between items-center group cursor-pointer">Soneva Jani <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$2,400</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Hospitality Specialist'; leadMessage = 'I want to book a stay at Burj Al Arab.'" class="hover:text-brand-emerald transition-colors flex justify-between items-center group cursor-pointer">Burj Al Arab <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$1,850</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Hospitality Specialist'; leadMessage = 'I want to book a stay at Aman Tokyo.'" class="hover:text-brand-emerald transition-colors flex justify-between items-center group cursor-pointer">Aman Tokyo <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$1,200</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Hospitality Specialist'; leadMessage = 'I want to book a stay at The Plaza NY.'" class="hover:text-brand-emerald transition-colors flex justify-between items-center group cursor-pointer">The Plaza NY <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$950</span></a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Hospitality Specialist'; leadMessage = 'I want to book a stay at Ritz Paris.'" class="hover:text-brand-emerald transition-colors flex justify-between items-center group cursor-pointer">Ritz Paris <span class="bg-slate-800 px-2 py-1 relative right-0 group-hover:-translate-x-1 transition-transform rounded-md text-xs border border-white/10">$1,100</span></a></li>
                </ul>
            </div>

            <!-- Consultations Grid -->
            <div>
                <h4 class="text-white font-bold text-lg mb-6 flex items-center gap-2"><i class="fa-solid fa-user-tie text-slate-500"></i> Consultations</h4>
                <ul class="space-y-4 text-sm text-slate-400 font-medium">
                    <li><a @click="showLeadModal = true; leadContext = 'Educational Placement'; leadMessage = 'I am interested in university placements and study abroad support.'" class="hover:text-white transition-colors cursor-pointer">Study Abroad Experts</a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Migration Expert'; leadMessage = 'I need professional immigration support for my relocation.'" class="hover:text-white transition-colors cursor-pointer">Immigration Support</a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Corporate Concierge'; leadMessage = 'I want to discuss a Corporate Relocation or offshore business setup.'" class="hover:text-white transition-colors cursor-pointer">Business & Corp Setup</a></li>
                    <li><a @click="showLeadModal = true; leadContext = 'Visa & Immigration'; leadMessage = 'I need help managing my documents and visa applications in the Vault.'" class="hover:text-white transition-colors cursor-pointer">The Visa Vault</a></li>
                    <li><a href="/user/login" class="hover:text-white transition-colors mt-4 inline-block font-semibold border-b border-slate-700 pb-1">Client Login <i class="fa-solid fa-arrow-right text-[10px] ml-1"></i></a></li>
                </ul>
            </div>

            <!-- Partner Grid -->
            <div>
                <h4 class="text-white font-bold text-lg mb-6 flex items-center gap-2"><i class="fa-solid fa-handshake text-slate-500"></i> Partnerships</h4>
                <ul class="space-y-4 text-sm text-slate-400 font-medium">
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

</body>
</html>
