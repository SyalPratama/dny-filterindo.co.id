@extends('layouts.app')

@section('title', 'Contact Us - DNY Filterindo')

@section('content')
    <header class="pt-40 pb-10 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold tracking-tighter mb-6">Contact Us</h1>
            <p class="text-xl text-slate-500 font-medium">Have questions? We are here to help you.</p>
        </div>
    </header>

    <section class="max-w-5xl mx-auto px-6 py-8">
        <div class="bg-white p-8 md:p-12 rounded-[2rem] shadow-sm border border-slate-100">
            <form action="#" method="POST" class="space-y-6">
                @csrf

                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Full Name</label>
                        <input type="text" name="name" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-sage-500 focus:border-sage-500 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
                        <input type="email" name="email" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-sage-500 focus:border-sage-500 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Phone Number</label>
                        <input type="tel" name="phone" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-sage-500 focus:border-sage-500 outline-none transition">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Message</label>
                    <textarea name="message" rows="6" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-sage-500 focus:border-sage-500 outline-none transition"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full bg-slate-900 text-white py-4 rounded-xl font-bold hover:bg-sage-600 transition uppercase tracking-wider">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
