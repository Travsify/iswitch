<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>God Mode | iSwitch Business Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
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
        .sidebar-item-active {
            background: linear-gradient(90deg, rgba(245, 158, 11, 0.1) 0%, transparent 100%);
            border-left: 3px solid var(--brand-gold);
            color: white;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="antialiased font-sans" x-data="{ 
    activeTab: 'summary',
    stats: { total_users: 0, pending_agents: 0, approved_agents: 0, total_balance: 0 },
    agents: [],
    loading: true,
    
    async init() {
        await this.refreshAll();
    },

    async refreshAll() {
        this.loading = true;
        await Promise.all([this.fetchStats(), this.fetchAgents()]);
        this.loading = false;
    },

    async fetchStats() {
        const res = await fetch('/api/v1/admin/dashboard', { headers: { 'Accept': 'application/json' } });
        this.stats = await res.json();
    },

    async fetchAgents() {
        const res = await fetch('/api/v1/admin/agents?status=pending', { headers: { 'Accept': 'application/json' } });
        this.agents = await res.json();
    },

    async approveAgent(id) {
        if (!confirm('Shall we welcome this agency to iSwitch?')) return;
        const res = await fetch(`/api/v1/admin/agents/${id}/approve`, { 
            method: 'POST', 
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' } 
        });
        const data = await res.json();
        alert('Welcome email sent and API key created!');
        await this.refreshAll();
    },

    async suspendAgent(id) {
        if (!confirm('Are you sure you want to stop this partner?')) return;
        await fetch(`/api/v1/admin/agents/${id}/suspend`, { 
            method: 'POST', 
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' } 
        });
        await this.refreshAll();
    }
}" x-init="init()">

    <div class="min-h-screen flex">
        <!-- SIDEBAR (Tailored Registry) -->
        <aside class="w-72 bg-black border-r border-white/5 flex flex-col fixed h-full z-50">
            <div class="p-8">
                <a href="/" class="text-2xl font-black italic tracking-tighter text-white">iSwitch<span class="text-brand-gold">.</span></a>
                <p class="text-[9px] font-black uppercase tracking-[0.3em] text-slate-600 mt-2">Control Tower</p>
            </div>

            <nav class="flex-grow mt-4 px-4 space-y-2">
                <button @click="activeTab = 'summary'" :class="activeTab === 'summary' ? 'sidebar-item-active' : 'text-slate-500 hover:text-white'" class="w-full flex items-center gap-4 px-6 py-4 rounded-xl transition-all font-bold">
                    <i class="fa-solid fa-house-chimney text-lg"></i> The Big Picture
                </button>
                <button @click="activeTab = 'partners'" :class="activeTab === 'partners' ? 'sidebar-item-active' : 'text-slate-500 hover:text-white'" class="w-full flex items-center gap-4 px-6 py-4 rounded-xl transition-all font-bold group relative">
                    <i class="fa-solid fa-handshake text-lg"></i> Who's Waiting?
                    <span x-show="stats.pending_agents > 0" class="absolute right-4 top-1/2 -translate-y-1/2 bg-brand-gold text-black text-[9px] font-black px-2 py-0.5 rounded-full" x-text="stats.pending_agents"></span>
                </button>
                <button @click="activeTab = 'people'" :class="activeTab === 'people' ? 'sidebar-item-active' : 'text-slate-500 hover:text-white'" class="w-full flex items-center gap-4 px-6 py-4 rounded-xl transition-all font-bold">
                    <i class="fa-solid fa-users text-lg"></i> Our People
                </button>
                <button @click="activeTab = 'vault'" :class="activeTab === 'vault' ? 'sidebar-item-active' : 'text-slate-500 hover:text-white'" class="w-full flex items-center gap-4 px-6 py-4 rounded-xl transition-all font-bold">
                    <i class="fa-solid fa-vault text-lg"></i> The Money Hub
                </button>
            </nav>

            <div class="p-8 border-t border-white/5">
                <div class="bg-white/5 rounded-2xl p-4">
                    <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-1">Status</p>
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-xs text-white font-bold">All Systems Go</span>
                    </div>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT AREA -->
        <main class="flex-grow ml-72 p-10 lg:p-16">
            
            <!-- HEADER -->
            <header class="flex justify-between items-center mb-12">
                <div>
                    <h1 class="text-3xl font-black text-white" x-text="activeTab === 'summary' ? 'Welcome back, Chief' : (activeTab === 'partners' ? 'Reviewing New Businesses' : 'Managing the Network')"></h1>
                    <p class="text-slate-500 font-medium text-sm mt-1">Everything looks smooth today.</p>
                </div>
                <div class="flex items-center gap-6">
                    <div class="text-right">
                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Global Payouts</p>
                        <p class="text-brand-gold font-black text-xl" x-text="'$' + parseFloat(stats.total_balance).toLocaleString()">$0.00</p>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-brand-gold flex items-center justify-center text-black">
                        <i class="fa-solid fa-crown text-xl"></i>
                    </div>
                </div>
            </header>

            <!-- TAB: SUMMARY (The Big Picture) -->
            <div x-show="activeTab === 'summary'" x-transition>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    <div class="glass-card rounded-[40px] p-8 relative overflow-hidden group">
                        <div class="absolute -right-10 -top-10 w-32 h-32 bg-brand-gold/5 blur-3xl group-hover:bg-brand-gold/10 transition-all"></div>
                        <p class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-600 mb-2">Total System Funds</p>
                        <h3 class="text-4xl font-black text-white" x-text="'$' + parseFloat(stats.total_balance).toLocaleString()">$0.00</h3>
                        <p class="text-[10px] text-slate-500 mt-4 leading-relaxed font-bold uppercase tracking-widest">Waiting in wallets</p>
                    </div>
                    <div class="glass-card rounded-[40px] p-8 relative overflow-hidden border-brand-indigo/20">
                        <p class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-600 mb-2">Verified Partners</p>
                        <h3 class="text-4xl font-black text-indigo-400" x-text="stats.approved_agents">0</h3>
                        <p class="text-[10px] text-slate-500 mt-4 leading-relaxed font-bold uppercase tracking-widest">Active businesses</p>
                    </div>
                    <div class="glass-card rounded-[40px] p-8 relative overflow-hidden">
                        <p class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-600 mb-2">Users Enrolled</p>
                        <h3 class="text-4xl font-black text-white" x-text="stats.total_users">0</h3>
                        <p class="text-[10px] text-slate-500 mt-4 leading-relaxed font-bold uppercase tracking-widest">Citizens of iSwitch</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                     <div class="glass-card rounded-[40px] p-10">
                        <h3 class="text-xl font-black text-white mb-6">Live Passport Checks</h3>
                        <div class="space-y-6">
                            <div class="flex items-center justify-between p-4 bg-white/3 rounded-2xl">
                                <span class="text-sm font-bold text-white">UK Visa Check</span>
                                <span class="bg-emerald-500/20 text-emerald-400 text-[10px] font-black px-3 py-1 rounded-full uppercase">Success</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-white/3 rounded-2xl">
                                <span class="text-sm font-bold text-white">Canada E-Visa</span>
                                <span class="bg-amber-500/20 text-amber-500 text-[10px] font-black px-3 py-1 rounded-full uppercase">Pending</span>
                            </div>
                        </div>
                     </div>
                     <div class="glass-card rounded-[40px] p-10 bg-brand-gold/5 border-brand-gold/20 flex flex-col justify-center">
                        <h3 class="text-2xl font-black text-white mb-2">New Business Applications</h3>
                        <p class="text-slate-400 font-medium mb-8 leading-relaxed">You have <span class="text-brand-gold font-black" x-text="stats.pending_agents"></span> companies waiting for your green light.</p>
                        <button @click="activeTab = 'partners'" class="bg-white text-black font-black uppercase tracking-[0.2em] text-[10px] py-4 rounded-2xl transform hover:scale-[1.02] transition-all">Go to Action Desk</button>
                     </div>
                </div>
            </div>

            <!-- TAB: PARTNERS (Who's Waiting?) -->
            <div x-show="activeTab === 'partners'" x-transition x-cloak>
                 <div class="glass-card rounded-[40px] p-10">
                    <div class="flex items-center justify-between mb-10">
                        <h3 class="text-2xl font-black text-white">Business Partner Requests</h3>
                        <div class="flex gap-4">
                            <button @click="refreshAll()" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-white/10 transition-all"><i class="fa-solid fa-rotate"></i></button>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="text-[11px] font-black uppercase tracking-[0.3em] text-slate-600 border-b border-white/5">
                                <tr>
                                    <th class="pb-6">Company Information</th>
                                    <th class="pb-6">The Deal</th>
                                    <th class="pb-6">Action Desk</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="agent in agents" :key="agent.id">
                                    <tr class="group hover:bg-white/3 transition-all">
                                        <td class="py-8">
                                            <div class="flex items-center gap-5">
                                                <div class="w-14 h-14 rounded-2xl bg-black border border-white/10 flex items-center justify-center text-brand-gold text-xl font-black" x-text="agent.business_name?.[0] || agent.name[0]"></div>
                                                <div>
                                                    <p class="text-white font-black text-lg" x-text="agent.business_name || agent.name"></p>
                                                    <p class="text-slate-500 font-bold text-xs" x-text="agent.email"></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-8">
                                            <p class="text-white font-bold text-sm">B2B Partnership</p>
                                            <p class="text-[10px] text-slate-600 uppercase font-black tracking-widest mt-1">Awaiting Key</p>
                                        </td>
                                        <td class="py-8">
                                            <div class="flex items-center gap-3">
                                                <button @click="approveAgent(agent.id)" class="px-6 py-3 rounded-xl bg-emerald-600/10 text-emerald-400 border border-emerald-600/20 text-[10px] font-black uppercase tracking-widest hover:bg-emerald-600 hover:text-white transition-all">Say Yes</button>
                                                <button @click="suspendAgent(agent.id)" class="px-6 py-3 rounded-xl bg-red-600/10 text-red-500 border border-red-600/20 text-[10px] font-black uppercase tracking-widest hover:bg-red-600 hover:text-white transition-all">Say No</button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <tr x-show="agents.length === 0">
                                    <td colspan="3" class="py-20 text-center">
                                        <div class="w-20 h-20 rounded-full bg-white/5 mx-auto mb-6 flex items-center justify-center text-slate-700">
                                            <i class="fa-solid fa-box-open text-3xl"></i>
                                        </div>
                                        <p class="text-slate-500 font-bold uppercase tracking-widest text-xs">The application desk is empty.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>

            <!-- TAB: PEOPLE (Our People) -->
            <div x-show="activeTab === 'people'" x-transition x-cloak>
                <div class="glass-card rounded-[40px] p-10 text-center py-32">
                     <i class="fa-solid fa-users-viewfinder text-6xl text-slate-800 mb-8"></i>
                     <h2 class="text-2xl font-black text-white">Managing Citizens</h2>
                     <p class="text-slate-500 max-w-sm mx-auto mt-4 font-medium uppercase tracking-widest text-xs leading-loose">The population registry is currently being synchronized with the global node. Stand by.</p>
                </div>
            </div>

             <!-- TAB: VAULT (The Money Hub) -->
             <div x-show="activeTab === 'vault'" x-transition x-cloak>
                <div class="glass-card rounded-[40px] p-10 text-center py-32">
                     <i class="fa-solid fa-coins text-6xl text-brand-gold/50 mb-8"></i>
                     <h2 class="text-2xl font-black text-white">The Money Hub</h2>
                     <p class="text-slate-500 max-w-sm mx-auto mt-4 font-medium uppercase tracking-widest text-xs leading-loose">Detailed transaction auditing and payout logs are being indexed. Security protocol active.</p>
                </div>
            </div>

        </main>
    </div>

    <!-- Loading Overlay -->
    <div x-show="loading" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-[200] flex items-center justify-center" x-cloak>
        <div class="flex flex-col items-center gap-4">
            <div class="w-12 h-12 border-4 border-brand-gold border-t-transparent rounded-full animate-spin"></div>
            <p class="text-[10px] font-black text-brand-gold uppercase tracking-[0.5em]">Syncing All Nodes...</p>
        </div>
    </div>

</body>
</html>
