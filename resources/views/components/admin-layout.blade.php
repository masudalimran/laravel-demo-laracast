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
    <title>Admin | {{ $pageTitle }}</title>
</head>

<body class="font-poppins bg-neutral-100">
    <x-header />
    <main>
        {{ $mainContent }}
    </main>

    <footer>
        <x-footer />
    </footer>
    @if (session()->has('success'))
        <x-util.success-toaster :text="session('success')" />
    @elseif (session()->has('error'))
        <x-util.error-toaster :text="session('error')" />
    @endif

</body>

</html>