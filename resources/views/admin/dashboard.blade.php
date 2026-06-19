@extends('layouts.dashboard')

@section('title', 'Dashboard | Analytics')

@section('content')
    <header class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-slate-900">Analytics Dashboard</h2>
            <p class="text-slate-500">Monitor your recent web traffic activity.</p>
        </div>
        <button @click="open = true" class="md:hidden p-3 bg-white rounded-2xl border border-slate-200 shadow-sm">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </header>

    <!-- Filter -->
    <form method="GET" action="{{ route('dashboard') }}"
        class="flex flex-wrap gap-4 mb-8 bg-white p-6 rounded-3xl border border-slate-100 shadow-sm items-end">
        <div>
            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Start
                Date</label>
            <input type="date" name="start_date" value="{{ $startDate }}"
                class="bg-slate-50 border-transparent focus:bg-white focus:border-sage-500 transition rounded-xl p-3 outline-none w-full">
        </div>
        <div>
            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">End
                Date</label>
            <input type="date" name="end_date" value="{{ $endDate }}"
                class="bg-slate-50 border-transparent focus:bg-white focus:border-sage-500 transition rounded-xl p-3 outline-none w-full">
        </div>
        <button type="submit"
            class="bg-sage-500 hover:bg-sage-600 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-sage-500/20">Filter</button>
        <a href="{{ route('dashboard') }}" class="text-slate-400 hover:text-slate-600 font-bold text-sm py-3 px-2">Reset</a>
    </form>

    <!-- Chart -->
    <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm mb-8">
        <h3 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
            <span class="w-2 h-6 bg-sage-500 rounded-full"></span> Traffic Trend
        </h3>
        <div class="h-[300px]"><canvas id="visitorChart"></canvas></div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-slate-50">
            <h3 class="text-lg font-bold text-slate-800">Recent Traffic</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50/50">
                    <tr class="text-slate-400 uppercase text-[10px] tracking-widest">
                        <th class="py-4 px-8 font-black">IP Address</th>
                        <th class="py-4 px-8 font-black">Browser</th>
                        <th class="py-4 px-8 font-black">Device</th>
                        <th class="py-4 px-8 font-black">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($visitors->take(10) as $visitor)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-6 px-8 font-medium text-sm">{{ $visitor->ip_address }}</td>
                            <td class="py-6 px-8 text-sm text-slate-500">{{ $visitor->browser }}</td>
                            <td class="py-6 px-8">
                                <span
                                    class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-wider {{ $visitor->is_mobile ? 'bg-blue-50 text-blue-600' : 'bg-slate-100 text-slate-600' }}">
                                    {{ $visitor->is_mobile ? 'Mobile' : 'Desktop' }}
                                </span>
                            </td>
                            <td class="py-6 px-8 text-sm text-slate-500">
                                {{ $visitor->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-12 text-center text-slate-400">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        const ctx = document.getElementById('visitorChart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(0, 153, 205, 0.2)');
        gradient.addColorStop(1, 'rgba(0, 153, 205, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Visitors',
                    data: @json($dataPoints),
                    borderColor: '#0099CD',
                    borderWidth: 4,
                    tension: 0.4,
                    fill: true,
                    backgroundColor: gradient,
                    pointRadius: 0,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#F1F5F9'
                        },
                        border: {
                            dash: [5, 5]
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
@endsection
