<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | YatraSathi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-50 flex">

    {{-- Left Panel --}}
    <div class="hidden lg:flex flex-col justify-between w-5/12 bg-blue-900 p-12">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ asset('logo.png') }}" alt="YatraSathi" class="w-10 h-10 rounded-full">
            <span class="text-white font-extrabold text-xl" style="font-family: 'DM Serif Display', Georgia, serif;">
                Yatra<em class="not-italic text-orange-400">Sathi</em>
            </span>
        </a>

        {{-- Middle content --}}
        <div>
            <span class="inline-block text-orange-400 text-xs font-bold tracking-widest uppercase mb-4"
                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                ✦ Join Us Today
            </span>
            <h2 class="text-white font-semibold leading-tight mb-4"
                style="font-family: 'DM Serif Display', Georgia, serif; font-size: clamp(1.8rem, 3vw, 2.8rem);">
                Start Your Nepal <br><em class="not-italic text-orange-400">Adventure</em>
            </h2>
            <p class="text-blue-200 text-sm leading-relaxed max-w-xs"
                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                Create your account to book packages, connect with expert guides, and explore the best of Nepal.
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
                    Create your account
                </h1>
                <p class="text-gray-400 text-sm"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    Fill in your details to get started with YatraSathi.
                </p>
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                {{-- Name + Phone (2 col) --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <i class="ri-user-line mr-1 text-orange-400"></i> Name
                        </label>
                        <x-text-input id="name" type="text" name="name" :value="old('name')"
                            placeholder="Full name" required autofocus autocomplete="name"
                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-gray-50 text-gray-700"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;" />
                        <x-input-error :messages="$errors->get('name')" class="text-red-400 text-xs mt-1" />
                    </div>
                    <div>
                        <label for="phone" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <i class="ri-phone-line mr-1 text-orange-400"></i> Phone
                        </label>
                        <x-text-input id="phone" type="tel" name="phone" :value="old('phone')"
                            placeholder="98XXXXXXXX" required autocomplete="tel"
                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-gray-50 text-gray-700"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;" />
                        <x-input-error :messages="$errors->get('phone')" class="text-red-400 text-xs mt-1" />
                    </div>
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5"
                        style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <i class="ri-mail-line mr-1 text-orange-400"></i> Email Address
                    </label>
                    <x-text-input id="email" type="email" name="email" :value="old('email')"
                        placeholder="you@example.com" required autocomplete="username"
                        class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-gray-50 text-gray-700"
                        style="font-family: 'Plus Jakarta Sans', sans-serif;" />
                    <x-input-error :messages="$errors->get('email')" class="text-red-400 text-xs mt-1" />
                </div>

                {{-- Address --}}
                <div>
                    <label for="address" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5"
                        style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <i class="ri-map-pin-line mr-1 text-orange-400"></i> Address
                    </label>
                    <x-text-input id="address" type="text" name="address" :value="old('address')"
                        placeholder="Your city / address"
                        class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-gray-50 text-gray-700"
                        style="font-family: 'Plus Jakarta Sans', sans-serif;" />
                    <x-input-error :messages="$errors->get('address')" class="text-red-400 text-xs mt-1" />
                </div>

                {{-- Password + Confirm (2 col) --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <i class="ri-lock-line mr-1 text-orange-400"></i> Password
                        </label>
                        <x-text-input id="password" type="password" name="password"
                            placeholder="••••••••" required autocomplete="new-password"
                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-gray-50 text-gray-700"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;" />
                        <x-input-error :messages="$errors->get('password')" class="text-red-400 text-xs mt-1" />
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <i class="ri-lock-2-line mr-1 text-orange-400"></i> Confirm
                        </label>
                        <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                            placeholder="••••••••" required autocomplete="new-password"
                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-gray-50 text-gray-700"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="text-red-400 text-xs mt-1" />
                    </div>
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full bg-blue-900 hover:bg-blue-800 text-white font-bold py-3 rounded-xl transition-all duration-300 hover:scale-105 text-sm mt-2"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <i class="ri-user-add-line mr-2"></i> Create Account
                </button>

                {{-- Divider --}}
                <div class="flex items-center gap-3 my-2">
                    <div class="flex-1 h-px bg-gray-200"></div>
                    <span class="text-xs text-gray-400" style="font-family: 'Plus Jakarta Sans', sans-serif;">or</span>
                    <div class="flex-1 h-px bg-gray-200"></div>
                </div>

                {{-- Login CTA --}}
                <p class="text-center text-sm text-gray-500" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    Already have an account?
                    <a href="{{ route('login') }}"
                        class="text-orange-500 font-bold hover:text-orange-400 transition-colors">
                        Login Here <i class="ri-arrow-right-line"></i>
                    </a>
                </p>

            </form>
        </div>
    </div>

</body>
</html>
