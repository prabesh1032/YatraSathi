@extends('layouts.master')

@section('content')
<header class="h-screen w-full bg-cover bg-center relative" style="background-image: url('{{ asset('travelling3.png') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>

    <main class="container mx-auto py-12">
        <div class="relative flex items-center justify-center w-full h-full">
            <div class="bg-white bg-opacity-30 backdrop-blur-lg rounded-lg shadow-md p-6 w-full max-w-4xl text-gray-900">
                <!-- Title -->
                <h2 class="text-3xl font-extrabold text-center text-indigo-600 mb-8">
                    <i class="ri-user-line text-yellow-500"></i> Edit Your<span class="text-yellow-500 "> Profile
                </h2>

                <!-- Description Text -->
                <div class="text-lg text-center font-extrabold mb-8">
                    <p>Update your profile information below to keep your account details current. You can change your name, email, phone number, and address anytime.</p>
                </div>

                <!-- User Info Form -->
                <form action="{{ route('userprofile.update') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf

                    <!-- Left Column (Name, Email, Phone) -->
                    <div class="space-y-6">
                        <!-- Name -->
                        <div>
                            <div class="flex items-center space-x-2">
                                <x-input-label for="name" :value="__('Name')" class="block text-xl font-bold text-gray-900" />
                                <i class="ri-user-fill text-yellow-500"></i>
                            </div>
                            <x-text-input id="name" class="block w-full font-extrabold mt-1 p-3 rounded-lg border-none bg-white bg-opacity-20 text-white placeholder-gray-300 focus:ring-2 focus:ring-yellow-500" type="text" name="name" :value="old('name', $user->name)" required placeholder="Enter your name" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-400 text-sm" />
                        </div>

                        <!-- Email -->
                        <div>
                            <div class="flex items-center space-x-2">
                                <x-input-label for="email" :value="__('Email')" class="block text-xl font-bold text-gray-900" />
                                <i class="ri-mail-fill text-yellow-500"></i>
                            </div>
                            <x-text-input id="email" class="block w-full mt-1 p-3 rounded-lg font-extrabold border-none bg-white bg-opacity-20 text-white placeholder-gray-300 focus:ring-2 focus:ring-yellow-500" type="email" name="email" :value="old('email', $user->email)" required placeholder="Enter your email" autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-400 text-sm" />
                        </div>

                        <!-- Phone -->
                        <div>
                            <div class="flex items-center space-x-2">
                                <x-input-label for="phone" :value="__('Phone Number')" class="block text-xl font-bold text-gray-900" />
                                <i class="ri-phone-fill text-yellow-500"></i>
                            </div>
                            <x-text-input id="phone" class="block w-full mt-1 p-3 rounded-lg border-none font-extrabold bg-white bg-opacity-20 text-white placeholder-gray-300 focus:ring-2 focus:ring-yellow-500" type="tel" name="phone" :value="old('phone', $user->phone)" required placeholder="Enter your phone number" autocomplete="tel" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-1 text-red-400 text-sm" />
                        </div>
                    </div>

                    <!-- Right Column (Address) -->
                    <div class="space-y-6">
                        <!-- Address -->
                        <div>
                            <div class="flex items-center space-x-2">
                                <x-input-label for="address" :value="__('Address')" class="block text-xl font-bold text-gray-900" />
                                <i class="ri-home-5-line text-yellow-500"></i>
                            </div>
                            <x-text-input id="address" name="address" class="block w-full mt-1 p-3 font-extrabold rounded-lg border-none bg-white bg-opacity-20 text-white placeholder-gray-300 focus:ring-2 focus:ring-yellow-500" :value="old('address', $user->address)" placeholder="Enter your address" />
                            <x-input-error :messages="$errors->get('address')" class="mt-1 text-red-400 text-sm" />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center mt-6">
                            <button type="submit" class="bg-yellow-600 text-gray-900 text-lg font-bold py-3 px-6 rounded-lg shadow-md hover:bg-yellow-300 transition flex items-center">
                                <i class="ri-save-line text-indigo-500 mr-2"></i> Save Changes
                            </button>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('password.request') }}" class="text-gray-900 text-sm font-extrabold hover:underline">
                                <i class="ri-lock-line text-lime-500"></i> Forgot your password<i class="ri-question-line"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</header>
@endsection
