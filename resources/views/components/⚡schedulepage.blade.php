<?php

use Livewire\Component;
use App\Models\Schedule;
use Carbon\Carbon;

new class extends Component {
    public $activeDay;

    public function mount()
    {
        // Default to today in East African Time
        $this->activeDay = Carbon::now('Africa/Nairobi')->dayOfWeek;
    }

    public function setDay($day)
    {
        $this->activeDay = $day;
    }

    public function setReminder($showName, $startTime)
    {
        // Dispatch an event to the frontend to trigger the Native Browser Notification
        $this->dispatch('request-browser-notification', showName: $showName, startTime: $startTime);
    }

    public function with(): array
    {
        return [
            'schedules' => Schedule::with('show')
                ->where('day_of_week', $this->activeDay)
                ->orderBy('start_time')
                ->get(),
            'days' => [
                0 => 'Sunday',
                1 => 'Monday',
                2 => 'Tuesday',
                3 => 'Wednesday',
                4 => 'Thursday',
                5 => 'Friday',
                6 => 'Saturday',
            ],
            'today' => Carbon::now('Africa/Nairobi')->dayOfWeek,
        ];
    }
};
?>

<div class="w-full" style="font-family: 'Poppins', sans-serif;">

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-2 mb-8 overflow-hidden">
        <div class="flex overflow-x-auto hide-scrollbar gap-2 pb-2 sm:pb-0" style="scrollbar-width: none; -ms-overflow-style: none;">
            <style> .hide-scrollbar::-webkit-scrollbar { display: none; } </style>

            @foreach($days as $index => $dayName)
                <button
                    wire:click="setDay({{ $index }})"
                    class="relative shrink-0 px-6 py-3 rounded-xl font-semibold text-sm transition-all duration-300 flex flex-col items-start gap-1
                    {{ $activeDay === $index ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'bg-transparent text-slate-500 hover:bg-slate-50 hover:text-blue-600' }}"
                >
                    {{ substr($dayName, 0, 3) }}
                    <span class="text-[10px] uppercase tracking-wider {{ $activeDay === $index ? 'text-blue-200' : 'text-slate-400' }}">
                        {{ $today === $index ? 'Today' : $dayName }}
                    </span>
                </button>
            @endforeach
        </div>
    </div>

    <div class="relative">
        @if($schedules->isEmpty())
            <div class="bg-slate-50 rounded-2xl border border-slate-200 p-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-slate-300 mb-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
                <h3 class="text-lg font-bold text-slate-700">No shows scheduled</h3>
                <p class="text-slate-500 text-sm mt-1">Check back later or view another day.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($schedules as $schedule)
                    <div class="bg-white border border-slate-200 hover:border-blue-300 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all flex flex-col h-full group">

                        <div class="flex items-start justify-between gap-4 mb-4">
                            <div class="bg-slate-100 text-slate-700 group-hover:bg-blue-50 group-hover:text-blue-700 px-3 py-1.5 rounded-lg text-xs font-bold transition-colors">
                                {{ \Carbon\Carbon::parse($schedule->start_time)->format('g:i A') }} -
                                {{ \Carbon\Carbon::parse($schedule->end_time)->format('g:i A') }}
                            </div>

                            <button
                                wire:click="setReminder('{{ addslashes($schedule->show->name) }}', '{{ \Carbon\Carbon::parse($schedule->start_time)->format('g:i A') }}')"
                                class="text-slate-400 hover:text-blue-600 transition-colors p-1"
                                title="Remind me"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                </svg>
                            </button>
                        </div>

                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $schedule->show->name }}</h3>

                            <p class="text-sm font-medium text-slate-600 flex items-center gap-2 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-blue-500 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                {{ $schedule->show->show_host }}
                            </p>

                            @if($schedule->show->excerpt)
                                <p class="text-sm text-slate-500 leading-relaxed border-t border-slate-100 pt-4 mt-auto">
                                    {{ $schedule->show->excerpt }}
                                </p>
                            @endif
                        </div>

                    </div>
                @endforeach

            </div>
        @endif
    </div>

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('request-browser-notification', (event) => {
                const showName = event[0].showName;
                const startTime = event[0].startTime;

                // 1. Check if browser supports notifications
                if (!("Notification" in window)) {
                    alert("Your browser does not support desktop notifications.");
                    return;
                }

                // 2. If permission is already granted, trigger notification
                if (Notification.permission === "granted") {
                    spawnNotification(showName, startTime);
                }
                // 3. Otherwise, ask for permission
                else if (Notification.permission !== "denied") {
                    Notification.requestPermission().then((permission) => {
                        if (permission === "granted") {
                            spawnNotification(showName, startTime);
                        } else {
                            alert("Notification permission was denied. We cannot remind you.");
                        }
                    });
                } else {
                    alert("You have previously blocked notifications for this site. Please enable them in your browser settings.");
                }
            });

            function spawnNotification(showName, startTime) {
                // This triggers the actual system notification
                const notification = new Notification("Nyumba iitu FM Reminder", {
                    body: `Reminder set! ${showName} starts at ${startTime}.`,
                    icon: '/logo.png', // Uses your public/logo.png
                });

                // Auto-close after 5 seconds
                setTimeout(() => {
                    notification.close();
                }, 5000);
            }
        });
    </script>
</div>
