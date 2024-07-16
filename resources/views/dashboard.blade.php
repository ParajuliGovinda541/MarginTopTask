@extends('layouts.app')
@section('heading')
<div>
    dashboard
</div>
@endsection
@section('content')


<div class="grid grid-cols-3 gap-20 my-10 px-10">
    <a href="{{ route('admin.index') }}" class="bg-blue-500 hover:bg-blue-700 cursor-pointer transform h-full py-10 px-8 text-white rounded-lg flex flex-col justify-center items-center">
        <h1 class="text-lg font-bold mb-4">Total Users</h1>
        <h2 class="text-3xl font-bold">{{ $userscount }}</h2>
    </a>
    <div class="bg-purple-500 hover:bg-purple-700 cursor-pointer transform h-full py-10 px-8 text-white rounded-lg flex flex-col justify-center items-center">
        <h1 class="text-lg font-bold mb-4">Total Tasks</h1>
        <h2 class="text-3xl font-bold">{{ $taskscount }}</h2>
    </div>
    <div class="bg-indigo-500 hover:bg-indigo-700 cursor-pointer transform h-full py-10 px-8 text-white rounded-lg flex flex-col justify-center items-center">
        <h1 class="text-lg font-bold mb-4">Clock Times</h1>
        <h2 class="text-3xl font-bold">{{ $timescount }}</h2>
    </div>
</div>

    <div class="px-5">
        <table id="myTable" class="text-center border-2 ">
            <thead class="">
                <th class="border">S.N</th>
                <th class="border">Name</th>
                <th class="border">Total Online Status</th>
                <th class="border">Total Task Completed</th>
                <th class="border">Total Task In Progress </th>
                <th class="border">Total Task To Do </th>
            </thead>
            <tbody>
             @foreach ($users as $user )
             <tr class="border">
                <td class="border">{{$loop->iteration}}</td>
                <td class="border">{{$user->first_name}}</td>
                <td class="border">{{$user->online_status == 0 ?'Offline':'Online'}}</td>
                <td class="border">{{$user->taskCompletedCount()}}</td>
                <td class="border">{{$user->taskInProgressCount()}}</td>
                <td class="border">{{$user->taskToDoCount()}}</td>

            </tr>
             @endforeach

            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="http://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css"></script>
<script>
    let table = new DataTable('#myTable');
</script>
</div>
@endsection
