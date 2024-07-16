@extends('layouts.app')

@section('heading')
Add Users
@endsection
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')

<form action="{{ route('admin.update',$user->id) }}" method="POST" class="max-w-lg mx-auto p-6 bg-white shadow-md rounded">
    @csrf

    <div class="grid grid-cols-2 gap-10">
        <div class="mb-4">
            <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
            <input type="text" id="first_name" name="first_name" value="{{$user->first_name}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('first_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="{{$user->last_name}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('last_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
        <input type="email" id="email" name="email" value="{{$user->email}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        @error('email')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
        <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        @error('password')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="online_status" class="block text-gray-700 text-sm font-bold mb-2">Online Status</label>
        <select id="online_status" name="online_status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="0" @if($user->online_status == 0) selected @endif>Ofline</option>
            <option value="1" @if($user->online_status == 1) selected @endif>Online</option>
        </select>

        @error('online_status')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="is_admin" class="block text-gray-700 text-sm font-bold mb-2">Role</label>
        <select id="is_admin" name="is_admin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="0" @if($user->is_admin == 0) selected @endif>User</option>
            <option value="1" @if($user->is_admin == 1) selected @endif>Admin</option>
        </select>
        @error('is_admin')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>


    <div class="flex items-center justify-between">
        <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        <a href= "{{route('admin.index')}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</a>
    </div>
</form>



@endsection
