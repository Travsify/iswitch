<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>God Mode | iSwitch Super-Admin</title>
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
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="antialiased font-sans" x-data="{ 
    stats: { total_users: 0, pending_agents: 0, approved_agents: 0, total_balance: 0 },
    agents: [],
    loading: true,
    
    async init() {
        await this.fetchStats();
        await this.fetchAgents();
        this.loading = false;
    },

    async fetchStats() {
        const res = await fetch('/api/admin/dashboard', { headers: { 'Accept': 'application/json' } });
        this.stats = await res.json();
    },

    async fetchAgents() {
        const res = await fetch('/api/admin/agents?status=pending', { headers: { 'Accept': 'application/json' } });
        this.agents = await res.json();
    },

    async approveAgent(id) {
        if (!confirm('Provision Master API Key and Approve Agency?')) return;
        const res = await fetch(`/api/admin/agents/${id}/approve`, { 
            method: 'POST', 
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' } 
        });
        const data = await res.json();
        alert(data.message);
        await this.init();
    },

    async suspendAgent(id) {
        if (!confirm('Suspend Agency and Revoke API Key?')) return;
        const res = await fetch(`/api/admin/agents/${id}/suspend`, { 
            method: 'POST', 
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' } 
        });
        await this.init();
    }
}" x-init="init()">

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
            </div>
        </nav>

        <main class="flex-grow p-8 lg:p-12 mt-12 w-full max-w-[100rem] mx-auto">
            
            <!-- TOP STATS: THE HEARTBEAT -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="glass-panel rounded-3xl p-6 relative group overflow-hidden">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">Global Ecosystem Balance</p>
                    <h3 class="text-3xl font-black text-white" x-text="'$' + parseFloat(stats.total_balance).toLocaleString()">$0.00</h3>
                </div>
                <div class="glass-panel rounded-3xl p-6 relative group overflow-hidden">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">Pending KYB Approvals</p>
                    <h3 class="text-3xl font-black text-brand-gold" x-text="stats.pending_agents">0</h3>
                </div>
                <div class="glass-panel rounded-3xl p-6 relative group overflow-hidden">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">Total iSwitch Entities</p>
                    <h3 class="text-3xl font-black text-white" x-text="stats.total_users">0</h3>
                </div>
                <div class="glass-panel rounded-3xl p-6 relative group overflow-hidden border-brand-gold/20">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">Active B2B Partners</p>
                    <h3 class="text-3xl font-black text-indigo-400 italic font-serif" x-text="stats.approved_agents">0</h3>
                </div>
            </div>

            <!-- LIVE WAR FEED -->
            <div class="mb-12 glass-panel rounded-2xl p-4 overflow-hidden border-brand-indigo/20">
                <div class="war-marquee">
                    <div class="war-marquee-content flex gap-12 text-[11px] font-bold uppercase tracking-[0.2em] text-indigo-300">
                        <span><i class="fa-solid fa-bolt text-brand-gold"></i> Live Action: Agent Verification Protocol engaged</span>
                        <span><i class="fa-solid fa-shield text-brand-gold"></i> Security: Monitoring cryptographically secure API keys</span>
                        <span><i class="fa-solid fa-vault text-brand-gold"></i> KYB: Strict administrative approval enforced</span>
                        <span><i class="fa-solid fa-bolt text-brand-gold"></i> Live Action: Agent Verification Protocol engaged</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-12">
                <!-- AGENT MANAGEMENT MATRIX -->
                <div class="glass-panel rounded-3xl p-8 border-white/5">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-xl font-black text-white">Agency <span class="text-slate-500 italic font-serif">Onboarding Matrix</span></h3>
                        <button @click="fetchAgents()" class="text-[10px] font-black uppercase tracking-widest text-indigo-400 border border-indigo-400/30 px-3 py-1 rounded-full"><i class="fa-solid fa-sync mr-1"></i> Refresh Node</button>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="border-b border-white/5 text-[10px] uppercase font-black tracking-widest text-slate-500">
                                <tr>
                                    <th class="py-4">Agency / Business</th>
                                    <th class="py-4">Vetting Status</th>
                                    <th class="py-4">Master API Key</th>
                                    <th class="py-4">God Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <template x-for="agent in agents" :key="agent.id">
                                    <tr class="border-b border-white/5 group hover:bg-white/5 transition-colors">
                                        <td class="py-6">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 border border-indigo-500/50 flex items-center justify-center text-indigo-300 text-xs font-black" x-text="agent.business_name?.[0] || agent.name[0]"></div>
                                                <div>
                                                    <p class="text-white font-bold" x-text="agent.business_name || agent.name"></p>
                                                    <p class="text-[10px] text-slate-500 uppercase tracking-widest" x-text="agent.email"></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-6">
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-brand-gold/10 border border-brand-gold/20 text-[9px] font-black uppercase text-brand-gold" x-text="agent.kyb_status"></span>
                                        </td>
                                        <td class="py-6 font-mono text-[9px] text-slate-600">
                                            <span x-text="agent.api_key || 'Awaiting Provisioning...'"></span>
                                        </td>
                                        <td class="py-6">
                                            <div class="flex items-center gap-4">
                                                <button @click="approveAgent(agent.id)" class="text-emerald-500 hover:text-white transition-colors" title="Approve & Provision KEY"><i class="fa-solid fa-check-double text-lg"></i></button>
                                                <button @click="suspendAgent(agent.id)" class="text-red-500 hover:text-white transition-colors" title="Suspend Agent"><i class="fa-solid fa-ban text-lg"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <tr x-show="agents.length === 0">
                                    <td colspan="4" class="py-12 text-center text-slate-500 italic text-xs">No pending onboarding requests located.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>

        <!-- FOOTER -->
        <footer class="p-8 border-t border-white/5 text-center">
            <p class="text-[10px] text-slate-500 font-black uppercase tracking-[0.5em]">Global Mobility God Mode v1.2.0 (Synchronized Build)</p>
        </footer>
    </div>
</body>
</html>
