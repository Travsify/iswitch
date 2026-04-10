<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>iSwitch | Sign In to Your Travel Hub</title>
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
        .glow-orange { filter: drop-shadow(0 0 10px rgba(255, 125, 0, 0.3)); }
    </style>
</head>
<body class="min-h-screen flex flex-col lg:flex-row overflow-x-hidden">

    <!-- LEFT PANE -->
    <div class="lg:w-[40%] bg-[#030712] relative border-b lg:border-b-0 lg:border-r border-white/10 flex flex-col p-12 lg:p-20 overflow-hidden">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-brand-orange/10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-[-100px] right-[-100px] w-96 h-96 bg-brand-emerald/5 blur-[120px] rounded-full"></div>
        
        <div class="relative z-10 flex flex-col h-full">
            <a href="/" class="flex items-center gap-3 group mb-20">
                <img src="/iswitch_brand_logo.png" onerror="this.onerror=null; this.src='https://iswitch.onrender.com/iswitch_brand_logo.png'" class="h-10 w-auto glow-orange">
                <span class="text-2xl font-black tracking-tight text-white">iSwitch</span>
            </a>

            <div class="space-y-12">
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.3em] text-brand-orange mb-4 block">Your Travel Companion</span>
                    <h1 class="text-4xl lg:text-5xl font-black leading-tight mb-6">Book. Fly. <br>Stay. Insure.</h1>
                    <p class="text-slate-400 text-lg lg:text-xl leading-relaxed">Sign in to search flights, reserve hotels, check visa requirements, and get travel insurance — all in one place.</p>
                </div>

                <div class="space-y-8">
                    <div class="flex gap-6 items-center">
                        <div class="w-12 h-12 rounded-2xl glass flex items-center justify-center text-brand-orange text-xl shadow-2xl">
                            <i class="fa-solid fa-plane-departure"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-lg">Flights & Hotels</h4>
                            <p class="text-sm text-slate-500">Search and book the best deals worldwide.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 items-center">
                        <div class="w-12 h-12 rounded-2xl glass flex items-center justify-center text-brand-emerald text-xl shadow-2xl">
                            <i class="fa-solid fa-shield-heart"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-lg">Insurance & Visa Guard</h4>
                            <p class="text-sm text-slate-500">Travel insurance and visa checks before you go.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 items-center">
                        <div class="w-12 h-12 rounded-2xl glass flex items-center justify-center text-indigo-400 text-xl shadow-2xl">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-lg">Travel Vault</h4>
                            <p class="text-sm text-slate-500">Your documents and wallet, always ready.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-auto pt-20 border-t border-white/5">
                <p class="text-xs text-slate-500 font-medium uppercase tracking-widest"><i class="fa-solid fa-shield-heart mr-1 text-brand-orange/50"></i> Protected by iSwitch</p>
            </div>
        </div>
    </div>

    <!-- RIGHT PANE: Login Form -->
    <div class="lg:w-[60%] flex items-center justify-center p-8 lg:p-24 relative">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 pointer-events-none"></div>
        
        <div class="w-full max-w-md relative z-10">
            <div class="mb-12">
                <h2 class="text-3xl font-black mb-3 text-white">Welcome Back</h2>
                <p class="text-slate-400">Sign in to your iSwitch account.</p>
            </div>

            <form action="#" class="space-y-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Email Address</label>
                    <input type="email" placeholder="you@example.com" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-brand-orange/50 focus:bg-white/[0.07] transition-all placeholder:text-slate-600">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Password</label>
                    <input type="password" placeholder="••••••••" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-brand-orange/50 focus:bg-white/[0.07] transition-all placeholder:text-slate-600">
                </div>

                <div class="flex justify-between items-center px-1">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" class="accent-brand-orange">
                        <span class="text-xs font-medium text-slate-500 group-hover:text-slate-300">Remember me</span>
                    </label>
                    <a href="#" class="text-xs font-medium text-brand-orange hover:text-white transition-colors">Forgot Password?</a>
                </div>

                <div>
                    <button type="submit" class="w-full bg-white text-slate-950 font-black py-4 rounded-2xl hover:bg-brand-orange hover:text-white transform active:scale-95 transition-all shadow-xl shadow-brand-orange/10 group">
                        Sign In
                        <i class="fa-solid fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </form>

            <div class="mt-12 pt-12 border-t border-white/5 text-center space-y-4">
                <p class="text-slate-500">Don't have an account? <a href="/register" class="text-white font-bold hover:text-brand-emerald transition-colors">Create Account</a></p>
                <p class="text-slate-500">Are you a travel agency? <a href="/agent/register" class="text-brand-emerald font-bold hover:text-white transition-colors">Partner Sign Up</a></p>
            </div>
        </div>
    </div>

</body>
</html>
