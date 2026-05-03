<nav class="md:hidden fixed bottom-0 left-0 w-full bg-white border-t border-blue-100 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-50 pb-safe">
    <div class="flex justify-around items-center h-16 px-2">

        <a href="{{ url('/') }}" class="flex flex-col items-center justify-center w-full h-full text-blue-900 group">
            <div class="px-4 py-1 rounded-full bg-blue-50 group-hover:bg-blue-100 transition-colors mb-1">
                <i class="fas fa-home text-lg"></i>
            </div>
            <span class="text-[10px] font-semibold">Home</span>
        </a>

        <a href="{{ url('/schedule') }}" class="flex flex-col items-center justify-center w-full h-full text-slate-500 hover:text-blue-900 transition-colors">
            <div class="px-4 py-1 rounded-full hover:bg-blue-50 transition-colors mb-1">
                <i class="fas fa-calendar-alt text-lg"></i>
            </div>
            <span class="text-[10px] font-medium">Schedule</span>
        </a>

        <a href="https://wa.me/254792404040" target="_blank" class="flex flex-col items-center justify-center w-full h-full -mt-5">
            <div class="w-12 h-12 bg-blue-900 rounded-full flex items-center justify-center text-white shadow-lg shadow-blue-900/30 border-4 border-white mb-1 transition-transform hover:scale-105">
                <i class="fab fa-whatsapp text-2xl"></i>
            </div>
            <span class="text-[10px] font-semibold text-blue-900">Request</span>
        </a>

        <a href="{{ url('/about') }}" class="flex flex-col items-center justify-center w-full h-full text-slate-500 hover:text-blue-900 transition-colors">
            <div class="px-4 py-1 rounded-full hover:bg-blue-50 transition-colors mb-1">
                <i class="fas fa-info-circle text-lg"></i>
            </div>
            <span class="text-[10px] font-medium">About</span>
        </a>

        <a href="{{ url('/contact') }}" class="flex flex-col items-center justify-center w-full h-full text-slate-500 hover:text-blue-900 transition-colors">
            <div class="px-4 py-1 rounded-full hover:bg-blue-50 transition-colors mb-1">
                <i class="fas fa-bars text-lg"></i>
            </div>
            <span class="text-[10px] font-medium">Menu</span>
        </a>

    </div>
</nav>

<style>
    @media (max-width: 768px) {
        body {
            padding-bottom: 5rem; /* ~80px */
        }
        /* Handle iOS safe area */
        .pb-safe {
            padding-bottom: env(safe-area-inset-bottom);
        }
    }
</style>
