<?php

use Livewire\Component;
use Livewire\Attributes\Locked;

new class extends Component {
    public bool $isOpen = false;
    public bool $isTyping = false;
    public string $message = '';

    #[Locked]
    public string $phone = '254792404040'; // Updated to your provided number

    public function toggle()
    {
        $this->isOpen = !$this->isOpen;

        if ($this->isOpen) {
            $this->isTyping = true;

            // v4 js() helper: Wait 1.5s, stop typing, then play a subtle 'pop'
            $this->js(<<<'JS'
                setTimeout(() => {
                    $wire.isTyping = false;
                    const audio = new Audio('https://assets.mixkit.co/active_storage/sfx/2354/2354-preview.mp3');
                    audio.volume = 0.2;
                    audio.play();
                }, 1500);
            JS);
        }
    }

    public function selectQuickReply($text)
    {
        $this->message = $text;
        $this->send();
    }

    public function send()
    {
        if (empty(trim($this->message))) return;

        $url = "https://wa.me/{$this->phone}?text=" . urlencode($this->message);
        $this->js("window.open('$url', '_blank')");

        $this->message = '';
        $this->isOpen = false;
    }
}; ?>

<div class="fixed bottom-6 right-6 z-9999 font-sans">
    <style>
        [x-cloak] { display: none !important; }
        .whatsapp-bg {
            background-color: #e5ddd5;
            background-image: url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png');
            background-blend-mode: overlay;
        }
    </style>

    <div
        x-cloak
        x-show="$wire.isOpen"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-12 scale-90"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-12 scale-90"
        class="mb-6 w-87.5 bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-200"
    >
        <div class="bg-[#075e54] p-4 flex items-center justify-between text-white">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name=Deezme+Support&background=25D366&color=fff" class="w-10 h-10 rounded-full border border-white/20">
                    <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 border-2 border-[#075e54] rounded-full"></span>
                </div>
                <div>
                    <h4 class="font-bold text-sm">Nyumba iitu FM</h4>
                    <p class="text-[11px] opacity-80 leading-none">Online • Wiigue wi Mucii</p>
                </div>
            </div>
            <button @click="$wire.isOpen = false" class="opacity-70 hover:opacity-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div class="p-4 whatsapp-bg min-h-62.5 flex flex-col justify-end gap-3">
            <template x-if="$wire.isTyping">
                <div x-transition class="bg-white px-4 py-3 rounded-2xl rounded-tl-none shadow-sm self-start inline-flex items-center gap-1">
                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce [animation-duration:0.8s]"></span>
                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce [animation-duration:0.8s] [animation-delay:0.2s]"></span>
                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce [animation-duration:0.8s] [animation-delay:0.4s]"></span>
                </div>
            </template>

            <template x-if="!$wire.isTyping">
                <div class="space-y-3">
                    <div
                        x-transition:enter="transition cubic-bezier(0.175, 0.885, 0.32, 1.275) duration-500"
                        class="bg-white p-3 rounded-xl rounded-tl-none shadow-md self-start max-w-[90%] text-[14px] text-gray-700 leading-relaxed"
                    >
                        Hi! 👋 Welcome to Nyumba iitu FM. How may I assist you today?
                        <div class="text-[10px] text-right text-gray-400 mt-1">{{ now()->format('H:i') }}</div>
                    </div>

                    <div class="flex flex-wrap gap-2 animate-in fade-in slide-in-from-bottom-2 duration-700 delay-300">
                        <button wire:click="selectQuickReply('I would like to request a song')" class="bg-white/90 hover:bg-white text-[#075e54] text-xs font-semibold px-3 py-2 rounded-full border border-[#075e54]/20 shadow-sm transition-all hover:scale-105">
                            Request A Song
                        </button>
                        <button wire:click="selectQuickReply('I want to say hello')" class="bg-white/90 hover:bg-white text-[#075e54] text-xs font-semibold px-3 py-2 rounded-full border border-[#075e54]/20 shadow-sm transition-all hover:scale-105">
                            Say HI
                        </button>
                        <button wire:click="selectQuickReply('I have a question about advertisements and sponsorships')" class="bg-white/90 hover:bg-white text-[#075e54] text-xs font-semibold px-3 py-2 rounded-full border border-[#075e54]/20 shadow-sm transition-all hover:scale-105">
                            Ad and Sponsorship Inquiry
                        </button>
                    </div>
                </div>
            </template>
        </div>

        <div class="p-3 bg-white border-t border-gray-100">
            <form wire:submit="send" class="flex items-center gap-2 bg-gray-50 rounded-full px-4 py-1 border border-gray-200 focus-within:border-[#25D366] transition-colors">
                <input
                    type="text"
                    wire:model="message"
                    placeholder="Type your question..."
                    class="flex-1 bg-transparent border-none py-2 text-sm focus:ring-0 placeholder-gray-400 text-gray-700"
                >
                <button type="submit" class="text-[#075e54] hover:text-[#25D366] transition-colors p-1">
                    <svg class="w-6 h-6 rotate-45" fill="currentColor" viewBox="0 0 20 20"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                </button>
            </form>
        </div>
    </div>

    <button
        @click="$wire.toggle()"
        class="bg-[#25D366] hover:bg-[#128c7e] text-white p-4 rounded-full shadow-[0_10px_25px_rgba(37,211,102,0.4)] transition-all hover:scale-110 active:scale-90 flex items-center justify-center relative overflow-hidden group"
    >
        <div x-show="!$wire.isOpen" x-transition:enter="transition duration-200" class="flex items-center justify-center">
             <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.148-.67-1.616-.917-2.214-.24-.58-.485-.503-.67-.513-.175-.01-.374-.012-.574-.012-.2 0-.525.075-.8.374-.273.299-1.042 1.018-1.042 2.482 0 1.464 1.065 2.88 1.214 3.078.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        </div>
        <svg x-show="$wire.isOpen" x-transition:enter="transition duration-200" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>
</div>
