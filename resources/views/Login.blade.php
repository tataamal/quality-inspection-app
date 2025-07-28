<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quality Inspection - {{ $title }}</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/lucide@latest" defer></script>
    <link rel="icon" href="images/kmi.png">
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow-sm py-4 px-6 flex justify-between items-center">
        <img src="/images/kmi.png" alt="logo-kmi" class="h-10" />
        <h1 class=" font-semibold text-gray-800 text-center flex-1">Data Inspection Lot - {{ $region }}</h1>
        <img src="/images/sap.png" alt="logo-sap" class="h-10" />
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col lg:flex-row items-center justify-center px-6 py-12 gap-10">

        <!-- Hero Image -->
        <div class="w-full max-w-md">
            <img src="/images/hero.png" alt="hero" class="w-full object-contain" />
        </div>

        <!-- Login Form -->
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-green-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang</h2>
            <p class="text-gray-600 mb-6">Silakan masuk menggunakan akun SAP Anda.</p>

            <!-- Notifikasi -->
            @if (session('success'))
                <div class="mb-4 p-3 rounded-md bg-green-100 text-green-700 border border-green-300 text-sm">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="mb-4 p-3 rounded-md bg-red-100 text-red-700 border border-red-300 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            {{-- <form action="{{ route('sap.login') }}" method="POST" class="space-y-5"> --}}
                @csrf

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username SAP</label>
                    <input type="text" name="username" id="username" placeholder="Masukkan username anda" required
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" />
                </div>

                <!-- Password dengan Eye -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mt-5">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" placeholder="Masukkan Kata sandi anda" required
                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" />
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-400 hover:text-green-600 transition">
                            <i data-lucide="eye" id="eye-icon" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="w-full bg-green-600 text-white font-semibold py-2 px-4 rounded-md my-8 hover:bg-green-700 transition duration-200">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center text-sm text-gray-400 py-4">
        &copy; {{ date('Y') }} PT. Kayu Mabel Indonesia - Quality Inspection System
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            lucide.createIcons();
        });

        function togglePassword() {
            const input = document.getElementById("password");
            const icon = document.getElementById("eye-icon");
            if (input.type === "password") {
                input.type = "text";
                icon.setAttribute("data-lucide", "eye-off");
            } else {
                input.type = "password";
                icon.setAttribute("data-lucide", "eye");
            }
            lucide.createIcons();
        }
    </script>
</body>
</html>