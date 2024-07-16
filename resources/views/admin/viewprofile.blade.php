@extends('layouts.app')

@section('heading')
My Profile
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

{{-- {{$userclock->id}} --}}
{{$user->first_name}} {{$user->last_name}} {{$user->email}} {{$user->online_status == 0? 'Offline':'Online'}} {{$user->is_admin== 0 ?'User':'Admin'}}


@endsection
