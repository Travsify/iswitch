<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>iSwitch | Register as a Partner</title>
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

    <!-- LEFT PANE: PARTNER VISION (Informative) -->
    <div class="lg:w-[40%] bg-slate-950 relative border-b lg:border-b-0 lg:border-r border-white/10 flex flex-col p-12 lg:p-20 overflow-hidden">
        <!-- Ambient Background -->
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-brand-emerald/10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-[-100px] right-[-100px] w-96 h-96 bg-brand-orange/5 blur-[120px] rounded-full"></div>
        
        <div class="relative z-10 flex flex-col h-full">
            <a href="/" class="flex items-center gap-3 group mb-20">
                <img src="/iswitch_brand_logo.png" onerror="this.onerror=null; this.src='https://iswitch.onrender.com/iswitch_brand_logo.png'" class="h-10 w-auto glow-emerald">
                <span class="text-2xl font-black tracking-tight text-white">iSwitch <span class="text-brand-emerald">B2B</span></span>
            </a>

            <div class="space-y-12">
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.3em] text-brand-emerald mb-4 block">Partner Onboarding</span>
                    <h1 class="text-4xl lg:text-5xl font-black leading-tight mb-6 text-white">Scale With the iSwitch Engine.</h1>
                    <p class="text-slate-400 text-lg lg:text-xl leading-relaxed">Join our network of elite agents and consultants. Get direct access to the Global Mobility Vault and earn leading commissions.</p>
                </div>

                <div class="space-y-8">
                    <div class="flex gap-6 items-center">
                        <div class="w-12 h-12 rounded-2xl glass flex items-center justify-center text-brand-emerald text-xl shadow-2xl">
                            <i class="fa-solid fa-handshake-angle"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-lg">Partner Dashboard</h4>
                            <p class="text-sm text-slate-500">Manage clients, visas, and flights in one place.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 items-center">
                        <div class="w-12 h-12 rounded-2xl glass flex items-center justify-center text-brand-orange text-xl shadow-2xl">
                            <i class="fa-solid fa-money-bill-trend-up"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-lg">Instant Revenue</h4>
                            <p class="text-sm text-slate-500">Tiered commission structures that value your growth.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-auto pt-20 border-t border-white/5">
                <p class="text-xs text-slate-500 font-medium uppercase tracking-widest text-center lg:text-left">Your application will be reviewed by our B2B Compliance Team within 24 hours.</p>
            </div>
        </div>
    </div>

    <!-- RIGHT PANE: THE PORTAL (Form) -->
    <div class="lg:w-[60%] flex items-center justify-center p-8 lg:p-24 relative overflow-y-auto">
        <div class="absolute inset-0 bg-[#020617] opacity-100"></div>
        
        <div class="w-full max-w-lg relative z-10 py-12">
            <div class="mb-12">
                <h2 class="text-3xl font-black mb-3 text-white">Partner Registration</h2>
                <p class="text-slate-400">Apply to become an authorized iSwitch B2B Partner.</p>
            </div>

            <form action="#" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-1">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Company Name</label>
                    <input type="text" placeholder="Global Logistics Ltd" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-brand-emerald/50 focus:bg-white/[0.07] transition-all placeholder:text-slate-600">
                </div>

                <div class="md:col-span-1">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Agency Type</label>
                    <select class="w-full bg-[#030712] border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-brand-emerald/50 focus:bg-white/[0.07] transition-all appearance-none">
                        <option>Travel Agency</option>
                        <option>Migration Consultant</option>
                        <option>Corporate Relocator</option>
                        <option>Other B2B</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Official Website</label>
                    <input type="url" placeholder="https://www.company.com" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-brand-emerald/50 focus:bg-white/[0.07] transition-all placeholder:text-slate-600">
                </div>

                <div class="md:col-span-1">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Contact Name</label>
                    <input type="text" placeholder="Authorized Person" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-brand-emerald/50 focus:bg-white/[0.07] transition-all placeholder:text-slate-600">
                </div>

                <div class="md:col-span-1">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Contact Email</label>
                    <input type="email" placeholder="b2b@company.com" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-brand-emerald/50 focus:bg-white/[0.07] transition-all placeholder:text-slate-600">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Secure Password</label>
                    <input type="password" placeholder="••••••••" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-brand-emerald/50 focus:bg-white/[0.07] transition-all placeholder:text-slate-600">
                </div>

                <div class="md:col-span-2">
                    <button type="submit" class="w-full bg-brand-emerald text-white font-black py-4 rounded-2xl hover:bg-white hover:text-slate-950 transform active:scale-95 transition-all shadow-xl shadow-brand-emerald/10 group">
                        Submit Application
                        <i class="fa-solid fa-paper-plane ml-2"></i>
                    </button>
                    <p class="text-[10px] text-slate-500 text-center mt-4">By submitting, you agree to the iSwitch Global Partner Terms & Conditions.</p>
                </div>
            </form>

            <div class="mt-12 pt-12 border-t border-white/5 text-center">
                <p class="text-slate-500">Already a partner? <a href="/agent" class="text-white font-bold hover:text-brand-emerald transition-colors">Login to Command Center</a></p>
            </div>
        </div>
    </div>

</body>
</html>
