<footer class="bg-white border-t border-slate-200 pt-16 pb-24 md:pb-8 mt-auto">
    <div class="max-w-7xl mx-auto px-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

            <div class="space-y-4">
                <a href="{{ url('/') }}" class="inline-block mb-2">
                    <img src="{{ asset('logo.png') }}" alt="Nyumba iitu FM Logo" class="h-20 w-auto object-contain">
                </a>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Streaming live on 91.5 FM and online. Your Favorite Kikuyu radio station bringing you the best in music, news, and cultural shows. Wiigue wi mucii!
                </p>
                <div class="flex space-x-4 pt-2">
                    <a href="#" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-blue-100 hover:text-blue-600 transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-blue-100 hover:text-blue-600 transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-blue-100 hover:text-blue-600 transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-red-100 hover:text-red-600 transition-colors">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="font-bold text-slate-900 mb-4 uppercase tracking-wider text-sm">Explore</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ url('/') }}" class="text-slate-500 hover:text-blue-600 transition-colors">Listen Live</a></li>
                    <li><a href="{{ url('/schedule') }}" class="text-slate-500 hover:text-blue-600 transition-colors">Programme Lineup</a></li>
                    <li><a href="{{ url('/about') }}" class="text-slate-500 hover:text-blue-600 transition-colors">About the Station</a></li>
                    <li><a href="{{ url('/faqs') }}" class="text-slate-500 hover:text-blue-600 transition-colors">FAQs</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-slate-900 mb-4 uppercase tracking-wider text-sm">Legal & Support</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ url('/contact') }}" class="text-slate-500 hover:text-blue-600 transition-colors">Contact Us</a></li>
                    <li><a href="#" class="text-slate-500 hover:text-blue-600 transition-colors">Advertise with us</a></li>
                    <li><a href="{{ url('/privacy-policy') }}" class="text-slate-500 hover:text-blue-600 transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ url('/terms-of-service') }}" class="text-slate-500 hover:text-blue-600 transition-colors">Terms of Service</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-slate-900 mb-4 uppercase tracking-wider text-sm">Studio Contact</h3>
                <ul class="space-y-4 text-sm text-slate-500">
                    <li class="flex items-start gap-3">
                        <i class="fab fa-whatsapp text-[#25D366] text-lg mt-0.5"></i>
                        <div>
                            <span class="block font-medium text-slate-700">Studio / Requests</span>
                            <a href="https://wa.me/254792404040" target="_blank" class="hover:text-blue-600 transition-colors">+254 792 40 40 40</a>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-envelope text-blue-500 text-base mt-1"></i>
                        <div>
                            <span class="block font-medium text-slate-700">Email</span>
                            <a href="mailto:info@nyumbaiitufm.co.ke" class="hover:text-blue-600 transition-colors">info@nyumbaiitufm.co.ke</a>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt text-red-500 text-base mt-1"></i>
                        <div>
                            <span class="block font-medium text-slate-700">Location</span>
                            <span>Ruiru, Kihunguro, EssyHeights 1st Floor </span>
                        </div>
                    </li>
                </ul>
            </div>

        </div>

        <div class=" border-t border-slate-100 text-center flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-slate-400 text-sm">
                &copy; {{ date('Y') }} Nyumba iitu FM (91.5 MHz). All rights reserved.
            </p>
            <p class="text-slate-400 text-sm">
                Developed by <a href="https://enthelotcloud.com/" target="_blank" rel="noopener noreferrer" class="font-semibold text-blue-500 hover:text-blue-600 transition-colors">Enthelot Cloud</a>
            </p>
        </div>
    </div>
</footer>
