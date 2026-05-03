<nav class="md:hidden fixed bottom-0 left-0 w-full bg-white border-t border-slate-100 shadow-[0_-8px_20px_-5px_rgba(0,0,0,0.05)] z-50 pb-safe" style="font-family: 'Poppins', sans-serif;">
    <div class="flex justify-between items-end h-16 px-1 pb-1.5">

        <a href="{{ url('/') }}" class="flex-1 flex flex-col items-center justify-end h-full group transition-colors {{ request()->is('/') ? 'text-blue-900' : 'text-slate-400 hover:text-blue-900' }}">
            <div class="px-3 py-1 rounded-full transition-colors mb-0.5 {{ request()->is('/') ? 'bg-blue-50' : 'group-hover:bg-blue-50' }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.99 8.99a.75.75 0 1 1-1.06 1.06L12 5.56l-8.47 8.47a.75.75 0 0 1-1.06-1.06l8.99-8.99Z" />
                    <path d="M12 2.25a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75Z" />
                    <path d="M4.5 12.38v7.87c0 .41.34.75.75.75h3.75v-5.25a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5v5.25h3.75c.41 0 .75-.34.75-.75v-7.87L12 4.13l-7.5 8.25Z" />
                </svg>
            </div>
            <span class="text-[10px] {{ request()->is('/') ? 'font-bold' : 'font-medium' }}">Home</span>
        </a>

        <a href="{{ url('/schedule') }}" class="flex-1 flex flex-col items-center justify-end h-full group transition-colors {{ request()->is('schedule') ? 'text-blue-900' : 'text-slate-400 hover:text-blue-900' }}">
            <div class="px-3 py-1 rounded-full transition-colors mb-0.5 {{ request()->is('schedule') ? 'bg-blue-50' : 'group-hover:bg-blue-50' }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.375a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5ZM12.75 15.375a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM17.25 15.375a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5Z" />
                    <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                </svg>
            </div>
            <span class="text-[10px] {{ request()->is('schedule') ? 'font-bold' : 'font-medium' }}">Schedule</span>
        </a>

        <a href="https://wa.me/254792404040" target="_blank" class="flex-1 flex flex-col items-center justify-end h-full relative group">
            <div class="absolute -top-7 w-14 h-14 bg-blue-900 rounded-full flex items-center justify-center text-white shadow-lg shadow-blue-900/30 border-4 border-white transition-transform duration-200 group-hover:scale-105 group-active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
                </svg>
            </div>
            <span class="text-[10px] font-bold text-blue-900 mt-auto">Request</span>
        </a>

        <a href="{{ url('/about') }}" class="flex-1 flex flex-col items-center justify-end h-full group transition-colors {{ request()->is('about') ? 'text-blue-900' : 'text-slate-400 hover:text-blue-900' }}">
            <div class="px-3 py-1 rounded-full transition-colors mb-0.5 {{ request()->is('about') ? 'bg-blue-50' : 'group-hover:bg-blue-50' }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                </svg>
            </div>
            <span class="text-[10px] {{ request()->is('about') ? 'font-bold' : 'font-medium' }}">About</span>
        </a>

        <a href="{{ url('/contact') }}" class="flex-1 flex flex-col items-center justify-end h-full group transition-colors {{ request()->is('contact') ? 'text-blue-900' : 'text-slate-400 hover:text-blue-900' }}">
            <div class="px-3 py-1 rounded-full transition-colors mb-0.5 {{ request()->is('contact') ? 'bg-blue-50' : 'group-hover:bg-blue-50' }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm3 5.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H6.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                </svg>
            </div>
            <span class="text-[10px] {{ request()->is('contact') ? 'font-bold' : 'font-medium' }}">Contact</span>
        </a>

    </div>
</nav>

<style>
    @media (max-width: 768px) {
        body {
            padding-bottom: 6rem;
        }
        .pb-safe {
            padding-bottom: env(safe-area-inset-bottom);
        }
    }
</style>
