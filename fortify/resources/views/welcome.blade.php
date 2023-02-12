<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <!-- Styles -->
</head>

<body class="">

    <header style="background-image: url('images/header.jpeg');" class="w-full h-screen bg-center bg-cover bg-no-repeat">

    </header>
    <div class="container mx-auto ">
        <div class="flex flex-wrap">
            @foreach ($meals as $customer)
            <!-- <span>{{$customer->id}}</span>
    <span>{{$customer->title}}</span>
    <span>{{$customer->image}}</span> -->
            <x-card :meal=$customer />
            <br>
            @endforeach

        </div>
    </div>


</body>

</html>