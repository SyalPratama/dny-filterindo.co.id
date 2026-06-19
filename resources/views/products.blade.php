@extends('layouts.app')

@section('title', 'Beranda - DNY Filterindo')

@section('content')

    <header class="pt-40 pb-10 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold tracking-tighter mb-6">Our Products</h1>
        </div>
    </header>

    <!-- Products Section -->
    <section class="max-w-5xl mx-auto px-6 pt-10 pb-20" x-data="{ activeTab: 'all' }" id="products">

        <!-- Filter Buttons -->
        <div class="mb-12 text-center">
            <div class="flex flex-wrap justify-center gap-2">
                <button @click="activeTab = 'all'"
                    :class="activeTab === 'all' ? 'bg-white/20 text-white border-white/30' :
                        'bg-white/5 text-slate-300 border-white/10 hover:bg-white/10'"
                    class="px-5 py-2 rounded-full text-sm font-semibold backdrop-blur-md border transition">All</button>

                @foreach ($categories as $cat)
                    <button @click="activeTab = '{{ $cat->slug }}'"
                        :class="activeTab === '{{ $cat->slug }}' ? 'bg-white/20 text-white border-white/30' :
                            'bg-white/5 text-slate-300 border-white/10 hover:bg-white/10'"
                        class="px-5 py-2 rounded-full text-sm font-semibold backdrop-blur-md border transition capitalize">
                        {{ $cat->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div x-show="activeTab === 'all' || activeTab === '{{ $product->productType->slug }}'"
                    class="group relative bg-white/5 backdrop-blur-lg border border-white/10 p-4 rounded-2xl transition-all duration-300 hover:bg-white/10 hover:border-white/20 shadow-lg"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100">

                    <div class="h-40 bg-white/5 rounded-xl mb-4 overflow-hidden relative border border-white/5">
                        <img src="{{ asset($product->image) }}" class="w-full h-full object-cover"
                            alt="{{ $product->name }}">

                        <button
                            @click="$dispatch('open-product-modal', { 
                            img: '{{ asset($product->image) }}', 
                            title: '{{ $product->name }}',
                            pdf: '{{ $product->pdf ? asset($product->pdf) : '' }}'
                        })"
                            class="absolute bottom-2 right-2 bg-white/20 backdrop-blur-md p-2 rounded-full opacity-0 group-hover:opacity-100 transition hover:bg-white hover:text-black text-white border border-white/20">
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

        <!-- Modal -->
        <div x-data="{ modalOpen: false, imgUrl: '', title: '', pdfUrl: '' }"
            @open-product-modal.window="modalOpen = true; imgUrl = $event.detail.img; title = $event.detail.title; pdfUrl = $event.detail.pdf"
            x-show="modalOpen"
            class="fixed inset-0 z-[100] bg-black/60 backdrop-blur-md flex items-center justify-center p-4" x-cloak>

            <button @click="modalOpen = false"
                class="absolute top-6 right-6 text-white text-3xl hover:text-white/70 transition">✕</button>

            <div
                class="max-w-4xl w-full flex flex-col items-center bg-black/40 backdrop-blur-xl border border-white/10 p-6 rounded-3xl">
                <img :src="imgUrl" class="max-h-[60vh] w-auto rounded-2xl border border-white/10"
                    :alt="title">
                <p class="text-white mt-4 font-bold text-lg" x-text="title"></p>

                <template x-if="pdfUrl">
                    <a :href="pdfUrl" target="_blank"
                        class="mt-4 px-6 py-2 bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-lg font-semibold hover:bg-white/20 transition flex items-center gap-2">
                        Download PDF
                    </a>
                </template>
            </div>
        </div>
    </section>
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
