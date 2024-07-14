@extends('layouts.app')
@section('heading')
  <div>
    <h1>  Our Users</h1>

  </div>
@endsection


@section('content')
<a href="{{route('admin.create')}}" class=" flex rounded-md text-white mr-10 my-2 bg-blue-400 py-2 w-fit px-5">Add</a>

    <table id="myTable" class="">
        <thead class="text-center">
            <th>S.N</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email </th>
            <th>Status </th>
            <th>Role </th>
            <th class="text-center">Action </th>

        </thead>
        <tbody>
            <?php
                    $sn = 0;
                    ?>
            @foreach ($users as $user)
                <tr class="">
                    <td>{{ ++$sn }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ $user->online_status== 0 ?'Online':'Offline' }}

                    </td>
                    <td>
                        {{ $user->is_admin == 0 ? 'User' : 'Admin' }}
                    </td>

                    <td class="text-center grid grid-cols-3 gap-1">
                        <a class="bg-yellow-400 text-white hover:bg-yellow-600 hover:text-black  px-4 py-1 rounded-md" href="{{route('admin.viewuser',$user->id)}}">View</a>
                        <a class="bg-gray-600 hover:bg-green-600 hover:text-black px-4 py-1 rounded-md" href="{{route('admin.edit',$user->id)}}">Edit</a>
                        <form action="{{ route('admin.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 px-3 py-1 rounded-md text-white">Delete</button>
                        </form>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="http://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
