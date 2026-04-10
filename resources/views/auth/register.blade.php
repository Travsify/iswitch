<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>iSwitch | Create Your Travel Account</title>
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
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-brand-emerald/10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-[-100px] right-[-100px] w-96 h-96 bg-brand-orange/5 blur-[120px] rounded-full"></div>
        
        <div class="relative z-10 flex flex-col h-full">
            <a href="/" class="flex items-center gap-3 group mb-20">
                <img src="/iswitch_brand_logo.png" onerror="this.onerror=null; this.src='https://iswitchub.com/iswitch_brand_logo.png'" class="h-10 w-auto glow-orange">
                <span class="text-2xl font-black tracking-tight text-white">iSwitch</span>
            </a>

            <div class="space-y-12">
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.3em] text-brand-emerald mb-4 block">Start Your Journey</span>
                    <h1 class="text-4xl lg:text-5xl font-black leading-tight mb-6">One Account. <br>Endless Trips.</h1>
                    <p class="text-slate-400 text-lg lg:text-xl leading-relaxed">Create your free iSwitch account to search flights, book hotels, check visa requirements, and buy travel insurance.</p>
                </div>

                <div class="space-y-8">
                    <div class="flex gap-6 items-center">
                        <div class="w-12 h-12 rounded-2xl glass flex items-center justify-center text-brand-emerald text-xl shadow-2xl">
                            <i class="fa-solid fa-plane-departure"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-lg">Search Any Route</h4>
                            <p class="text-sm text-slate-500">Compare flights across hundreds of airlines instantly.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 items-center">
                        <div class="w-12 h-12 rounded-2xl glass flex items-center justify-center text-brand-orange text-xl shadow-2xl">
                            <i class="fa-solid fa-shield-heart"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-lg">Travel Insurance</h4>
                            <p class="text-sm text-slate-500">Get covered before you leave. Policies from $25/trip.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 items-center">
                        <div class="w-12 h-12 rounded-2xl glass flex items-center justify-center text-indigo-400 text-xl shadow-2xl">
                            <i class="fa-solid fa-passport"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-lg">Visa Check</h4>
                            <p class="text-sm text-slate-500">Know your visa requirements for 190+ countries.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-auto pt-20 border-t border-white/5">
                <p class="text-xs text-slate-500 font-medium uppercase tracking-widest"><i class="fa-solid fa-shield-heart mr-1 text-brand-emerald/50"></i> Protected by iSwitch</p>
            </div>
        </div>
    </div>

    <!-- RIGHT PANE: Register Form -->
    <div class="lg:w-[60%] flex items-center justify-center p-8 lg:p-24 relative overflow-y-auto">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 pointer-events-none"></div>
        
        <div class="w-full max-w-lg relative z-10 py-12">
            <div class="mb-12">
                <h2 class="text-3xl font-black mb-3 text-white">Create Your Account</h2>
                <p class="text-slate-400">It only takes a minute. No credit card needed.</p>
            </div>

            <form action="#" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Full Name</label>
                    <input type="text" placeholder="Your full name" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-brand-emerald/50 focus:bg-white/[0.07] transition-all placeholder:text-slate-600">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Email Address</label>
                    <input type="email" placeholder="you@example.com" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-brand-emerald/50 focus:bg-white/[0.07] transition-all placeholder:text-slate-600">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Password</label>
                    <input type="password" placeholder="Min. 8 characters" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-brand-emerald/50 focus:bg-white/[0.07] transition-all placeholder:text-slate-600">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Confirm Password</label>
                    <input type="password" placeholder="Re-enter password" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-brand-emerald/50 focus:bg-white/[0.07] transition-all placeholder:text-slate-600">
                </div>

                <div class="md:col-span-2">
                    <button type="submit" class="w-full bg-white text-slate-950 font-black py-4 rounded-2xl hover:bg-brand-emerald hover:text-white transform active:scale-95 transition-all shadow-xl shadow-brand-emerald/10 group">
                        Create Free Account
                        <i class="fa-solid fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </form>

            <div class="mt-12 pt-12 border-t border-white/5 text-center space-y-4">
                <p class="text-slate-500">Already have an account? <a href="/login" class="text-white font-bold hover:text-brand-emerald transition-colors">Sign In</a></p>
                <p class="text-slate-500">Are you a travel agency? <a href="/agent/register" class="text-brand-emerald font-bold hover:text-white transition-colors">Partner Sign Up</a></p>
            </div>
        </div>
    </div>

    @include('partials._chatbot')

</body>
</html>
