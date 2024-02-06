<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Font Import --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Long+Cang&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik+Doodle+Shadow&display=swap"
        rel="stylesheet">
    {{-- Css File Import --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Admin Login</title>
</head>

<body>
    <div x-cloak class="flex" x-data='{show: false}' x-init="setTimeout(() => show = true, 0)">
        <div :class="{ 'transform translate-y-[100vh]': !show && {{ $errors->isEmpty() }} }"
            class="basis-1/2 transition duration-300">
            <img src="/img/admin-panel/dashboard-banner-2.jpg"
                class="object-cover h-screen w-full opacity-25 hover:opacity-100" />
        </div>
        <div :class="{ 'transform -translate-y-[100vh]': !show && {{ $errors->isEmpty() }} }"
            class="basis-1/2 flex justify-center items-center bg-secondary transition duration-300">
            <form action="/admin" method="post" class="border-2 border-primary py-16 px-10 rounded-xl"
                x-data='{emailHasError: true, passwordHasError: true}'>
                @csrf
                <h1 class="text-5xl text-center font-rubik">Admin Login </h1>
                <hr class="my-3" />
                <figure class="py-[5rem] w-full flex justify-center items-center h-[4px] ">
                    <a href="/">
                        <img src="/img/main-logo-no-bg.png" class="object-cover w-[200px] " />
                    </a>
                </figure>

                <hr class="my-3" />
                <x-util.input label="Admin Email" name="email" type="email" required
                    placeholder="Enter Admin Email Here..." x-on:input.change="emailHasError = false" />
                @error('email')
                    <p class="text-red-500" x-show="emailHasError">{{ $message }}</p>
                @enderror
                <x-util.input-password required x-on:input.change="passwordHasError = false" />
                @error('password')
                    <p class="text-red-500" x-show="passwordHasError">{{ $message }}</p>
                @enderror
                <x-util.submit-button fullwidth text="Login As Admin" />
            </form>
        </div>
    </div>
</body>
