@extends('layouts.app')
@section('heading')
<div>
    dashboard
</div>
@endsection
@section('content')


<div class="">
    <div class="grid grid-cols-3 gap-20 my-10 px-10 text-center rounded-md justify-center items-center ">
        <a href="{{route('admin.index')}}" class="bg-green-400 hover:bg-green-600 cursor-pointer transform  h pt-10 px-10 text-white rounded-lg">
            <div class="">
                <h1 class="justify-start flex -mt-10 -ml-5">Users</h1>
                <h2 class="justify-end flex mt-20 -mr-5">{{$users}}</h2>
            </div>
        </a>
        <div class="bg-green-400 hover:bg-green-600 cursor-pointer transform  h pt-10 px-10 text-white rounded-lg">
            <div class="">
                <h1 class="justify-start flex -mt-10 -ml-5">Users</h1>
                <h2 class="justify-end flex mt-20 -mr-5">100</h2>
            </div>
        </div>
        <div class="bg-green-400 hover:bg-green-600 cursor-pointer transform  h pt-10 px-10 text-white rounded-lg">
            <div class="">
                <h1 class="justify-start flex -mt-10 -ml-5">Users</h1>
                <h2 class="justify-end flex mt-20 -mr-5">Numbers</h2>
            </div>
        </div>


    </div>
</div>
@endsection
