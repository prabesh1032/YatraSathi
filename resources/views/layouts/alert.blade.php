@if(Session::has('success'))
<div class="fixed left-4 bottom-4 bg-green-500 px-6 py-4 rounded-md shadow-lg border-l-8 border-green-700 z-20 transition-all duration-500 transform scale-100" id="success-alert">
    <p class="text-white text-center text-xl font-semibold">
        <i class="ri-check-double-line text-3xl mr-2"></i> {{ session('success') }}
    </p>
</div>
<script>
    setTimeout(function() {
        document.getElementById('success-alert').classList.add('scale-0'); // smooth disappear
    }, 3000); // Alert will fade away after 3 seconds
</script>
@endif

@if(Session::has('error'))
<div class="fixed left-4 bottom-4 bg-red-500 px-6 py-4 rounded-md shadow-lg border-l-8 border-red-700 z-20 transition-all duration-500 transform scale-100" id="error-alert">
    <p class="text-white text-center text-xl font-semibold">
        <i class="ri-error-warning-line text-3xl mr-2"></i> {{ session('error') }}
    </p>
</div>
<script>
    setTimeout(function() {
        document.getElementById('error-alert').classList.add('scale-0'); // smooth disappear
    }, 3000); // Alert will fade away after 3 seconds
</script>
@endif
