<?php

use Livewire\Component;
use App\Models\Schedule;
use Carbon\Carbon;

new class extends Component {
    public $currentShow;
    public $nextShow;
    public $upcomingShows = [];

    public function mount()
    {
        $this->loadShows();
    }

    public function loadShows()
    {
        $now = Carbon::now('Africa/Nairobi');
        $dayOfWeek = $now->dayOfWeek;
        $time = $now->format('H:i:s');

        $schedules = Schedule::with('show')
            ->where('day_of_week', $dayOfWeek)
            ->orderBy('start_time')
            ->get();

        $this->currentShow = $schedules->where('start_time', '<=', $time)->where('end_time', '>', $time)->first();

        $this->nextShow = $schedules->where('start_time', '>', $time)->first();

        if ($this->nextShow) {
            $startTime = Carbon::createFromFormat('H:i:s', $this->nextShow->start_time, 'Africa/Nairobi');
            $this->nextShow->diffInMins = $now->diffInMinutes($startTime);
        }

        if ($this->nextShow) {
            $this->upcomingShows = $schedules->where('start_time', '>', $this->nextShow->start_time);
        } else {
            $this->upcomingShows = [];
        }
    }
};
?>

<div wire:poll.60s="loadShows" class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden" style="font-family: 'Poppins', sans-serif;">

    <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
        <h2 class="text-xl font-bold text-slate-800">Programme Lineup</h2>
        <span class="text-sm font-medium text-slate-500">{{ \Carbon\Carbon::now('Africa/Nairobi')->format('l') }}</span>
    </div>

    <div class="p-5 sm:p-6 space-y-4">

        @if($currentShow)
            <div class="relative bg-blue-50 border-2 border-blue-500 rounded-2xl p-5 shadow-sm transition-all">
                <div class="absolute top-4 right-4 flex items-center gap-2 bg-white px-3 py-1 rounded-full shadow-sm border border-blue-100">
                    <span class="relative flex h-2.5 w-2.5">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-red-500"></span>
                    </span>
                    <span class="text-xs font-bold text-slate-700 tracking-wider">ON AIR</span>
                </div>

                <p class="text-blue-600 font-semibold text-sm mb-1">
                    {{ \Carbon\Carbon::parse($currentShow->start_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($currentShow->end_time)->format('g:i A') }}
                </p>
                <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-1 pr-20">{{ $currentShow->show->name }}</h3>
                <p class="text-slate-600 flex items-center gap-2 text-sm sm:text-base mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
                    </svg>
                    {{ $currentShow->show->show_host }}
                </p>
            </div>
        @endif

        @if($nextShow)
            <div class="bg-white border-2 border-green-400 rounded-2xl p-5 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-green-500 text-white text-xs font-bold px-3 py-1.5 rounded-bl-xl">
                    Up Next · {{ $nextShow->diffInMins < 60 ? "In {$nextShow->diffInMins} mins" : \Carbon\Carbon::parse($nextShow->start_time)->diffForHumans() }}
                </div>

                <p class="text-green-600 font-medium text-sm mb-1 mt-2">
                    {{ \Carbon\Carbon::parse($nextShow->start_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($nextShow->end_time)->format('g:i A') }}
                </p>
                <h3 class="text-lg font-bold text-slate-800 pr-16">{{ $nextShow->show->name }}</h3>
                <p class="text-slate-500 text-sm flex items-center gap-2 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-green-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    {{ $nextShow->show->show_host }}
                </p>
            </div>
        @endif

        <div class="divide-y divide-slate-100 pt-2">
            @forelse($upcomingShows as $schedule)
                <div class="py-3 flex items-center justify-between group hover:bg-slate-50 px-3 rounded-lg transition-colors -mx-3">
                    <div class="pr-4">
                        <h4 class="font-semibold text-slate-700 group-hover:text-blue-600 transition-colors">{{ $schedule->show->name }}</h4>
                        <p class="text-xs sm:text-sm text-slate-500">{{ $schedule->show->show_host }}</p>
                    </div>
                    <div class="text-right shrink-0">
                        <p class="text-sm font-medium text-slate-600 bg-slate-100 px-2 py-1 rounded-md">{{ \Carbon\Carbon::parse($schedule->start_time)->format('g:i A') }}</p>
                    </div>
                </div>
            @empty
                @if(!$nextShow)
                    <div class="text-center py-4 text-slate-400 text-sm">
                        No more shows scheduled for today.
                    </div>
                @endif
            @endforelse
        </div>

    </div>
</div>
