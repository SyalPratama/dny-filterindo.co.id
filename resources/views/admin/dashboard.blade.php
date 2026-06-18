<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Analytics</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        sage: {
                            50: '#F3F4ED',
                            500: '#0099CD',
                            600: '#0078A0'
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-[#F8FAFC] min-h-screen text-slate-800" x-data="{ open: false }">

    <div class="flex flex-col md:flex-row h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside :class="open ? 'translate-x-0' : '-translate-x-full'"
            class="fixed md:sticky top-0 left-0 z-20 w-64 bg-white/80 backdrop-blur-xl h-full border-r border-slate-200 p-6 transition-transform duration-300 md:translate-x-0 flex flex-col justify-between">

            <div>
                <!-- Logo -->
                <div class="flex items-center justify-between mb-10">
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight">DNY<span
                            class="text-sage-500">Filterindo</span></h1>
                    <button @click="open = false" class="md:hidden text-slate-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Navigation -->
                <nav class="space-y-2">
                    <a href="#"
                        class="flex items-center p-3 bg-sage-500 text-white rounded-2xl font-bold shadow-lg shadow-sage-500/20">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                    <!-- Tambahkan menu lain di sini jika diperlukan -->
                </nav>
            </div>

            <!-- Footer Sidebar: Logout & Profile -->
            <div class="border-t border-slate-200 pt-6">
                <div class="flex items-center gap-3 mb-6">
                    <div
                        class="w-10 h-10 rounded-full bg-sage-100 flex items-center justify-center text-sage-600 font-bold">
                        {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-sm font-bold text-slate-900 truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                        <p class="text-[10px] text-slate-400 uppercase tracking-wider">Administrator</p>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center p-3 text-slate-400 hover:text-red-500 transition font-bold text-sm">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto p-4 md:p-8">
            <header class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-900">Analytics Dashboard</h2>
                    <p class="text-slate-500">Monitor your recent web traffic activity.</p>
                </div>
                <button @click="open = true"
                    class="md:hidden p-3 bg-white rounded-2xl border border-slate-200 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
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
                <a href="{{ route('dashboard') }}"
                    class="text-slate-400 hover:text-slate-600 font-bold text-sm py-3 px-2">Reset</a>
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
        </main>
    </div>

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
</body>

</html>
