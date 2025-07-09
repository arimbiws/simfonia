@extends('frontend.layouts.app')
@section('title', 'Kalender Ketersediaan')

@section('content')

<x-navbar />

<div class="bg-white rounded-lg shadow p-6 max-w-7xl mx-auto mt-6 min-h-[600px] my-[75px]">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Kalender Ketersediaan Produk/Layanan</h1>
    <div id='calendar'></div>
</div>

<x-footer />

@endsection



@push('after-style')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet" />
@endpush

@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            events: '/calendar/events',
            height: "auto",
        });

        calendar.render();
    });
</script>
@endpush