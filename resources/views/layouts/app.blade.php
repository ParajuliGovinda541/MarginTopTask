<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite('resources/css/app.css')
        <link href="DataTables/datatables.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.datatables.net/v/dt/dt-2.0.8/datatables.min.css" rel="stylesheet">
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
      />

         {{-- data table links --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="lg:flex hidden">

            <div class="px-2  fixed  w-56 bg-gradient-to-t  from-[#74738a] to-[#0e3036]  h-screen text-left">
                <a class="my-1 hover:bg-white hover:text-black text-xl pl-5 text-white block w-full" href="{{route('dashboard')}}">Dashboard</a>
                <hr class="">
                <a class="my-1 hover:bg-white hover:text-black text-xl pl-5 text-white block w-full" href="{{route('admin.index')}}">User</a>
                <hr class="">
                <a class="my-1 hover:bg-white hover:text-black text-xl pl-5 text-white block w-full" href="{{route('admin.myprofile')}}">My Profile</a>
                <hr class="">
                <form action="{{route('logout')}}" class="cursor-pointer" method="POST">
                    @csrf
                    <button type="submit" class="my-1  hover:text-black text-xl pl-5 text-white block w-full text-left" >Logout</button>
                    <hr class="">
                </form>

            </div>
        </div>
        <div class="w-full pl-60 ">
            <div>
                <div class="flex justify-between items-center">



                    <div>
                        <h1 class="text-black text-3xl uppercase">   @yield('heading')</h1>
                    </div>

                    @auth
                    <div class="mr-10">
                        Welcome, {{auth()->user()->first_name}}
                    </div>
                    @endauth
                </div>
                <hr class="h-2 my-2 w-full bg-black">


            </div>
            @yield('content')
        </div>

<script>
        new WOW().init();
    </script>
    <script src="DataTables/datatables.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-2.0.8/datatables.min.js"></script>

    </body>
</html>
