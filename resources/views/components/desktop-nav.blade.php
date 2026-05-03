<header class="hidden md:block bg-white border-b border-slate-100 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-5">
        <div class="flex justify-between items-center h-20">

            <a href="{{ url('/') }}" class="shrink-0 flex items-center group relative">
                <div class="absolute inset-0 bg-blue-400/20 blur-xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <img src="{{ asset('logo.png') }}" alt="Nyumba iitu FM Logo" class="h-16 w-auto object-contain transition-all duration-300 group-hover:scale-110 relative z-10">
            </a>

            <div class="flex items-center gap-6">

                <nav class="flex items-center space-x-1">
                    <a href="{{ url('/about') }}" class="relative px-3 py-2 text-slate-600 hover:text-blue-900 font-medium transition-colors duration-300 group text-sm">
                        About
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-blue-900 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ url('/schedule') }}" class="relative px-3 py-2 text-slate-600 hover:text-blue-900 font-medium transition-colors duration-300 group text-sm">
                        Schedule
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-blue-900 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ url('/faqs') }}" class="relative px-3 py-2 text-slate-600 hover:text-blue-900 font-medium transition-colors duration-300 group text-sm">
                        FAQs
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-blue-900 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ url('/contact') }}" class="relative px-3 py-2 text-slate-600 hover:text-blue-900 font-medium transition-colors duration-300 group text-sm">
                        Contact
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-blue-900 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </nav>

                <div class="flex items-center gap-3">

                    <a href="#" class="flex items-center gap-2 px-4 py-2.5 border-2 border-slate-800 text-slate-800 rounded-full font-semibold text-sm hover:bg-slate-800 hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        <span>Download App</span>
                    </a>

                    <a href="https://wa.me/254792404040" target="_blank" class="flex items-center gap-2 bg-blue-900 text-white px-5 py-2.5 rounded-full font-semibold text-sm hover:bg-blue-800 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </svg>
                        <span>24/7 Request</span>
                    </a>
                </div>

            </div>

        </div>
    </div>
</header>
