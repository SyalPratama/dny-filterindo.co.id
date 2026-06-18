<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0099CD'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-[#f0f2f5] font-sans antialiased">

    <!-- Latar Belakang Dekoratif -->
    <div class="fixed inset-0 overflow-hidden -z-10">
        <div
            class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] rounded-full bg-blue-200 mix-blend-multiply filter blur-3xl opacity-50 animate-blob">
        </div>
        <div
            class="absolute top-[20%] -right-[10%] w-[40%] h-[40%] rounded-full bg-purple-200 mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-2000">
        </div>
    </div>

    <div class="min-h-screen flex items-center justify-center p-6">
        <!-- Card Glassmorphism -->
        <div
            class="w-full max-w-md bg-white/70 backdrop-blur-xl p-10 rounded-[2rem] shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-white/50">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-extrabold text-slate-800 tracking-tight">Selamat Datang</h2>
                <p class="text-slate-500 mt-2">Masuk ke akun Anda</p>
            </div>

            <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Input Group -->
                <div class="space-y-4">
                    <input type="email" name="email" required placeholder="Alamat Email"
                        class="w-full px-6 py-4 rounded-xl bg-white border border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all duration-300">

                    <div class="relative" x-data="{ show: false }">
                        <input :type="show ? 'text' : 'password'" name="password" required placeholder="Kata Sandi"
                            class="w-full px-6 py-4 rounded-xl bg-white border border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all duration-300">
                        <button type="button" @click="show = !show"
                            class="absolute right-4 top-4 text-slate-400 hover:text-primary">
                            <span x-text="show ? 'Hide' : 'Show'"
                                class="text-xs font-bold uppercase tracking-wider"></span>
                        </button>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-4 rounded-xl font-bold shadow-lg shadow-blue-500/30 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300">
                    Sign In
                </button>
            </form>
        </div>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @keyframes blob {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }
    </style>
</body>

</html>
