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
                <h2 class="justify-end flex mt-20 -mr-5">{{$userscount}}</h2>
            </div>
        </a>
        <div class="bg-green-400 hover:bg-green-600 cursor-pointer transform  h pt-10 px-10 text-white rounded-lg">
            <div class="">
                <h1 class="justify-start flex -mt-10 -ml-5">Tasks</h1>
                <h2 class="justify-end flex mt-20 -mr-5">{{$taskscount}}</h2>
            </div>
        </div>
        <div class="bg-green-400 hover:bg-green-600 cursor-pointer transform  h pt-10 px-10 text-white rounded-lg">
            <div class="">
                <h1 class="justify-start flex -mt-10 -ml-5">Clocled Times</h1>
                <h2 class="justify-end flex mt-20 -mr-5">{{$timescount}}</h2>
            </div>
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
