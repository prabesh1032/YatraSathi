@extends('layouts.master')

@section('content')
<header class="relative w-full bg-cover bg-center overflow-hidden"
    style="height: 280px; background-image: url('{{ asset('travelling1.png') }}'); background-attachment: fixed;">
    <div class="absolute inset-0"
        style="background: linear-gradient(135deg, rgba(10,20,60,0.85) 0%, rgba(10,20,60,0.5) 50%, rgba(10,20,60,0.2) 100%);">
    </div>
    <div class="relative h-full flex flex-col justify-center items-center text-center px-4">
        <span class="inline-block text-orange-400 text-xs font-bold tracking-widest uppercase mb-3"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            ✦ YatraSathi
        </span>
        <h1 class="text-white font-semibold leading-tight mb-3"
            style="font-family: 'DM Serif Display', Georgia, serif; font-size: clamp(1.8rem, 4vw, 2.8rem); text-shadow: 0 2px 20px rgba(0,0,0,0.4);">
            Edit Your Profile
        </h1>
        <p class="text-blue-100/80 text-sm max-w-md leading-relaxed"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            Keep your details up to date for a smoother journey.
        </p>
    </div>
</header>

<section class="w-full bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-center w-full">
            <div class="bg-white rounded-2xl shadow-md p-8 w-full max-w-3xl border border-gray-100 -mt-20 relative z-10">

                <!-- Icon badge -->
                <div class="text-center mb-6">
                    <span class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-orange-100 text-orange-500">
                        <i class="ri-user-line text-2xl"></i>
                    </span>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center text-sm">
                    <i class="ri-check-circle-line mr-2 text-green-500 text-lg"></i>
                    {{ session('success') }}
                </div>
                @endif

                <!-- User Info Form -->
                <form action="{{ route('userprofile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Profile Picture Section -->
                    <div class="text-center mb-8">
                        <div class="relative inline-block">
                            <div class="w-28 h-28 rounded-full overflow-hidden border-4 border-orange-100 shadow-sm mx-auto bg-gray-100">
                                @if($user->profile_picture)
                                    <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}" alt="Profile Picture" class="w-full h-full object-cover" id="profile-preview">
                                @else
                                    <img src="{{ asset('useravatar.avif') }}" alt="Default Avatar" class="w-full h-full object-cover" id="profile-preview">
                                @endif
                            </div>
                            <label for="profile_picture" class="absolute bottom-0 right-0 bg-orange-500 hover:bg-orange-600 text-white rounded-full p-2 cursor-pointer transition-all duration-200 hover:scale-110 shadow-md">
                                <i class="ri-camera-fill text-base"></i>
                            </label>
                        </div>
                        <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="hidden" onchange="previewImage(this)">
                        @error('profile_picture')
                        <span class="text-red-500 text-sm block mt-2">{{ $message }}</span>
                        @enderror
                        <p class="text-gray-400 text-xs mt-2">Click the camera icon to change your profile picture</p>
                    </div>

                    <!-- Form Fields Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-semibold text-blue-900 mb-1.5 flex items-center">
                                    <i class="ri-user-fill mr-2 text-orange-500"></i>Full Name
                                </label>
                                <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required
                                    class="block w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200">
                                @error('name')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-semibold text-blue-900 mb-1.5 flex items-center">
                                    <i class="ri-mail-fill mr-2 text-orange-500"></i>Email Address
                                </label>
                                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required
                                    class="block w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200">
                                @error('email')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-4">
                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-blue-900 mb-1.5 flex items-center">
                                    <i class="ri-phone-fill mr-2 text-orange-500"></i>Phone Number
                                </label>
                                <input id="phone" type="tel" name="phone" value="{{ old('phone', $user->phone) }}"
                                    class="block w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200" placeholder="+977-9800000000">
                                @error('phone')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-sm font-semibold text-blue-900 mb-1.5 flex items-center">
                                    <i class="ri-home-5-line mr-2 text-orange-500"></i>Address
                                </label>
                                <input id="address" type="text" name="address" value="{{ old('address', $user->address) }}"
                                    class="block w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200" placeholder="Kathmandu, Nepal">
                                @error('address')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col md:flex-row gap-3 justify-center items-center pt-4 border-t border-gray-100">
                        <a href="{{ route('historyindex') }}"
                            class="w-full md:w-auto text-center bg-blue-50 text-blue-900 px-6 py-2.5 rounded-lg hover:bg-blue-100 transition-all duration-200 font-semibold inline-flex items-center justify-center">
                            <i class="ri-history-line mr-2"></i>View Booking History
                        </a>

                        <button type="submit"
                            class="w-full md:w-auto bg-orange-500 text-white px-8 py-2.5 rounded-lg shadow-sm hover:bg-orange-600 transition-all duration-200 font-semibold inline-flex items-center justify-center">
                            <i class="ri-save-line mr-2"></i>Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

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
