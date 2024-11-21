@if(Session::has('success'))
<div class="fixed left-4 bottom-4 bg bg-green-500 px-5 py-3 rounded-md shadow-lg border-l-8
 border-blue-600 z-20" id="alertmessage">
    <p class="text-Pink-500 text-center text-3xl "> <i class="ri-check-double-line text-3xl"></i>
     <br> {{session('success')}}. </p>
</div>
<script>
    setTimeout(function() {
        document.getElementById('alertmessage').style.display='none';
    },2000);

</script>
@endif
@if(Session::has('error'))
<div class="fixed left-4 bottom-4 bg bg-red-200 px-5 py-3 rounded-md shadow-lg border-l-8
 border-blue-500 z-20" id="alertmessage">
    <p class="text-Pink-500 text-center text-3xl "> <i class="ri-check-double-line text-3xl"></i>
     <br> {{session('error')}}. </p>
</div>
<script>
    setTimeout(function() {
        document.getElementById('alertmessage').style.display='none';
    },2000);

</script>
@endif
