@extends('layouts.master')

@section('content')

{{-- Hero Banner --}}
<header class="relative w-full bg-cover bg-center overflow-hidden" style="height: 280px; background-image: url('{{ asset('travelling1.png') }}'); background-attachment: fixed;">
    <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(10,20,60,0.85) 0%, rgba(10,20,60,0.5) 50%, rgba(10,20,60,0.2) 100%);"></div>
    <div class="relative h-full flex flex-col justify-center items-center text-center px-4">
        <span class="inline-block text-orange-400 text-xs font-bold tracking-widest uppercase mb-3"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            ✦ YatraSathi
        </span>
        <h1 class="text-white font-semibold leading-tight mb-3"
            style="font-family: 'DM Serif Display', Georgia, serif; font-size: clamp(1.8rem, 4vw, 2.8rem); text-shadow: 0 2px 20px rgba(0,0,0,0.4);">
            {{ $package->package_name }}
        </h1>
        <p class="text-blue-100/80 text-sm max-w-md leading-relaxed"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            Discover the wonders of {{ $package->package_location }} with this exclusive package!
        </p>
    </div>
</header>
{{-- Alerts --}}
<div class="container mx-auto px-6 mt-6">
    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-4 text-sm"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            <i class="ri-error-warning-line mr-2"></i>{{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-4 text-sm"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            <strong>Please fix the following errors:</strong>
            <ul class="list-disc ml-4 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @guest
        <div class="bg-orange-50 border border-orange-200 text-orange-700 px-4 py-3 rounded-xl mb-4 text-sm"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            <i class="ri-information-line mr-2"></i>
            Please <a href="{{ route('login') }}" class="font-bold underline">login</a> to book this package.
        </div>
    @endguest
</div>

{{-- Main Content --}}
<section class="py-10 bg-gray-50">
    <div class="container mx-auto px-6">

        @auth
        <form method="POST" action="{{ route('direct.checkout') }}">
            @csrf
            <input type="hidden" name="guide_id" id="hidden_guide_id" value="">
            <input type="hidden" name="package_id" value="{{ $package->id }}">
        @endauth

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- LEFT: Booking Form --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Package Image --}}
                <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                    <img src="{{ asset('images/' . $package->photopath) }}"
                        alt="{{ $package->package_name }}"
                        class="w-full h-72 object-cover hover:scale-105 transition-transform duration-500">
                </div>

                {{-- Booking Details --}}
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <h2 class="text-xl font-semibold text-blue-900 mb-6 flex items-center gap-2"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        <i class="ri-calendar-check-line text-orange-500"></i> Booking Details
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        {{-- Duration --}}
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                Select Duration
                            </label>
                            <select id="duration_range" name="duration_range"
                                class="w-full p-3 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                @for ($i = $package->duration; $i <= $package->duration + 5; $i++)
                                    <option value="{{ $i }}">{{ $i }} days</option>
                                @endfor
                            </select>
                        </div>

                        {{-- Number of People --}}
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                Number of People
                            </label>
                            <input type="number" id="num_people" name="num_people"
                                class="w-full p-3 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                                min="1" value="1" required
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        </div>

                        {{-- Travel Date --}}
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                Travel Date
                            </label>
                            <input type="date" id="travel_date" name="travel_date"
                                class="w-full p-3 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                                min="{{ date('Y-m-d', strtotime('+1 day')) }}" required
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <p class="text-xs text-gray-400 mt-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                Select a date at least 1 day from today
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Guide Selection --}}
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <h2 class="text-xl font-semibold text-blue-900 mb-2 flex items-center gap-2"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        <i class="ri-user-star-line text-orange-500"></i> Select Guide
                        <span class="text-xs font-normal text-gray-400 ml-1">(Optional)</span>
                    </h2>
                    <p class="text-sm text-gray-400 mb-6" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        Choose a guide to accompany you on your journey.
                    </p>

                    @if ($guides->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($guides as $guide)
                                <div class="relative border border-gray-200 rounded-2xl p-4 cursor-pointer hover:border-blue-300 hover:shadow-md transition-all duration-200"
                                    id="guide_card_{{ $guide->id }}"
                                    onclick="toggleGuideSelection({{ $guide->id }})">

                                    {{-- Tick --}}
                                    <div id="tick_{{ $guide->id }}"
                                        class="absolute top-3 right-3 bg-blue-900 text-white rounded-full w-6 h-6 flex items-center justify-center hidden">
                                        <i class="ri-check-line text-xs"></i>
                                    </div>

                                    <div class="flex items-center gap-3 mb-3">
                                        <img src="{{ asset('images/' . $guide->photopath) }}"
                                            alt="{{ $guide->name }}"
                                            class="w-12 h-12 rounded-full object-cover">
                                        <div>
                                            <h3 class="font-bold text-blue-900 text-sm"
                                                style="font-family: 'DM Serif Display', Georgia, serif;">
                                                {{ $guide->name }}
                                            </h3>
                                            <p class="text-xs text-gray-400"
                                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                                {{ $guide->experience }} yrs experience
                                            </p>
                                        </div>
                                    </div>

                                    <div class="text-center text-xs font-bold py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-orange-50 hover:text-orange-600 transition-all duration-200"
                                        id="select_button_{{ $guide->id }}"
                                        style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                        Select {{ $guide->name }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-orange-50 border border-orange-200 text-orange-700 p-4 rounded-xl text-sm"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <i class="ri-information-line mr-2"></i> No guides available for this package.
                        </div>
                    @endif

                    {{-- Book Button --}}
                    <div class="mt-8 flex justify-center">
                        @auth
                            <button type="submit" id="bookNowBtn"
                                class="bg-blue-900 hover:bg-blue-800 text-white px-12 py-3 rounded-full font-bold text-sm transition-all duration-200 hover:scale-105 flex items-center gap-2"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <i class="ri-bookmark-line"></i>
                                <span id="btnText">Book Now</span>
                                <div id="btnLoader" class="hidden">
                                    <div class="animate-spin rounded-full h-4 w-4 border-b-2 border-white"></div>
                                </div>
                            </button>
                        @else
                            <a href="{{ route('login') }}"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-12 py-3 rounded-full font-bold text-sm transition-all duration-200 hover:scale-105 flex items-center gap-2"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <i class="ri-login-box-line"></i> Login to Book
                            </a>
                        @endauth
                    </div>
                </div>

            </div>

            {{-- RIGHT: Sidebar --}}
            <div class="space-y-6">

                {{-- Package Info --}}
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-blue-900 mb-4"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        Package Details
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 text-sm text-gray-600"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <i class="ri-map-pin-2-fill text-orange-500 text-lg"></i>
                            <span><strong class="text-blue-900">Location:</strong> {{ $package->package_location }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <i class="ri-money-dollar-circle-line text-orange-500 text-lg"></i>
                            <span><strong class="text-blue-900">Price:</strong> ${{ number_format($package->package_price, 2) }} / person</span>
                        </div>
                        @if($package->meals)
                        <div class="flex items-center gap-3 text-sm text-gray-600"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <i class="ri-restaurant-line text-orange-500 text-lg"></i>
                            <span><strong class="text-blue-900">Meals:</strong> {{ $package->meals }}</span>
                        </div>
                        @endif
                        @if($package->accommodation)
                        <div class="flex items-center gap-3 text-sm text-gray-600"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <i class="ri-hotel-line text-orange-500 text-lg"></i>
                            <span><strong class="text-blue-900">Stay:</strong> {{ $package->accommodation }}</span>
                        </div>
                        @endif
                        @if($package->transportation)
                        <div class="flex items-center gap-3 text-sm text-gray-600"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <i class="ri-bus-line text-orange-500 text-lg"></i>
                            <span><strong class="text-blue-900">Transport:</strong> {{ $package->transportation }}</span>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Quick Links --}}
                <div class="bg-white rounded-2xl shadow-md p-6 space-y-3">
                    <h3 class="text-lg font-semibold text-blue-900 mb-4"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        Explore More
                    </h3>
                    <a href="{{ route('whyToChooseUs') }}"
                        class="flex items-center gap-3 p-4 border border-gray-100 rounded-xl hover:border-blue-200 hover:bg-blue-50 transition-all duration-200 group">
                        <i class="ri-shield-star-line text-orange-500 text-xl"></i>
                        <div>
                            <p class="font-bold text-blue-900 text-sm"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">Why Choose Us</p>
                            <p class="text-xs text-gray-400"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">See why this package stands out</p>
                        </div>
                        <i class="ri-arrow-right-line text-gray-300 ml-auto group-hover:text-blue-500"></i>
                    </a>
                    <a href="{{ route('adventure') }}"
                        class="flex items-center gap-3 p-4 border border-gray-100 rounded-xl hover:border-blue-200 hover:bg-blue-50 transition-all duration-200 group">
                        <i class="ri-mountain-line text-orange-500 text-xl"></i>
                        <div>
                            <p class="font-bold text-blue-900 text-sm"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">Adventure Activities</p>
                            <p class="text-xs text-gray-400"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">Experience exciting adventures</p>
                        </div>
                        <i class="ri-arrow-right-line text-gray-300 ml-auto group-hover:text-blue-500"></i>
                    </a>
                    <a href="{{ route('traveltips') }}"
                        class="flex items-center gap-3 p-4 border border-gray-100 rounded-xl hover:border-blue-200 hover:bg-blue-50 transition-all duration-200 group">
                        <i class="ri-lightbulb-line text-orange-500 text-xl"></i>
                        <div>
                            <p class="font-bold text-blue-900 text-sm"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">Travel Tips</p>
                            <p class="text-xs text-gray-400"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">Get tips for a memorable journey</p>
                        </div>
                        <i class="ri-arrow-right-line text-gray-300 ml-auto group-hover:text-blue-500"></i>
                    </a>
                </div>

            </div>
        </div>

        @auth
        </form>
        @endauth

        {{-- Reviews Section --}}
        <div class="mt-12">
            <h2 class="text-2xl font-semibold text-blue-900 mb-6 flex items-center gap-2"
                style="font-family: 'DM Serif Display', Georgia, serif;">
                <i class="ri-star-line text-orange-500"></i> User Reviews
            </h2>

            @if ($reviews->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($reviews as $review)
                        <div class="bg-white rounded-2xl shadow-md p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full bg-blue-900 text-white flex items-center justify-center font-bold text-sm">
                                    {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <h3 class="font-bold text-blue-900 text-sm"
                                        style="font-family: 'DM Serif Display', Georgia, serif;">
                                        {{ $review->user->name }}
                                    </h3>
                                    <p class="text-xs text-gray-400"
                                        style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                        {{ $review->user->country ?? '' }}
                                    </p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600 mb-3 leading-relaxed"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                {{ $review->review }}
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="text-yellow-400 text-sm">
                                    {{ str_repeat('★', $review->rating) }}<span class="text-gray-200">{{ str_repeat('★', 5 - $review->rating) }}</span>
                                </div>
                                <p class="text-xs text-gray-400"
                                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    {{ \Carbon\Carbon::parse($review->created_at)->format('M j, Y') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-orange-50 border border-orange-200 text-orange-700 p-4 rounded-xl text-sm"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <i class="ri-information-line mr-2"></i> No reviews yet. Be the first to leave a review!
                </div>
            @endif
        </div>

        {{-- Add Review --}}
        @auth
        <div class="mt-10">
            @php
                $user_id = auth()->user()->id;
                $count = \App\Models\Order::where('user_id', $user_id)->where('package_id', $package->id)->count();
            @endphp
            @if($count > 0)
                <div class="bg-white rounded-2xl shadow-md p-8 max-w-2xl mx-auto">
                    <h2 class="text-xl font-semibold text-blue-900 mb-6 text-center"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        <i class="ri-edit-line text-orange-500 mr-2"></i> Add Your Review
                    </h2>
                    <form action="{{ route('reviews.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ $package->id }}">

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">Your Review</label>
                            <textarea id="review" name="review" rows="4"
                                class="w-full p-3 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                                placeholder="Share your experience with this package..."
                                style="font-family: 'Plus Jakarta Sans', sans-serif;" required></textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-3"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">Rating</label>
                            <div class="flex items-center gap-2" id="starRating">
                                @for($i = 1; $i <= 5; $i++)
                                    <label>
                                        <input type="radio" name="rating" value="{{ $i }}" class="hidden">
                                        <svg data-value="{{ $i }}" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            class="star w-8 h-8 text-gray-200 hover:text-yellow-400 cursor-pointer transition duration-200"
                                            viewBox="0 0 24 24">
                                            <path d="M12 .587l3.668 7.431 8.215 1.192-5.945 5.798 1.402 8.192L12 18.902l-7.34 3.798 1.402-8.192L.873 9.21l8.215-1.192L12 .587z"/>
                                        </svg>
                                    </label>
                                @endfor
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-900 hover:bg-blue-800 text-white py-3 rounded-full font-bold text-sm transition-all duration-200 hover:scale-105"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <i class="ri-send-plane-line mr-2"></i> Submit Review
                        </button>
                    </form>
                </div>
            @else
                <div class="bg-orange-50 border border-orange-200 text-orange-700 p-4 rounded-xl text-sm max-w-2xl mx-auto"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <i class="ri-information-line mr-2"></i>
                    Please <a href="{{ route('packages.show', $package->id) }}" class="font-bold underline">book this package</a> first to leave a review.
                </div>
            @endif
        </div>
        @endauth

        {{-- Related Packages --}}
        <div class="mt-12">
            <h2 class="text-2xl font-semibold text-blue-900 mb-6"
                style="font-family: 'DM Serif Display', Georgia, serif;">
                Related Packages
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedpackages as $relatedpackage)
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <a href="{{ route('packages.show', $relatedpackage->id) }}">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ asset('images/' . $relatedpackage->photopath) }}"
                                    alt="{{ $relatedpackage->package_name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-blue-950/60 via-transparent to-transparent"></div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-blue-900 text-sm mb-1"
                                    style="font-family: 'DM Serif Display', Georgia, serif;">
                                    {{ $relatedpackage->package_name }}
                                </h3>
                                <p class="text-orange-500 font-bold text-sm"
                                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    ${{ number_format($relatedpackage->package_price, 2) }} / person
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

<script>
    let selectedGuideId = null;

    function toggleGuideSelection(guideId) {
        const guideCard = document.getElementById(`guide_card_${guideId}`);
        const tickIcon = document.getElementById(`tick_${guideId}`);
        const selectButton = document.getElementById(`select_button_${guideId}`);
        const hiddenInput = document.getElementById("hidden_guide_id");

        if (selectedGuideId === guideId) {
            tickIcon.classList.add('hidden');
            guideCard.classList.remove('border-blue-900', 'bg-blue-50');
            selectButton.textContent = `Select ${guideCard.querySelector('h3').textContent}`;
            hiddenInput.value = '';
            selectedGuideId = null;
        } else {
            if (selectedGuideId !== null) {
                document.getElementById(`tick_${selectedGuideId}`).classList.add('hidden');
                document.getElementById(`guide_card_${selectedGuideId}`).classList.remove('border-blue-900', 'bg-blue-50');
                document.getElementById(`select_button_${selectedGuideId}`).textContent =
                    `Select ${document.getElementById(`guide_card_${selectedGuideId}`).querySelector('h3').textContent}`;
            }
            tickIcon.classList.remove('hidden');
            guideCard.classList.add('border-blue-900', 'bg-blue-50');
            selectButton.textContent = `Unselect ${guideCard.querySelector('h3').textContent}`;
            hiddenInput.value = guideId;
            selectedGuideId = guideId;
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form[action="{{ route('direct.checkout') }}"]');
        const submitBtn = document.getElementById('bookNowBtn');
        const btnText = document.getElementById('btnText');
        const btnLoader = document.getElementById('btnLoader');

        if (form && submitBtn) {
            form.addEventListener('submit', function (e) {
                const numPeople = document.getElementById('num_people').value;
                const travelDate = document.getElementById('travel_date').value;
                const durationRange = document.getElementById('duration_range').value;

                if (!numPeople || numPeople < 1) {
                    alert('Please enter a valid number of people');
                    e.preventDefault();
                    return;
                }
                if (!travelDate) {
                    alert('Please select a travel date');
                    e.preventDefault();
                    return;
                }
                if (!durationRange) {
                    alert('Please select duration');
                    e.preventDefault();
                    return;
                }

                btnText.textContent = 'Processing...';
                btnLoader.classList.remove('hidden');
                submitBtn.disabled = true;
            });
        }
    });

    const stars = document.querySelectorAll('#starRating .star');
    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            stars.forEach(s => s.classList.remove('text-yellow-400'));
            for (let i = 0; i <= index; i++) {
                stars[i].classList.add('text-yellow-400');
            }
        });
    });
</script>

@endsection
