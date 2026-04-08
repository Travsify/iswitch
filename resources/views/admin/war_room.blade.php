<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>God Mode | iSwitch Super-Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&family=Outfit:wght@300;400;700;900&family=Playfair+Display:ital,wght@0,900;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fb07297e61.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        :root {
            --brand-obsidian: #05070a;
            --brand-gold: #f59e0b;
            --brand-indigo: #6366f1;
        }
        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--brand-obsidian);
            color: #e2e8f0;
            overflow-x: hidden;
        }
        .god-mode-pulse {
            box-shadow: inset 0 0 50px rgba(99, 102, 241, 0.1), 0 0 20px rgba(245, 158, 11, 0.1);
            border: 1px solid rgba(245, 158, 11, 0.2);
        }
        .war-marquee {
            white-space: nowrap;
            overflow: hidden;
            position: relative;
        }
        .war-marquee-content {
            display: inline-block;
            animation: marquee 30s linear infinite;
        }
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            height: 4px;
            background: rgba(99, 102, 241, 0.2);
            border-radius: 5px;
            outline: none;
        }
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            background: var(--brand-gold);
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 0 10px var(--brand-gold);
        }
    </style>
</head>
<body class="antialiased font-sans" x-data="{ 
    markupFlights: 12, 
    markupHotels: 10, 
    markupVisas: 15, 
    markupTours: 8,
    appLive: true,
    mobileSynced: true
}">
    <!-- God Mode Overlay -->
    <div class="fixed inset-0 pointer-events-none border-[12px] border-brand-gold/10 z-[100] god-mode-pulse"></div>

    <div class="min-h-screen flex flex-col pt-12">
        <!-- HEADER -->
        <nav class="fixed top-0 w-full z-50 glass-panel border-b border-white/5 py-4 px-8 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <a href="/" class="text-2xl font-black italic font-serif tracking-tighter text-white">iSwitch<span class="text-brand-gold">.</span></a>
                <div class="h-6 w-px bg-white/10 mx-2"></div>
                <div class="flex items-center gap-2 px-3 py-1 bg-brand-gold/10 border border-brand-gold/30 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-brand-gold animate-ping"></span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-brand-gold">God Mode Active</span>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="text-[10px] font-mono text-slate-500">> Session_ID: ADMIN-{{ rand(1000,9999) }}</div>
                <button class="bg-white/5 hover:bg-white/10 p-2 rounded-lg text-white transition-all"><i class="fa-solid fa-gear"></i></button>
            </div>
        </nav>

        <main class="flex-grow p-8 lg:p-12 mt-12 w-full max-w-[100rem] mx-auto">
            
            <!-- TOP STATS: THE HEARTBEAT -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="glass-panel rounded-3xl p-6 relative group overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-brand-gold/5 blur-3xl group-hover:bg-brand-gold/10 transition-all"></div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">Global Active Revenue</p>
                    <h3 class="text-3xl font-black text-white">$142,840.00</h3>
                    <div class="mt-4 flex items-center gap-2 text-[10px] text-emerald-400 font-bold">
                        <i class="fa-solid fa-arrow-up"></i> 24% from last session
                    </div>
                </div>
                <div class="glass-panel rounded-3xl p-6 relative group overflow-hidden">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">Active Atlys Syncs</p>
                    <h3 class="text-3xl font-black text-white">1,204</h3>
                    <div class="mt-4 flex items-center gap-2 text-[10px] text-slate-400 font-bold">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> 42 Live Consultations
                    </div>
                </div>
                <div class="glass-panel rounded-3xl p-6 relative group overflow-hidden">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">Mobile App Deployment</p>
                    <h3 class="text-3xl font-black text-white">v2.1.0</h3>
                    <div class="mt-4 flex items-center gap-2 text-[10px] text-indigo-400 font-bold">
                        <i class="fa-solid fa-check"></i> Production Ready
                    </div>
                </div>
                <div class="glass-panel rounded-3xl p-6 relative group overflow-hidden border-brand-gold/20">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">Founder's God Profit</p>
                    <h3 class="text-3xl font-black text-brand-gold italic font-serif">$28,402.15</h3>
                    <div class="mt-4 flex items-center gap-2 text-[10px] text-brand-gold font-bold">
                        <i class="fa-solid fa-crown"></i> Net After API Margins
                    </div>
                </div>
            </div>

            <!-- LIVE WAR FEED -->
            <div class="mb-12 glass-panel rounded-2xl p-4 overflow-hidden border-brand-indigo/20">
                <div class="war-marquee">
                    <div class="war-marquee-content flex gap-12 text-[11px] font-bold uppercase tracking-[0.2em] text-indigo-300">
                        <span><i class="fa-solid fa-bolt text-brand-gold"></i> Live Action: Mr. Henderson synced Flight UA-2433</span>
                        <span><i class="fa-solid fa-bolt text-brand-gold"></i> Live Action: Agent Sarah generated 3 Visa Roadmaps</span>
                        <span><i class="fa-solid fa-bolt text-brand-gold"></i> Live Action: 14 Users currently in 'The Vault'</span>
                        <span><i class="fa-solid fa-bolt text-brand-gold"></i> Live Action: New Maybach Transfer booked in London</span>
                        <span><i class="fa-solid fa-bolt text-brand-gold"></i> Live Action: Mr. Henderson synced Flight UA-2433</span>
                        <span><i class="fa-solid fa-bolt text-brand-gold"></i> Live Action: Agent Sarah generated 3 Visa Roadmaps</span>
                        <span><i class="fa-solid fa-bolt text-brand-gold"></i> Live Action: 14 Users currently in 'The Vault'</span>
                        <span><i class="fa-solid fa-bolt text-brand-gold"></i> Live Action: New Maybach Transfer booked in London</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Col 1: THE MARKUP ENGINE -->
                <div class="lg:col-span-1 border-r border-white/5 pr-0 lg:pr-12">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-2xl font-black text-white">The Markup <span class="text-brand-gold">Engine</span></h2>
                        <i class="fa-solid fa-sliders text-brand-gold text-lg"></i>
                    </div>
                    
                    <div class="space-y-10">
                        <!-- Flights -->
                        <div class="space-y-4">
                            <div class="flex justify-between items-center text-[11px] font-black uppercase tracking-widest">
                                <span class="text-slate-500">Flights Margin</span>
                                <span class="text-brand-gold" x-text="markupFlights + '%'"></span>
                            </div>
                            <input type="range" min="0" max="30" x-model="markupFlights">
                            <p class="text-[9px] text-slate-600 italic">Connected to AviationStack API Lead-Time Logic</p>
                        </div>
                        <!-- Hotels -->
                        <div class="space-y-4">
                            <div class="flex justify-between items-center text-[11px] font-black uppercase tracking-widest">
                                <span class="text-slate-500">Hotels Margin</span>
                                <span class="text-brand-gold" x-text="markupHotels + '%'"></span>
                            </div>
                            <input type="range" min="0" max="30" x-model="markupHotels">
                            <p class="text-[9px] text-slate-600 italic">Includes "Stay-to-Visa" cross-sell buffer</p>
                        </div>
                        <!-- Visas -->
                        <div class="space-y-4">
                            <div class="flex justify-between items-center text-[11px] font-black uppercase tracking-widest">
                                <span class="text-slate-500">Visas Fixed Fee</span>
                                <span class="text-brand-gold" x-text="'$' + markupVisas"></span>
                            </div>
                            <input type="range" min="10" max="100" x-model="markupVisas">
                            <p class="text-[9px] text-slate-600 italic">Fulfillment of "Embassy White-Glove" service</p>
                        </div>
                        <!-- Tours -->
                        <div class="space-y-4">
                            <div class="flex justify-between items-center text-[11px] font-black uppercase tracking-widest">
                                <span class="text-slate-500">Tours Spread</span>
                                <span class="text-brand-gold" x-text="markupTours + '%'"></span>
                            </div>
                            <input type="range" min="0" max="25" x-model="markupTours">
                            <p class="text-[9px] text-slate-600 italic">Hidden in 'Alpha Series' inventory prices</p>
                        </div>

                        <button class="w-full bg-brand-gold text-black font-black uppercase tracking-widest py-4 rounded-xl shadow-[0_10px_30px_rgba(245,158,11,0.3)] hover:scale-[1.02] active:scale-95 transition-all text-xs">
                             Update Global Wholesale Pricing <i class="fa-solid fa-sync ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Col 2 & 3: LEADRADAR & APP CONTROL -->
                <div class="lg:col-span-2 space-y-12">
                    <!-- APP STATUS CARD -->
                    <div class="glass-panel rounded-3xl p-8 border-brand-indigo/30 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-brand-indigo/10 to-transparent"></div>
                        <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                            <div>
                                <h3 class="text-2xl font-black text-white mb-2">Ecosystem <span class="text-indigo-400">Heartbeat</span></h3>
                                <p class="text-slate-400 text-sm">Deployment status of your Web & Mobile assets.</p>
                            </div>
                            <div class="flex gap-4">
                                <!-- Web Status -->
                                <div class="bg-black/40 rounded-2xl p-4 border border-white/5 flex flex-col items-center min-w-[120px]">
                                    <p class="text-[9px] font-black uppercase tracking-widest text-slate-500 mb-3 text-center">Web Platform</p>
                                    <button @click="appLive = !appLive" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none" :class="appLive ? 'bg-emerald-600' : 'bg-slate-700'">
                                        <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform" :class="appLive ? 'translate-x-6' : 'translate-x-1'"></span>
                                    </button>
                                    <p class="text-[9px] font-black mt-2 tracking-widest" :class="appLive ? 'text-emerald-400' : 'text-slate-500'" x-text="appLive ? 'ONLINE' : 'MAINTENANCE'"></p>
                                </div>
                                <!-- Mobile Status -->
                                <div class="bg-black/40 rounded-2xl p-4 border border-white/5 flex flex-col items-center min-w-[120px]">
                                    <p class="text-[9px] font-black uppercase tracking-widest text-slate-500 mb-3 text-center">iOS/Android</p>
                                    <button @click="mobileSynced = !mobileSynced" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none" :class="mobileSynced ? 'bg-indigo-600' : 'bg-slate-700'">
                                        <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform" :class="mobileSynced ? 'translate-x-6' : 'translate-x-1'"></span>
                                    </button>
                                    <p class="text-[9px] font-black mt-2 tracking-widest" :class="mobileSynced ? 'text-indigo-400' : 'text-slate-500'" x-text="mobileSynced ? 'SYNCED' : 'DISCONNECTED'"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FULFILLMENT MATRIX -->
                    <div class="glass-panel rounded-3xl p-8 border-white/5">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-xl font-black text-white">White-Glove <span class="text-slate-500 italic font-serif">Process Feed</span></h3>
                            <button class="text-[10px] font-black uppercase tracking-widest text-indigo-400 border border-indigo-400/30 px-3 py-1 rounded-full">Explore Audit Ledger</button>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="border-b border-white/5 text-[10px] uppercase font-black tracking-widest text-slate-500">
                                    <tr>
                                        <th class="py-4">Lead / Identity</th>
                                        <th class="py-4">Service Required</th>
                                        <th class="py-4">Fulfillment Status</th>
                                        <th class="py-4">God Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
                                    <tr class="border-b border-white/5 group hover:bg-white/5 transition-colors">
                                        <td class="py-6">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-indigo-500/20 border border-indigo-500/50 flex items-center justify-center text-indigo-300 text-xs">JH</div>
                                                <div>
                                                    <p class="text-white font-bold">James Henderson</p>
                                                    <p class="text-[10px] text-slate-500 uppercase tracking-widest">Vault ID: #42031</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-6">
                                            <p class="text-white font-medium">Schengen E-Visa Concierge</p>
                                            <p class="text-[10px] text-brand-gold font-black uppercase tracking-tighter">Premium Service</p>
                                        </td>
                                        <td class="py-6">
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-[9px] font-black uppercase text-indigo-400">
                                                In Verification
                                            </span>
                                        </td>
                                        <td class="py-6">
                                            <button class="text-brand-gold hover:text-white transition-colors"><i class="fa-solid fa-eye-low-vision text-lg"></i></button>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-white/5 group hover:bg-white/5 transition-colors">
                                        <td class="py-6">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-500/50 flex items-center justify-center text-emerald-300 text-xs">MY</div>
                                                <div>
                                                    <p class="text-white font-bold">Musa Yahaya</p>
                                                    <p class="text-[10px] text-slate-500 uppercase tracking-widest">Vault ID: #99281</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-6">
                                            <p class="text-white font-medium">Maybach Ground Control</p>
                                            <p class="text-[10px] text-slate-500 font-black uppercase tracking-tighter">London Chauffeur</p>
                                        </td>
                                        <td class="py-6">
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-[9px] font-black uppercase text-emerald-400">
                                                Fulfillment Ready
                                            </span>
                                        </td>
                                        <td class="py-6">
                                            <button class="text-brand-gold hover:text-white transition-colors"><i class="fa-solid fa-check-double text-lg"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <!-- FOOTER -->
        <footer class="p-8 border-t border-white/5 text-center">
            <p class="text-[10px] text-slate-500 font-black uppercase tracking-[0.5em]">Global Mobility God Mode v1.0.0 (Beta)</p>
        </footer>
    </div>
</body>
</html>
