@extends('layouts.guest.app')

@section('title', 'Listen Live · Nyumba iitu FM')
@section('meta_description', 'Nyumba iitu FM is streaming live on 91.5 FM. Tune in for music, news, and cultural Shows.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-8 font-['Poppins']">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

        <div class="lg:col-span-7 xl:col-span-8 flex flex-col gap-6">
            <livewire:music />

            <livewire:shows />
        </div>

        <div class="lg:col-span-5 xl:col-span-4">
            <div class="sticky top-24 h-125 lg:h-[calc(100vh-8rem)]">
                <livewire:chat />
            </div>
        </div>

    </div>
</div>
@endsection
