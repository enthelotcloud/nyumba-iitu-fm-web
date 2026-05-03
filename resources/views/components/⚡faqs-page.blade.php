<?php

use Livewire\Component;

new class extends Component {
    public $search = '';

    public function with(): array
    {
        $allFaqs = [
            [
                'category' => 'Listening & Tuning In',
                'question' => 'Where can I tune in to Nyumba iitu FM?',
                'answer' => 'If you are in the Mt. Kenya region, you can tune your radio to 91.5 FM. If you are outside the region or abroad, you can listen live 24/7 right here on our website or by downloading our official mobile app.'
            ],
            [
                'category' => 'Listening & Tuning In',
                'question' => 'Why is the online live stream buffering?',
                'answer' => 'Buffering usually occurs due to a slow internet connection. Try pausing the player for a few seconds to let it load, or switch to a stronger Wi-Fi/4G network. If our main stream is down, the player will automatically offer you an offline backup mix.'
            ],
            [
                'category' => 'Studio & Interaction',
                'question' => 'How do I send a greeting or request a song?',
                'answer' => 'You can send your greetings, requests, and voice notes directly to the studio via WhatsApp at +254 792 40 40 40. You can also use the Live Studio Chat feature on our homepage.'
            ],
            [
                'category' => 'Studio & Interaction',
                'question' => 'Can I call the studio during a live show?',
                'answer' => 'Yes! During interactive shows, the presenter will announce when the phone lines are open. You can call the studio line directly. Keep your radio volume turned down when you call to avoid feedback noise!'
            ],
            [
                'category' => 'Business & Advertising',
                'question' => 'How can I advertise my business on Nyumba iitu FM?',
                'answer' => 'We offer competitive rates for radio spots, show sponsorships, and digital advertising. Please email our sales team at sales@nyumbaiitufm.co.ke or visit our main office in Ruiru, Kiambu County to get a custom rate card.'
            ],
            [
                'category' => 'Business & Advertising',
                'question' => 'Do you announce obituaries or community notices?',
                'answer' => 'Yes, we have dedicated slots for community notices and obituaries. Please contact our front desk at least 24 hours in advance to schedule a reading.'
            ]
        ];

        $filteredFaqs = collect($allFaqs)->filter(function($faq) {
            $searchTerm = strtolower($this->search);
            return empty($this->search) ||
                   str_contains(strtolower($faq['question']), $searchTerm) ||
                   str_contains(strtolower($faq['answer']), $searchTerm) ||
                   str_contains(strtolower($faq['category']), $searchTerm);
        })->groupBy('category');

        return [
            'faqsByCategory' => $filteredFaqs,
            'totalResults' => $filteredFaqs->flatten(1)->count()
        ];
    }
};
?>

<div class="w-full" style="font-family: 'Poppins', sans-serif;">

    <div class="bg-white rounded-3xl p-8 sm:p-12 mb-8 shadow-sm border border-slate-200 text-center relative">
        <div class="relative z-10 max-w-3xl mx-auto">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">How can we help you?</h2>
            <p class="text-slate-500 mb-8 text-sm sm:text-base">Search our knowledge base or browse the categories below to find answers to common questions about Nyumba iitu FM.</p>

            <div class="relative max-w-2xl mx-auto">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>
                <input
                    wire:model.live.debounce.300ms="search"
                    type="text"
                    placeholder="Search for answers (e.g. advertise, whatsapp...)"
                    class="w-full pl-11 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white text-slate-800 transition-all"
                >
            </div>
        </div>
    </div>

    <div class="w-full">

        @if(!empty($search))
            <div class="mb-6 text-sm font-medium text-slate-500 flex items-center justify-between bg-slate-50 px-4 py-2 rounded-xl border border-slate-100">
                <span>Showing {{ $totalResults }} result(s) for "<span class="text-slate-800 font-bold">{{ $search }}</span>"</span>
                <button wire:click="$set('search', '')" class="text-blue-600 hover:text-blue-800 transition-colors">Clear search</button>
            </div>
        @endif

        @if($totalResults === 0)
            <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-slate-300 mx-auto mb-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                </svg>
                <h3 class="text-lg font-bold text-slate-800 mb-1">No questions found</h3>
                <p class="text-slate-500 text-sm">We couldn't find any FAQs matching your search. Try using different keywords.</p>
            </div>
        @else
            <div class="space-y-10">
                @foreach($faqsByCategory as $category => $faqs)
                    <div wire:key="category-{{ $category }}">

                        <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                            {{ $category }}
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($faqs as $index => $faq)
                                <div x-data="{ expanded: false }" class="group bg-white border border-slate-200 rounded-2xl shadow-sm hover:border-blue-300 transition-colors self-start" wire:key="faq-{{ $category }}-{{ $index }}">
                                    <button
                                        @click="expanded = !expanded"
                                        class="w-full flex items-start justify-between p-5 text-left focus:outline-none rounded-2xl"
                                    >
                                        <span class="font-semibold text-slate-800 pr-4 group-hover:text-blue-600 transition-colors leading-snug">
                                            {{ $faq['question'] }}
                                        </span>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="2"
                                            stroke="currentColor"
                                            class="w-5 h-5 text-slate-400 shrink-0 transition-transform duration-300 mt-0.5"
                                            :class="expanded ? 'rotate-180 text-blue-500' : ''"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>

                                    <div
                                        x-show="expanded"
                                        x-collapse
                                        x-cloak
                                        class="px-5 pb-5 text-sm text-slate-600 leading-relaxed"
                                    >
                                        <div class="pt-3 border-t border-slate-100">
                                            {{ $faq['answer'] }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-12 flex flex-col sm:flex-row items-center justify-between gap-6 bg-slate-50 border border-slate-200 rounded-3xl p-8">
            <div>
                <h3 class="text-lg font-bold text-slate-800 mb-1">Still have questions?</h3>
                <p class="text-slate-500 text-sm">If you couldn't find the answer you're looking for, feel free to reach out to our team directly.</p>
            </div>
            <a href="{{ url('/contact') }}" class="shrink-0 inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition-all hover:scale-105 shadow-md shadow-blue-600/20">
                Contact Us
            </a>
        </div>

    </div>
</div>
