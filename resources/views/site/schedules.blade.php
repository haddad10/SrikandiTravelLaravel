@extends('layouts.app')

@section('title', 'Jadwal Keberangkatan - Srikandi Travel')

@section('content')
    <!-- Hero Section -->
    <section class="py-16">
        @if($mode === 'travel')
        <!-- Travel Mode Hero -->
        <div class="bg-gradient-to-r from-blue-600 to-green-600 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Jadwal Keberangkatan</h1>
                <p class="text-xl">Jadwal keberangkatan wisata terbaru</p>
            </div>
        </div>
        @else
        <!-- Umroh Mode Hero -->
        <div class="bg-gradient-to-r from-orange-500 to-yellow-500 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Jadwal Umroh</h1>
                <p class="text-xl">Jadwal keberangkatan umroh terbaru</p>
            </div>
        </div>
        @endif
    </section>

    <!-- Mode Filter Section -->
    <section class="py-8 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('schedules', ['mode' => 'travel']) }}" 
                   class="px-6 py-3 rounded-lg font-semibold transition-colors {{ $mode === 'travel' ? 'bg-blue-600 text-white' : 'bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-400 dark:hover:bg-gray-500' }}">
                    Travel ({{ $scheduleCounts['travel'] }})
                </a>
                <a href="{{ route('schedules', ['mode' => 'umroh']) }}" 
                   class="px-6 py-3 rounded-lg font-semibold transition-colors {{ $mode === 'umroh' ? 'bg-orange-600 text-white' : 'bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-400 dark:hover:bg-gray-500' }}">
                    Umroh ({{ $scheduleCounts['umroh'] }})
                </a>
            </div>
        </div>
    </section>

    <!-- Schedules Section -->
    <section class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($schedules as $schedule)
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 transition-all duration-300 hover:shadow-lg transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-3 py-1 rounded-full text-sm font-medium transition-colors duration-300">
                            {{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }}
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">{{ $schedule->destination }}</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white transition-colors duration-300">{{ $schedule->destination }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm transition-colors duration-300">{{ $schedule->description }}</p>
                </div>
                @endforeach
            </div>
            
            @if($schedules->isEmpty())
            <div class="text-center py-12">
                <div class="text-gray-500 dark:text-gray-400 text-lg transition-colors duration-300">
                    @if($mode === 'travel')
                        Belum ada jadwal keberangkatan wisata yang tersedia saat ini.
                    @else
                        Belum ada jadwal keberangkatan umroh yang tersedia saat ini.
                    @endif
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Calendar Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    @if($mode === 'travel')
                        Kalender Keberangkatan
                    @else
                        Kalender Umroh
                    @endif
                </h2>
                <p class="text-lg text-gray-600">
                    @if($mode === 'travel')
                        Lihat jadwal keberangkatan dalam format kalender
                    @else
                        Lihat jadwal umroh dalam format kalender
                    @endif
                </p>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="grid grid-cols-7 gap-4">
                    <!-- Calendar headers -->
                    <div class="text-center font-semibold text-gray-600">Minggu</div>
                    <div class="text-center font-semibold text-gray-600">Senin</div>
                    <div class="text-center font-semibold text-gray-600">Selasa</div>
                    <div class="text-center font-semibold text-gray-600">Rabu</div>
                    <div class="text-center font-semibold text-gray-600">Kamis</div>
                    <div class="text-center font-semibold text-gray-600">Jumat</div>
                    <div class="text-center font-semibold text-gray-600">Sabtu</div>
                    
                    <!-- Calendar days -->
                    @php
                        $currentMonth = now()->startOfMonth();
                        $startDate = $currentMonth->copy()->startOfWeek();
                        $endDate = $currentMonth->copy()->endOfMonth()->endOfWeek();
                    @endphp
                    
                    @for($date = $startDate; $date <= $endDate; $date->addDay())
                        @php
                            $hasSchedule = $schedules->where('date', $date->format('Y-m-d'))->count() > 0;
                        @endphp
                        <div class="text-center p-2 {{ $date->month === now()->month ? 'bg-blue-50' : 'bg-gray-50' }} rounded">
                            <div class="text-sm {{ $date->month === now()->month ? 'text-gray-900' : 'text-gray-400' }}">
                                {{ $date->format('j') }}
                            </div>
                            @if($hasSchedule)
                                <div class="w-2 h-2 bg-blue-500 rounded-full mx-auto mt-1"></div>
                            @endif
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>
@endsection 