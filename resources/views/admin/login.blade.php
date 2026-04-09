<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | iSwitch Control Tower</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { gold: '#f59e0b', obsidian: '#05070a', indigo: '#6366f1' }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #05070a;
            color: #e2e8f0;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.06);
        }
        .feature-pill {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
        }
        .glow-line {
            background: linear-gradient(90deg, transparent, #f59e0b, transparent);
        }
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-8px)} }
        .float-anim { animation: float 4s ease-in-out infinite; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 sm:p-6 relative overflow-hidden">

    <!-- Ambient Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-60 -right-60 w-[500px] h-[500px] bg-amber-500/8 blur-[150px] rounded-full"></div>
        <div class="absolute -bottom-60 -left-60 w-[500px] h-[500px] bg-indigo-500/8 blur-[150px] rounded-full"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-amber-500/3 blur-[200px] rounded-full"></div>
    </div>

    <div class="w-full max-w-5xl relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-center" x-data="{ 
        email: '', 
        password: '', 
        loading: false, 
        error: '',
        success: false,
        async login() {
            this.loading = true;
            this.error = '';
            try {
                const res = await fetch('/api/login', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                    body: JSON.stringify({ email: this.email, password: this.password })
                });
                const data = await res.json();
                if (res.ok && data.user && data.user.role === 'admin') {
                    this.success = true;
                    setTimeout(() => {
                        window.location.href = '/admin/god-mode?key=iswitch_elite';
                    }, 1200);
                } else if (res.ok) {
                    this.error = 'Access Denied. This portal is restricted to administrators only.';
                } else {
                    this.error = data.message || 'Invalid credentials. Please try again.';
                }
            } catch (e) {
                this.error = 'Connection failed. Please check your network.';
            } finally {
                this.loading = false;
            }
        }
    }">

        <!-- LEFT: What Admin Carries -->
        <div class="hidden lg:block">
            <div class="mb-10">
                <a href="/" class="inline-flex items-center gap-3 group mb-8">
                    <img src="/iswitch_brand_logo.png" onerror="this.onerror=null; this.src='https://iswitch.onrender.com/iswitch_brand_logo.png'" class="h-10 w-auto">
                    <span class="text-2xl font-black tracking-tight text-white group-hover:text-brand-gold transition-colors">iSwitch</span>
                </a>
                <h2 class="text-4xl font-black text-white leading-tight mt-6">
                    The Control <br><span class="text-brand-gold">Tower.</span>
                </h2>
                <p class="text-slate-400 text-base mt-4 leading-relaxed max-w-sm">
                    Full administrative oversight of the iSwitch global mobility ecosystem. One login to manage everything.
                </p>
            </div>

            <!-- What Admin Carries: Feature Grid -->
            <div class="space-y-3">
                <div class="feature-pill rounded-2xl px-5 py-4 flex items-center gap-4 hover:border-brand-gold/30 transition-all group">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-500 shrink-0">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <div>
                        <p class="text-white font-bold text-sm">B2B Partner Governance</p>
                        <p class="text-slate-500 text-xs">Approve or suspend travel agencies. Issue API keys.</p>
                    </div>
                </div>

                <div class="feature-pill rounded-2xl px-5 py-4 flex items-center gap-4 hover:border-brand-gold/30 transition-all group">
                    <div class="w-10 h-10 rounded-xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400 shrink-0">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div>
                        <p class="text-white font-bold text-sm">User & Lead Management</p>
                        <p class="text-slate-500 text-xs">Monitor signups, track leads, and manage all customers.</p>
                    </div>
                </div>

                <div class="feature-pill rounded-2xl px-5 py-4 flex items-center gap-4 hover:border-brand-gold/30 transition-all group">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 shrink-0">
                        <i class="fa-solid fa-vault"></i>
                    </div>
                    <div>
                        <p class="text-white font-bold text-sm">Financial Oversight</p>
                        <p class="text-slate-500 text-xs">Global wallet balances, payouts, and transaction auditing.</p>
                    </div>
                </div>

                <div class="feature-pill rounded-2xl px-5 py-4 flex items-center gap-4 hover:border-brand-gold/30 transition-all group">
                    <div class="w-10 h-10 rounded-xl bg-pink-500/10 border border-pink-500/20 flex items-center justify-center text-pink-400 shrink-0">
                        <i class="fa-solid fa-plane"></i>
                    </div>
                    <div>
                        <p class="text-white font-bold text-sm">Booking & Service Analytics</p>
                        <p class="text-slate-500 text-xs">Flights, hotels, visas, insurance — full pipeline visibility.</p>
                    </div>
                </div>

                <div class="feature-pill rounded-2xl px-5 py-4 flex items-center gap-4 hover:border-brand-gold/30 transition-all group">
                    <div class="w-10 h-10 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 shrink-0">
                        <i class="fa-solid fa-key"></i>
                    </div>
                    <div>
                        <p class="text-white font-bold text-sm">API Key Provisioning</p>
                        <p class="text-slate-500 text-xs">Auto-generate secure master keys for verified partners.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT: Login Form -->
        <div>
            <!-- Mobile-only branding -->
            <div class="text-center mb-8 lg:hidden">
                <a href="/" class="inline-flex items-center gap-3 group mb-4">
                    <img src="/iswitch_brand_logo.png" onerror="this.onerror=null; this.src='https://iswitch.onrender.com/iswitch_brand_logo.png'" class="h-10 w-auto">
                    <span class="text-2xl font-black tracking-tight text-white">iSwitch</span>
                </a>
                <p class="text-[10px] font-black uppercase tracking-[0.4em] text-slate-500 mt-2">Admin Control Tower</p>
            </div>

            <div class="login-card rounded-[32px] p-8 sm:p-10 shadow-2xl relative overflow-hidden">
                <!-- Decorative glow -->
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-32 h-px glow-line"></div>
                
                <!-- Crown Icon -->
                <div class="w-16 h-16 rounded-2xl bg-brand-gold/10 border border-brand-gold/20 flex items-center justify-center mx-auto mb-6 float-anim">
                    <i class="fa-solid fa-crown text-brand-gold text-2xl"></i>
                </div>

                <h2 class="text-2xl font-black text-white text-center mb-1">Welcome Back</h2>
                <p class="text-slate-500 text-sm text-center mb-8">Sign in to access the Control Tower</p>
                
                <!-- Success State -->
                <div x-show="success" x-cloak class="text-center py-10">
                    <div class="w-20 h-20 rounded-full bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center mx-auto mb-6">
                        <i class="fa-solid fa-check text-emerald-400 text-3xl"></i>
                    </div>
                    <p class="text-white font-bold text-lg">Identity Verified</p>
                    <p class="text-slate-500 text-xs mt-2 uppercase tracking-widest font-bold">Redirecting to Command Center...</p>
                </div>

                <!-- Login Form -->
                <form x-show="!success" @submit.prevent="login()" class="space-y-5">
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2 ml-1">Email Address</label>
                        <div class="relative">
                            <i class="fa-solid fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-slate-600 text-sm"></i>
                            <input type="email" x-model="email" required class="w-full bg-white/5 border border-white/10 rounded-2xl pl-12 pr-6 py-4 text-white outline-none focus:border-brand-gold/50 focus:ring-2 focus:ring-brand-gold/10 transition-all font-semibold placeholder-slate-700 text-sm" placeholder="admin@iswitch.com">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2 ml-1">Password</label>
                        <div class="relative">
                            <i class="fa-solid fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-slate-600 text-sm"></i>
                            <input type="password" x-model="password" required class="w-full bg-white/5 border border-white/10 rounded-2xl pl-12 pr-6 py-4 text-white outline-none focus:border-brand-gold/50 focus:ring-2 focus:ring-brand-gold/10 transition-all font-semibold placeholder-slate-700 text-sm" placeholder="••••••••••">
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div x-show="error" x-cloak class="flex items-center gap-3 bg-red-500/10 border border-red-500/20 text-red-400 text-xs font-bold p-4 rounded-xl">
                        <i class="fa-solid fa-triangle-exclamation shrink-0"></i>
                        <span x-text="error"></span>
                    </div>

                    <button type="submit" :disabled="loading" class="w-full bg-brand-gold text-black font-black uppercase tracking-widest py-4 rounded-2xl hover:bg-amber-400 transition-all transform active:scale-[0.98] flex items-center justify-center gap-3 text-sm shadow-lg shadow-brand-gold/20">
                        <span x-show="!loading"><i class="fa-solid fa-right-to-bracket mr-2"></i> Sign In</span>
                        <span x-show="loading"><i class="fa-solid fa-spinner animate-spin mr-2"></i> Verifying...</span>
                    </button>
                </form>

                <!-- Divider -->
                <div class="flex items-center gap-4 mt-8 mb-6" x-show="!success">
                    <div class="flex-grow h-px bg-white/5"></div>
                    <span class="text-[9px] text-slate-600 font-black uppercase tracking-widest">Admin Access Only</span>
                    <div class="flex-grow h-px bg-white/5"></div>
                </div>

                <!-- Quick Info (Mobile: What admin carries) -->
                <div class="grid grid-cols-2 gap-3 lg:hidden" x-show="!success">
                    <div class="bg-white/3 rounded-xl p-3 text-center">
                        <i class="fa-solid fa-handshake text-amber-500 text-lg mb-1"></i>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wide">B2B Partners</p>
                    </div>
                    <div class="bg-white/3 rounded-xl p-3 text-center">
                        <i class="fa-solid fa-users text-indigo-400 text-lg mb-1"></i>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wide">Users & Leads</p>
                    </div>
                    <div class="bg-white/3 rounded-xl p-3 text-center">
                        <i class="fa-solid fa-vault text-emerald-400 text-lg mb-1"></i>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wide">Finances</p>
                    </div>
                    <div class="bg-white/3 rounded-xl p-3 text-center">
                        <i class="fa-solid fa-key text-cyan-400 text-lg mb-1"></i>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wide">API Keys</p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex items-center justify-between mt-6 px-2">
                <p class="text-[9px] text-slate-600 uppercase tracking-widest font-bold">
                    <i class="fa-solid fa-shield-halved mr-1 text-brand-gold/50"></i> Encrypted Session
                </p>
                <a href="/" class="text-[9px] text-slate-600 uppercase tracking-widest font-bold hover:text-white transition-colors">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Back to iSwitch
                </a>
            </div>
        </div>

    </div>
</body>
</html>
