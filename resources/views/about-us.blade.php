@extends('layouts.app')

@section('title', 'About Us - DNY Filterindo')

@section('content')
    <header class="pt-40 pb-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold tracking-tighter mb-6">PT. Denayu Filterindo Teknik</h1>
            <p class="text-xl text-sage-600 font-medium">Your Trusted Partner in Air and Water Filtration Solutions</p>
        </div>
    </header>

    <section class="max-w-4xl mx-auto px-6 py-10 space-y-12">
        <div class="prose prose-lg text-slate-600">
            <p>Welcome to PT. Denayu Filterindo Teknik, your reliable partner in providing high-quality air and water
                filtration systems, including solutions for wastewater treatment. Committed to supporting sustainability and
                operational efficiency, we serve a wide range of industries, including manufacturing plants and hospitals,
                with products tailored to meet your specific needs.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-sage-50 p-8 rounded-2xl">
                <h3 class="text-2xl font-bold mb-4 text-sage-800">Our Vision</h3>
                <p class="text-slate-600">To become the leading provider of filtration solutions that enhance operational
                    efficiency, health, and environmental sustainability across industries in Indonesia.</p>
            </div>
            <div class="bg-slate-900 p-8 rounded-2xl text-white">
                <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                <ul class="space-y-2 text-slate-300 text-sm">
                    <li>• To deliver premium filtration products that are efficient, durable, and eco-friendly.</li>
                    <li>• To provide exceptional service supported by a team of experts and cutting-edge technology.</li>
                    <li>• To meet industrial and healthcare needs with innovative solutions focused on performance and
                        sustainability.</li>
                </ul>
            </div>
        </div>

        <div class="space-y-8">
            <div>
                <h3 class="text-2xl font-bold mb-4">Our Products</h3>
                <ul class="list-disc pl-5 space-y-2 text-slate-600">
                    <li>Air filters for various industrial applications.</li>
                    <li>Water purification systems for domestic and commercial needs.</li>
                    <li>Wastewater treatment solutions that comply with environmental standards.</li>
                </ul>
            </div>

            <div>
                <h3 class="text-2xl font-bold mb-4">Why Choose Us?</h3>
                <div class="grid md:grid-cols-2 gap-4">
                    @foreach (['Premium Quality', 'Extensive Experience', 'Responsive Customer Service', 'Comprehensive Product Range'] as $item)
                        <div class="flex items-center gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <span class="text-sage-500">✔</span>
                            <span class="font-semibold text-slate-700">{{ $item }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="text-center pt-10 border-t border-white/10">
            <p class="text-lg font-bold text-white italic">
                "Join us in creating healthier, more efficient, and environmentally friendly workspaces."
            </p>
            <p class="mt-4 text-sage-400 font-bold">
                PT. Denayu Filterindo Teknik – Your Filtration Solution, Today and Beyond.
            </p>
        </div>
    </section>
@endsection
