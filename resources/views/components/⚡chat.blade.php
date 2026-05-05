<?php

use Livewire\Component;
use App\Models\Chat as ChatModel;
use Illuminate\Support\Facades\Cookie;

new class extends Component {
    public $name = '';
    public $phone = '';
    public $message = '';
    public $chats = [];

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ];
    }

    public function mount()
    {
        // Retrieve from Cookies (Persistent) instead of Session (Temporary)
        $this->name = Cookie::get('chat_name', '');
        $this->phone = Cookie::get('chat_phone', '');
        $this->loadChats();
    }

    public function loadChats()
    {
        // We removed ->reverse() to show newest first at the top
        $this->chats = ChatModel::latest()->take(50)->get();
    }

    public function sendMessage()
    {
        $this->validate();

        $chat = ChatModel::create([
            'session_id' => session()->getId(),
            'name' => $this->name,
            'phone' => $this->phone,
            'message' => $this->message,
        ]);

        // Save to Cookies for 1 year (525600 minutes)
        Cookie::queue('chat_name', $this->name, 525600);
        Cookie::queue('chat_phone', $this->phone, 525600);

        $this->message = '';
        $this->loadChats();
    }
};
?>

<div class="h-full w-full flex flex-col bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden" wire:poll.5s="loadChats" style="font-family: 'Poppins', sans-serif;">

    <!-- Header -->
    <div class="bg-blue-900 text-white px-5 py-4 flex items-center justify-between shrink-0 border-b border-blue-950">
        <h3 class="text-lg font-semibold flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
            </svg>
            Live Studio Chat
        </h3>
        <span class="text-[10px] uppercase tracking-wider font-bold bg-blue-800 text-white px-2.5 py-1 rounded-full shadow-sm flex items-center border border-blue-700">
            <span class="w-1.5 h-1.5 bg-red-500 rounded-full animate-pulse mr-1.5"></span> LIVE
        </span>
    </div>

    <!-- Chat Messages (Newest First) -->
    <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-slate-50/50 flex flex-col">
        @forelse($chats as $chat)
            <div class="flex flex-col w-full {{ $chat->session_id === session()->getId() ? 'items-end' : 'items-start' }}" wire:key="chat-{{ $chat->id }}">
                <div class="flex items-baseline gap-2 mb-1 px-1">
                    <span class="text-xs font-semibold text-slate-600">
                        {{ $chat->session_id === session()->getId() ? 'You' : $chat->name }}
                    </span>
                    <span class="text-[9px] text-slate-400">{{ $chat->created_at->diffForHumans(null, true) }}</span>
                </div>
                <div class="{{ $chat->session_id === session()->getId()
                    ? 'bg-blue-900 text-white rounded-tr-none'
                    : 'bg-white border border-slate-200 text-slate-700 rounded-tl-none' }} px-4 py-2.5 rounded-2xl max-w-[90%] text-sm leading-relaxed shadow-sm">
                    {{ $chat->message }}
                </div>
            </div>
        @empty
            <div class="h-full flex flex-col items-center justify-center text-slate-400 space-y-3 p-4 text-center">
                <p class="text-sm font-medium">No messages yet. Start the conversation!</p>
            </div>
        @endforelse
    </div>

    <!-- Input Area -->
    <div class="p-3 sm:p-4 bg-white border-t border-slate-100 shrink-0">
        <form wire:submit.prevent="sendMessage" class="space-y-3">

            {{-- Form fields only show if name isn't saved in persistent cookies --}}
            @if(!$name || !$phone)
                <div class="grid grid-cols-2 gap-2 sm:gap-3">
                    <div>
                        <input type="text" wire:model.defer="name" placeholder="Name"
                               class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 outline-none text-sm bg-slate-50 focus:bg-white transition-all" required>
                    </div>
                    <div>
                        <input type="tel" wire:model.defer="phone" placeholder="Phone"
                               class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 outline-none text-sm bg-slate-50 focus:bg-white transition-all" required>
                    </div>
                </div>
            @endif

            <div class="flex gap-2">
                <input type="text" wire:model.defer="message" placeholder="Message studio..."
                       class="flex-1 px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 outline-none text-sm bg-slate-50 focus:bg-white transition-all" required>

                <button type="submit"
                        class="bg-blue-900 hover:bg-blue-800 text-white px-5 py-2.5 rounded-xl transition-all hover:scale-105 active:scale-95 shadow-md flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 -rotate-45 ml-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                    </svg>
                </button>
            </div>

            @if($errors->any())
                <div class="text-xs text-red-500 font-medium px-1">Please fill out all fields correctly.</div>
            @endif
        </form>
    </div>
</div>
