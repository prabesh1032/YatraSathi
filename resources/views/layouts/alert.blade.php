@if(Session::has('success'))
<div class="fixed left-4 bottom-4 bg-gradient-to-r from-green-400 via-blue-500 to-green-600 px-8 py-6 rounded-xl shadow-xl border-l-8 border-blue-700 z-20 transform scale-100 transition-all duration-500 flex items-center gap-4" id="success-alert">
    <i class="ri-suitcase-3-line text-4xl text-white animate-bounce"></i>
    <div>
        <p class="text-white text-lg font-bold">
            {{ session('success') }}
        </p>
    </div>
</div>
<script>
    setTimeout(function() {
        const alert = document.getElementById('success-alert');
        alert.style.opacity = '0';
        alert.style.transform = 'translateX(-100%)';
        setTimeout(() => alert.remove(), 500); // Remove after fade-out
    }, 3000); // Alert fades away after 3 seconds
</script>
@endif

@if(Session::has('error'))
<div class="fixed left-4 bottom-4 bg-gradient-to-r from-red-400 via-orange-500 to-red-600 px-8 py-6 rounded-xl shadow-xl border-l-8 border-orange-700 z-20 transform scale-100 transition-all duration-500 flex items-center gap-4" id="error-alert">
    <i class="ri-flight-takeoff-line text-4xl text-white animate-pulse"></i>
    <div>
        <p class="text-white text-lg font-bold">
            {{ session('error') }}
        </p>
        <span class="text-white text-sm italic">Please try again later.</span>
    </div>
</div>
<script>
    setTimeout(function() {
        const alert = document.getElementById('error-alert');
        alert.style.opacity = '0';
        alert.style.transform = 'translateX(-100%)';
        setTimeout(() => alert.remove(), 500); // Remove after fade-out
    }, 3000); // Alert fades away after 3 seconds
</script>
@endif
