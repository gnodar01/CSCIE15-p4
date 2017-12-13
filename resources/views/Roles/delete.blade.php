@extends('layouts.master')

@push('nav')
<li><a href='/group/create'>Add a Group</a></li>
<li><a href='/group/{{ $gId }}/activity/create'>Add an Activity</a></li>
<li><a href='/group/{{ $gId }}/activity/{{ $aId }}/task/create'>Add a Task</a></li>
<li><a href='/group/{{ $gId }}/activity/{{ $aId }}/role/create'>Add a Role</a></li>
@endpush

@section('content')
    <h1>Delete {{$role->name}}</h1>

    <form method='POST' action='/group/{{ $gId }}/activity/{{ $aId }}/role/{{ $role['id'] }}'>

        {{ method_field('delete') }}

        {{ csrf_field() }}

        <div>Are you sure you want to delete {{ $role->name }}?</div>
        
        <input type='submit' value='Delete' class='btn btn-danger btn-small'>
        <a href='{{ $prevUrl }}' class='btn btn-secondary btn-small'>Cancel</a>
    </form>
@endsection
