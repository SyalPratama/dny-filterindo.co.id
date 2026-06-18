@extends('layouts.app')

@section('title', 'Beranda - DNY Filterindo')

@section('content')
    <!-- Header Section -->
    <header class="pt-40 pb-20 px-6">
        <div class="max-w-5xl mx-auto text-center md:text-left">
            <div class="flex-1 space-y-6">
                <span
                    class="inline-block px-4 py-1 bg-sage-500/10 text-sage-600 rounded-full text-xs font-bold uppercase tracking-widest">
                    New Arrival 2026
                </span>
                <h1 class="text-6xl md:text-7xl font-extrabold tracking-tighter leading-[0.9]">
                    Your Simplicity <span class="text-sage-500">Purification</span>.
                </h1>
                <p class="text-lg text-slate-500 max-w-2xl">
                    Finding the right water treatment or purification system for your business can be a challenge.
                    However, when you have experienced professionals on your side who know and understand
                    the industry and the options open to you, you can make an informed decision.
                </p>
                <a href="#products"
                    class="inline-block bg-slate-900 text-white px-8 py-4 rounded-xl font-semibold hover:bg-sage-600 transition uppercase text-center">
                    Explore Products
                </a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section class="max-w-5xl mx-auto px-6 py-10">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div class="relative w-full h-[400px] bg-slate-200 rounded-[2rem] overflow-hidden shadow-xl group">
                <img src="assets/img/service.jpg" alt="European Service Department"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                <!-- Pemicu Modal Service -->
                <button id="openServiceModal"
                    class="absolute bottom-6 right-6 bg-white/90 backdrop-blur p-3 rounded-full shadow-lg hover:bg-sage-500 hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="space-y-4">
                <h2 class="text-4xl font-extrabold tracking-tighter">Service</h2>
                <p class="text-slate-600 text-justify">
                    Our European Service Department offers an intensive service program for all our products,
                    especially for desiccant compressed air dryers and filtration units.
                    <br><br>
                    Our company has a proven record of satisfied customers that rely on our excellent
                    knowledge in the field of service of compressed air dryers from Walker Filtration ltd,
                    Donaldson Ultrafilter, Parker Zander, Atlas Copco, Deltech, SPX and Hankinson, Ingersoll Rand.
                </p>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="max-w-5xl mx-auto px-6 py-20" x-data="{ activeTab: 'all' }" id="products">
        <div class="mb-12 text-center">
            <h2 class="text-4xl font-extrabold tracking-tighter mb-4">Our Products</h2>
            <div class="flex flex-wrap justify-center gap-2">
                <template
                    x-for="tab in ['all', 'oil purifier', 'oil filter & filter element', 'air inlet filter & compressor filter', 'hepa/ulpa series', 'dust collector']">
                    <button @click="activeTab = tab"
                        :class="activeTab === tab ? 'bg-sage-500 text-white' : 'bg-white text-slate-600 hover:bg-slate-100'"
                        class="px-5 py-2 rounded-full text-sm font-semibold transition shadow-sm border border-slate-100 capitalize">
                        <span x-text="tab"></span>
                    </button>
                </template>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

            {{-- OIL PURIFIER --}}
            <div x-show="activeTab === 'all' || activeTab === 'oil purifier'"
                class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 group relative">
                <div class="h-40 bg-sage-50 rounded-xl mb-4 overflow-hidden relative">
                    <img src="assets/img/Oil-Purifier.jpeg" class="w-full h-full object-cover" alt="Oil Purifier">
                    <button
                        @click="$dispatch('open-product-modal', { img: 'assets/img/Oil-Purifier.jpeg', title: 'OIL PURIFIER' })"
                        class="absolute bottom-2 right-2 bg-white/90 p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition hover:bg-sage-500 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                            </path>
                        </svg>
                    </button>
                </div>
                <h3 class="font-bold text-sm">OIL PURIFIER</h3>
            </div>

            {{-- OIL FILTER --}}
            <div x-show="activeTab === 'all' || activeTab === 'oil filter & filter element'"
                class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 group relative">
                <div class="h-40 bg-sage-50 rounded-xl mb-4 overflow-hidden relative">
                    <img src="assets/img/Oil-Filter-Filter-Element.jpeg" class="w-full h-full object-cover"
                        alt="Oil Filter">
                    <button
                        @click="$dispatch('open-product-modal', { img: 'assets/img/Oil-Filter-Filter-Element.jpeg', title: 'OIL FILTER ELEMENT' })"
                        class="absolute bottom-2 right-2 bg-white/90 p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition hover:bg-sage-500 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                            </path>
                        </svg>
                    </button>
                </div>
                <h3 class="font-bold text-sm">OIL FILTER ELEMENT</h3>
            </div>

            {{-- AIR INLET FILTER --}}
            <div x-show="activeTab === 'all' || activeTab === 'air inlet filter & compressor filter'"
                class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 group relative">
                <div class="h-40 bg-sage-50 rounded-xl mb-4 overflow-hidden relative">
                    <img src="assets/img/Air-Inlet-Filter-Compressor-Filter.jpeg" class="w-full h-full object-cover"
                        alt="Air Inlet Filter">
                    <button
                        @click="$dispatch('open-product-modal', { img: 'assets/img/Air-Inlet-Filter-Compressor-Filter.jpeg', title: 'AIR INLET FILTER' })"
                        class="absolute bottom-2 right-2 bg-white/90 p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition hover:bg-sage-500 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                            </path>
                        </svg>
                    </button>
                </div>
                <h3 class="font-bold text-sm">AIR INLET FILTER</h3>
            </div>

            {{-- HEPA/ULPA SERIES --}}
            <div x-show="activeTab === 'all' || activeTab === 'hepa/ulpa series'"
                class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 group relative">
                <div class="h-40 bg-sage-50 rounded-xl mb-4 overflow-hidden relative">
                    <img src="assets/img/cleanfilter_1.png" class="w-full h-full object-cover" alt="Hepa Filter">
                    <button
                        @click="$dispatch('open-product-modal', { img: 'assets/img/cleanfilter_1.png', title: 'CLEAN PROCESS FILTER: E10 TO U17', pdf: 'assets/pdf/clean-filter.pdf' })"
                        class="absolute bottom-2 right-2 bg-white/90 p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition hover:bg-sage-500 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                            </path>
                        </svg>
                    </button>
                </div>
                <h3 class="font-bold text-sm">CLEAN PROCESS FILTER: E10 TO U17</h3>
            </div>

            <div x-show="activeTab === 'all' || activeTab === 'hepa/ulpa series'"
                class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 group relative">
                <div class="h-40 bg-sage-50 rounded-xl mb-4 overflow-hidden relative">
                    <img src="assets/img/cleanfilter_2.png" class="w-full h-full object-cover" alt="Hepa Filter">
                    <button
                        @click="$dispatch('open-product-modal', { img: 'assets/img/cleanfilter_2.png', title: 'CLEAN PROCESS FILTER: E10 TO U17 (2)', pdf: 'assets/pdf/clean-filter.pdf'  })"
                        class="absolute bottom-2 right-2 bg-white/90 p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition hover:bg-sage-500 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                            </path>
                        </svg>
                    </button>
                </div>
                <h3 class="font-bold text-sm">CLEAN PROCESS FILTER: E10 TO U17 (2)</h3>
            </div>

            <div x-show="activeTab === 'all' || activeTab === 'hepa/ulpa series'"
                class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 group relative">
                <div class="h-40 bg-sage-50 rounded-xl mb-4 overflow-hidden relative">
                    <img src="assets/img/pre-filtration-768x737.png" class="w-full h-full object-cover"
                        alt="Hepa Filter">
                    <button
                        @click="$dispatch('open-product-modal', { img: 'assets/img/pre-filtration-768x737.png', title: 'PRE-FILTERATION: G3 TO M5', pdf: 'assets/pdf/Pre-Filter.pdf'  })"
                        class="absolute bottom-2 right-2 bg-white/90 p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition hover:bg-sage-500 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                            </path>
                        </svg>
                    </button>
                </div>
                <h3 class="font-bold text-sm">PRE-FILTERATION: G3 TO M5</h3>
            </div>

            <div x-show="activeTab === 'all' || activeTab === 'hepa/ulpa series'"
                class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 group relative">
                <div class="h-40 bg-sage-50 rounded-xl mb-4 overflow-hidden relative">
                    <img src="assets/img/comfortfilter_1.png" class="w-full h-full object-cover" alt="Hepa Filter">
                    <button
                        @click="$dispatch('open-product-modal', { img: 'assets/img/comfortfilter_1.png', title: 'COMFORT FILTERS: M5 TO F9', pdf: 'assets/pdf/comfort-Filter.pdf' })"
                        class="absolute bottom-2 right-2 bg-white/90 p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition hover:bg-sage-500 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                            </path>
                        </svg>
                    </button>
                </div>
                <h3 class="font-bold text-sm">COMFORT FILTERS: M5 TO F9</h3>
            </div>

            <div x-show="activeTab === 'all' || activeTab === 'hepa/ulpa series'"
                class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 group relative">
                <div class="h-40 bg-sage-50 rounded-xl mb-4 overflow-hidden relative">
                    <img src="assets/img/comfortfilter_2.png" class="w-full h-full object-cover" alt="Hepa Filter">
                    <button
                        @click="$dispatch('open-product-modal', { img: 'assets/img/comfortfilter_2.png', title: 'COMFORT FILTERS: M5 TO F9 (2)', pdf: 'assets/pdf/comfort-Filter.pdf' })"
                        class="absolute bottom-2 right-2 bg-white/90 p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition hover:bg-sage-500 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                            </path>
                        </svg>
                    </button>
                </div>
                <h3 class="font-bold text-sm">COMFORT FILTERS: M5 TO F9 (2)</h3>
            </div>

            <div x-show="activeTab === 'all' || activeTab === 'hepa/ulpa series'"
                class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 group relative">
                <div class="h-40 bg-sage-50 rounded-xl mb-4 overflow-hidden relative">
                    <img src="assets/img/industrialmolecularfiltration.png" class="w-full h-full object-cover"
                        alt="Hepa Filter">
                    <button
                        @click="$dispatch('open-product-modal', { img: 'assets/img/industrialmolecularfiltration.png', title: 'INDUSTRIAL MOLECULAR FILTRATION', pdf: 'assets/pdf/industrial-molecular-filtration.pdf' })"
                        class="absolute bottom-2 right-2 bg-white/90 p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition hover:bg-sage-500 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                            </path>
                        </svg>
                    </button>
                </div>
                <h3 class="font-bold text-sm">INDUSTRIAL MOLECULAR FILTRATION</h3>
            </div>

            <div x-show="activeTab === 'all' || activeTab === 'hepa/ulpa series'"
                class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 group relative">
                <div class="h-40 bg-sage-50 rounded-xl mb-4 overflow-hidden relative">
                    <img src="assets/img/gasturbinefiltration.png" class="w-full h-full object-cover" alt="Hepa Filter">
                    <button
                        @click="$dispatch('open-product-modal', { img: 'assets/img/gasturbinefiltration.png', title: 'GAS TURBINE FILTRATION', pdf: 'assets/pdf/gas-turbine-filtration.pdf' })"
                        class="absolute bottom-2 right-2 bg-white/90 p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition hover:bg-sage-500 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                            </path>
                        </svg>
                    </button>
                </div>
                <h3 class="font-bold text-sm">GAS TURBINE FILTRATION</h3>
            </div>

            {{-- DUST COLLECTOR --}}
            <div x-show="activeTab === 'all' || activeTab === 'dust collector'"
                class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 group relative">
                <div class="h-40 bg-sage-50 rounded-xl mb-4 overflow-hidden relative">
                    <img src="assets/img/dust-collectors.png" class="w-full h-full object-cover" alt="Dust Collector">
                    <button
                        @click="$dispatch('open-product-modal', { img: 'assets/img/dust-collectors.png', title: 'DUST COLLECTOR' })"
                        class="absolute bottom-2 right-2 bg-white/90 p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition hover:bg-sage-500 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                            </path>
                        </svg>
                    </button>
                </div>
                <h3 class="font-bold text-sm">DUST COLLECTOR</h3>
            </div>

        </div>

        <div x-data="{ modalOpen: false, imgUrl: '', title: '', pdfUrl: '' }"
            @open-product-modal.window="modalOpen = true; imgUrl = $event.detail.img; title = $event.detail.title; pdfUrl = $event.detail.pdf"
            x-show="modalOpen"
            class="fixed inset-0 z-[100] bg-black/90 backdrop-blur-sm flex items-center justify-center p-4" x-cloak>

            <button @click="modalOpen = false"
                class="absolute top-6 right-6 text-white text-3xl font-light hover:text-sage-500">✕</button>

            <div class="max-w-4xl w-full flex flex-col items-center">
                <img :src="imgUrl" class="max-h-[70vh] w-auto rounded-2xl shadow-2xl border border-white/10"
                    :alt="title">
                <p class="text-white mt-4 font-bold text-lg" x-text="title"></p>

                <template x-if="pdfUrl">
                    <a :href="pdfUrl" target="_blank"
                        class="mt-4 px-6 py-2 bg-sage-500 text-white rounded-lg font-semibold hover:bg-sage-600 transition flex items-center gap-2">
                        Download PDF
                    </a>
                </template>
            </div>
        </div>
    </section>

    <!-- Modal Service (Vanilla JS) -->
    <div id="serviceModal"
        class="fixed inset-0 z-[100] bg-black/80 backdrop-blur-md hidden flex items-center justify-center p-4">
        <button id="closeServiceModal"
            class="absolute top-6 right-6 text-white text-3xl font-light hover:text-sage-500">✕</button>
        <img src="assets/img/service.jpg" class="max-w-full max-h-[80vh] rounded-2xl shadow-2xl" alt="Service Image">
    </div>
@endsection

@push('scripts')
    <script>
        // Logika Modal Service (Vanilla JS)
        const btnOpenService = document.getElementById('openServiceModal');
        const btnCloseService = document.getElementById('closeServiceModal');
        const modalService = document.getElementById('serviceModal');

        btnOpenService.addEventListener('click', () => modalService.classList.remove('hidden'));
        btnCloseService.addEventListener('click', () => modalService.classList.add('hidden'));
        modalService.addEventListener('click', (e) => {
            if (e.target === modalService) modalService.classList.add('hidden');
        });
    </script>
@endpush
