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

                <!-- Success Message -->
                @if(session('success'))
                <div class="bg-green-500 bg-opacity-20 border border-green-400 text-green-100 px-4 py-3 rounded-lg mb-4 flex items-center">
                    <i class="ri-check-circle-line mr-2"></i>
                    {{ session('success') }}
                </div>
                @endif

                <!-- Description -->
                <div class="text-sm text-center font-medium text-gray-200 mb-6">
                    <p>Update your details to keep your profile up to date.</p>
                </div>

                <!-- User Info Form -->
                <form action="{{ route('userprofile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Profile Picture Section -->
                    <div class="text-center mb-8">
                        <div class="relative inline-block">
                            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-yellow-400 shadow-lg mx-auto bg-white">
                                @if($user->profile_picture)
                                    <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}" alt="Profile Picture" class="w-full h-full object-cover" id="profile-preview">
                                @else
                                    <img src="{{ asset('useravatar.avif') }}" alt="Default Avatar" class="w-full h-full object-cover" id="profile-preview">
                                @endif
                            </div>
                            <label for="profile_picture" class="absolute bottom-2 right-2 bg-yellow-500 hover:bg-yellow-400 text-gray-900 rounded-full p-2 cursor-pointer transition-all duration-300 hover:scale-110 shadow-lg">
                                <i class="ri-camera-fill text-lg"></i>
                            </label>
                        </div>
                        <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="hidden" onchange="previewImage(this)">
                        @error('profile_picture')
                        <span class="text-red-400 text-sm block mt-2">{{ $message }}</span>
                        @enderror
                        <p class="text-gray-300 text-sm mt-2">Click the camera icon to change your profile picture</p>
                    </div>

                    <!-- Form Fields Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-bold text-yellow-400 mb-2 flex items-center">
                                    <i class="ri-user-fill mr-2"></i>Full Name
                                </label>
                                <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required
                                    class="block w-full px-4 py-3 rounded-lg text-gray-900 font-semibold bg-white bg-opacity-80 placeholder-gray-500 focus:ring-2 focus:ring-yellow-400 focus:bg-white transition-all duration-300">
                                @error('name')
                                <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-bold text-yellow-400 mb-2 flex items-center">
                                    <i class="ri-mail-fill mr-2"></i>Email Address
                                </label>
                                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required
                                    class="block w-full px-4 py-3 rounded-lg text-gray-900 font-semibold bg-white bg-opacity-80 placeholder-gray-500 focus:ring-2 focus:ring-yellow-400 focus:bg-white transition-all duration-300">
                                @error('email')
                                <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-4">
                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-bold text-yellow-400 mb-2 flex items-center">
                                    <i class="ri-phone-fill mr-2"></i>Phone Number
                                </label>
                                <input id="phone" type="tel" name="phone" value="{{ old('phone', $user->phone) }}"
                                    class="block w-full px-4 py-3 rounded-lg text-gray-900 font-semibold bg-white bg-opacity-80 placeholder-gray-500 focus:ring-2 focus:ring-yellow-400 focus:bg-white transition-all duration-300" placeholder="+977-9800000000">
                                @error('phone')
                                <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-sm font-bold text-yellow-400 mb-2 flex items-center">
                                    <i class="ri-home-5-line mr-2"></i>Address
                                </label>
                                <input id="address" type="text" name="address" value="{{ old('address', $user->address) }}"
                                    class="block w-full px-4 py-3 rounded-lg text-gray-900 font-semibold bg-white bg-opacity-80 placeholder-gray-500 focus:ring-2 focus:ring-yellow-400 focus:bg-white transition-all duration-300" placeholder="Kathmandu, Nepal">
                                @error('address')
                                <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                        <a href="{{ route('historyindex') }}"
                            class="bg-indigo-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-400 hover:scale-105 transition-all duration-300 font-bold inline-flex items-center">
                            <i class="ri-history-line mr-2"></i>View Booking History
                        </a>

                        <button type="submit"
                            class="bg-yellow-500 text-gray-900 px-8 py-3 rounded-lg shadow-md hover:bg-yellow-400 hover:scale-105 transition-all duration-300 font-bold inline-flex items-center">
                            <i class="ri-save-line mr-2"></i>Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</header>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('profile-preview').src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
