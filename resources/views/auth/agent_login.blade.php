<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>iSwitch | Partner & Agent Sign In</title>
    <link rel="icon" href="/iswitch_brand_logo.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Outfit', 'sans-serif'] },
                    colors: { 'brand-orange': '#FF7D00', 'brand-emerald': '#00C897' }
                }
            }
        }
    </script>
    <style>
        body { background-color: #020617; color: white; -webkit-font-smoothing: antialiased; }
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.05); }
        .glow-emerald { filter: drop-shadow(0 0 10px rgba(0, 200, 151, 0.3)); }
    </style>
</head>
<body class="min-h-screen flex flex-col lg:flex-row overflow-x-hidden">

    <!-- LEFT PANE -->
    <div class="lg:w-[40%] bg-slate-950 relative border-b lg:border-b-0 lg:border-r border-white/10 flex flex-col p-12 lg:p-20 overflow-hidden">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-brand-emerald/10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-[-100px] right-[-100px] w-96 h-96 bg-brand-orange/5 blur-[120px] rounded-full"></div>
        
        <div class="relative z-10 flex flex-col h-full">
            <a href="/" class="flex items-center gap-3 group mb-20">
                <img src="/iswitch_brand_logo.png" onerror="this.onerror=null; this.src='https://iswitch.onrender.com/iswitch_brand_logo.png'" class="h-10 w-auto glow-emerald">
                <span class="text-2xl font-black tracking-tight text-white">iSwitch <span class="text-brand-emerald">Partners</span></span>
            </a>

            <div class="space-y-12">
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.3em] text-brand-emerald mb-4 block">Partner & Agent Portal</span>
                    <h1 class="text-4xl lg:text-5xl font-black leading-tight mb-6 text-white">Grow Your <br>Travel Business.</h1>
                    <p class="text-slate-400 text-lg lg:text-xl leading-relaxed">Sign in to your partner dashboard to manage bookings, track commissions, and serve your clients with iSwitch inventory.</p>
                </div>

                <div class="space-y-8">
                    <div class="flex gap-6 items-center">
                        <div class="w-12 h-12 rounded-2xl glass flex items-center justify-center text-brand-emerald text-xl shadow-2xl">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-lg">Agency Desk</h4>
                            <p class="text-sm text-slate-500">Manage your clients, bookings, and documents.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 items-center">
                        <div class="w-12 h-12 rounded-2xl glass flex items-center justify-center text-brand-orange text-xl shadow-2xl">
                            <i class="fa-solid fa-coins"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-lg">Earnings & Payouts</h4>
                            <p class="text-sm text-slate-500">Track commissions and withdraw to your bank.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 items-center">
                        <div class="w-12 h-12 rounded-2xl glass flex items-center justify-center text-indigo-400 text-xl shadow-2xl">
                            <i class="fa-solid fa-plane-departure"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-lg">Flights, Hotels & Insurance</h4>
                            <p class="text-sm text-slate-500">Book on behalf of your customers at partner rates.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-auto pt-20 border-t border-white/5">
                <p class="text-xs text-slate-500 font-medium uppercase tracking-widest"><i class="fa-solid fa-shield-heart mr-1 text-brand-emerald/50"></i> Protected by iSwitch</p>
            </div>
        </div>
    </div>

    <!-- RIGHT PANE: Agent Login Form -->
    <div class="lg:w-[60%] flex items-center justify-center p-8 lg:p-24 relative">
        <div class="absolute inset-0 bg-[#020617] opacity-100"></div>
        
        <div class="w-full max-w-md relative z-10">
            <div class="mb-12">
                <h2 class="text-3xl font-black mb-3 text-white">Partner Sign In</h2>
                <p class="text-slate-400">Enter your partner email and password.</p>
            </div>

            <form action="#" class="space-y-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Partner Email</label>
                    <input type="email" placeholder="you@agency.com" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-brand-emerald/50 focus:bg-white/[0.07] transition-all placeholder:text-slate-600">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Password</label>
                    <input type="password" placeholder="••••••••" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-brand-emerald/50 focus:bg-white/[0.07] transition-all placeholder:text-slate-600">
                </div>

                <button type="submit" class="w-full bg-brand-emerald text-white font-black py-4 rounded-2xl hover:bg-white hover:text-slate-950 transform active:scale-95 transition-all shadow-xl shadow-brand-emerald/10 group">
                    Sign In to Partner Dashboard
                    <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </form>

            <div class="mt-12 pt-12 border-t border-white/5 text-center space-y-4">
                <p class="text-slate-500">Not a partner yet? <a href="/agent/register" class="text-white font-bold hover:text-brand-emerald transition-colors">Apply to Join</a></p>
                <p class="text-slate-500">Looking for a personal account? <a href="/login" class="text-brand-orange font-bold hover:text-white transition-colors">User Sign In</a></p>
            </div>
        </div>
    </div>

</body>
</html>
