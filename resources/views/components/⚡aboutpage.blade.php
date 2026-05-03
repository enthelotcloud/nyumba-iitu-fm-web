<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<div class="w-full" style="font-family: 'Poppins', sans-serif;">

    <div class="max-w-7xl mb-12">
        <span class="text-blue-900 font-bold tracking-wider uppercase text-sm mb-2 block">Our Story</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">Nyumba iitu FM</h1>
        <p class="text-slate-500 text-sm sm:text-base leading-relaxed">
            Broadcasting on 91.5 FM, Nyumba iitu FM is the voice of the Mt. Kenya region, dedicated to entertaining and informing the Kikuyu-speaking community worldwide.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

        <div class="relative group">
            <div class="absolute -inset-1 bg-linear-to-r from-blue-900 to-blue-700 rounded-3xl blur opacity-10 group-hover:opacity-20 transition duration-1000 group-hover:duration-200"></div>
            <div class="relative bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-sm">
                <img src="{{ asset('studio.jpg') }}" alt="Nyumba iitu FM Studio" class="w-full h-auto object-cover transform transition-transform duration-500 group-hover:scale-105">
            </div>
        </div>

        <div class="space-y-6">
            <div>
                <h2 class="text-2xl font-bold text-slate-900 mb-3 flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-blue-900 rounded-full"></span>
                    Our Mission
                </h2>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    We are committed to preserving our cultural heritage through quality music, authentic storytelling, and timely news. Our goal is to provide a platform where every listener feels at home—Wiigue wi Mucii.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-slate-900 mb-3 flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-blue-900 rounded-full"></span>
                    Why Listen to Us?
                </h2>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    With a blend of traditional hits and modern Kikuyu music, engaging talk shows, and up-to-the-minute updates, we ensure our audience remains connected to their roots no matter where they are in the world.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-4 pt-4">
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <span class="block text-2xl font-bold text-blue-900">91.5</span>
                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Frequency FM</span>
                </div>
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <span class="block text-2xl font-bold text-blue-900">24/7</span>
                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Live Streaming</span>
                </div>
            </div>
        </div>
    </div>
</div>
