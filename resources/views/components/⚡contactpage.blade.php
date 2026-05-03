<?php

use Livewire\Component;

new class extends Component {
    // No PHP logic needed for the purely informational page
};
?>

<div class="w-full" style="font-family: 'Poppins', sans-serif;">

    <div class="max-w-7xl mb-12">
        <span class="text-blue-800 font-bold tracking-wider uppercase text-sm mb-2 block">Get In Touch</span>
        <h1 class=" sm:text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">Contact Nyumba iitu FM</h1>
        <p class="text-slate-500 text-sm sm:text-base leading-relaxed">
            Reach out to us directly through phone, WhatsApp, or email. You can also visit our studios in Ruiru. Wiigue wi Mucii!
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

        <div class="bg-white border-2 border-slate-100 hover:border-blue-900 p-8 rounded-3xl shadow-sm text-left transition-colors group">
            <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-900 transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-900 group-hover:text-white transition-colors">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">Our Studios</h3>
            <p class="text-base font-medium text-slate-600">Essy Heights, 1st Floor</p>
            <p class="text-sm text-slate-500 mt-1">Ruiru Kihunguro, Kenya</p>
        </div>

        <div class="bg-white border-2 border-slate-100 hover:border-blue-900 p-8 rounded-3xl shadow-sm text-left transition-colors group">
            <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-900 transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-900 group-hover:text-white transition-colors">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.896-1.596-5.48-4.08-7.074-6.959l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">Call & WhatsApp</h3>
            <p class="text-lg font-bold text-slate-700 mb-1">0792 40 40 40</p>
            <p class="text-sm text-slate-500 mt-1">Available during live shows</p>
        </div>

        <div class="bg-white border-2 border-slate-100 hover:border-blue-900 p-8 rounded-3xl shadow-sm text-left transition-colors group">
            <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-900 transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-900 group-hover:text-white transition-colors">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">Email Us</h3>
            <a href="mailto:info@nyumbaiitufm.co.ke" class="text-base font-medium text-slate-700 hover:text-blue-900 transition-colors">info@nyumbaiitufm.co.ke</a>
            <p class="text-sm text-slate-500 mt-2">For business inquiries</p>
        </div>

    </div>

    <div class="bg-white p-2 rounded-3xl shadow-sm border border-slate-200">
        <div class="h-100 sm:h-125 w-full bg-slate-100 rounded-2xl overflow-hidden relative group">

            <iframe
                src="https://maps.google.com/maps?q=Essy+Heights,+Ruiru,+Kenya&t=&z=15&ie=UTF8&iwloc=&output=embed"
                class="absolute inset-0 w-full h-full"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

            <div class="absolute bottom-6 left-6 bg-white/95 backdrop-blur-sm p-4 rounded-xl border border-slate-200 shadow-lg pointer-events-none transition-transform duration-300 group-hover:-translate-y-1">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-blue-900">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Nyumba iitu FM HQ</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Essy Heights, Ruiru</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
