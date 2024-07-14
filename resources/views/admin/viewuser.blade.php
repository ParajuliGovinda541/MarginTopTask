@extends('layouts.app')
@section('heading')
  <div>
    <h1>  Our Users</h1>

  </div>
@endsection


@section('content')
<a href="{{route('admin.index')}}" class=" flex rounded-md text-white mr-10 my-2 bg-red-400 py-2 w-fit px-5">Cancel</a>


@endsection
