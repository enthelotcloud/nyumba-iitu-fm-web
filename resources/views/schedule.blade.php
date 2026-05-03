@extends('layouts.guest.app')

@section('title', 'Programme Lineup & Schedule · Nyumba iitu FM')

@section('meta_description', 'Check out the full weekly schedule for Nyumba iitu FM 91.5. Never miss your favorite shows, music, and news broadcasts. Set reminders for upcoming programs.')

@section('meta_keywords', 'muugithitime, kigoocotime, nyumbaiitufm schedule, kikuyu radio timetable, kenya radio shows, wiigue wi mucii')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-12" style="font-family: 'Poppins', sans-serif;">

    <div class="max-w-3xl mb-10">
        <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-2 block">Weekly Timetable</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">Programme Lineup</h1>
        <p class="text-slate-500 text-sm sm:text-base leading-relaxed">
            From the crack of dawn to midnight, find out when your favorite hosts are live on 91.5 FM. Select a day below to explore the schedule and set reminders.
        </p>
    </div>

    <livewire:schedulepage />

</div>
@endsection
