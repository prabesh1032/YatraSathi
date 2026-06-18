<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | YatraSathi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-50 flex">

    {{-- Left Panel --}}
    <div class="hidden lg:flex flex-col justify-between w-5/12 bg-blue-900 p-12">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ asset('SS2.png') }}" alt="YatraSathi" class="w-10 h-10 rounded-full">
            <span class="text-white font-extrabold text-xl" style="font-family: 'DM Serif Display', Georgia, serif;">
                Yatra<em class="not-italic text-orange-400">Sathi</em>
            </span>
        </a>

        {{-- Middle content --}}
        <div>
            <span class="inline-block text-orange-400 text-xs font-bold tracking-widest uppercase mb-4"
                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                ✦ Welcome Back
            </span>
            <h2 class="text-white font-semibold leading-tight mb-4"
                style="font-family: 'DM Serif Display', Georgia, serif; font-size: clamp(1.8rem, 3vw, 2.8rem);">
                Explore Nepal <br><em class="not-italic text-orange-400">With Confidence</em>
            </h2>
            <p class="text-blue-200 text-sm leading-relaxed max-w-xs"
                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                Log in to access your bookings, saved destinations, and expertly curated Nepal travel packages.
            </p>
        </div>

        {{-- Stats --}}
        <div class="flex items-center gap-8 pt-8 border-t border-blue-700">
            <div>
                <div class="text-white font-extrabold text-xl"
                    style="font-family: 'DM Serif Display', Georgia, serif;">1,000+</div>
                <div class="text-blue-300 text-xs"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">Happy Travelers</div>
            </div>
            <div class="w-px h-8 bg-blue-700"></div>
            <div>
                <div class="text-white font-extrabold text-xl"
                    style="font-family: 'DM Serif Display', Georgia, serif;">50+</div>
                <div class="text-blue-300 text-xs"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">Destinations</div>
            </div>
            <div class="w-px h-8 bg-blue-700"></div>
            <div>
                <div class="text-white font-extrabold text-xl"
                    style="font-family: 'DM Serif Display', Georgia, serif;">100%</div>
                <div class="text-blue-300 text-xs"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">Local Expertise</div>
            </div>
        </div>

    </div>

    {{-- Right Panel - Form --}}
    <div class="flex-1 flex flex-col justify-center items-center px-6 py-12">

        {{-- Mobile logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2 mb-8 lg:hidden">
            <img src="{{ asset('logo.png') }}" alt="YatraSathi" class="w-8 h-8 rounded-full">
            <span class="text-blue-900 font-extrabold text-lg"
                style="font-family: 'DM Serif Display', Georgia, serif;">
                Yatra<em class="not-italic text-orange-500">Sathi</em>
            </span>
        </a>

        <div class="w-full max-w-md">

            {{-- Heading --}}
            <div class="mb-8">
                <h1 class="text-blue-900 font-semibold mb-1"
                    style="font-family: 'DM Serif Display', Georgia, serif; font-size: clamp(1.6rem, 3vw, 2rem);">
                    Login to your account
                </h1>
                <p class="text-gray-400 text-sm"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    Welcome back! Enter your credentials to continue.
                </p>
            </div>

            {{-- Session error --}}
            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-600 text-sm px-4 py-3 rounded-xl mb-6"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <i class="ri-error-warning-line mr-2"></i>{{ session('error') }}
                </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5"
                        style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <i class="ri-mail-line mr-1 text-orange-400"></i> Email Address
                    </label>
                    <input type="email" name="email" id="email"
                        placeholder="you@example.com"
                        value="{{ old('email') }}"
                        class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-gray-50 text-gray-700"
                        style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    @error('email')
                        <p class="text-red-400 text-xs mt-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-xs font-bold text-gray-500 uppercase tracking-wider"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <i class="ri-lock-line mr-1 text-orange-400"></i> Password
                        </label>
                        <a href="{{ route('password.request') }}"
                            class="text-xs text-blue-700 hover:text-orange-500 font-semibold transition-colors"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            Forgot Password?
                        </a>
                    </div>
                    <input type="password" name="password" id="password"
                        placeholder="••••••••"
                        class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-gray-50 text-gray-700"
                        style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    @error('password')
                        <p class="text-red-400 text-xs mt-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full bg-blue-900 hover:bg-blue-800 text-white font-bold py-3 rounded-xl transition-all duration-300 hover:scale-105 text-sm mt-2"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <i class="ri-login-box-line mr-2"></i> Login
                </button>

                {{-- Divider --}}
                <div class="flex items-center gap-3 my-2">
                    <div class="flex-1 h-px bg-gray-200"></div>
                    <span class="text-xs text-gray-400" style="font-family: 'Plus Jakarta Sans', sans-serif;">or</span>
                    <div class="flex-1 h-px bg-gray-200"></div>
                </div>

                {{-- Register CTA --}}
                <p class="text-center text-sm text-gray-500" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    New to YatraSathi?
                    <a href="{{ route('register') }}"
                        class="text-orange-500 font-bold hover:text-orange-400 transition-colors">
                        Register Here <i class="ri-arrow-right-line"></i>
                    </a>
                </p>

            </form>
        </div>
    </div>
</body>
</html>
