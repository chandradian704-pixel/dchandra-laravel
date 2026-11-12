<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIM-Surat</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 flex items-center justify-center px-4 py-8">

    <div class="w-full max-w-md">

        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-teal-700 text-white text-2xl font-bold shadow-lg mb-4">
                S
            </div>

            <h1 class="text-3xl font-bold text-slate-800">
                SIM-Surat
            </h1>

            <p class="text-slate-500 mt-2">
                Sistem Informasi Manajemen Surat
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-8">

            <div class="mb-7">
                <h2 class="text-xl font-bold text-slate-800">
                    Selamat Datang
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Silakan masuk menggunakan akun Anda.
                </p>
            </div>

            <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        placeholder="Masukkan email"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-teal-600 @error('email') border-red-500 @enderror"
                    >

                    @error('email')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        autocomplete="current-password"
                        placeholder="Masukkan password"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-teal-600 @error('password') border-red-500 @enderror"
                    >

                    @error('password')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="w-full bg-teal-700 hover:bg-teal-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-200 shadow-md hover:shadow-lg"
                >
                    Masuk
                </button>
            </form>

        </div>

        <p class="text-center text-sm text-slate-400 mt-6">
            SIM-Surat &copy; {{ date('Y') }}
        </p>

    </div>

</body>
</html>