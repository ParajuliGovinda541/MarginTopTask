@extends('layouts.app')

@section('heading')
    Details OF {{ substr($user->first_name, 0, 2) }}{{ substr($user->last_name, 0, 2) }}
@endsection

@section('content')
<div class="grid grid-cols-2">


    <div class="w-full mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl text-center font-bold mb-4">User Information</h2>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                First Name
            </label>
            <p
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                {{ $user->first_name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Last Name
            </label>
            <p
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                {{ $user->last_name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Email
            </label>
            <p
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                {{ $user->email }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Online Status
            </label>
            <p
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                {{ $user->online_status == 0 ? 'Offline' : 'Online' }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Admin Status
            </label>
            <p
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                {{ $user->is_admin == 0 ? 'User' : 'Admin' }}</p>
        </div>
    </div>

    <div class="w-full mx-auto px-4">
        <h1 class="mt-5 mb-4 text-center text-2xl font-bold">User Clock Information</h1>

        <div class="grid grid-cols-1 gap-4">
            @foreach ($user->clocks as $clock)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-2">Clock Entry {{ $loop->iteration }}</h2>
                    <ul>
                        <li><strong>Clock In:</strong> {{ $clock->start_datetime }}</li>
                        <li><strong>Clock Out:</strong> {{ $clock->end_datetime }}</li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="px-10">
    <h1 class="text-3xl text-center my-5 font-bold mb-6">User Tasks Information</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border-gray-200 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">SN</th>
                    <th class="py-3 px-6 text-left">Title</th>
                    <th class="py-3 px-6 text-left">Sub Title</th>
                    <th class="py-3 px-6 text-left">Short Description</th>
                    <th class="py-3 px-6 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($user->tasks as $task)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="py-3 px-6 text-left">{{ $task->title }}</td>
                        <td class="py-3 px-6 text-left">{{ $task->subtitle }}</td>
                        <td class="py-3 px-6 text-left">{{ $task->short_description }}</td>
                        <td class="py-3 text-left">
                            <span class="uppercase py-1 px-3 rounded-full text-xs">{{ $task->status }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
