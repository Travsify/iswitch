<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>God Mode Login | iSwitch</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #05070a;
            color: #e2e8f0;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-brand-orange/10 blur-[120px] rounded-full"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-brand-emerald/10 blur-[120px] rounded-full"></div>
    </div>

    <div class="w-full max-w-md relative z-10" x-data="{ 
        email: '', 
        password: '', 
        loading: false, 
        error: '',
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
                if (res.ok) {
                    window.location.href = '/admin/god-mode?key=iswitch_elite';
                } else {
                    this.error = data.message || 'Invalid Access Key';
                }
            } catch (e) {
                this.error = 'Connection error. Trace lost.';
            } finally {
                this.loading = false;
            }
        }
    }">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-black text-white italic mb-2">iSwitch<span class="text-amber-500">.</span></h1>
            <p class="text-[10px] font-black uppercase tracking-[0.4em] text-slate-500">Super-Admin Access Grid</p>
        </div>

        <div class="login-card rounded-[32px] p-8 sm:p-10 shadow-2xl">
            <h2 class="text-xl font-bold text-white mb-6">Verify Identity</h2>
            
            <form @submit.prevent="login()" class="space-y-6">
                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2 ml-1">Admin ID (Email)</label>
                    <input type="email" x-model="email" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white outline-none focus:border-amber-500/50 transition-all font-bold placeholder-slate-700" placeholder="admin@iswitch.com">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2 ml-1">Secure Passkey</label>
                    <input type="password" x-model="password" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white outline-none focus:border-amber-500/50 transition-all font-bold placeholder-slate-700" placeholder="••••••••">
                </div>

                <div x-show="error" class="bg-red-500/10 border border-red-500/20 text-red-500 text-[10px] font-bold p-3 rounded-xl" x-text="error" x-cloak></div>

                <button type="submit" :disabled="loading" class="w-full bg-white text-black font-black uppercase tracking-widest py-5 rounded-2xl hover:bg-amber-500 hover:text-white transition-all transform active:scale-95 flex items-center justify-center gap-3">
                    <span x-show="!loading">Enter God Mode</span>
                    <span x-show="loading"><i class="fa-solid fa-spinner animate-spin"></i> Verifying...</span>
                </button>
            </form>
        </div>

        <p class="text-center text-[9px] text-slate-600 mt-8 uppercase tracking-widest font-bold">
            <i class="fa-solid fa-shield-halved mr-1"></i> End-to-End Encrypted Terminal
        </p>
    </div>
</body>
</html>
