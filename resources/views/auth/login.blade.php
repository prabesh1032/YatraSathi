<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="grid grid-cols-2">
        <img src="https://bitmapitsolution.com/images/login/login.jpg"
         alt="" class="h-screen w-full border-r">
         <div class="flex items-center justify-center">
            <div class="text-center w-6/12">
                <img src="{{ asset('SS3.png') }}" alt=""
                class="h-24 mx auto">
                <h1 class="text-2xl font-bold">Logout</h1>
                <form action="{{route('login')}}" method="POST" class="mt-5">
                    @csrf
                    <input type="email" name="email" placeholder="Email"
                    class="block w-full p-3 rounded-lg border-gray-400 mb-3">
                    @error('email')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                    <input type="password" name="password" placeholder="Password"
                    class="block w-full p-3 rounded-lg border-gray-400 mb-3">
                    @error('password')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                    <button type="submit" class=" bg-blue-500 text-white p-3 w-full rounded-lg">
                        Login
                    </button>
                </form>
            </div>
         </div>
    </div>

</body>
</html>
