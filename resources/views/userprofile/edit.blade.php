@extends('layouts.master')

@section('content')
<header class="h-screen w-full bg-cover bg-center relative" style="background-image: url('{{ asset('travelling3.png') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-70"></div>

    <main class="container mx-auto py-10 relative z-10">
        <div class="flex items-center justify-center w-full h-full">
            <div class="bg-white bg-opacity-20 backdrop-blur-lg rounded-lg shadow-lg p-6 w-full max-w-3xl text-gray-900 border border-gray-300">
                <!-- Title -->
                <h2 class="text-3xl font-bold text-center text-indigo-500 mb-4">
                    <i class="ri-user-line text-yellow-500"></i> Edit Your
                    <span class="text-yellow-500">Profile</span>
                </h2>

                <!-- Description -->
                <div class="text-sm text-center font-medium text-gray-200 mb-4">
                    <p>Update your details to keep your profile up to date.</p>
                </div>

                <!-- User Info Form -->
                <form action="{{ route('userprofile.update') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf

                    <!-- Left Column -->
                    <div class="space-y-4">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-bold text-yellow-400 mb-1 flex items-center">
                                <i class="ri-user-fill mr-1"></i>Name
                            </label>
                            <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required
                                class="block w-full px-3 py-2 rounded-md text-gray-900 font-semibold bg-white bg-opacity-70 placeholder-gray-500 focus:ring-2 focus:ring-yellow-400">
                            @error('name')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-bold text-yellow-400 mb-1 flex items-center">
                                <i class="ri-mail-fill mr-1"></i>Email
                            </label>
                            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required
                                class="block w-full px-3 py-2 rounded-md text-gray-900 font-semibold bg-white bg-opacity-70 placeholder-gray-500 focus:ring-2 focus:ring-yellow-400">
                            @error('email')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <!-- Right Column -->
                    <div class="space-y-4">
                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-bold text-yellow-400 mb-1 flex items-center">
                                <i class="ri-phone-fill mr-1"></i>Phone
                            </label>
                            <input id="phone" type="tel" name="phone" value="{{ old('phone', $user->phone) }}" required
                                class="block w-full px-3 py-2 rounded-md text-gray-900 font-semibold bg-white bg-opacity-70 placeholder-gray-500 focus:ring-2 focus:ring-yellow-400">
                            @error('phone')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div>
                            <label for="address" class="block text-sm font-bold text-yellow-400 mb-1 flex items-center">
                                <i class="ri-home-5-line mr-1"></i>Address
                            </label>
                            <input id="address" type="text" name="address" value="{{ old('address', $user->address) }}"
                                class="block w-full px-3 py-2 rounded-md text-gray-900 font-semibold bg-white bg-opacity-70 placeholder-gray-500 focus:ring-2 focus:ring-yellow-400">
                            @error('address')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('historyindex') }}"
                            class="bg-indigo-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-400 hover:scale-105 transition-all duration-300 font-bold inline-flex items-center">
                            <i class="ri-history-line mr-2"></i>View Booking History
                        </a>
                    </div>
                <!-- Save Button -->
                    <div class="text-center">
                        <button type="submit"
                            class="bg-yellow-500 text-gray-900 px-6 py-3 rounded-lg shadow-md hover:bg-yellow-400 hover:scale-105 transition-all duration-300 font-bold">
                            <i class="ri-save-line mr-2"></i>Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</header>
@endsection
