<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DNY Filterindo')</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap"
        rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 50% -20%, #1e3a8a 0%, #020617 70%);
            min-height: 100vh;
            background-attachment: fixed;
        }

        /* Elegant Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Animated Gradient Background for Header */
        .hero-gradient {
            background: radial-gradient(circle at 50% 50%, #1e293b 0%, #020617 100%);
        }

        @keyframes float-slow {

            0%,
            100% {
                transform: translate3d(0, 0, 0) scale(1);
            }

            50% {
                transform: translate3d(40px, -60px, 0) scale(1.1);
            }
        }

        @keyframes float-reverse {

            0%,
            100% {
                transform: translate3d(0, 0, 0) scale(1);
            }

            50% {
                transform: translate3d(-50px, 40px, 0) scale(1.15);
            }
        }

        @keyframes rotate-gradient {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(0.9);
                opacity: .4;
            }

            50% {
                transform: scale(1.15);
                opacity: .7;
            }

            100% {
                transform: scale(0.9);
                opacity: .4;
            }
        }

        .animate-float-slow {
            animation: float-slow 12s ease-in-out infinite;
        }

        .animate-float-reverse {
            animation: float-reverse 15s ease-in-out infinite;
        }

        .animate-rotate-gradient {
            animation: rotate-gradient 25s linear infinite;
        }

        .animate-pulse-ring {
            animation: pulse-ring 8s ease-in-out infinite;
        }

        #cursor-trail {
            position: fixed;
            top: 0;
            left: 0;
            pointer-events: none;
            /* Penting: agar kursor bisa tetap klik link/tombol */
            z-index: 9999;
        }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Palette Elegant: Dark Slate & Gold/Blue
                        dark: {
                            950: '#020617',
                            900: '#0f172a'
                        },
                        accent: {
                            500: '#38bdf8',
                            600: '#0ea5e9'
                        }
                    }
                }
            }
        }
    </script>

</head>

<body
    class="bg-[#020617] bg-[radial-gradient(circle_at_50%_-20%,_rgba(30,58,138,0.4),_transparent_70%)] text-slate-200 antialiased min-h-screen">

    <nav class="fixed w-full z-50 p-4 md:p-6">
        <div class="max-w-5xl mx-auto glass rounded-2xl px-6 py-4 flex justify-between items-center">
            <a href="#">
                <img src="assets/img/logo.png" class="h-8 md:h-10 brightness-0 invert" alt="Logo">
            </a>

            <div class="hidden md:flex space-x-8 text-sm font-medium text-slate-300">
                <a href="{{ route('home') }}"
                    class="nav-link hover:text-accent-500 transition {{ request()->routeIs('home') ? 'text-white !text-accent-500' : '' }}">
                    Home
                </a>
                <a href="{{ route('about') }}"
                    class="nav-link hover:text-accent-500 transition {{ request()->routeIs('about') ? 'text-white !text-accent-500' : '' }}">
                    About Us
                </a>
                <a href="{{ route('products') }}"
                    class="nav-link hover:text-accent-500 transition {{ request()->routeIs('products') ? 'text-white !text-accent-500' : '' }}">
                    Products
                </a>
                <a href="{{ route('contact') }}"
                    class="nav-link hover:text-accent-500 transition {{ request()->routeIs('contact') ? 'text-white !text-accent-500' : '' }}">
                    Contact Us
                </a>
            </div>

            <button id="menuBtn" class="md:hidden text-slate-300 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>
    </nav>

    <div id="mobileMenu"
        class="fixed inset-0 z-[60] bg-dark-950/90 backdrop-blur-xl transition-all duration-300 opacity-0 invisible">
        <div
            class="absolute right-0 top-0 h-full w-full max-w-xs bg-dark-900 border-l border-white/10 p-8 flex flex-col space-y-8 transform translate-x-full transition-transform duration-300 ease-in-out">
            <button id="closeBtn" class="self-end text-slate-400 text-2xl hover:text-white">✕</button>
            <div class="flex flex-col space-y-6 text-xl font-medium text-white">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About Us</a>
                <a href="{{ route('products') }}">Products</a>
                <a href="{{ route('contact') }}">Contact Us</a>
            </div>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <!-- Map Section -->
    <section class="max-w-5xl mx-auto px-6 py-20">
        <div
            class="bg-white/10 backdrop-blur-xl border border-white/20 p-8 rounded-[2rem] shadow-2xl grid md:grid-cols-2 gap-10 items-center">

            <div class="space-y-8">
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="mt-1 text-white/80">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-white">Alamat</h4>
                            <p class="text-white/70 text-sm">Jl. Bungur Besar 17 No. 41A Gunung Sahari Selatan,
                                Kemayoran, Jakarta Pusat, DKI Jakarta 10610</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="mt-1 text-white/80">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-white">Telepon / WhatsApp</h4>
                            <p class="text-white/70 text-sm">+62 812 8001 5042 <br> +62 878 7841 1883</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="mt-1 text-white/80">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-white">Email</h4>
                            <p class="text-white/70 text-sm">info@dny-filterindo.co.id</p>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="w-full h-80 rounded-2xl overflow-hidden grayscale hover:grayscale-0 transition duration-700 shadow-inner border border-white/20">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.778732289514!2d106.8427962!3d-6.1603819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5f6ca72e277%3A0xf7c0b3744594684!2sJl.%20Bungur%20Besar%2017%20No.41%20A%2C%20RT.4%2FRW.4%2C%20Gn.%20Sahari%20Sel.%2C%20Kec.%20Kemayoran%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2010440!5e0!3m2!1sen!2sid!4v1781771048180!5m2!1sen!2sid"
                    class="w-full h-full border-0" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </section>

    <footer class="max-w-5xl mx-auto px-6 py-8">
        <div
            class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl px-8 py-6 flex flex-col md:flex-row justify-between items-center shadow-lg shadow-black/20 gap-4">

            <a href="https://instagram.com/dnyfilterindo" target="_blank"
                class="flex items-center gap-2 text-white/70 hover:text-white transition font-medium text-sm">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
                <span>@dnyfilterindo</span>
            </a>

            <p class="text-white/50 text-xs font-medium">
                &copy; 2026 PT Denayu Filterindo Teknik. All Rights Reserved.
            </p>
        </div>
    </footer>

    <canvas id="cursor-trail"></canvas>

    <script>
        const canvas = document.getElementById('cursor-trail');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let particles = [];
        const colors = ['#f87171', '#fbbf24', '#34d399', '#60a5fa', '#a78bfa', '#f472b6'];

        window.addEventListener('mousemove', (e) => {
            for (let i = 0; i < 2; i++) {
                particles.push({
                    x: e.clientX,
                    y: e.clientY,
                    size: Math.random() * 5 + 2,
                    color: colors[Math.floor(Math.random() * colors.length)],
                    vx: (Math.random() - 0.5) * 2,
                    vy: (Math.random() - 0.5) * 2,
                    life: 1.0
                });
            }
        });

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach((p, index) => {
                p.x += p.vx;
                p.y += p.vy;
                p.life -= 0.02;
                ctx.fillStyle = p.color;
                ctx.globalAlpha = p.life;
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
                ctx.fill();
                if (p.life <= 0) particles.splice(index, 1);
            });
            requestAnimationFrame(animate);
        }

        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });

        animate();
    </script>

    @stack('scripts')

    <script>
        const menuBtn = document.getElementById('menuBtn');
        const closeBtn = document.getElementById('closeBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuContent = mobileMenu.querySelector('div'); // Mengambil div isi menu

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('opacity-0', 'invisible');
            mobileMenu.classList.add('opacity-100', 'visible');
            menuContent.classList.remove('translate-x-full'); // Geser ke posisi awal
        });

        closeBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('opacity-100', 'visible');
            mobileMenu.classList.add('opacity-0', 'invisible');
            menuContent.classList.add('translate-x-full'); // Geser kembali ke kanan
        });

        mobileMenu.addEventListener('click', (e) => {
            if (e.target === mobileMenu) {
                closeBtn.click();
            }
        });
    </script>

</body>

</html>
