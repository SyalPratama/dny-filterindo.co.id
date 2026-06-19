<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/@heroicons/v2/2.1.1/dist/heroicons.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
    @yield('styles')
</head>

<body class="bg-[#F8FAFC] min-h-screen text-slate-800" x-data="{ open: false }">

    <div class="flex flex-col md:flex-row h-screen overflow-hidden">

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
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-3 rounded-2xl font-bold transition-all {{ request()->routeIs('dashboard') ? 'bg-sage-500 text-white shadow-lg shadow-sage-500/20' : 'text-slate-400 hover:bg-slate-50' }}">
                        <i class="fa-solid fa-house w-5 h-5 mr-3 flex items-center justify-center"></i>
                        Dashboard
                    </a>

                    <a href="{{ route('products.index') }}"
                        class="flex items-center p-3 rounded-2xl font-bold transition-all {{ request()->routeIs('products.*') ? 'bg-sage-500 text-white shadow-lg shadow-sage-500/20' : 'text-slate-400 hover:bg-slate-50' }}">
                        <i class="fa-solid fa-box w-5 h-5 mr-3 flex items-center justify-center"></i>
                        Products
                    </a>
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

        <main class="flex-1 overflow-y-auto p-4 md:p-8">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
</body>

</html>
