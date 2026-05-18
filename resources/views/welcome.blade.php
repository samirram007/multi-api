<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Poly-ERP') }} API</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #0f172a;
            background-image: 
                radial-gradient(at 0% 0%, rgba(14, 165, 233, 0.15) 0, transparent 50%), 
                radial-gradient(at 100% 100%, rgba(3, 105, 161, 0.15) 0, transparent 50%);
            min-height: 100vh;
        }
        .glass {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="antialiased text-slate-200 selection:bg-brand-500 selection:text-white">
    <div class="relative flex flex-col items-center justify-center min-h-screen p-6 overflow-hidden">
        
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none opacity-20">
            <svg class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] text-brand-500" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M44.7,-76.4C58.8,-69.2,71.8,-59.1,79.6,-46.2C87.4,-33.4,90.1,-17.7,89.1,-2.3C88.1,13.1,83.4,28.2,75.1,41.2C66.8,54.2,54.9,65.1,41,72.8C27.1,80.5,11.2,85,2.4,81.1C-6.4,77.3,-12.8,65.1,-24.5,58.3C-36.2,51.5,-53.2,50.1,-63.9,41.9C-74.6,33.7,-79,18.7,-79.9,3.5C-80.8,-11.7,-78.2,-27.1,-70.7,-40C-63.2,-52.9,-50.8,-63.3,-37.4,-70.9C-24,-78.5,-9.7,-83.3,2.9,-88.2C15.5,-93.1,30.6,-83.6,44.7,-76.4Z" transform="translate(100 100)" />
            </svg>
        </div>

        <!-- Main Content -->
        <main class="w-full max-w-4xl z-10">
            <div class="glass rounded-3xl p-8 md:p-12 shadow-2xl">
                
                <!-- Header -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <span class="px-3 py-1 text-xs font-bold uppercase tracking-wider bg-brand-500/20 text-brand-400 rounded-full border border-brand-500/30">
                                REST API v1.0
                            </span>
                            <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-xs font-medium text-emerald-400 uppercase tracking-widest">System Operational</span>
                        </div>
                        <h1 class="text-5xl md:text-6xl font-extrabold text-white tracking-tight">
                            {{ config('app.name', 'Poly-ERP') }} <span class="text-brand-500">API</span>
                        </h1>
                        <p class="mt-4 text-lg text-slate-400 max-w-xl leading-relaxed">
                            The core engine powering the Poly-ERP ecosystem. Secure, scalable, and modular by design.
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-24 h-24 bg-brand-500/10 rounded-2xl flex items-center justify-center border border-brand-500/20">
                            <svg class="w-12 h-12 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Stats/Info Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div class="p-6 rounded-2xl bg-white/5 border border-white/5">
                        <div class="text-slate-500 text-xs font-bold uppercase tracking-widest mb-2">Environment</div>
                        <div class="text-white font-semibold text-lg uppercase tracking-wide">{{ config('app.env') }}</div>
                    </div>
                    <div class="p-6 rounded-2xl bg-white/5 border border-white/5">
                        <div class="text-slate-500 text-xs font-bold uppercase tracking-widest mb-2">Core Module</div>
                        <div class="text-white font-semibold text-lg">{{ config('app.module', 'Base') }}</div>
                    </div>
                    <div class="p-6 rounded-2xl bg-white/5 border border-white/5">
                        <div class="text-slate-500 text-xs font-bold uppercase tracking-widest mb-2">PHP Version</div>
                        <div class="text-white font-semibold text-lg">{{ PHP_VERSION }}</div>
                    </div>
                </div>

                <!-- API Endpoint -->
                <div class="mb-12">
                    <div class="text-slate-400 text-sm font-medium mb-3">Primary Endpoint URL</div>
                    <div class="flex items-center gap-2 p-4 bg-black/40 rounded-xl border border-white/10 group">
                        <code class="text-brand-400 font-mono text-sm md:text-base overflow-hidden text-ellipsis whitespace-nowrap">
                            {{ url('/api') }}
                        </code>
                        <button onclick="copyToClipboard('{{ url('/api') }}')" class="ml-auto p-2 hover:bg-white/10 rounded-lg transition-colors" title="Copy URL">
                            <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-wrap gap-4">
                    <a href="{{ url('/telescope') }}" class="flex items-center gap-3 px-8 py-4 bg-brand-600 hover:bg-brand-500 text-white font-bold rounded-2xl transition-all shadow-lg shadow-brand-600/20 group">
                        <span>Open Telescope</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </a>
                    
                    <a href="{{ url('/up') }}" class="flex items-center gap-3 px-8 py-4 bg-white/5 hover:bg-white/10 text-white font-bold rounded-2xl border border-white/10 transition-all">
                        <span>Health Check</span>
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <footer class="mt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-slate-500 text-sm font-medium px-4">
                <div>&copy; {{ date('Y') }} Poly-ERP Ecosystem. All rights reserved.</div>
                <div class="flex items-center gap-6">
                    <a href="#" class="hover:text-white transition-colors">Documentation</a>
                    <a href="#" class="hover:text-white transition-colors">Support</a>
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-slate-700"></span>
                        <span>v1.2.4</span>
                    </div>
                </div>
            </footer>
        </main>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('API URL copied to clipboard');
            });
        }
    </script>
</body>
</html>
