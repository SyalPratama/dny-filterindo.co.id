@extends('layouts.app')

@section('title', 'Beranda - DNY Filterindo')


@section('content')
    <header class="relative flex items-center min-h-screen px-6 overflow-hidden hero-gradient">
        <div class="absolute inset-0 overflow-hidden">

            <div
                class="absolute inset-[-30%] bg-[conic-gradient(from_0deg,transparent,rgba(14,165,233,.25),transparent,rgba(20,184,166,.2),transparent)] blur-3xl animate-rotate-gradient">
            </div>

            <div
                class="absolute -top-[20%] -left-[10%] w-[700px] h-[700px] bg-accent-500/30 rounded-full blur-[160px] animate-float-slow">
            </div>
            <div
                class="absolute top-[20%] -right-[10%] w-[650px] h-[650px] bg-blue-600/20 rounded-full blur-[160px] animate-float-reverse">
            </div>

            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[900px] h-[900px] border border-white/10 rounded-full animate-pulse-ring">
            </div>

            <div
                class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,.04)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,.04)_1px,transparent_1px)] bg-[size:100px_100px] [mask-image:radial-gradient(circle,black,transparent_70%)]">
            </div>

            <div class="absolute w-3 h-3 bg-white/40 rounded-full top-1/4 left-1/3 animate-ping"></div>
            <div class="absolute w-4 h-4 bg-accent-400/40 rounded-full top-2/3 right-1/4 animate-pulse"></div>
        </div>

        <div class="relative z-10 max-w-6xl mx-auto text-center">
            <h1
                class="mb-8 text-6xl font-extrabold tracking-tighter text-transparent md:text-8xl lg:text-9xl bg-clip-text bg-gradient-to-b from-white to-slate-400">
                Your Simplicity
                <br>
                <span class="text-accent-500">Purification.</span>
            </h1>

            <p class="max-w-2xl mx-auto mb-10 text-lg text-slate-400">
                Finding the right water treatment or purification system for your business can be a challenge.
                However, when you have experienced professionals on your side who know and understand
                the industry and the options open to you, you can make an informed decision.
            </p>

            <a href="#products"
                class="inline-flex px-10 py-5 text-lg font-bold transition bg-white rounded-full text-dark-950 hover:bg-accent-500 hover:text-white shadow-xl">
                Explore Products
            </a>
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
                <h2 class="text-4xl font-extrabold tracking-tighter text-white">
                    Service
                </h2>
                <p class="text-white/70 text-justify">
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

    <section class="py-20 px-6 max-w-5xl mx-auto" id="products" x-data="{ modalOpen: false, imgUrl: '', title: '', pdfUrl: '' }"
        @open-product-modal.window="modalOpen = true; imgUrl = $event.detail.img; title = $event.detail.title; pdfUrl = $event.detail.pdf">

        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold tracking-tighter mb-4 text-white">Our Products</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div
                    class="group relative bg-white/5 backdrop-blur-xl border border-white/20 p-4 rounded-2xl transition-all duration-300 hover:bg-white/10 hover:border-white/30 hover:shadow-[0_0_30px_rgba(255,255,255,0.05)]">
                    <div class="h-40 bg-white/5 rounded-xl mb-4 overflow-hidden relative border border-white/5">
                        <img src="{{ asset($product->image) }}" class="w-full h-full object-cover"
                            alt="{{ $product->name }}">

                        <button type="button"
                            @click.stop="$dispatch('open-product-modal', { 
                            img: '{{ asset($product->image) }}', 
                            title: '{{ $product->name }}', 
                            pdf: '{{ $product->pdf ? asset($product->pdf) : '' }}' 
                        })"
                            class="absolute bottom-2 right-2 z-50 bg-white/10 backdrop-blur-md p-2 rounded-full opacity-0 group-hover:opacity-100 transition hover:bg-white hover:text-black text-white border border-white/30">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <h3 class="font-bold text-sm text-white/90">{{ $product->name }}</h3>
                </div>
            @endforeach
        </div>

        <div x-show="modalOpen"
            class="fixed inset-0 z-[100] bg-black/40 backdrop-blur-xl flex items-center justify-center p-4" x-cloak>
            <button @click="modalOpen = false"
                class="absolute top-6 right-6 text-white/80 text-3xl font-light hover:text-white transition">✕</button>
            <div class="max-w-4xl w-full flex flex-col items-center">
                <img :src="imgUrl"
                    class="max-h-[70vh] w-auto rounded-2xl shadow-2xl border border-white/20 bg-white/5"
                    :alt="title">
                <p class="text-white mt-4 font-bold text-lg" x-text="title"></p>
                <template x-if="pdfUrl">
                    <a :href="pdfUrl" target="_blank"
                        class="mt-4 px-6 py-2 bg-white/5 backdrop-blur-lg border border-white/20 text-white rounded-lg font-semibold hover:bg-white/20 transition flex items-center gap-2">
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
